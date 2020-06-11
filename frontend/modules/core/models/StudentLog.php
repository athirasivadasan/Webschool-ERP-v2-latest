<?php

namespace frontend\modules\core\models;

use Yii;

/**
 * This is the model class for table "student_log".
 *
 * @property int $student_log_id
 * @property int $student_id
 * @property int $course_id
 * @property int $batch_id
 * @property int $academic_id
 * @property int $institution_id
 * @property string $slug
 * @property int|null $status
 *
 * @property Batch $batch
 * @property Course $course
 * @property Institution $institution
 * @property Student $student
 */
class StudentLog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student_log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id', 'course_id', 'batch_id', 'academic_id', 'institution_id', 'slug'], 'required'],
            [['student_id', 'course_id', 'batch_id', 'academic_id', 'institution_id', 'status'], 'integer'],
            [['slug'], 'string', 'max' => 30],
            [['batch_id'], 'exist', 'skipOnError' => true, 'targetClass' => Batch::className(), 'targetAttribute' => ['batch_id' => 'batchid']],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['course_id' => 'courseid']],
            [['institution_id'], 'exist', 'skipOnError' => true, 'targetClass' => Institution::className(), 'targetAttribute' => ['institution_id' => 'institution_id']],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Student::className(), 'targetAttribute' => ['student_id' => 'student_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'student_log_id' => 'Student Log ID',
            'student_id' => 'Student ID',
            'course_id' => 'Course ID',
            'batch_id' => 'Batch ID',
            'academic_id' => 'Academic ID',
            'institution_id' => 'Institution ID',
            'slug' => 'Slug',
            'status' => 'Status',
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
     * Gets query for [[Institution]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInstitution()
    {
        return $this->hasOne(Institution::className(), ['institution_id' => 'institution_id']);
    }

    /**
     * Gets query for [[Student]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Student::className(), ['student_id' => 'student_id']);
    }
}
