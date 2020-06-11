<?php

namespace frontend\modules\bank\models;

use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "bank_details".
 *
 * @property int $bank_id
 * @property string|null $bank_name
 * @property int $status
 * @property string $slug
 *
 * @property EmployeeBankDetails[] $employeeBankDetails
 */
class BankDetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bank_details';
    }
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => SluggableBehavior::className(),
                'attribute' => 'bank_name',
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
            [['bank_name'], 'string', 'max' => 60],
            [['slug'], 'string', 'max' => 80],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'bank_id' => 'Bank ID',
            'bank_name' => 'Bank Name',
            'status' => 'Status',
            'slug' => 'Slug',
        ];
    }

    /**
     * Gets query for [[EmployeeBankDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeeBankDetails()
    {
        return $this->hasMany(EmployeeBankDetails::className(), ['bank_id' => 'bank_id']);
    }
}
