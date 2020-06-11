<?php

namespace frontend\modules\core\controllers;

use frontend\modules\core\models\AttendanceType;
use frontend\modules\core\models\Course;
use frontend\modules\core\models\CourseSearch;
use frontend\modules\core\models\Syllabus;
use frontend\modules\core\models\SyllabusType;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * CourseController implements the CRUD actions for Course model.
 */
class CourseController extends Controller
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
     * Lists all Course models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CourseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Course model.
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
     * Creates a new Course model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Course();
        $syllabus = new Syllabus();
        $searchModel = new CourseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $attendancetype = AttendanceType::find()->where(['status' => 1])->all();
        $type = ArrayHelper::map($attendancetype, 'id', 'type');

        $syllabustype = SyllabusType::find()->where(['status' => 1])->all();
        $syllabus_type = ArrayHelper::map($syllabustype, 'id', 'syllabus');

        if ($model->load(Yii::$app->request->post()) && $syllabus->load(Yii::$app->request->post())) {
           
            if ($model->validate() || $syllabus->validate()) {

                if ($model->save()) {
                    $syllabus->syllabus_name = $_POST['Syllabus']['syllabus_name'];
                    $syllabus->course_id = $model->courseid;
                    $syllabus->institution_id = Yii::$app->user->identity->institutionid;
                    $syllabus->save();
                    return $this->redirect(['create']);
                }
            }
        }

        return $this->render('create', [
            'model' => $model, 'model_syllabus' => $syllabus, 'dataProvider' => $dataProvider, 'type' => $type, 'syllabus_type' => $syllabus_type,
        ]);
    }

    /**
     * Updates an existing Course model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $syllabus = Syllabus::find()->where(['course_id' => $model->courseid])->one();
        if (isset($syllabus)) {
            $syllabus = $syllabus;
        } else {
            $syllabus = new Syllabus();
        }

        $searchModel = new CourseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $attendancetype = AttendanceType::find()->where(['status' => 1])->all();
        $type = ArrayHelper::map($attendancetype, 'id', 'type');

        $syllabustype = SyllabusType::find()->where(['status' => 1])->all();
        $syllabus_type = ArrayHelper::map($syllabustype, 'id', 'syllabus');


        if ($model->load(Yii::$app->request->post()) && $syllabus->load(Yii::$app->request->post())) {
           
            if ($model->validate() && $syllabus->validate()) {

                if ($model->save()) {
                    $syllabus->syllabus_name = $_POST['Syllabus']['syllabus_name'];
                    $syllabus->save();
                    return $this->redirect(['update']);
                }
            }
        }

        return $this->render('update', [
            'model' => $model, 'model_syllabus' => $syllabus, 'dataProvider' => $dataProvider, 'type' => $type, 'syllabus_type' => $syllabus_type,
        ]);
    }

    /**
     * Deletes an existing Course model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        // return $this->redirect(['index']);
        return $this->redirect(['create']);
    }

    /**
     * Finds the Course model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Course the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        // if (($model = Course::findOne($id)) !== null) {
        if (($model = Course::find()->where(['slug' => $id])->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
