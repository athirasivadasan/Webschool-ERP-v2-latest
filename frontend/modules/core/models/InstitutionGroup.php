<?php

namespace frontend\modules\core\models;

use Yii;

/**
 * This is the model class for table "institution_group".
 *
 * @property int $institutiongroup_id
 * @property string|null $institutiongroup_name
 * @property string|null $institutiongroup_address
 * @property string|null $institutiongroup_email
 * @property string|null $institutiongroup_phone
 * @property string|null $institutiongroup_contactperson
 * @property int|null $roleid
 *
 * @property Institution[] $institutions
 */
class InstitutionGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'institution_group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['roleid'], 'integer'],
            [['institutiongroup_name', 'institutiongroup_address', 'institutiongroup_email'], 'string', 'max' => 256],
            [['institutiongroup_phone', 'institutiongroup_contactperson'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'institutiongroup_id' => 'Institutiongroup ID',
            'institutiongroup_name' => 'Institutiongroup Name',
            'institutiongroup_address' => 'Institutiongroup Address',
            'institutiongroup_email' => 'Institutiongroup Email',
            'institutiongroup_phone' => 'Institutiongroup Phone',
            'institutiongroup_contactperson' => 'Institutiongroup Contactperson',
            'roleid' => 'Roleid',
        ];
    }

    /**
     * Gets query for [[Institutions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInstitutions()
    {
        return $this->hasMany(Institution::className(), ['institution_groupid' => 'institutiongroup_id']);
    }
}
