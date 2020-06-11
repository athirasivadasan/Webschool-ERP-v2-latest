<?php

namespace frontend\modules\core\models;

use Yii;

/**
 * This is the model class for table "blood_group".
 *
 * @property int $id
 * @property string $blood_group
 * @property int $status
 */
class BloodGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blood_group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['blood_group'], 'required'],
            [['status'], 'integer'],
            [['blood_group'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'blood_group' => 'Blood Group',
            'status' => 'Status',
        ];
    }
}
