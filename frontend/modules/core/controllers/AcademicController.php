<?php

namespace frontend\modules\core\controllers;

use Yii;
use frontend\modules\core\models\Academic;
use frontend\modules\core\models\AcademicSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\modules\core\models\AcademicYear;
use frontend\modules\core\models\AcademicMonth;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;

/**
 * AcademicController implements the CRUD actions for Academic model.
 */
class AcademicController extends Controller
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
                            return (Yii::$app->user->identity->usertypeid == '2' || Yii::$app->user->identity->usertypeid == '4');
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
     * Lists all Academic models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AcademicSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Academic model.
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
     * Creates a new Academic model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Academic();

        $academicyear = AcademicYear::find()->where(['status' => 1])->all();
        $listyear = ArrayHelper::map($academicyear, 'academic_year', 'academic_year');

        $academicmonth = AcademicMonth::find()->where(['status' => 1])->all();
        $listmonth = ArrayHelper::map($academicmonth, 'academic_month', 'academic_month');

        $searchModel = new AcademicSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['create']);
        }

        return $this->render('create', [
            'model' => $model,'listyear' =>$listyear, 'listmonth' => $listmonth, 'searchModel' => $searchModel, 'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Updates an existing Academic model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $academicyear = AcademicYear::find()->where(['status' => 1])->all();
        $listyear = ArrayHelper::map($academicyear, 'academic_year', 'academic_year');

        $academicmonth = AcademicMonth::find()->where(['status' => 1])->all();
        $listmonth = ArrayHelper::map($academicmonth, 'academic_month', 'academic_month');

        $searchModel = new AcademicSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['create']);
        }

        return $this->render('update', [
            'model' => $model,'listyear' =>$listyear, 'listmonth' => $listmonth, 'searchModel' => $searchModel, 'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Deletes an existing Academic model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Academic model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Academic the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Academic::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
