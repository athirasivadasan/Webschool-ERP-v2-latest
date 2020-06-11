<?php

namespace frontend\modules\core\controllers;

use Yii;
use frontend\modules\core\models\StudentHouse;
use frontend\modules\core\models\StudentHouseSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * StudentHouseController implements the CRUD actions for StudentHouse model.
 */
class StudentHouseController extends Controller
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
     * Lists all StudentHouse models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StudentHouseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single StudentHouse model.
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
     * Creates a new StudentHouse model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new StudentHouse();

        $searchModel = new StudentHouseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if ($model->load(Yii::$app->request->post())) {
            $model->status = 1;
            if ($model->save()) {
                return $this->redirect(['create']);
            }

            // return $this->redirect(['view', 'id' => $model->student_religion_id]);
        }

        return $this->render('create', [
            'model' => $model,'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Updates an existing StudentHouse model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $searchModel = new StudentHouseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['create']);
            // return $this->redirect(['view', 'id' => $model->student_house_id]);
        }

        return $this->render('update', [
            'model' => $model,'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Deletes an existing StudentHouse model.
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
     * Finds the StudentHouse model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return StudentHouse the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        // if (($model = StudentHouse::findOne($id)) !== null) {
        if (($model = StudentHouse::find()->where(['slug' => $id])->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
