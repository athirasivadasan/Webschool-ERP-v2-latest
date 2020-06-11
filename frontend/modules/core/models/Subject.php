<?php

namespace frontend\modules\core\models;

use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "subject".
 *
 * @property int $subject_id
 * @property string|null $subject_name
 * @property string $subject_code
 * @property string|null $subject_description
 * @property int $status
 * @property string $slug
 *
 * @property AssignSubject[] $assignSubjects
 */
class Subject extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subject';
    }
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => SluggableBehavior::className(),
                'attribute' => 'subject_name',
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
            [['subject_code', 'slug'], 'required'],
            [['status'], 'integer'],
            [['subject_name', 'slug'], 'string', 'max' => 60],
            [['subject_code'], 'string', 'max' => 45],
            [['subject_description'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'subject_id' => 'Subject ID',
            'subject_name' => 'Subject Name',
            'subject_code' => 'Subject Code',
            'subject_description' => 'Subject Description',
            'status' => 'Status',
            'slug' => 'Slug',
        ];
    }

    /**
     * Gets query for [[AssignSubjects]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAssignSubjects()
    {
        return $this->hasMany(AssignSubject::className(), ['subjectid' => 'subject_id']);
    }
}
