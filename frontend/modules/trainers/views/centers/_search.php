<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\trainers\searchModels\CentersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="centers-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'trainer_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'phone1') ?>

    <?= $form->field($model, 'phone2') ?>

    <?php // echo $form->field($model, 'phone3') ?>

    <?php // echo $form->field($model, 'email1') ?>

    <?php // echo $form->field($model, 'email2') ?>

    <?php // echo $form->field($model, 'postal_address') ?>

    <?php // echo $form->field($model, 'county') ?>

    <?php // echo $form->field($model, 'constituency') ?>

    <?php // echo $form->field($model, 'town') ?>

    <?php // echo $form->field($model, 'physical_address') ?>

    <?php // echo $form->field($model, 'main') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
