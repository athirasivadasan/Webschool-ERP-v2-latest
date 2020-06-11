<?php

namespace frontend\modules\core\models;

use Yii;

/**
 * This is the model class for table "academic_month".
 *
 * @property int $id
 * @property string $academic_month
 * @property int $status
 */
class AcademicMonth extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'academic_month';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['academic_month', 'status'], 'required'],
            [['status'], 'integer'],
            [['academic_month'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'academic_month' => 'Academic Month',
            'status' => 'Status',
        ];
    }
}
