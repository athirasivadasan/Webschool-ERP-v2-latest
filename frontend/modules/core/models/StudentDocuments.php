<?php

namespace frontend\modules\core\models;

use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "student_documents".
 *
 * @property int $student_document_id
 * @property int $student_id
 * @property string $student_document_name
 * @property string $student_document_attachment
 * @property int $academic_id
 * @property int $institution_id
 * @property int|null $doc_type
 * @property string $slug
 * @property int $status
 *
 * @property Academic $academic
 * @property DocumentType $docType
 * @property Institution $institution
 * @property Student $student
 */
class StudentDocuments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student_documents';
    }
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => SluggableBehavior::className(),
                'attribute' => 'student_document_name',
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
            [['student_id', 'student_document_name', 'student_document_attachment', 'academic_id', 'institution_id', 'slug'], 'required'],
            [['student_id', 'academic_id', 'institution_id', 'doc_type', 'status'], 'integer'],
            [['student_document_name', 'student_document_attachment'], 'string', 'max' => 100],
            [['slug'], 'string', 'max' => 250],
            [['academic_id'], 'exist', 'skipOnError' => true, 'targetClass' => Academic::className(), 'targetAttribute' => ['academic_id' => 'academicid']],
            [['doc_type'], 'exist', 'skipOnError' => true, 'targetClass' => DocumentType::className(), 'targetAttribute' => ['doc_type' => 'document_type_id']],
            [['institution_id'], 'exist', 'skipOnError' => true, 'targetClass' => Institution::className(), 'targetAttribute' => ['institution_id' => 'institution_id']],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Student::className(), 'targetAttribute' => ['student_id' => 'student_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'student_document_id' => 'Student Document ID',
            'student_id' => 'Student ID',
            'student_document_name' => 'Student Document Name',
            'student_document_attachment' => 'Student Document Attachment',
            'academic_id' => 'Academic ID',
            'institution_id' => 'Institution ID',
            'doc_type' => 'Doc Type',
            'slug' => 'Slug',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Academic]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAcademic()
    {
        return $this->hasOne(Academic::className(), ['academicid' => 'academic_id']);
    }

    /**
     * Gets query for [[DocType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDocType()
    {
        return $this->hasOne(DocumentType::className(), ['document_type_id' => 'doc_type']);
    }

    /**
     * Gets query for [[Institution]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInstitution()
    {
        return $this->hasOne(Institution::className(), ['institution_id' => 'institution_id']);
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
