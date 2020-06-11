<?php

namespace frontend\modules\core\models;

use Yii;

/**
 * This is the model class for table "academic".
 *
 * @property int $academicid
 * @property string|null $academic_startyear
 * @property string|null $academic_endyear
 * @property int|null $status
 * @property string|null $academic_startmonth
 * @property string|null $academic_endmonth
 */
class Academic extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'academic';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['academic_startyear', 'academic_endyear', 'academic_startmonth', 'academic_endmonth'], 'required'],
            [['academic_startyear', 'academic_endyear'], 'string', 'max' => 45],
            [['academic_startmonth', 'academic_endmonth'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'academicid' => 'Academicid',
            'academic_startyear' => 'Academic Startyear',
            'academic_endyear' => 'Academic Endyear',
            'status' => 'Status',
            'academic_startmonth' => 'Academic Startmonth',
            'academic_endmonth' => 'Academic Endmonth',
        ];
    }
}
