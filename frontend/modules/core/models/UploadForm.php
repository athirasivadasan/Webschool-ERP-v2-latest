<?php

namespace frontend\modules\core\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $institution_logo;
    public $student_document_attachment;

    public function rules()
    {
        return [
            [['institution_logo','student_photo','employeedetails_photo'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg, png', 'mimeTypes' => 'image/jpeg, image/png'],
            [['student_document_attachment'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg, png', 'mimeTypes' => 'image/jpeg, image/png','maxFiles' => 10],
            // [['institution_logo'], 'required', 'on' => 'update'],
        ];
    }
}
?>