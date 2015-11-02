<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use \app\models\Counties;
use \app\models\Constituencies;
use \app\modules\trainers\models\Centers;
use \app\modules\trainers\models\Trainers;

/* @var $this yii\web\View */
/* @var $model app\modules\trainers\models\Centers */
/* @var $form yii\widgets\ActiveForm */

$trnr = Trainers::findOne(Yii::$app->user->identity->id);
$this->title = 'Centers';
$this->params['breadcrumbs'] = [$trnr->name, $this->title];
?>

<script>
<?php
include Yii::$app->basePath . '/scripts/javascript/dynamicConstituencies.js';
?>
</script>

<fieldset class="centers-form">
    <legend>Center Details</legend>

    <?php $form = ActiveForm::begin(['id' => 'centers-form']); ?>

    <table>
        <tr>
            <td colspan="3"><?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?></td>
            <td><?= $form->field($model, 'main')->dropDownList(Centers::headOffice(), []) ?></td>
        </tr>

        <tr>
            <td><?= $form->field($model, 'phone1')->textInput(['maxlength' => true]) ?></td>
            <td><?= $form->field($model, 'phone2')->textInput(['maxlength' => true]) ?></td>
            <td colspan="2"><?= $form->field($model, 'phone3')->textInput(['maxlength' => true]) ?></td>
        </tr>

        <tr>
            <td colspan="2"><?= $form->field($model, 'email1')->textInput(['maxlength' => true]) ?></td>
            <td colspan="2"><?= $form->field($model, 'email2')->textInput(['maxlength' => true]) ?></td>
        </tr>

        <tr>
            <td><?= $form->field($model, 'county')->dropDownList(Counties::countiesAsArray(), ['prompt' => '-- Counties --', 'onchange' => "dynamicConstituencies($(this).val(), 'centers-constituency')"]) ?></td>
            <td><?= $form->field($model, 'constituency')->dropDownList(Constituencies::constituenciesAsArray(empty($model->county) ? null : $model->county), ['prompt' => '-- Constituencies --']) ?></td>
            <td colspan="2"><?= $form->field($model, 'town')->textInput(['maxlength' => true]) ?></td>
        </tr>

        <tr>
            <td colspan="4"><?= $form->field($model, 'postal_address')->textarea(['maxlength' => true, 'rows' => 2]) ?></td>
        </tr>

        <tr>
            <td colspan="4"><?= $form->field($model, 'physical_address')->textarea(['maxlength' => true, 'rows' => 2]) ?></td>
        </tr>
    </table>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Save', ['class' => ($model->isNewRecord ? 'btn btn-success' : 'btn btn-primary') . ' navbar-right']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</fieldset>