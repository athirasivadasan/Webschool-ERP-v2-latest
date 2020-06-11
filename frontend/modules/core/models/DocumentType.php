<?php

namespace frontend\modules\core\models;

use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "document_type".
 *
 * @property int $document_type_id
 * @property string $document_name
 * @property int $status
 * @property string|null $slug
 *
 * @property StudentDocuments[] $studentDocuments
 */
class DocumentType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'document_type';
    }

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => SluggableBehavior::className(),
                'attribute' => 'document_name',
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
            [['document_name'], 'required'],
            [['status'], 'integer'],
            [['document_name'], 'string', 'max' => 50],
            [['slug'], 'string', 'max' => 80],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'document_type_id' => 'Document Type ID',
            'document_name' => 'Document Name',
            'status' => 'Status',
            'slug' => 'Slug',
        ];
    }

    /**
     * Gets query for [[StudentDocuments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudentDocuments()
    {
        return $this->hasMany(StudentDocuments::className(), ['doc_type' => 'document_type_id']);
    }
}
