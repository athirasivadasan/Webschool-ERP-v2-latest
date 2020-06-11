<?php

namespace frontend\modules\core\models;

use Yii;

/**
 * This is the model class for table "attendance_type".
 *
 * @property int $id
 * @property string $type
 * @property int $status
 */
class AttendanceType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'attendance_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'status'], 'required'],
            [['status'], 'integer'],
            [['type'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'status' => 'Status',
        ];
    }
}
