<?php

namespace frontend\modules\core\models;

use Yii;

/**
 * This is the model class for table "privilege".
 *
 * @property int $id
 * @property string $label
 * @property string $label_id
 * @property string|null $url
 * @property int $parent_id 0 if menu is root level or menuid if this is child on any menu 	
 * @property string|null $description
 * @property int $position
 * @property int $status
 * @property string|null $icon
 * @property int|null $institution_id
 * @property string $user_type
 */
class Privilege extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'privilege';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['label', 'label_id', 'parent_id', 'position', 'status', 'user_type'], 'required'],
            [['parent_id', 'position', 'status', 'institution_id'], 'integer'],
            [['label', 'url'], 'string', 'max' => 255],
            [['label_id'], 'string', 'max' => 150],
            [['description', 'icon'], 'string', 'max' => 100],
            [['user_type'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'label' => 'Label',
            'label_id' => 'Label ID',
            'url' => 'Url',
            'parent_id' => 'Parent ID',
            'description' => 'Description',
            'position' => 'Position',
            'status' => 'Status',
            'icon' => 'Icon',
            'institution_id' => 'Institution ID',
            'user_type' => 'User Type',
        ];
    }
}
