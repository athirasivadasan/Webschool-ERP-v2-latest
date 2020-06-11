<?php

namespace frontend\modules\core\models;

use yii\behaviors\SluggableBehavior;

use Yii;

/**
 * This is the model class for table "course".
 *
 * @property int $courseid
 * @property string|null $course_name
 * @property string|null $course_description
 * @property string|null $course_code
 * @property string|null $minimumattendance
 * @property int $attendancetype 0=>daily,1=>subjectwise
 * @property string $totalworkingdays
 * @property string $slug
 * @property int|null $status 
 *
 * @property Batch[] $batches
 * @property Student[] $students
 * @property Syllabus[] $syllabi
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'course';
    }
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => SluggableBehavior::className(),
                'attribute' => 'course_name',
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
            [['attendancetype', 'status'], 'integer'],
            [['course_name','totalworkingdays', 'slug','minimumattendance'], 'required'],
            [['course_name'], 'unique'],
            [['course_name', 'slug'], 'string', 'max' => 60],
            [['course_description'], 'string', 'max' => 256],
            [['course_code', 'minimumattendance', 'totalworkingdays'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'courseid' => 'Courseid',
            'course_name' => 'Course Name',
            'course_description' => 'Course Description',
            'course_code' => 'Course Code',
            'minimumattendance' => 'Minimum Attendance',
            'attendancetype' => 'Attendance Type',
            'totalworkingdays' => 'Total Working Days',
            'slug' => 'Slug',
            'status' => 'Status'
        ];
    }

    /**
     * Gets query for [[Batches]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBatches()
    {
        return $this->hasMany(Batch::className(), ['courseid' => 'courseid']);
    }

    /**
     * Gets query for [[Students]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['courseid' => 'courseid']);
    }

    /**
     * Gets query for [[Syllabi]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSyllabi()
    {
        return $this->hasMany(Syllabus::className(), ['course_id' => 'courseid']);
    }
}
