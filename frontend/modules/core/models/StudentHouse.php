<?php

namespace frontend\modules\core\models;

use Yii;
use yii\behaviors\SluggableBehavior;
/**
 * This is the model class for table "student_house".
 *
 * @property int $student_house_id
 * @property string|null $student_house_name
 * @property int $status
 * @property string $slug
 */
class StudentHouse extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student_house';
    }
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => SluggableBehavior::className(),
                'attribute' => 'student_house_name',
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
            [['status'], 'integer'],
            [['slug'], 'required'],
            [['student_house_name'], 'string', 'max' => 56],
            [['slug'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'student_house_id' => 'Student House ID',
            'student_house_name' => 'Student House Name',
            'status' => 'Status',
            'slug' => 'Slug',
        ];
    }
}
