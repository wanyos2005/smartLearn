<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\modules\person\models\Person */

use \app\models\Conveniencies;
?>

<fieldset class="sign-up-person-form">
    <legend>Personal Details</legend>

    <table>
        <tr>
            <td><?= $form->field($model, 'fname')->textInput(['maxlength' => true]) ?></td>
            <td class="float-right"><?= $form->field($model, 'id_no')->textInput(['maxlength' => true]) ?></td>
        </tr>

        <tr>
            <td><?= $form->field($model, 'mname')->textInput(['maxlength' => true]) ?></td>
            <td><?= $form->field($model, 'phone') ?></td>
        </tr>

        <tr>
            <td><?= $form->field($model, 'lname')->textInput(['maxlength' => true]) ?></td>
            <td><?= $form->field($model, 'cse_yr')->dropDownList(Conveniencies::valueRanges(date('Y'), 2000, Conveniencies::desc), ['prompt' => '-- Year --']) ?></td>
        </tr>

        <tr>
            <td><?= $form->field($model, 'dob')->textInput(['maxlength' => true]) ?></td>
            <td><?= $form->field($model, 'cse_index')->textInput(['maxlength' => true]) ?></td>
        </tr>

        <tr>
            <td><?= $form->field($model, 'gender')->dropDownList(Conveniencies::genders(), ['prompt' => '-- Gender --']) ?></td>
            <td><?= $form->field($model, 'grade')->dropDownList(Conveniencies::gradesForDropDown(), ['prompt' => '-- Grade --']) ?></td>
        </tr>
    </table>
</fieldset>