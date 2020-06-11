<?php

namespace frontend\modules\bank\controllers;

use Yii;
use frontend\modules\bank\models\BankDetails;
use frontend\modules\bank\models\BankDetailsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\modules\core\controllers\MenuController;

/**
 * BankDetailsController implements the CRUD actions for BankDetails model.
 */
class BankDetailsController extends Controller
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
                        'actions' => ['index', 'create', 'update', 'view', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {

                            $result = MenuController::getpermission(Yii::$app->user->identity->usertypeid, "add-bank");
                            if ($result == 1) {
                                return true;
                            }
                            return false;
                        },
                    ],
                    [
                        'actions' => ['index', 'view'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return (Yii::$app->user->identity->usertypeid == '2' || Yii::$app->user->identity->usertypeid == '4');
                        },
                    ],

                ],
            ],
        ];
    }

    /**
     * Lists all BankDetails models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BankDetailsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BankDetails model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new BankDetails model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BankDetails();

        $searchModel = new BankDetailsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        if ($model->load(Yii::$app->request->post())) {

            if ($model->validate()) {
                if ($model->save()) {
                    return $this->redirect(['create']);
                } 
            }
            // return $this->redirect(['view', 'id' => $model->bank_id]);
        }

        return $this->render('create', [
            'model' => $model,'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Updates an existing BankDetails model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->bank_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing BankDetails model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['create']);
        // return $this->redirect(['index']);
    }

    /**
     * Finds the BankDetails model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BankDetails the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        // if (($model = BankDetails::findOne($id)) !== null) {
        if (($model = BankDetails::find()->where(['slug' => $id])->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
