<?php

namespace frontend\modules\core\models;

use Yii;
use yii\behaviors\SluggableBehavior;
/**
 * This is the model class for table "subject_allocation".
 *
 * @property int $subjectallocation_id
 * @property int $course_id
 * @property int $batch_id
 * @property int $subject_id
 * @property int $institution_id
 * @property int $employee_id
 * @property int $department_id
 * @property int|null $academic_id
 * @property string $slug
 *
 * @property Batch $batch
 * @property Course $course
 * @property Department $department
 * @property Employee $employee
 * @property Institution $institution
 * @property Subject $subject
 */
class SubjectAllocation extends \yii\db\ActiveRecord
{
    public $search;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subject_allocation';
    }
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => SluggableBehavior::className(),
                'attribute' => 'course_id',
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
            [['course_id', 'batch_id', 'subject_id', 'institution_id', 'employee_id', 'department_id', 'slug'], 'required'],
            [['course_id', 'batch_id', 'subject_id', 'institution_id', 'employee_id', 'department_id', 'academic_id'], 'integer'],
            [['slug'], 'string', 'max' => 60],
            [['batch_id'], 'exist', 'skipOnError' => true, 'targetClass' => Batch::className(), 'targetAttribute' => ['batch_id' => 'batchid']],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['course_id' => 'courseid']],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['department_id' => 'department_id']],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_id' => 'employee_id']],
            [['institution_id'], 'exist', 'skipOnError' => true, 'targetClass' => Institution::className(), 'targetAttribute' => ['institution_id' => 'institution_id']],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subject::className(), 'targetAttribute' => ['subject_id' => 'subject_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'subjectallocation_id' => 'Subjectallocation ID',
            'course_id' => 'Course',
            'batch_id' => 'Batch',
            'subject_id' => 'Subject',
            'institution_id' => 'Institution',
            'employee_id' => 'Employee',
            'department_id' => 'Department',
            'academic_id' => 'Academic',
            'slug' => 'Slug',
        ];
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
     * Gets query for [[Department]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['department_id' => 'department_id']);
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
     * Gets query for [[Subject]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(Subject::className(), ['subject_id' => 'subject_id']);
    }
}