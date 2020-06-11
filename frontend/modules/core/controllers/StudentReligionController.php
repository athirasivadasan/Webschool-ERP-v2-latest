<?php

namespace frontend\modules\core\controllers;

use frontend\modules\core\models\StudentReligion;
use frontend\modules\core\models\StudentReligionSearch;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * StudentReligionController implements the CRUD actions for StudentReligion model.
 */
class StudentReligionController extends Controller
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
                        'actions' => ['index', 'create', 'update', 'view', 'delete'],
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
     * Lists all StudentReligion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StudentReligionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single StudentReligion model.
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
     * Creates a new StudentReligion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new StudentReligion();

        $searchModel = new StudentReligionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if ($model->load(Yii::$app->request->post())) {
            $model->status = 1;
            if ($model->save()) {
                return $this->redirect(['create']);
            }

            // return $this->redirect(['view', 'id' => $model->student_religion_id]);
        }

        return $this->render('create', [
            'model' => $model, 'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Updates an existing StudentReligion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $searchModel = new StudentReligionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['create']);
            // return $this->redirect(['view', 'id' => $model->student_religion_id]);
        }

        return $this->render('update', [
            'model' => $model, 'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Deletes an existing StudentReligion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['create']);
        // return $this->redirect(['index']);
    }

    /**
     * Finds the StudentReligion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return StudentReligion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        // if (($model = StudentReligion::findOne($id)) !== null) {
        if (($model = StudentReligion::find()->where(['slug' => $id])->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
