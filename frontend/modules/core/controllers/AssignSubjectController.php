<?php

namespace frontend\modules\core\controllers;

use frontend\modules\core\controllers\MenuController;
use frontend\modules\core\models\AssignSubject;
use frontend\modules\core\models\AssignSubjectSearch;
use frontend\modules\core\models\Course;
use frontend\modules\core\models\Subject;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * AssignSubjectController implements the CRUD actions for AssignSubject model.
 */
class AssignSubjectController extends Controller
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
                        'actions' => ['index', 'create', 'update', 'view', 'delete', 'getsubject'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {

                            $result = MenuController::getpermission(Yii::$app->user->identity->usertypeid, "assign-subject");
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
     * Lists all AssignSubject models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AssignSubjectSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider = $searchModel->search(Yii::$app->request->post());

        $courseModel = Course::find()->where(['status' => 1])->all();
        $courses = ArrayHelper::map($courseModel, 'courseid', 'course_name');

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'courses' => $courses,
        ]);
    }

    /**
     * Displays a single AssignSubject model.
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
     * Creates a new AssignSubject model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AssignSubject();

        $searchModel = new AssignSubjectSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $courseModel = Course::find()->where(['status' => 1])->all();
        $courses = ArrayHelper::map($courseModel, 'courseid', 'course_name');

        if ($model->load(Yii::$app->request->post())) {

            if ($model->validate()) {

                foreach ($_POST['AssignSubject']['batch_id'] as $key => $batch) {

                    foreach ($_POST['AssignSubject']['subject_id'] as $key => $subject) {

                        $model = new AssignSubject();

                        $model->batch_id = $batch;
                        $model->subject_id = $subject;
                        $model->course_id = $_POST['AssignSubject']['course_id'];
                        $model->institution_id = Yii::$app->user->identity->institutionid;

                        $assignsubject = AssignSubject::find()
                            ->where(['course_id' => $_POST['AssignSubject']['course_id']])
                            ->andWhere(['batch_id' => $batch])
                            ->andWhere(['subject_id' => $subject])
                            ->count();

                        if ($assignsubject > 0) {
                            Yii::$app->session->setFlash('assignsubject_error', 'The subject "' . $model->subject->subject_name . '"  is already assigned to this batch!');
                        } else {

                            $model->save();

                        }
                    }

                }
            }
            return $this->redirect(['create']);
            // return $this->redirect(['view', 'id' => $model->assign_subject_id]);
        }
        return $this->render('create', [
            'model' => $model, 'dataProvider' => $dataProvider, 'courses' => $courses,
        ]);
    }

    /**
     * Updates an existing AssignSubject model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->assign_subject_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AssignSubject model.
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
     * Finds the AssignSubject model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AssignSubject the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AssignSubject::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionGetsubject()
    {

        $subject = Subject::find()->where(['status' => 1])->all();

        echo "<option>Select Subject</option>";

        if (count($subject) > 0) {
            foreach ($subject as $row) {
                echo "<option value='$row->subject_id'>$row->subject_name</option>";
            }
        } else {
            echo "<option>No data found</option>";
        }

    }
}
