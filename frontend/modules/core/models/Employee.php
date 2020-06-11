<?php

namespace frontend\modules\core\models;

use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "employee".
 *
 * @property int $employee_id
 * @property string|null $employee_code
 * @property string|null $employee_firstname
 * @property string|null $employee_middlename
 * @property string|null $employee_lastname
 * @property string|null $employee_dob
 * @property string|null $employee_qualification
 * @property string|null $employee_experience
 * @property int|null $employee_gender
 * @property int|null $department_id
 * @property int|null $employee_designation
 * @property int|null $institution_id
 * @property int|null $employee_type_id
 * @property string|null $idcard_issue_date
 * @property string|null $employee_joiningdate
 * @property int|null $status 1=>existing,2=>resigned
 * @property string|null $withdrawdate
 * @property string|null $cardno
 * @property string $slug
 * @property string $created_at
 * @property string $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property Institution $institution
 * @property Department $department
 * @property Designation $employeeDesignation
 * @property Gender $employeeGender
 * @property UserType $employeeType
 * @property EmployeeDetails[] $employeeDetails
 */
class Employee extends \yii\db\ActiveRecord
{

    public $is_copy;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee';
    }
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => SluggableBehavior::className(),
                'attribute' => 'employee_firstname',
                'ensureUnique' => true,
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['employee_dob', 'idcard_issue_date', 'employee_joiningdate', 'withdrawdate', 'created_at', 'updated_at'], 'safe'],
            [['employee_gender', 'department_id', 'employee_designation', 'institution_id', 'employee_type_id', 'status', 'created_by', 'updated_by'], 'integer'],
            [['slug','department_id','employee_designation','employee_firstname'], 'required'],
            [['employee_code'], 'string', 'max' => 45],
            [['employee_qualification'], 'string', 'max' => 150],
            [['employee_experience'], 'string', 'max' => 200],
            [['employee_firstname', 'employee_middlename', 'employee_lastname', 'slug'], 'string', 'max' => 256],
            [['cardno'], 'string', 'max' => 60],
            [['institution_id'], 'exist', 'skipOnError' => true, 'targetClass' => Institution::className(), 'targetAttribute' => ['institution_id' => 'institution_id']],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['department_id' => 'department_id']],
            [['employee_designation'], 'exist', 'skipOnError' => true, 'targetClass' => Designation::className(), 'targetAttribute' => ['employee_designation' => 'designation_id']],
            [['employee_gender'], 'exist', 'skipOnError' => true, 'targetClass' => Gender::className(), 'targetAttribute' => ['employee_gender' => 'id']],
            [['employee_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserType::className(), 'targetAttribute' => ['employee_type_id' => 'usertypeid']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'employee_id' => 'Employee ID',
            'employee_code' => 'Employee Code',
            'employee_firstname' => 'First Name',
            'employee_middlename' => 'Middle Name',
            'employee_lastname' => 'Last Name',
            'employee_dob' => ' Date of Birth ',
            'employee_qualification' => 'Qualification',
            'employee_experience' => 'Experience',
            'employee_gender' => 'Gender',
            'department_id' => 'Department',
            'employee_designation' => 'Designation',
            'institution_id' => 'Institution',
            'employee_type_id' => 'User Type',
            'idcard_issue_date' => 'Id Card Issue Date',
            'employee_joiningdate' => 'Joining Date',
            'status' => 'Status',
            'withdrawdate' => 'Withdrawdate',
            'cardno' => 'Cardno',
            'slug' => 'Slug',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[Institution]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInstitution()
    {
        return $this->hasOne(Institution::className(), ['institution_id' => 'institution_id']);
    }

    /**
     * Gets query for [[Department]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['department_id' => 'department_id']);
    }

    /**
     * Gets query for [[EmployeeDesignation]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeeDesignation()
    {
        return $this->hasOne(Designation::className(), ['designation_id' => 'employee_designation']);
    }

    /**
     * Gets query for [[EmployeeGender]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeeGender()
    {
        return $this->hasOne(Gender::className(), ['id' => 'employee_gender']);
    }

    /**
     * Gets query for [[EmployeeType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeeType()
    {
        return $this->hasOne(UserType::className(), ['usertypeid' => 'employee_type_id']);
    }

    /**
     * Gets query for [[EmployeeDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeeDetails()
    {
        return $this->hasMany(EmployeeDetails::className(), ['employee_id' => 'employee_id']);
    }
}
