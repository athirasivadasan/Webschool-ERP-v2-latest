<?php

namespace frontend\modules\core\models;

use Yii;

/**
 * This is the model class for table "syllabus".
 *
 * @property int $syllabus_id
 * @property string $syllabus_name
 * @property int $course_id
 * @property int $institution_id
 *
 * @property Course $course
 * @property Institution $institution
 */
class Syllabus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'syllabus';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['syllabus_name'], 'required'],
            [['course_id', 'institution_id'], 'integer'],
            [['syllabus_name'], 'string', 'max' => 60],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['course_id' => 'courseid']],
            [['institution_id'], 'exist', 'skipOnError' => true, 'targetClass' => Institution::className(), 'targetAttribute' => ['institution_id' => 'institution_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'syllabus_id' => 'Syllabus ID',
            'syllabus_name' => 'Syllabus Name',
            'course_id' => 'Course ID',
            'institution_id' => 'Institution ID',
        ];
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
}
