<?php

namespace frontend\modules\core\models;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property int $id
 * @property string|null $country
 * @property string|null $currency
 * @property string|null $code
 * @property string|null $symbol
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['country', 'currency', 'code', 'symbol'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'country' => 'Country',
            'currency' => 'Currency',
            'code' => 'Code',
            'symbol' => 'Symbol',
        ];
    }
}
