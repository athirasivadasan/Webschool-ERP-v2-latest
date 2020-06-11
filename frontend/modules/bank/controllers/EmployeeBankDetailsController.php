<?php

namespace frontend\modules\bank\controllers;

use frontend\modules\bank\models\BankDetails;
use frontend\modules\bank\models\EmployeeBankDetails;
use frontend\modules\bank\models\EmployeeBankDetailsSearch;
use frontend\modules\core\models\Designation;
use frontend\modules\core\models\Employee;
use frontend\modules\core\models\Department;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use frontend\modules\core\controllers\MenuController;


/**
 * EmployeeBankDetailsController implements the CRUD actions for EmployeeBankDetails model.
 */
class EmployeeBankDetailsController extends Controller
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
                        'actions' => ['index', 'create', 'update', 'view', 'delete','getemployee'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {

                            $result = MenuController::getpermission(Yii::$app->user->identity->usertypeid, "employee-bank-details");
                            if ($result == 1) {
                                return true;
                            }
                            return false;
                        },
                    ],
                    [
                        'actions' => ['list','listallbankdetails','listempbankdetails','getemployee'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {

                            $result = MenuController::getpermission(Yii::$app->user->identity->usertypeid, "list-employee-bank-details");
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
     * Lists all EmployeeBankDetails models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmployeeBankDetailsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EmployeeBankDetails model.
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
     * Creates a new EmployeeBankDetails model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EmployeeBankDetails();

        $searchModel = new EmployeeBankDetailsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $userDesignation = Designation::find()->where(['status' => 1])->all();
        $designation = ArrayHelper::map($userDesignation, 'designation_id', 'designation_name');

        $bankDetails = BankDetails::find()->where(['status' => 1])->all();
        $bank = ArrayHelper::map($bankDetails, 'bank_id', 'bank_name');

        if ($model->load(Yii::$app->request->post())) {

            $model->created_at = date('Y-m-d H:i:s');
            $model->updated_at = date('Y-m-d H:i:s');

            $model->created_by = Yii::$app->user->identity->id;
            $model->updated_by = Yii::$app->user->identity->id;

            if ($model->validate()) {

                if ($model->save()) {
                    return $this->redirect(['create']);
                } 
            } 
            // return $this->redirect(['view', 'id' => $model->bank_details_id]);
        }

        return $this->render('create', [
            'model' => $model, 'dataProvider' => $dataProvider, 'bank' => $bank, 'designation' => $designation,
        ]);
    }

    /**
     * Updates an existing EmployeeBankDetails model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $searchModel = new EmployeeBankDetailsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $employeeModel = Employee::find()->where(['employee_id' => $model->employee_id])->all();
        $employee = ArrayHelper::map($employeeModel, 'employee_id', 'employee_firstname');

        $model->designation = $model->employee->employee_designation;

        $userDesignation = Designation::find()->where(['status' => 1])->all();
        $designation = ArrayHelper::map($userDesignation, 'designation_id', 'designation_name');        

        $bankDetails = BankDetails::find()->where(['status' => 1])->all();
        $bank = ArrayHelper::map($bankDetails, 'bank_id', 'bank_name');

        if ($model->load(Yii::$app->request->post())) {

            
            $model->updated_at = date('Y-m-d H:i:s');
            $model->updated_by = Yii::$app->user->identity->id;

            if ($model->validate()) {

                if ($model->save()) {
                    return $this->redirect(['create']);
                } 
            } 
        }

        return $this->render('update', [
            'model' => $model, 'dataProvider' => $dataProvider, 'bank' => $bank, 'designation' => $designation,'employee' => $employee
        ]);
    }

    /**
     * Deletes an existing EmployeeBankDetails model.
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
     * Finds the EmployeeBankDetails model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EmployeeBankDetails the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        // if (($model = EmployeeBankDetails::findOne($id)) !== null) {
        if (($model = EmployeeBankDetails::find()->where(['slug' => $id])->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionGetemployee($id)
    {

        $employee = Employee::find()->where(['employee_designation' => $id])->all();

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

    public function actionList()
    {
        
        
        $userDesignation = Designation::find()->where(['status' => 1])->all();
        $designation = ArrayHelper::map($userDesignation, 'designation_id', 'designation_name');  
        
        $userDepartment = Department::find()->where(['status' => 1])->all();
        $department = ArrayHelper::map($userDepartment, 'department_id', 'department_name'); 

        
        return $this->render('list', [
            'designation' => $designation,'department' => $department
        ]);
    }
    
    
    public function actionListempbankdetails($id)
    {

        $employee = EmployeeBankDetails::find()->where(['employee_id' => $id])->all();

       

        if (count($employee) > 0) {
            foreach ($employee as $row) {
                $name = $row->employee->employee_firstname . " " . $row->employee->employee_middlename . " " . $row->employee->employee_lastname;

                $data = '<tr><th>Employee Name</th><td>'.$name.'</td></tr>
                        <tr><th>Bank Name</th><td>'.$row->bank->bank_name.'</td></tr>
                        <tr><th>Bank Address</th><td>'.$row->bankdetails_address.'</td></tr>
                        <tr><th>Phone</th><td>'.$row->bankdetails_phone.'</td></tr>
                        <tr><th>Branch</th><td>'.$row->bankdetails_branch.'</td></tr>
                        <tr><th>IFSC code</th><td>'.$row->bankdetails_ifsccode.'</td> </tr>
                        <tr><th>Account Number</th><td>'.$row->bankdetails_accountno.'</td></tr>
                        <tr><th>DD Payable Address</th><td>65'.$row->bankdetails_dd_payable_address.'75</td></tr>';
            }
        } else {
            $data = '<tr><th>Employee Name</th><td></td></tr>
                        <tr><th>Bank Name</th><td></td></tr>
                        <tr><th>Bank Address</th><td></td></tr>
                        <tr><th>Phone</th><td></td></tr>
                        <tr><th>Branch</th><td></td></tr>
                        <tr><th>IFSC code</th><td></td> </tr>
                        <tr><th>Account Number</th><td></td></tr>
                        <tr><th>DD Payable Address</th><td></td></tr>';
        }
        return $data;

    }

    public function actionListallbankdetails($id)
    {

        $employee = EmployeeBankDetails::find()->joinWith('employee')->where(['employee.department_id' => $id])->all();

       

        if (count($employee) > 0) {
            foreach ($employee as $row) {
                $name = $row->employee->employee_firstname . " " . $row->employee->employee_middlename . " " . $row->employee->employee_lastname;

                $data = '<tr>
                <td>'.$row->employee->employee_code.' </td>
                <td>'.$name.' </td>
                <td>'.$row->bank->bank_name.'</td>
                <td>'.$row->bankdetails_branch.'</td>                
                <td>'.$row->bankdetails_accountno.'</td>
                <td>'.$row->bankdetails_ifsccode.'</td>
            </tr>';
            }
        } else {
            $data = '<tr><td>No Data Found</td></tr>';
        }
        return $data;

    }


    
}