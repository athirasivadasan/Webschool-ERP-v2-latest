<?php

namespace frontend\modules\core\models;

use Yii;
use yii\behaviors\SluggableBehavior;


/**
 * This is the model class for table "student_category".
 *
 * @property int $studentcategory_id
 * @property string|null $studentcategory_name
 * @property int $status
 * @property string $slug
 */
class StudentCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student_category';
    }
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => SluggableBehavior::className(),
                'attribute' => 'studentcategory_name',
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
            [['studentcategory_name'], 'required'],
            [['studentcategory_name'], 'string', 'max' => 60],
            [['slug'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'studentcategory_id' => 'Studentcategory ID',
            'studentcategory_name' => 'Student Category',
            'status' => 'Status',
            'slug' => 'Slug',
        ];
    }
}
