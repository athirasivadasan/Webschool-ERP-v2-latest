<?php

namespace frontend\modules\core\models;

use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "previous_qualification".
 *
 * @property int $previousqualification_id
 * @property string|null $qualification
 * @property string|null $previousqualification_schoolname
 * @property string|null $previousqualification_address
 * @property int $score
 * @property int $online_enquiryid
 * @property int $status
 * @property string $slug
 *
 * @property Student[] $students
 */
class PreviousQualification extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'previous_qualification';
    }
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => SluggableBehavior::className(),
                'attribute' => 'qualification',
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
            [['qualification', 'slug'], 'required'],
            [['score', 'online_enquiryid', 'status'], 'integer'],
            [['qualification'], 'string', 'max' => 60],
            [['previousqualification_schoolname', 'previousqualification_address'], 'string', 'max' => 256],
            [['slug'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'previousqualification_id' => 'Previousqualification ID',
            'qualification' => 'Qualification',
            'previousqualification_schoolname' => 'School Name',
            'previousqualification_address' => 'School Address',
            'score' => 'Score',
            'online_enquiryid' => 'Online Enquiryid',
            'status' => 'Status',
            'slug' => 'Slug',
        ];
    }

    /**
     * Gets query for [[Students]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['student_previous_qualification_id' => 'previousqualification_id']);
    }
}
