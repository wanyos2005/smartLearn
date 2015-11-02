<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $course app\modules\institutions\models\Courses */
/* @var $campuses app\modules\institutions\models\CoursesCampuses */
/* @var $subjects app\modules\institutions\models\CourseSubjectGrades */
/* @var $cats app\modules\institutions\models\CourseSubjectCatGrades */
/* @var $levels app\modules\institutions\models\CourseLevels */
/* @var $form yii\widgets\ActiveForm */
use app\modules\institutions\models\Institutions;

$inst = Institutions::findOne(Yii::$app->user->identity->id);
$this->title = 'Courses';
$this->params['breadcrumbs'] = [$inst->inst_name, $this->title];
?>

<div>
    <fieldset class="courses-form">
        <legend>Course Registration</legend>

        <?php $form = ActiveForm::begin(['id' => $form_id = 'courses-form']); ?>

        <?= $this->render('course', ['form' => $form, 'model' => $course]); ?>

        <?= $this->render('levels', ['form' => $form, 'models' => $levels]); ?>

        <?= $this->render('campuses', ['form' => $form, 'models' => $campuses]); ?>

        <?= $this->render('categories', ['form' => $form, 'cats' => $cats, 'subjects' => $subjects]); ?>

        <!-- <?= $this->render('subjects', ['form' => $form, 'subjects' => $subjects]); ?> -->

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Save', ['class' => 'btn btn-primary navbar-right']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </fieldset>
</div>
