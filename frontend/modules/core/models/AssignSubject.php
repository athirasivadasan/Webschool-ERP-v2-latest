<?php

namespace frontend\modules\core\models;

use Yii;

/**
 * This is the model class for table "assign_subject".
 *
 * @property int $assign_subject_id
 * @property int|null $subject_id
 * @property int|null $course_id
 * @property int|null $batch_id
 * @property int|null $institution_id
 * @property int|null $ccesubjectgroup
 *
 * @property Batch $batch
 * @property Course $course
 * @property Institution $institution
 * @property Subject $subject
 */
class AssignSubject extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'assign_subject';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['subject_id', 'course_id', 'batch_id', 'institution_id', 'ccesubjectgroup'], 'integer'],
            [['subject_id', 'course_id', 'batch_id'], 'required'],
            [['batch_id'], 'exist', 'skipOnError' => true, 'targetClass' => Batch::className(), 'targetAttribute' => ['batch_id' => 'batchid']],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['course_id' => 'courseid']],
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
            'assign_subject_id' => 'Assign Subject ID',
            'subject_id' => 'Subject',
            'course_id' => 'Course',
            'batch_id' => 'Batch',
            'institution_id' => 'Institution ID',
            'ccesubjectgroup' => 'Ccesubjectgroup',
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
     * Gets query for [[Subject]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(Subject::className(), ['subject_id' => 'subject_id']);
    }
}
