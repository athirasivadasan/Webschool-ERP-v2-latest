<?php

namespace frontend\modules\core\controllers;

use common\models\User;
use frontend\modules\core\controllers\MenuController;
use frontend\modules\core\models\Department;
use frontend\modules\core\models\Designation;
use frontend\modules\core\models\Employee;
use frontend\modules\core\models\EmployeeDetails;
use frontend\modules\core\models\EmployeeSearch;
use frontend\modules\core\models\Gender;
use frontend\modules\core\models\UserType;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * EmployeeController implements the CRUD actions for Employee model.
 */
class EmployeeController extends Controller
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

                            $result = MenuController::getpermission(Yii::$app->user->identity->usertypeid, "employee-registration");
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
     * Lists all Employee models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmployeeSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider = $searchModel->searchData(Yii::$app->request->post());

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Employee model.
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
     * Creates a new Employee model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Employee();
        $employee_detail = new EmployeeDetails();

        $error_msg = array();

        $genderModel = Gender::find()->where(['status' => 1])->all();
        $gender = ArrayHelper::map($genderModel, 'id', 'gender');

        $departmentModel = Department::find()->where(['status' => 1])->all();
        $department = ArrayHelper::map($departmentModel, 'department_id', 'department_name');

        $designationModel = Designation::find()->where(['status' => 1])->all();
        $designation = ArrayHelper::map($designationModel, 'designation_id', 'designation_name');

        $usertypeModel = UserType::find()->where(['status' => 1])->all();
        $usertype = ArrayHelper::map($usertypeModel, 'usertypeid', 'usertype_name');

        $is_existEmp = Employee::find()->select(['employee_id']);
        if ($is_existEmp->count() > 0) {
            $maxId = $is_existEmp->max('employee_id');
            $model->employee_code = 'e_' . ($maxId + 1);
        } else {
            $model->employee_code = 'e_' . ($is_existEmp->count() + 1);
        }

        if ($model->load(Yii::$app->request->post()) && $employee_detail->load(Yii::$app->request->post())) {

            $model->created_at = date('Y-m-d H:i:s');
            $model->updated_at = date('Y-m-d H:i:s');

            $model->created_by = Yii::$app->user->identity->id;
            $model->updated_by = Yii::$app->user->identity->id;

            $model->employee_dob = isset($_POST['Employee']['employee_dob']) ? date('Y-m-d', strtotime($_POST['Employee']['employee_dob'])) : null;
            $model->employee_joiningdate = isset($_POST['Employee']['employee_joiningdate']) ? date('Y-m-d', strtotime($_POST['Employee']['employee_joiningdate'])) : null;
            
            
            $user_email = $_POST['EmployeeDetails']['employeedetails_email'];
            $is_user = User::find()->select(['email'])->where(['email' => $_POST['EmployeeDetails']['employeedetails_email']])->count();
            if ($is_user <= 0) {
               
               
                if ($model->validate() || $employee_detail->validate()) {

                    $is_existEmp = Employee::find()->select(['employee_id'])->where(['employee_code' => $_POST['Employee']['employee_code']]);
                    if ($is_existEmp->count() > 0) {
                        $maxId = $is_existEmp->max('employee_id');
                        $model->employee_code = 'e_' . ($maxId + 1);
                    }

                    /*  ************* employeedetails_photo *************/
                    $employee_firstname = $_POST['Employee']['employee_firstname'];
                    $uploadedFile = UploadedFile::getInstance($employee_detail, 'employeedetails_photo');
                    $emp_code = $model->employee_code;

                    if (isset($uploadedFile)) {
                        $time = time();

                        $logo = "{$employee_firstname}_{$emp_code}_{$time}_{$uploadedFile}";
                        $employee_detail->employeedetails_photo = $logo;
                    }

                    /*  ************* employeedetails_photo *************/

                    $model->institution_id = Yii::$app->user->identity->institutionid;
                    $model->status = 1;

                    if ($model->save()) {

                        $employee_id = $model->employee_id;
                        $employee_detail->employee_id = $employee_id;

                        if ($employee_detail->save()) {
                            if (!empty($uploadedFile)) {
                                if (!is_dir(\Yii::getAlias('@webroot') . '/uploads/employee/' . $model->employee_firstname . '-' . $model->employee_code)) {

                                    mkdir(\Yii::getAlias('@webroot') . '/uploads/employee/' . $model->employee_firstname . '-' . $model->employee_code);

                                }
                                $uploadedFile->saveAs(\Yii::getAlias('@webroot') . '/uploads/employee/' . $model->employee_firstname . '-' . $model->employee_code . '/' . $logo);

                            }
                        }

                        /*  ************* user creation *************/
                        $user = new User();
                        $user->username = $model->employee_code;
                        $user->email = $employee_detail->employeedetails_email;
                        $user->setPassword($model->employee_dob);
                        $user->generateAuthKey();
                        $user->generateEmailVerificationToken();
                        $user->created_at = date('Y-m-d H:i:s');
                        $user->updated_at = date('Y-m-d H:i:s');
                        $user->userid = $model->employee_id;
                        $user->usertypeid = $model->employee_type_id;
                        $user->institutionid = Yii::$app->user->identity->institutionid;
                        if ($user->validate()) {
                            if ($user->save()) {
                                return $this->redirect(['index']);
                            }
                        } else {
                            array_push($error_msg, $user->errors);
                            if (!empty($error_msg)) {
                                Yii::$app->session->setFlash('add-emp-error', 'Validation Error');
                            }
                        }
                        /*  ************* user creation *************/

                    } else {
                        array_push($error_msg, $model->errors);
                        array_push($error_msg, $employee_detail->errors);

                        if (!empty($error_msg)) {
                            Yii::$app->session->setFlash('add-emp-error', 'Validation Error');
                        }

                    }
                    print_r($error_msg);

                }
            } else {
                Yii::$app->session->setFlash('add-emp-error', 'Email  ' . $user_email . ' has already been taken');
            }

        }

        return $this->render('create', [
            'model' => $model, 'employee_detail' => $employee_detail, 'gender' => $gender, 'department' => $department, 'designation' => $designation,
            'usertype' => $usertype,
        ]);
    }

    /**
     * Updates an existing Employee model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $employee_detail = EmployeeDetails::find()->where(['employee_id' => $model->employee_id])->one();

        $error_msg = array();

        $genderModel = Gender::find()->where(['status' => 1])->all();
        $gender = ArrayHelper::map($genderModel, 'id', 'gender');

        $departmentModel = Department::find()->where(['status' => 1])->all();
        $department = ArrayHelper::map($departmentModel, 'department_id', 'department_name');

        $designationModel = Designation::find()->where(['status' => 1])->all();
        $designation = ArrayHelper::map($designationModel, 'designation_id', 'designation_name');

        $usertypeModel = UserType::find()->where(['status' => 1])->all();
        $usertype = ArrayHelper::map($usertypeModel, 'usertypeid', 'usertype_name');

        if (isset($employee_detail->employeedetails_photo)) {
            $pre_photo = $employee_detail->employeedetails_photo;
        }

        if ($model->load(Yii::$app->request->post()) && $employee_detail->load(Yii::$app->request->post())) {

            $model->updated_at = date('Y-m-d H:i:s');
            $model->updated_by = Yii::$app->user->identity->id;

            $model->employee_dob = isset($_POST['Employee']['employee_dob']) ? date('Y-m-d', strtotime($_POST['Employee']['employee_dob'])) : null;
            $model->employee_joiningdate = isset($_POST['Employee']['employee_joiningdate']) ? date('Y-m-d', strtotime($_POST['Employee']['employee_joiningdate'])) : null;

            if ($model->validate() || $employee_detail->validate()) {

                /*  ************* employeedetails_photo *************/
                $employee_firstname = $_POST['Employee']['employee_firstname'];
                $uploadedFile = UploadedFile::getInstance($employee_detail, 'employeedetails_photo');
                $emp_code = $model->employee_code;

                if (isset($uploadedFile)) {
                    $time = time();

                    $logo = "{$employee_firstname}_{$emp_code}_{$time}_{$uploadedFile}";
                    $employee_detail->employeedetails_photo = $logo;
                } else {
                    unset($employee_detail->employeedetails_photo);
                }

                /*  ************* employeedetails_photo *************/

                $model->institution_id = Yii::$app->user->identity->institutionid;
                $model->status = 1;

                if ($model->save()) {

                    $employee_id = $model->employee_id;
                    $employee_detail->employee_id = $employee_id;

                    if ($employee_detail->save()) {
                        if (!empty($uploadedFile)) {
                            if (!is_dir(\Yii::getAlias('@webroot') . '/uploads/employee/' . $model->employee_firstname . '-' . $model->employee_code)) {

                                mkdir(\Yii::getAlias('@webroot') . '/uploads/employee/' . $model->employee_firstname . '-' . $model->employee_code);

                            }
                            $uploadedFile->saveAs(\Yii::getAlias('@webroot') . '/uploads/employee/' . $model->employee_firstname . '-' . $model->employee_code . '/' . $logo);

                            if (!empty($pre_photo)) {
                                unlink(\Yii::getAlias('@webroot') . '/uploads/employee/' . $model->employee_firstname . '-' . $model->employee_code . '/' . $pre_photo);
                            }
                        }
                        Yii::$app->session->setFlash('success', 'Updated Successfully');
                        return $this->redirect(['update', 'id' => $model->slug]);
                    }

                } else {
                    array_push($error_msg, $model->errors);
                    array_push($error_msg, $employee_detail->errors);

                    if (!empty($error_msg)) {
                        Yii::$app->session->setFlash('add-emp-error', 'Validation Error');
                    }

                }

            }

        }

        return $this->render('update', [
            'model' => $model, 'employee_detail' => $employee_detail, 'gender' => $gender, 'department' => $department, 'designation' => $designation,
            'usertype' => $usertype,
        ]);
    }

    /**
     * Deletes an existing Employee model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if ($model) {
            EmployeeDetails::find()->where(['employee_id' => $model->employee_id])->one()->delete();
            User::find()->where(['username' => $model->employee_code])->one()->delete();
        }
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Employee model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Employee the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        // if (($model = Employee::findOne($id)) !== null) {
        if (($model = Employee::find()->where(['slug' => $id])->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
