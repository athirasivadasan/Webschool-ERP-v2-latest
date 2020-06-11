<?php

namespace frontend\modules\core\models;

use Yii;

/**
 * This is the model class for table "student_health_details".
 *
 * @property int $student_health_id
 * @property int $student_id
 * @property string|null $complexion
 * @property string|null $identity
 * @property string|null $clinical_history
 * @property string|null $allergic_history
 * @property float|null $weight
 * @property float|null $height
 * @property string|null $person_name
 * @property int|null $contact_no
 *
 * @property Student $student
 */
class StudentHealthDetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student_health_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id'], 'required'],
            [['student_id', 'contact_no'], 'integer'],
            [['weight', 'height'], 'number'],
            [['complexion'], 'string', 'max' => 100],
            [['identity'], 'string', 'max' => 150],
            [['clinical_history', 'allergic_history'], 'string', 'max' => 255],
            [['person_name'], 'string', 'max' => 50],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Student::className(), 'targetAttribute' => ['student_id' => 'student_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'student_health_id' => 'Student Health ID',
            'student_id' => 'Student ID',
            'complexion' => 'Complexion',
            'identity' => 'Identity',
            'clinical_history' => 'Clinical History',
            'allergic_history' => 'Allergic History',
            'weight' => 'Weight',
            'height' => 'Height',
            'person_name' => 'Person Name',
            'contact_no' => 'Contact No',
        ];
    }

    /**
     * Gets query for [[Student]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Student::className(), ['student_id' => 'student_id']);
    }
}
