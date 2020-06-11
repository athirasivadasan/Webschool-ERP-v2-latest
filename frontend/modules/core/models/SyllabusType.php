<?php

namespace frontend\modules\core\models;

use Yii;

/**
 * This is the model class for table "syllabus_type".
 *
 * @property int $id
 * @property string $syllabus
 * @property int $status
 */
class SyllabusType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'syllabus_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['syllabus', 'status'], 'required'],
            [['status'], 'integer'],
            [['syllabus'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'syllabus' => 'Syllabus',
            'status' => 'Status',
        ];
    }
}
