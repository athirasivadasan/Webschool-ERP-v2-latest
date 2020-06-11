<?php

namespace frontend\modules\core\models;

use Yii;
use yii\behaviors\SluggableBehavior;
/**
 * This is the model class for table "guardian".
 *
 * @property int $guardian_id
 * @property string|null $guardian_name
 * @property string|null $guardian_phone
 * @property string|null $guardian_address
 * @property string|null $guardian_city
 * @property string|null $guardian_state
 * @property string|null $guardian_country
 * @property string|null $guardian_email
 * @property string|null $guardian_photo
 * @property string|null $guardian_mobile
 * @property string|null $guardian_relation
 * @property string|null $guardian_education
 * @property string|null $guardian_occupation
 * @property string|null $guardian_income
 * @property int $status
 * @property string $slug
 *
 * @property Student[] $students
 */
class Guardian extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'guardian';
    }
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => SluggableBehavior::className(),
                'attribute' => 'guardian_name',
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
            [['status'], 'integer'],
            [['guardian_name','slug','guardian_email'], 'required'],
            [['guardian_name', 'guardian_address', 'guardian_photo'], 'string', 'max' => 256],
            [['guardian_phone', 'guardian_city', 'guardian_state', 'guardian_country', 'guardian_mobile', 'guardian_education', 'guardian_income'], 'string', 'max' => 45],
            [['guardian_email', 'guardian_relation', 'guardian_occupation'], 'string', 'max' => 60],
            [['slug'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'guardian_id' => 'Guardian ID',
            'guardian_name' => 'Guardian Name',
            'guardian_phone' => 'Guardian Phone',
            'guardian_address' => 'Guardian Address',
            'guardian_city' => 'Guardian City',
            'guardian_state' => 'Guardian State',
            'guardian_country' => 'Guardian Country',
            'guardian_email' => 'Guardian Email',
            'guardian_photo' => 'Guardian Photo',
            'guardian_mobile' => 'Mobile',
            'guardian_relation' => 'Relation',
            'guardian_education' => 'Guardian Education',
            'guardian_occupation' => 'Guardian Occupation',
            'guardian_income' => 'Guardian Income',
            'status' => 'Status',
            'slug' => 'Slug',
        ];
    }

    /**
     * Gets query for [[Students]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['guardian_id' => 'guardian_id']);
    }
}
