<?php

namespace frontend\modules\core\models;

use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "student".
 *
 * @property int $student_id
 * @property string|null $student_admission_no
 * @property string $student_userid
 * @property string|null $student_admission_date
 * @property string|null $student_first_name
 * @property string|null $student_middle_name
 * @property string|null $student_last_name
 * @property string|null $student_dob
 * @property int|null $course_id
 * @property int|null $batch_id
 * @property int|null $student_gender
 * @property string|null $student_blood_group
 * @property string|null $student_birthplace
 * @property string|null $student_nationality
 * @property string|null $student_mothertoung
 * @property int|null $student_category_id
 * @property string|null $student_religion
 * @property string|null $student_caste
 * @property string|null $student_address1
 * @property string|null $student_address2
 * @property string|null $student_city1
 * @property string|null $student_city2
 * @property int|null $student_previous_qualification_id
 * @property string|null $student_state1
 * @property string|null $student_state2
 * @property string|null $student_pincode1
 * @property string|null $student_pincode2
 * @property string|null $student_country1
 * @property string|null $student_country2
 * @property string|null $student_phone
 * @property string|null $student_mobile
 * @property string|null $student_email
 * @property string|null $student_photo
 * @property int|null $institution_id
 * @property int|null $guardian_id
 * @property int|null $parent_id
 * @property string|null $student_idcard_issue_date
 * @property int|null $student_rollno
 * @property string|null $student_aadhar
 * @property string|null $student_abilities
 * @property string|null $student_hobbies
 * @property int $status 2=>alumni,0=>existing ,1=>promoted,3=>withdrawal
 * @property string|null $withdraw_date
 * @property int|null $academic_id
 * @property int|null $student_house_id
 * @property string|null $document_typeid
 * @property string $slug
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property Academic $academic
 * @property Batch $batch
 * @property Course $course
 * @property Gender $studentGender
 * @property Guardian $guardian
 * @property Institution $institution
 * @property ParentDetails $parent
 * @property PreviousQualification $studentPreviousQualification
 * @property StudentDocuments[] $studentDocuments
 * @property StudentLog[] $studentLogs
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public $student_documents;
    public $is_copy;

    public static function tableName()
    {
        return 'student';
    }
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => SluggableBehavior::className(),
                'attribute' => 'student_first_name',
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
            [['academic_id', 'student_userid', 'student_admission_no', 'student_first_name', 'slug'], 'required'],
            [['student_admission_date', 'student_dob', 'student_idcard_issue_date', 'withdraw_date', 'created_at', 'updated_at'], 'safe'],
            [['course_id', 'student_gender', 'student_category_id', 'student_previous_qualification_id', 'institution_id', 'guardian_id', 'parent_id', 'student_rollno', 'status', 'academic_id', 'student_house_id', 'created_by', 'updated_by'], 'integer'],
            [['student_first_name', 'student_middle_name', 'student_last_name', 'student_blood_group', 'student_birthplace', 'student_nationality', 'student_mothertoung', 'student_religion', 'student_caste', 'student_city1', 'student_city2', 'student_state1', 'student_state2', 'student_pincode1', 'student_pincode2', 'student_country1', 'student_country2', 'student_phone', 'student_mobile', 'student_aadhar', 'document_typeid'], 'string', 'max' => 45],
            [['student_userid'], 'string', 'max' => 150],
            [['student_address1', 'student_address2', 'student_email', 'student_photo', 'student_abilities', 'student_hobbies'], 'string', 'max' => 256],
            [['slug'], 'string', 'max' => 200],
            [['student_userid', 'student_admission_no'], 'unique'],
            [['academic_id'], 'exist', 'skipOnError' => true, 'targetClass' => Academic::className(), 'targetAttribute' => ['academic_id' => 'academicid']],
            [['batch_id'], 'exist', 'skipOnError' => true, 'targetClass' => Batch::className(), 'targetAttribute' => ['batch_id' => 'batchid']],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['course_id' => 'courseid']],
            [['student_gender'], 'exist', 'skipOnError' => true, 'targetClass' => Gender::className(), 'targetAttribute' => ['student_gender' => 'id']],
            [['guardian_id'], 'exist', 'skipOnError' => true, 'targetClass' => Guardian::className(), 'targetAttribute' => ['guardian_id' => 'guardian_id']],
            [['institution_id'], 'exist', 'skipOnError' => true, 'targetClass' => Institution::className(), 'targetAttribute' => ['institution_id' => 'institution_id']],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => ParentDetails::className(), 'targetAttribute' => ['parent_id' => 'parent_details_id']],
            [['student_previous_qualification_id'], 'exist', 'skipOnError' => true, 'targetClass' => PreviousQualification::className(), 'targetAttribute' => ['student_previous_qualification_id' => 'previousqualification_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'student_id' => 'Student ID',
            'student_admission_no' => 'Adm Number',
            'student_userid' => 'Student Userid',
            'student_admission_date' => 'Adm Date',
            'student_first_name' => 'First Name',
            'student_middle_name' => 'Middle Name',
            'student_last_name' => 'Last Name',
            'student_dob' => 'Dob',
            'course_id' => 'Course',
            'batch_id' => 'Batch',
            'student_gender' => 'Gender',
            'student_blood_group' => 'Student Blood Group',
            'student_birthplace' => 'Student Birthplace',
            'student_nationality' => 'Student Nationality',
            'student_mothertoung' => 'Student Mothertoung',
            'student_category_id' => 'Student Category ID',
            'student_religion' => 'Student Religion',
            'student_caste' => 'Student Caste',
            'student_address1' => 'Present Address',
            'student_address2' => 'Permanent Address',
            'student_city1' => 'City',
            'student_city2' => 'City',
            'student_previous_qualification_id' => 'Student Previous Qualification ID',
            'student_state1' => 'State',
            'student_state2' => 'State',
            'student_pincode1' => 'Pincode',
            'student_pincode2' => 'Pincode',
            'student_country1' => 'Country',
            'student_country2' => 'Country',
            'student_phone' => 'Phone',
            'student_mobile' => 'Mobile',
            'student_email' => 'Email',
            'student_photo' => 'Photo',
            'institution_id' => 'Institution ID',
            'guardian_id' => 'Guardian ID',
            'parent_id' => 'Parent ID',
            'student_idcard_issue_date' => 'Student Idcard Issue Date',
            'student_rollno' => 'Student Rollno',
            'student_aadhar' => 'Student Aadhar',
            'student_abilities' => 'Student Abilities',
            'student_hobbies' => 'Student Hobbies',
            'status' => 'Status',
            'withdraw_date' => 'Withdraw Date',
            'academic_id' => 'Academic ID',
            'student_house_id' => 'Student House',
            'document_typeid' => 'Document Type',
            'slug' => 'Slug',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[Academic]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAcademic()
    {
        return $this->hasOne(Academic::className(), ['academicid' => 'academic_id']);
    }

    /**
     * Gets query for [[Batch]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBatch()
    {
        return $this->hasOne(Batch::className(), ['batchid' => 'batch_id']);
    }

    /**
     * Gets query for [[Course]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['courseid' => 'course_id']);
    }

    /**
     * Gets query for [[StudentGender]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudentGender()
    {
        return $this->hasOne(Gender::className(), ['id' => 'student_gender']);
    }

    /**
     * Gets query for [[Guardian]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGuardian()
    {
        return $this->hasOne(Guardian::className(), ['guardian_id' => 'guardian_id']);
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
     * Gets query for [[Parent]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(ParentDetails::className(), ['parent_details_id' => 'parent_id']);
    }

    /**
     * Gets query for [[StudentPreviousQualification]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudentPreviousQualification()
    {
        return $this->hasOne(PreviousQualification::className(), ['previousqualification_id' => 'student_previous_qualification_id']);
    }

    /**
     * Gets query for [[StudentDocuments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudentDocuments()
    {
        return $this->hasMany(StudentDocuments::className(), ['student_id' => 'student_id']);
    }

    /**
     * Gets query for [[StudentLogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudentLogs()
    {
        return $this->hasMany(StudentLog::className(), ['student_id' => 'student_id']);
    }
}
