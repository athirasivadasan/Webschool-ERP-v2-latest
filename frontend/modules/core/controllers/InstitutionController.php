<?php

namespace frontend\modules\core\controllers;

use frontend\modules\core\models\Country;
use frontend\modules\core\models\Institution;
use frontend\modules\core\models\InstitutionSearch;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * InstitutionController implements the CRUD actions for Institution model.
 */
class InstitutionController extends Controller
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
                        'actions' => ['index', 'create', 'update', 'view', 'delete', 'countrycode'],
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
     * Lists all Institution models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InstitutionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Institution model.
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
     * Creates a new Institution model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Institution();

        $countryModel = Country::find()->all();
        $country = ArrayHelper::map($countryModel, 'id', 'country');
        $currency = ArrayHelper::map($countryModel, 'id', 'currency');

        $institution = Institution::find()->where(['status' => 1])->all();
        if (empty($institution)) {
            if ($model->load(Yii::$app->request->post())) {

                $institution_name = $_POST['Institution']['institution_name'];
                $uploadedFile = UploadedFile::getInstance($model, 'institution_logo');

                if (isset($uploadedFile)) {
                    $time = time();

                    $logo = "{$institution_name}_{$time}_{$uploadedFile}";
                    $model->institution_logo = $logo;
                }

                $model->institution_created_on = date('Y-m-d H:i:s');
                $model->institution_updated_on = date('Y-m-d H:i:s');
                if ($model->save()) {
                    if (isset($uploadedFile)) {
                        $uploadedFile->saveAs(\Yii::getAlias('@webroot') . '/uploads/institution/' . $logo);
                    }
                    return $this->redirect(['view', 'id' => $model->slug]);
                }

            }

            return $this->render('create', [
                'model' => $model, 'country' => $country, 'currency' => $currency,
            ]);
        } else {
            $institution = Institution::find()->select('slug')->where(['status' => 1])->one();

            $model = $this->findModel($institution->slug);

            if (isset($model->institution_logo)) {
                $pre_logo = $model->institution_logo;
            }

            if ($model->load(Yii::$app->request->post())) {

                $institution_name = $_POST['Institution']['institution_name'];
                $uploadedFile = UploadedFile::getInstance($model, 'institution_logo');

                if (!empty($uploadedFile)) {
                    $time = time();

                    $logo = "{$institution_name}_{$time}_{$uploadedFile}";
                    $model->institution_logo = $logo;
                } else {
                    unset($model->institution_logo);
                }

                $model->institution_updated_on = date('Y-m-d H:i:s');
                if ($model->save()) {
                    if (!empty($uploadedFile)) {
                        $uploadedFile->saveAs(\Yii::getAlias('@webroot') . '/uploads/institution/' . $logo);
                        if (!empty($pre_logo)) {
                            unlink(\Yii::getAlias('@webroot') . '/uploads/institution/' . $pre_logo);
                        }

                    }
                    return $this->redirect(['view', 'id' => $model->slug]);
                }

            }

            return $this->render('update', [
                'model' => $model, 'country' => $country, 'currency' => $currency,
            ]);
        }

    }

    /**
     * Updates an existing Institution model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->institution_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Institution model.
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
     * Finds the Institution model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Institution the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        // if (($model = Institution::findOne($id)) !== null) {
        if (($model = Institution::find()->where(['slug' => $id])->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionCountrycode($id)
    {

        $country = Country::find()->where(['id' => $id])->all();

        echo "<option>Please Select</option>";

        if (count($country) > 0) {
            foreach ($country as $row) {
                echo "<option value='$row->id'>$row->currency</option>";
            }
        } else {
            echo "<option>No data found</option>";
        }

    }
}
