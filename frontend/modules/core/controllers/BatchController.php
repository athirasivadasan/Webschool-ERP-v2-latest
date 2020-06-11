<?php

namespace frontend\modules\core\controllers;

use Yii;
use frontend\modules\core\models\Batch;
use frontend\modules\core\models\BatchSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\modules\core\models\Course;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

/**
 * BatchController implements the CRUD actions for Batch model.
 */
class BatchController extends Controller
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
     * Lists all Batch models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BatchSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Batch model.
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
     * Creates a new Batch model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Batch();

        $courseModel = Course::find()->where(['status' => 1])->all();
        $courses = ArrayHelper::map($courseModel, 'courseid', 'course_name');

        $searchModel = new BatchSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        if ($model->load(Yii::$app->request->post())) {

            $model_batch = Batch::findOne(array('courseid' => $_POST['Batch']['courseid'], 'batch_name' => $_POST['Batch']['batch_name']));

            if (isset($model_batch)) {
                Yii::$app->session->setFlash('error','This batch is already exist!');

            } else {
                
                $model->institutionid = Yii::$app->user->identity->institutionid;
                
                $batch_startdate = $_POST['Batch']['batch_startdate'];
                $batch_startdate = date_create($batch_startdate);
                $model->batch_startdate = date_format($batch_startdate, 'Y-m-d H:i:s');

                $batch_enddate = $_POST['Batch']['batch_enddate'];
                $batch_enddate = date_create($batch_enddate);
                $model->batch_enddate = date_format($batch_enddate, 'Y-m-d H:i:s');

                if ($model->validate()) {
                    if ($model->save()) {
                        return $this->redirect(['create']);
                    } 
                }
            }

            //return $this->redirect(['view', 'id' => $model->batchid]);
        }

        return $this->render('create', [
            'model' => $model,'courses' => $courses, 'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Updates an existing Batch model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $courseModel = Course::find()->where(['status' => 1])->all();
        $courses = ArrayHelper::map($courseModel, 'courseid', 'course_name');

        $searchModel = new BatchSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        if ($model->load(Yii::$app->request->post())) {

            $model_batch = Batch::findOne(array('courseid' => $_POST['Batch']['courseid'], 'batch_name' => $_POST['Batch']['batch_name']));

            if (isset($model_batch)) {
                Yii::$app->session->setFlash('error','This batch is already exist!');

            } else {
                
                $batch_startdate = $_POST['Batch']['batch_startdate'];
                $batch_startdate = date_create($batch_startdate);
                $model->batch_startdate = date_format($batch_startdate, 'Y-m-d H:i:s');

                $batch_enddate = $_POST['Batch']['batch_enddate'];
                $batch_enddate = date_create($batch_enddate);
                $model->batch_enddate = date_format($batch_enddate, 'Y-m-d H:i:s');

                if ($model->validate()) {
                    if ($model->save()) {
                        return $this->redirect(['update']);
                    } 
                }
            }
        }
       
        return $this->render('update', [
            'model' => $model,'courses' => $courses, 'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Deletes an existing Batch model.
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
     * Finds the Batch model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Batch the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        //if (($model = Batch::findOne($id)) !== null) {
        if (($model = Batch::find()->where(['slug' => $id])->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
