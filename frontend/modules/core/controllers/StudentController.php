<?php

namespace frontend\modules\core\controllers;

use common\models\User;
use frontend\modules\core\models\Academic;
use frontend\modules\core\models\Batch;
use frontend\modules\core\models\BloodGroup;
use frontend\modules\core\models\Course;
use frontend\modules\core\models\DocumentType;
use frontend\modules\core\models\Gender;
use frontend\modules\core\models\Guardian;
use frontend\modules\core\models\ParentDetails;
use frontend\modules\core\models\PreviousQualification;
use frontend\modules\core\models\Student;
use frontend\modules\core\models\StudentCaste;
use frontend\modules\core\models\StudentCategory;
use frontend\modules\core\models\StudentDocuments;
use frontend\modules\core\models\StudentHealthDetails;
use frontend\modules\core\models\StudentHouse;
use frontend\modules\core\models\StudentReligion;
use frontend\modules\core\models\StudentSearch;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * StudentController implements the CRUD actions for Student model.
 */
class StudentController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [

            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'create', 'update', 'view', 'delete', 'getbatch', 'deletedoc', 'checksibling'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return (Yii::$app->user->identity->usertypeid == '2' || Yii::$app->user->identity->usertypeid == '4');
                        },
                    ],
                    [
                        'actions' => ['index', 'view'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return (Yii::$app->user->identity->usertypeid == '2' || Yii::$app->user->identity->usertypeid == '4');
                        },
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Student models.
     * @return mixed
     */
    public function actionIndex()
    {
        // $searchModel = new StudentSearch();
        // $dataProvider = $searchModel->searchData(Yii::$app->request->queryParams);

        $searchModel = new StudentSearch();
        $dataProvider = $searchModel->searchData(Yii::$app->request->post());

        $courseModel = Course::find()->where(['status' => 1])->all();
        $courses = ArrayHelper::map($courseModel, 'courseid', 'course_name');

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'courses' => $courses,
        ]);
    }

    /**
     * Displays a single Student model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Student model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Student();

        $guardian = new Guardian();
        $parent = new ParentDetails();
        $pq = new PreviousQualification();

        $is_existStud = Student::find()->select(['student_id']);
        if ($is_existStud->count() > 0) {
            $maxId = $is_existStud->max('student_id');
            $model->student_admission_no = ($maxId + 1);
        } else {
            $model->student_admission_no = ($is_existStud->count() + 1);
        }

        $academic = Academic::find()->all();
        $academiclist = ArrayHelper::map($academic, 'academicid', function ($academic) {
            return $academic->academic_startyear . '-' . $academic->academic_endyear;
        });

        $courseModel = Course::find()->where(['status' => 1])->all();
        $courses = ArrayHelper::map($courseModel, 'courseid', 'course_name');

        $studentCategoryModel = StudentCategory::find()->where(['status' => 1])->all();
        $studentcategory = ArrayHelper::map($studentCategoryModel, 'studentcategory_id', 'studentcategory_name');

        $bloodGroupModel = BloodGroup::find()->where(['status' => 1])->all();
        $bloodgroup = ArrayHelper::map($bloodGroupModel, 'id', 'blood_group');

        $genderModel = Gender::find()->where(['status' => 1])->all();
        $gender = ArrayHelper::map($genderModel, 'id', 'gender');

        if ($model->load(Yii::$app->request->post()) && $guardian->load(Yii::$app->request->post()) && $parent->load(Yii::$app->request->post()) && $pq->load(Yii::$app->request->post())) {

            $student_userid = $_POST['Student']['student_first_name'] . '-' . $model->student_admission_no;
            $model->student_userid = $student_userid;

            if ($model->validate() || $guardian->validate() || $parent->validate() || $pq->validate()) {

                if (isset($_POST['Student']['academic_id'])) {

                    $academicyear = $_POST['Student']['academic_id'];
                    $academic_status = Academic::findOne($academicyear);

                    if ($academic_status->status == 1) {
                        $model->course_id = $_POST['Student']['course_id'];
                        $model->batch_id = $_POST['Student']['batch_id'];
                    } else {
                        $model->course_id = null;
                        $model->batch_id = null;
                    }
                }

                if ($guardian->save()) {

                    $model->guardian_id = $guardian->guardian_id;
                }
                if ($parent->save()) {
                    $model->parent_id = $parent->parent_details_id;
                }

                if ($pq->save()) {
                    $model->student_previous_qualification_id = $pq->previousqualification_id;
                }
                $model->institution_id = Yii::$app->user->identity->institutionid;
                $model->student_dob = isset($_POST['Student']['student_dob']) ? date('Y-m-d', strtotime($_POST['Student']['student_dob'])) : null;

                $model->student_admission_date = isset($_POST['Student']['student_admission_date']) ? date('Y-m-d', strtotime($_POST['Student']['student_admission_date'])) : null;

                $model->created_at = date('Y-m-d H:i:s');
                $model->updated_at = date('Y-m-d H:i:s');

                $model->created_by = Yii::$app->user->identity->id;
                $model->updated_by = Yii::$app->user->identity->id;

                

                $is_existStud = Student::find()->select(['student_id'])->where(['student_admission_no' => $_POST['Student']['student_admission_no']]);
                if ($is_existStud->count() > 0) {
                    $maxId = $is_existStud->max('student_id');
                    $model->student_admission_no = ($maxId + 1);
                }

                if ($model->save()) {
                    $user = new User();
                    $user->username = $model->student_userid;
                    $user->email = $guardian->guardian_email;
                    $user->setPassword($model->student_dob);
                    $user->generateAuthKey();
                    $user->generateEmailVerificationToken();
                    $user->created_at = date('Y-m-d H:i:s');
                    $user->updated_at = date('Y-m-d H:i:s');
                    $user->userid = $model->student_id;
                    $user->usertypeid = 1;
                    $user->institutionid = Yii::$app->user->identity->institutionid;

                    if ($user->save()) {
                        return $this->redirect(['view', 'id' => $model->slug]);
                    } else {
                        echo "<pre>";
                        print_r($user->errors);exit;
                    }

                }
            } else {

                echo "<pre>";
                print_r($model->errors);
                echo "<pre>";
                print_r($guardian->errors);
                echo "<pre>";
                print_r($parent->errors);

            }

        }

        return $this->render('create', [
            'model' => $model, 'guardian' => $guardian, 'parent' => $parent, 'pq' => $pq,
            'academiclist' => $academiclist, 'courses' => $courses, 'studentcategory' => $studentcategory, 'bloodgroup' => $bloodgroup, 'gender' => $gender,
        ]);
    }

    /**
     * Updates an existing Student model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $guardian = Guardian::find()->where(['guardian_id' => $model->guardian_id])->one();
        $parent = ParentDetails::find()->where(['parent_details_id' => $model->parent_id])->one();
        $pq = PreviousQualification::find()->where(['previousqualification_id' => $model->student_previous_qualification_id])->one();

        $healthdetails = StudentHealthDetails::find()->where(['student_id' => $model->student_id])->one();
        if (!isset($healthdetails)) {
            $healthdetails = new StudentHealthDetails();
        }

        $courseModel = Course::find()->where(['status' => 1])->all();
        $courses = ArrayHelper::map($courseModel, 'courseid', 'course_name');

        $batchModel = Batch::find()->where(['courseid' => $model->course_id])->all();
        $batch = ArrayHelper::map($batchModel, 'batchid', 'batch_name');

        $studentCategoryModel = StudentCategory::find()->where(['status' => 1])->all();
        $studentcategory = ArrayHelper::map($studentCategoryModel, 'studentcategory_id', 'studentcategory_name');

        $bloodGroupModel = BloodGroup::find()->where(['status' => 1])->all();
        $bloodgroup = ArrayHelper::map($bloodGroupModel, 'id', 'blood_group');

        $genderModel = Gender::find()->where(['status' => 1])->all();
        $gender = ArrayHelper::map($genderModel, 'id', 'gender');

        $casteModel = StudentCaste::find()->where(['status' => 1])->all();
        $caste = ArrayHelper::map($casteModel, 'studentcasteid', 'student_caste_name');

        $religionModel = StudentReligion::find()->where(['status' => 1])->all();
        $religion = ArrayHelper::map($religionModel, 'student_religion_id', 'student_religion_name');

        $studentHouseModel = StudentHouse::find()->where(['status' => 1])->all();
        $studenthouse = ArrayHelper::map($studentHouseModel, 'student_house_id', 'student_house_name');

        $documentTypeModel = DocumentType::find()->where(['status' => 1])->orderBy(['document_type_id' => SORT_ASC])->all();
        $documenttype = ArrayHelper::map($documentTypeModel, 'document_type_id', 'document_name');

        $student_doc = StudentDocuments::find()->where(['student_id' => $model->student_id])->all();

        $student_docAll = ArrayHelper::map($student_doc, 'student_document_id', function ($doc) {
            return $doc->student_document_name . '-' . $doc->student_document_attachment;
        });

        if (isset($model->student_photo)) {
            $pre_logo = $model->student_photo;
        }

        if ($model->load(Yii::$app->request->post()) && $guardian->load(Yii::$app->request->post()) && $parent->load(Yii::$app->request->post()) && $pq->load(Yii::$app->request->post()) && $healthdetails->load(Yii::$app->request->post())) {

            if ($model->validate() || $guardian->validate() || $parent->validate() || $pq->validate() || $healthdetails->validate()) {
                $i = 0;
                foreach ($documenttype as $key => $value) {

                    $uploadedFile = UploadedFile::getInstance($model, 'student_documents[' . $i . ']');

                    if (!empty($uploadedFile)) {
                        $studentDoc = new StudentDocuments;
                        $time = time();

                        $logo = "{$model->student_first_name}_{$value}_{$time}_{$uploadedFile}";

                        $studentDoc->student_id = $model->student_id;
                        $studentDoc->student_document_name = $value;
                        $studentDoc->student_document_attachment = $logo;
                        $studentDoc->academic_id = $model->academic_id;
                        $studentDoc->institution_id = Yii::$app->user->identity->institutionid;
                        $studentDoc->doc_type = $key;
                        if ($studentDoc->save()) {
                            if (!empty($uploadedFile)) {
                                if (!is_dir(\Yii::getAlias('@webroot') . '/uploads/students/' . $model->student_first_name . '-' . $model->student_admission_no)) {

                                    mkdir(\Yii::getAlias('@webroot') . '/uploads/students/' . $model->student_first_name . '-' . $model->student_admission_no);

                                }
                                $uploadedFile->saveAs(\Yii::getAlias('@webroot') . '/uploads/students/' . $model->student_first_name . '-' . $model->student_admission_no . '/' . $logo);

                            }
                        }

                    }
                    $i++;

                }

                $student_pic = $_POST['Student']['student_photo'];
                $uploadedPicFile = UploadedFile::getInstance($model, 'student_photo');

                if (!empty($uploadedPicFile)) {

                    $time = time();
                    $logo = "'ProfilePic'_{$model->student_first_name}_{$time}_{$uploadedPicFile}";
                    $model->student_photo = $logo;
                } else {
                    unset($model->student_photo);
                }

                $guardian->save();
                $parent->save();
                $pq->save();

                $healthdetails->student_id = $model->student_id;
                $healthdetails->save();

                if ($model->save()) {

                    if (!empty($uploadedPicFile)) {
                        if (!is_dir(\Yii::getAlias('@webroot') . '/uploads/students/' . $model->student_first_name . '-' . $model->student_admission_no)) {

                            mkdir(\Yii::getAlias('@webroot') . '/uploads/students/' . $model->student_first_name . '-' . $model->student_admission_no);

                        }
                        $uploadedPicFile->saveAs(\Yii::getAlias('@webroot') . '/uploads/students/' . $model->student_first_name . '-' . $model->student_admission_no . '/' . $logo);

                        if (!empty($pre_logo)) {
                            unlink(\Yii::getAlias('@webroot') . '/uploads/students/' . $model->student_first_name . '-' . $model->student_admission_no . '/' . $pre_logo);
                        }

                    }

                    return $this->redirect(['update', 'id' => $model->slug]);
                }
            }

        }

        return $this->render('update', [
            'model' => $model, 'courses' => $courses, 'batch' => $batch, 'studentcategory' => $studentcategory, 'bloodgroup' => $bloodgroup, 'gender' => $gender, 'caste' => $caste,
            'religion' => $religion, 'studenthouse' => $studenthouse, 'documenttype' => $documenttype, 'student_docAll' => $student_docAll, 'guardian' => $guardian,
            'parent' => $parent, 'pq' => $pq, 'healthdetails' => $healthdetails,
        ]);
    }

    /**
     * Deletes an existing Student model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Student model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Student the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        // if (($model = Student::findOne($id)) !== null) {
        if (($model = Student::find()->where(['slug' => $id])->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionGetbatch($id)
    {

        $batch = Batch::find()->where(['courseid' => $id])->all();

        echo "<option>Select Batch</option>";

        if (count($batch) > 0) {
            foreach ($batch as $row) {
                echo "<option value='$row->batchid'>$row->batch_name</option>";
            }
        } else {
            echo "<option>No data found</option>";
        }

    }
    public function actionDeletedoc()
    {

        if ($_POST['id']) {
            $id = $_POST['id'];
            $model = StudentDocuments::findOne($id);
            $student_first_name = $model->student->student_first_name;
            $student_admission_no = $model->student->student_admission_no;
            $doc = $model->student_document_attachment;

            if ($model->delete()) {
                unlink(\Yii::getAlias('@webroot') . '/uploads/students/' . $student_first_name . '-' . $student_admission_no . '/' . $doc);

            }

        }

    }

    public function actionChecksibling($email)
    {

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON; // this will return response in json
        $guardian = Guardian::find()->where(['guardian_email' => $email])->one();
        if (isset($guardian)) {

            $guardian_id = $guardian->guardian_id;

            $studentModel = Student::find()->where(['guardian_id' => $guardian_id])->all();
            $siblings = ArrayHelper::map($studentModel, 'student_id', function ($student) {
                return $student->student_first_name . ' ' . $student->student_middle_name . ' ' . $student->student_last_name;
            });

            return array('status' => true, 'data' => $siblings);
        } else {

            return array('status' => false);
        }

    }
}
