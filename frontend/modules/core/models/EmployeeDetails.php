<?php

namespace frontend\modules\core\models;

use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "employee_details".
 *
 * @property int $employee_details_id
 * @property int|null $employee_id
 * @property string|null $employeedetails_address1
 * @property string|null $employeedetails_city1
 * @property string|null $employeedetails_state1
 * @property string|null $employeedetails_country1
 * @property string|null $employeedetails_pincode1
 * @property string|null $employeedetails_address2
 * @property string|null $employeedetails_city2
 * @property string|null $employeedetails_state2
 * @property string|null $employeedetails_country2
 * @property string|null $employeedetails_pincode2
 * @property string|null $employeedetails_phone
 * @property string|null $employeedetails_mobile
 * @property string|null $employeedetails_email
 * @property string|null $employeedetails_photo
 * @property string|null $employeedetails_aadhar
 * @property string|null $employeedetails_pan
 * @property string|null $employeedetails_pf
 * @property string|null $employeedetails_esi
 * @property string $slug
 *
 * @property Employee $employee
 */
class EmployeeDetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee_details';
    }
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => SluggableBehavior::className(),
                'attribute' => 'employee_id',
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
            [['employee_id'], 'integer'],
            [['slug','employeedetails_email','employeedetails_mobile'], 'required'],
            [['employeedetails_email'], 'unique'],
            [['employeedetails_address1', 'employeedetails_address2', 'employeedetails_email', 'employeedetails_photo'], 'string', 'max' => 256],
            [['employeedetails_city1', 'employeedetails_state1', 'employeedetails_country1', 'employeedetails_city2', 'employeedetails_state2', 'employeedetails_country2'], 'string', 'max' => 100],
            [['employeedetails_pincode1', 'employeedetails_pincode2', 'employeedetails_phone', 'employeedetails_mobile'], 'string', 'max' => 45],
            [['employeedetails_aadhar', 'employeedetails_pf', 'employeedetails_esi'], 'string', 'max' => 20],
            [['employeedetails_pan'], 'string', 'max' => 10],
            [['slug'], 'string', 'max' => 150],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_id' => 'employee_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'employee_details_id' => 'Employee Details ID',
            'employee_id' => 'Employee ID',
            'employeedetails_address1' => 'Permanent Address',
            'employeedetails_city1' => 'City',
            'employeedetails_state1' => 'State',
            'employeedetails_country1' => 'Country',
            'employeedetails_pincode1' => 'Pincode',
            'employeedetails_address2' => 'Present Address',
            'employeedetails_city2' => 'City',
            'employeedetails_state2' => 'State',
            'employeedetails_country2' => 'Country',
            'employeedetails_pincode2' => 'Pincode',
            'employeedetails_phone' => 'Phone',
            'employeedetails_mobile' => 'Mobile',
            'employeedetails_email' => 'Email',
            'employeedetails_photo' => 'Photo',
            'employeedetails_aadhar' => 'Aadhar Number',
            'employeedetails_pan' => 'Pan Number',
            'employeedetails_pf' => 'PF Number',
            'employeedetails_esi' => 'ESI Number',
            'slug' => 'Slug',
        ];
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
