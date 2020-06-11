<?php

namespace frontend\modules\bank\models;

use Yii;
use frontend\modules\core\models\Employee;
use yii\behaviors\SluggableBehavior;
/**
 * This is the model class for table "employee_bank_details".
 *
 * @property int $bank_details_id
 * @property int|null $bank_id
 * @property int|null $employee_id
 * @property string $bankdetails_address
 * @property string|null $bankdetails_phone
 * @property string|null $bankdetails_branch
 * @property string|null $bankdetails_ifsccode
 * @property string|null $bankdetails_accountno
 * @property string|null $bankdetails_dd_payable_address
 * @property string $slug
 * @property string $created_at
 * @property int $created_by
 * @property string $updated_at
 * @property int $updated_by
 *
 * @property BankDetails $bank
 * @property Employee $employee
 */
class EmployeeBankDetails extends \yii\db\ActiveRecord
{

    public $designation;
    public $department;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee_bank_details';
    }
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => SluggableBehavior::className(),
                'attribute' => 'bankdetails_branch',
                'ensureUnique' => true,            
            ]
            ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bank_id', 'employee_id', 'created_by', 'updated_by'], 'integer'],
            [['bank_id','employee_id','bankdetails_accountno','bankdetails_phone','bankdetails_branch','bankdetails_ifsccode','bankdetails_address', 'slug', 'created_by', 'updated_by'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['bankdetails_address', 'bankdetails_dd_payable_address', 'slug'], 'string', 'max' => 256],
            [['bankdetails_phone'], 'string', 'max' => 15],
            [['bankdetails_branch', 'bankdetails_ifsccode', 'bankdetails_accountno'], 'string', 'max' => 60],
            [['bank_id'], 'exist', 'skipOnError' => true, 'targetClass' => BankDetails::className(), 'targetAttribute' => ['bank_id' => 'bank_id']],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_id' => 'employee_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'bank_details_id' => 'Bank Details ID',
            'bank_id' => 'Bank Name',
            'employee_id' => 'Employee Name',
            'bankdetails_address' => 'Bank Address',
            'bankdetails_phone' => 'Phone',
            'bankdetails_branch' => 'Branch',
            'bankdetails_ifsccode' => 'IFSC code',
            'bankdetails_accountno' => 'Account Number',
            'bankdetails_dd_payable_address' => 'DD Payable Address',
            'slug' => 'Slug',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'designation' => 'Designation',
        ];
    }

    /**
     * Gets query for [[Bank]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBank()
    {
        return $this->hasOne(BankDetails::className(), ['bank_id' => 'bank_id']);
    }

    /**
     * Gets query for [[Employee]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employee::className(), ['employee_id' => 'employee_id']);
    }
}
