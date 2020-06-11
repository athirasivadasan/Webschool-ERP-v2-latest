<?php

namespace frontend\modules\core\models;
use common\models\User;

use Yii;
use yii\behaviors\SluggableBehavior;


/**
 * This is the model class for table "designation".
 *
 * @property int $designation_id
 * @property string|null $designation_name
 * @property int $status
 * @property string $slug
 * @property string $created_at
 * @property int|null $created_by
 *
 * @property User $createdBy
 */
class Designation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'designation';
    }
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => SluggableBehavior::className(),
                'attribute' => 'designation_name',
                'ensureUnique' => true,
            ]
            ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'created_by'], 'integer'],
            [['slug'], 'required'],
            [['created_at'], 'safe'],
            [['designation_name', 'slug'], 'string', 'max' => 60],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'designation_id' => 'Designation ID',
            'designation_name' => 'Designation Name',
            'status' => 'Status',
            'slug' => 'Slug',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
}
