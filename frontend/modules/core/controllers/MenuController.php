<?php

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
namespace frontend\modules\core\controllers;
use frontend\modules\core\models\Privilege;


class MenuController extends \yii\web\Controller
{

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [

            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    
                    [
                        'actions' => ['getpermission'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {

                            return (Yii::$app->user->identity->usertypeid == '4');
                        },
                    ],
                ],
            ],
        ];
    }
    public static function getMenu($usertypeid)
    {
        $parentid = 0;
        $result = static::getMenuRecrusive($parentid,$usertypeid);
        return $result;
    }

    private static function getMenuRecrusive($parent,$typeid)
    {

        $menu ='';
        
        $count = 0;
        
        
        $link = Privilege::find()->where(['status' => 1])
        ->andWhere(['parent_id' => $parent])
        ->andWhere(new \yii\db\Expression('FIND_IN_SET(:user_to_find, user_type)'))
        ->addParams([':user_to_find' => $typeid])
        ->orderBy([
            'position'=>SORT_ASC
          ])
        ->all();

        foreach ($link as $item) {
            $class = '';
            $classAct = '';
            $count = static::checkSubMenus($item['id']);

            // $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

            // if($actual_link == $item['url']){
            //     $classAct = 'active';
            // }


            if($count > 0){
                $class = 'nav-item-submenu';
                
            }

            $menu .="<li class='nav-item ".$class."'><a class='nav-link ".$classAct."' href='".$item['url']."'><i class=".$item['icon']."></i><span>".$item['label']."</span></a>";
          
            if($count > 0){
            $menu .= "<ul class='nav nav-group-sub' data-submenu-title='Layouts'>".static::getMenuRecrusive($item['id'],$typeid)."</ul>"; //call  recursively
            }

            $menu .= "</li>";

        }
        return $menu;
    }
    private static function checkSubMenus($item_id)
    {
        $count = Privilege::find()->where(['status' => 1])->andWhere(['parent_id' => $item_id])->count();
        return $count;
    }
    public function getPermission($usertypeid,$label)
    {
        $id = $usertypeid;

        $link = Privilege::find()->where(['status' => 1])
            ->andWhere(['label_id' => trim($label)])
            ->andWhere(new \yii\db\Expression('FIND_IN_SET(:user_to_find, user_type)'))
            ->addParams([':user_to_find' => $id])
            ->count();

        return $link;

    }


}
