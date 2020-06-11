<?php

namespace frontend\modules\core\models;

use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "student_religion".
 *
 * @property int $student_religion_id
 * @property string $student_religion_name
 * @property int $status
 * @property string $slug
 */
class StudentReligion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student_religion';
    }
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => SluggableBehavior::className(),
                'attribute' => 'student_religion_name',
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
            [['student_religion_name', 'status', 'slug'], 'required'],
            [['status'], 'integer'],
            [['student_religion_name'], 'string', 'max' => 40],
            [['slug'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'student_religion_id' => 'Student Religion ID',
            'student_religion_name' => 'Student Religion Name',
            'status' => 'Status',
            'slug' => 'Slug',
        ];
    }
}
