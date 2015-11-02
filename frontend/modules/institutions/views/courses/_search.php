<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\institutions\searchModels\CoursesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="courses-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'inst_id') ?>

    <?= $form->field($model, 'course_type') ?>

    <?= $form->field($model, 'course_name') ?>

    <?= $form->field($model, 'mean_grade') ?>

    <?php // echo $form->field($model, 'annual_fees') ?>

    <?php // echo $form->field($model, 'course_duration') ?>

    <?php // echo $form->field($model, 'sessions_per_year') ?>

    <?php // echo $form->field($model, 'active') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
