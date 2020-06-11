<?php

namespace frontend\modules\core\models;

use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "student_caste".
 *
 * @property int $studentcasteid
 * @property string $student_caste_name
 * @property int $status
 * @property string $slug
 */
class StudentCaste extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student_caste';
    }
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => SluggableBehavior::className(),
                'attribute' => 'student_caste_name',
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
            [['student_caste_name', 'slug'], 'required'],
            [['status'], 'integer'],
            [['student_caste_name'], 'string', 'max' => 40],
            [['slug'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'studentcasteid' => 'Studentcasteid',
            'student_caste_name' => 'Student Caste Name',
            'status' => 'Status',
            'slug' => 'Slug',
        ];
    }
}
