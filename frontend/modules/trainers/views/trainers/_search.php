<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\trainers\searchModels\TrainersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trainers-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'website') ?>

    <?= $form->field($model, 'logo') ?>

    <?= $form->field($model, 'motto') ?>

    <?php // echo $form->field($model, 'mission') ?>

    <?php // echo $form->field($model, 'vision') ?>

    <?php // echo $form->field($model, 'brief') ?>

    <?php // echo $form->field($model, 'active') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
