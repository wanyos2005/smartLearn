<?php

namespace app\modules\person\controllers;

use Yii;
use yii\base\Model;
use app\modules\person\models\StudentSubjectScores;
use app\modules\person\searchModels\StudentSubjectScoresSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StudentSubjectScoresController implements the CRUD actions for StudentSubjectScores model.
 */
class StudentSubjectScoresController extends Controller {

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all StudentSubjectScores models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new StudentSubjectScoresSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single StudentSubjectScores model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new StudentSubjectScores model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new StudentSubjectScores;
        $models = $model->scoresOntoForm(Yii::$app->user->identity->id, \app\models\Conveniencies::subjectsForDropDown(\app\models\Conveniencies::allSubjects));

        if ($model->load($posts = Yii::$app->request->post()))
            foreach ($posts['StudentSubjectScores'] as $symbol => $post) {
                $models[$symbol]->attributes = $post;
                $models[$symbol]->modelSave($models[$symbol]);
            }

        return $this->render('_form', ['models' => $models]);
    }

    /**
     * Updates an existing StudentSubjectScores model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing StudentSubjectScores model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the StudentSubjectScores model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return StudentSubjectScores the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = StudentSubjectScores::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
