<?php

namespace frontend\modules\core\models;

use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "parent_details".
 *
 * @property int $parent_details_id
 * @property string $father_name
 * @property string|null $father_mobile
 * @property string|null $father_job
 * @property string|null $fa_aadhar_no
 * @property string|null $ma_aadhar_no
 * @property string $mother_name
 * @property string|null $mother_mobile
 * @property string|null $mother_job
 * @property string $slug
 *
 * @property Student $student
 */
class ParentDetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'parent_details';
    }
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => SluggableBehavior::className(),
                'attribute' => 'father_name',
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
            [['father_name', 'mother_name', 'slug'], 'required'],
            [['father_job', 'slug'], 'required' ,'on' => 'update' ],
            [['father_name', 'father_mobile', 'father_job', 'mother_name', 'mother_mobile', 'mother_job'], 'string', 'max' => 60],
            [['fa_aadhar_no', 'ma_aadhar_no'], 'string', 'max' => 30],
            [['slug'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'parent_details_id' => 'Parent Details ID',
            'father_name' => 'Father Name',
            'father_mobile' => 'Father Mobile',
            'father_job' => 'Father Job',
            'fa_aadhar_no' => 'Fa Aadhar No',
            'ma_aadhar_no' => 'Ma Aadhar No',
            'mother_name' => 'Mother Name',
            'mother_mobile' => 'Mother Mobile',
            'mother_job' => 'Mother Job',
            'slug' => 'Slug',
        ];
    }

}
