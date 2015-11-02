<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\modules\institutions\models\Institutions */
?>

<fieldset class="sign-up-institution-form">
    <legend>Institution Details</legend>

    <table>
        <tr>
            <td><?= $form->field($model, 'inst_name')->textInput(['maxlength' => true]) ?></td>
            <td><?= $form->field($model, 'motto')->textarea(['rows' => 2]) ?></td>
        </tr>
        
        <tr>
            <td><?= $form->field($model, 'inst_type')->dropDownList(Yii::$app->params['instTypes'], ['propmtp' => '-- Inst Type --']) ?></td>
            <td><?= $form->field($model, 'mission')->textarea(['rows' => 2]) ?></td>
        </tr>
        
        <tr>
            <td><?= $form->field($model, 'logo')->textInput(['maxlength' => true]) ?></td>
            <td><?= $form->field($model, 'vision')->textarea(['rows' => 2]) ?></td>
        </tr>

        <tr>
            <td colspan="3"><?= $form->field($model, 'website')->textInput(['maxlength' => true]) ?></td>
        </tr>
    </table>
</fieldset>