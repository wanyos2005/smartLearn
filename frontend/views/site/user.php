<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $user app\models\Users */

use \app\models\Conveniencies;
?>

<fieldset class="sign-up-user-form">
    <legend>LogIn Credentials</legend>

    <table>
        <tr>
            <td><?= $form->field($user, 'profile')->dropDownList(Conveniencies::privileges($user->profile), ['disabled' => true]) ?></td>
        </tr>
        
        <tr>
            <td><?= $form->field($user, 'email') ?></td>
        </tr>
        
        <tr>
            <td><?= $form->field($user, 'username') ?></td>
        </tr>

        <tr>
            <td><?= $form->field($user, 'password')->passwordInput() ?></td>
        </tr>
        
        <tr>
            <td><?= $form->field($user, 'confirm_password')->passwordInput() ?></td>
        </tr>
    </table>
</fieldset>