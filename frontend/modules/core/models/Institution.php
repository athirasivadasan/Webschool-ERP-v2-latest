<?php

namespace frontend\modules\core\models;

use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "institution".
 *
 * @property int $institution_id
 * @property string $institution_name
 * @property string|null $institution_contactperson
 * @property string $institution_contactemail
 * @property string|null $institution_phone
 * @property string|null $institution_address
 * @property string|null $institution_fax
 * @property string|null $institution_mobile
 * @property string|null $institution_created_on
 * @property string|null $institution_updated_on
 * @property string|null $institution_language
 * @property string|null $institution_timezone
 * @property string|null $institution_logo
 * @property string|null $institution_country
 * @property string|null $institution_currency_type
 * @property string|null $institution_liscencestatus
 * @property int|null $institution_groupid
 * @property string|null $institution_code
 * @property int $isautogeneration
 * @property string|null $institution_facebookurl
 * @property string|null $institution_youtubeurl
 * @property string|null $institution_twitterurl
 * @property string|null $institution_website
 * @property string $slug
 * @property int $status
 *
 * @property Batch[] $batches
 * @property InstitutionGroup $institutionGroup
 * @property Student[] $students
 * @property Syllabus[] $syllabi
 */
class Institution extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'institution';
    }
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => SluggableBehavior::className(),
                'attribute' => 'institution_name',
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
            [['institution_name', 'institution_contactemail', 'institution_phone', 'slug'], 'required'],
            [['institution_created_on', 'institution_updated_on'], 'safe'],
            [['institution_groupid', 'isautogeneration', 'status'], 'integer'],
            [['institution_name', 'institution_contactperson', 'institution_contactemail', 'institution_phone', 'institution_address', 'institution_fax', 'institution_mobile', 'institution_timezone'], 'string', 'max' => 256],
            [['institution_language', 'institution_country', 'institution_currency_type', 'institution_liscencestatus', 'institution_code'], 'string', 'max' => 45],
            [['institution_facebookurl', 'institution_youtubeurl', 'institution_twitterurl', 'slug', 'institution_logo'], 'string', 'max' => 250],
            [['institution_website'], 'string', 'max' => 500],
            [['institution_groupid'], 'exist', 'skipOnError' => true, 'targetClass' => InstitutionGroup::className(), 'targetAttribute' => ['institution_groupid' => 'institutiongroup_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'institution_id' => 'Institution ID',
            'institution_name' => 'Institution Name',
            'institution_contactperson' => 'Institution Contactperson',
            'institution_contactemail' => 'Institution Contactemail',
            'institution_phone' => 'Institution Phone',
            'institution_address' => 'Institution Address',
            'institution_fax' => 'Institution Fax',
            'institution_mobile' => 'Institution Mobile',
            'institution_created_on' => 'Institution Created On',
            'institution_updated_on' => 'Institution Updated On',
            'institution_language' => 'Institution Language',
            'institution_timezone' => 'Institution Timezone',
            'institution_logo' => 'Institution Logo',
            'institution_country' => 'Institution Country',
            'institution_currency_type' => 'Institution Currency Type',
            'institution_liscencestatus' => 'Institution Liscencestatus',
            'institution_groupid' => 'Institution Groupid',
            'institution_code' => 'Institution Code',
            'isautogeneration' => 'Isautogeneration',
            'institution_facebookurl' => 'Institution Facebookurl',
            'institution_youtubeurl' => 'Institution Youtubeurl',
            'institution_twitterurl' => 'Institution Twitterurl',
            'institution_website' => 'Institution Website',
            'slug' => 'Slug',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Batches]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBatches()
    {
        return $this->hasMany(Batch::className(), ['institutionid' => 'institution_id']);
    }

    /**
     * Gets query for [[InstitutionGroup]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInstitutionGroup()
    {
        return $this->hasOne(InstitutionGroup::className(), ['institutiongroup_id' => 'institution_groupid']);
    }

    /**
     * Gets query for [[Students]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['institution_id' => 'institution_id']);
    }

    /**
     * Gets query for [[Syllabi]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSyllabi()
    {
        return $this->hasMany(Syllabus::className(), ['institution_id' => 'institution_id']);
    }
}
