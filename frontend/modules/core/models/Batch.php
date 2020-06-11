<?php

namespace frontend\modules\core\models;

use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "batch".
 *
 * @property int $batchid
 * @property int|null $institutionid
 * @property int|null $courseid
 * @property string|null $batch_name
 * @property string|null $batch_startdate
 * @property string|null $batch_enddate
 * @property string $max_no_of_students
 * @property string $venue
 * @property string $slug
 *
 * @property Institution $institution
 * @property Course $course
 * @property Student[] $students
 */
class Batch extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'batch';
    }
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => SluggableBehavior::className(),
                'attribute' => 'batch_name',
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
            [['institutionid', 'courseid'], 'integer'],
            [['batch_startdate', 'batch_enddate'], 'safe'],
            [['batch_name', 'courseid', 'max_no_of_students', 'slug'], 'required'],
            [['batch_name', 'max_no_of_students'], 'string', 'max' => 45],
            [['venue', 'slug'], 'string', 'max' => 60],
            [['institutionid'], 'exist', 'skipOnError' => true, 'targetClass' => Institution::className(), 'targetAttribute' => ['institutionid' => 'institution_id']],
            [['courseid'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['courseid' => 'courseid']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'batchid' => 'Batchid',
            'institutionid' => 'Institutionid',
            'courseid' => 'Course',
            'batch_name' => 'Batch Name',
            'batch_startdate' => 'Start Date',
            'batch_enddate' => 'End Date',
            'max_no_of_students' => 'Maximum Number Of Students',
            'venue' => 'Venue',
            'slug' => 'Slug',
        ];
    }

    /**
     * Gets query for [[Institution]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInstitution()
    {
        return $this->hasOne(Institution::className(), ['institution_id' => 'institutionid']);
    }

    /**
     * Gets query for [[Course]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['courseid' => 'courseid']);
    }

    /**
     * Gets query for [[Students]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['batchid' => 'batchid']);
    }
}
