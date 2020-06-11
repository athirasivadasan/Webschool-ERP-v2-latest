<?php

namespace frontend\modules\core\models;
use common\models\User;
use yii\behaviors\SluggableBehavior;


use Yii;

/**
 * This is the model class for table "department".
 *
 * @property int $department_id
 * @property string|null $department_name
 * @property string|null $date
 * @property int $status
 * @property string $slug
 * @property string $created_at
 * @property int|null $created_by
 *
 * @property User $createdBy
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'department';
    }
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => SluggableBehavior::className(),
                'attribute' => 'department_name',
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
            [['date', 'created_at'], 'safe'],
            [['status', 'created_by'], 'integer'],
            [['slug','department_name'], 'required'],
            [['department_name', 'slug'], 'string', 'max' => 150],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'department_id' => 'Department ID',
            'department_name' => 'Department Name',
            'date' => 'Date',
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
