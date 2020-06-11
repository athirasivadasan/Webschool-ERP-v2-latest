<?php

namespace frontend\modules\core\models;

use Yii;

/**
 * This is the model class for table "gender".
 *
 * @property int $id
 * @property string $gender
 * @property int|null $status
 */
class Gender extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gender';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gender'], 'required'],
            [['status'], 'integer'],
            [['gender'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'gender' => 'Gender',
            'status' => 'Status',
        ];
    }
}
