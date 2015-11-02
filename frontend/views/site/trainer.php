<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\modules\trainers\models\Trainers */
?>

<fieldset class="sign-up-trainer-form">
    <legend>Institution Details</legend>

    <table>
        <tr>
            <td><?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?></td>
            <td><?= $form->field($model, 'motto')->textarea(['rows' => 2]) ?></td>
        </tr>
        
        <tr>
            <td><?= $form->field($model, 'website')->textInput(['maxlength' => true]) ?></td>
            <td><?= $form->field($model, 'mission')->textarea(['rows' => 2]) ?></td>
        </tr>
        
        <tr>
            <td><?= $form->field($model, 'logo')->textInput(['maxlength' => true]) ?></td>
            <td><?= $form->field($model, 'vision')->textarea(['rows' => 2]) ?></td>
        </tr>

        <tr>
            <td colspan="2"><?= $form->field($model, 'brief')->textarea(['rows' => 3]) ?></td>
        </tr>
    </table>
</fieldset>