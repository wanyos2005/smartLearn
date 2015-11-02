<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\institutions\models\Institutions */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="institutions-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'inst_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inst_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'website')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'logo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'motto')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'mission')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'vision')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'active')->dropDownList([ 'yes' => 'Yes', 'no' => 'No', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
