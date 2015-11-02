<?php

namespace app\modules\institutions\controllers;

use Yii;
use app\modules\institutions\models\Courses;
use app\modules\institutions\models\CourseCampuses;
use app\modules\institutions\models\CourseSubjectGrades;
use app\modules\institutions\models\CourseSubjectCatGrades;
use app\modules\institutions\models\CourseLevels;
use app\modules\institutions\searchModels\CoursesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CoursesController implements the CRUD actions for Courses model.
 */
class CoursesController extends Controller {

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
     * Lists all Courses models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new CoursesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Courses model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Courses model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $course = new Courses();
        $campuses = CourseCampuses::modelsOntoCourseForm(\Yii::$app->user->identity->id, $course->id);
        $subjects = CourseSubjectGrades::loadGradesInCats($course->id);
        $cats = CourseSubjectCatGrades::loadCatGrades($course->id);
        $levels = CourseLevels::loadLevels($course->id);

        if ($course->load(Yii::$app->request->post()) && $course->save())
            return $this->redirect(['view', 'id' => $course->id]);

        return $this->render('_form', [
                    'course' => $course, 'campuses' => $campuses, 'subjects' => $subjects, 'cats' => $cats, 'levels' => $levels
        ]);
    }

    /**
     * Updates an existing Courses model.
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
     * Deletes an existing Courses model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Courses model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Courses the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Courses::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
