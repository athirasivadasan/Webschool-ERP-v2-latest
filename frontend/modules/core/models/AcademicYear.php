<?php

namespace frontend\modules\core\models;

use Yii;

/**
 * This is the model class for table "academic_year".
 *
 * @property int $id
 * @property int $academic_year
 * @property int $status
 */
class AcademicYear extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'academic_year';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['academic_year', 'status'], 'required'],
            [['academic_year', 'status'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'academic_year' => 'Academic Year',
            'status' => 'Status',
        ];
    }
}
