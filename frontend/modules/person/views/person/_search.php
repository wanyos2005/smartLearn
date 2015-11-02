<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\person\searchModels\PersonSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="person-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'fname') ?>

    <?= $form->field($model, 'mname') ?>

    <?= $form->field($model, 'lname') ?>

    <?= $form->field($model, 'gender') ?>

    <?php // echo $form->field($model, 'dob') ?>

    <?php // echo $form->field($model, 'id_no') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'cse_yr') ?>

    <?php // echo $form->field($model, 'cse_index') ?>

    <?php // echo $form->field($model, 'grade') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
