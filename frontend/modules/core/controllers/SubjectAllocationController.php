<?php

namespace frontend\modules\core\controllers;

use Yii;
use frontend\modules\core\models\SubjectAllocation;
use frontend\modules\core\models\SubjectAllocationSearch;
use frontend\modules\core\models\Department;
use frontend\modules\core\models\AssignSubject;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\modules\core\models\Employee;
use frontend\modules\core\models\Course;
use frontend\modules\core\models\Batch;
use frontend\modules\core\models\Academic;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use frontend\modules\core\controllers\MenuController;

/**
 * SubjectAllocationController implements the CRUD actions for SubjectAllocation model.
 */
class SubjectAllocationController extends Controller
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
                        'actions' => ['index', 'create', 'update', 'view', 'delete', 'getsubject','getemployee'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {

                            $result = MenuController::getpermission(Yii::$app->user->identity->usertypeid, "subject-allocation");
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
     * Lists all SubjectAllocation models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SubjectAllocationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SubjectAllocation model.
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
     * Creates a new SubjectAllocation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SubjectAllocation();

        $searchModel = new SubjectAllocationSearch();
        $dataProvider = $searchModel->searchData(Yii::$app->request->queryParams);

        $departmentModel = Department::find()->where(['status' => 1])->all();
        $department = ArrayHelper::map($departmentModel, 'department_id', 'department_name');

        $courseModel = Course::find()->where(['status' => 1])->all();
        $course = ArrayHelper::map($courseModel, 'courseid', 'course_name');
       

        if ($model->load(Yii::$app->request->post())) {   
            

            
            $academic = Academic::find()->where(['status' => 1])->one();

            $model->academic_id  = $academic->academicid;
            $model->institution_id = Yii::$app->user->identity->institutionid;

            $is_exist = SubjectAllocation::find()
            ->where(['course_id' => $_POST['SubjectAllocation']['course_id']])
            ->andWhere(['batch_id' => $_POST['SubjectAllocation']['batch_id']])
            ->andWhere(['subject_id' => $_POST['SubjectAllocation']['subject_id']])
            ->andWhere(['institution_id' => Yii::$app->user->identity->institutionid])
            ->andWhere(['employee_id' => $_POST['SubjectAllocation']['employee_id']])
            ->andWhere(['department_id' => $_POST['SubjectAllocation']['department_id']])
            ->andWhere(['academic_id' => $academic->academicid])
            ->count();
            
            if ($model->validate()) {

                if ($is_exist > 0) {
                    Yii::$app->session->setFlash('subject-allocation','Employee "'.$model->employee->employee_firstname.'"  is already allocated!');
                }else{
                    if ($model->save()) {
                        return $this->redirect(['create']);
                    }
                }

                
            }else{
                print_r($model->errors);
            }
            // return $this->redirect(['view', 'id' => $model->assign_subject_id]);
        }

        return $this->render('create', [
            'model' => $model,'dataProvider' => $dataProvider,'department' => $department,'course' => $course,
            'searchModel' => $searchModel,'batch'=> [],'employee'=>[],'subject' =>[]
        ]);
    }

    /**
     * Updates an existing SubjectAllocation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $searchModel = new SubjectAllocationSearch();
        $dataProvider = $searchModel->searchData(Yii::$app->request->queryParams);

        $departmentModel = Department::find()->where(['status' => 1])->all();
        $department = ArrayHelper::map($departmentModel, 'department_id', 'department_name');

        $courseModel = Course::find()->where(['status' => 1])->all();
        $course = ArrayHelper::map($courseModel, 'courseid', 'course_name');

        $batchModel = Batch::find()->where(['courseid' => $model->course_id])->all();
        $batch = ArrayHelper::map($batchModel, 'batchid', 'batch_name');

        $employeeModel = Employee::find()->where(['department_id' =>  $model->department_id])->all();
        $employee = ArrayHelper::map($employeeModel, 'employee_id', 'employee_firstname');

        $subjectModel = AssignSubject::find()->where(['batch_id' => $model->batch_id])->andWhere(['course_id' => $model->course_id])->joinWith('subject')->all();
        $subject = ArrayHelper::map($subjectModel, 'subject_id', function ($subject) {
            return $subject->subject->subject_name;
        });


        if ($model->load(Yii::$app->request->post())) {   
            

            
            $academic = Academic::find()->where(['status' => 1])->one();

            $model->academic_id  = $academic->academicid;
            $model->institution_id = Yii::$app->user->identity->institutionid;

            $is_exist = SubjectAllocation::find()
            ->where(['course_id' => $_POST['SubjectAllocation']['course_id']])
            ->andWhere(['batch_id' => $_POST['SubjectAllocation']['batch_id']])
            ->andWhere(['subject_id' => $_POST['SubjectAllocation']['subject_id']])
            ->andWhere(['institution_id' => Yii::$app->user->identity->institutionid])
            ->andWhere(['employee_id' => $_POST['SubjectAllocation']['employee_id']])
            ->andWhere(['department_id' => $_POST['SubjectAllocation']['department_id']])
            ->andWhere(['academic_id' => $academic->academicid])
            ->count();
            
            if ($model->validate()) {

                if ($is_exist > 0) {
                    Yii::$app->session->setFlash('subject-allocation','Employee "'.$model->employee->employee_firstname.'"  is already allocated!');
                }else{
                    if ($model->save()) {
                        return $this->redirect(['create']);
                    }
                }

                
            }else{
                print_r($model->errors);
            }
            // return $this->redirect(['view', 'id' => $model->assign_subject_id]);
        }


        return $this->render('update', [
            'model' => $model,'dataProvider' => $dataProvider,'department' => $department,'course' => $course,
            'searchModel' => $searchModel,'batch'=> $batch,'employee'=>$employee,'subject' =>$subject
        ]);
    }

    /**
     * Deletes an existing SubjectAllocation model.
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
     * Finds the SubjectAllocation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SubjectAllocation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        // if (($model = SubjectAllocation::findOne($id)) !== null) {
        if (($model = SubjectAllocation::find()->where(['slug' => $id])->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionGetemployee($id)
    {

        $employee = Employee::find()->where(['department_id' => $id])->all();

        echo "<option>Please Select</option>";

        if (count($employee) > 0) {
            foreach ($employee as $row) {

                $name = $row->employee_firstname . " " . $row->employee_middlename . " " . $row->employee_lastname;
                echo "<option value='$row->employee_id'>$name</option>";
            }
        } else {
            echo "<option>No data found</option>";
        }

    }
    public function actionGetsubject($batch,$course)
    {
        $subject = AssignSubject::find()->where(['batch_id' => $batch])->andWhere(['course_id' => $course])->joinWith('subject')->all();       

        echo "<option>Select Subject</option>";

        if (count($subject) > 0) {
            foreach ($subject as $row) {
                echo "<option value='".$row->subject->subject_id."'>".$row->subject->subject_name."</option>";
            }
        } else {
            echo "<option>No data found</option>";
        }

    }
}
