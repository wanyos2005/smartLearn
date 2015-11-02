<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\institutions\searchModels\InstitutionsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="institutions-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'inst_name') ?>

    <?= $form->field($model, 'inst_type') ?>

    <?= $form->field($model, 'website') ?>

    <?= $form->field($model, 'logo') ?>

    <?php // echo $form->field($model, 'motto') ?>

    <?php // echo $form->field($model, 'mission') ?>

    <?php // echo $form->field($model, 'vision') ?>

    <?php // echo $form->field($model, 'active') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
