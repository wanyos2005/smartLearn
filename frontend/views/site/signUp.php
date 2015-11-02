<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $detail app\modules\person\models\Person | app\modules\institutions\models\Institutions | app\modules\trainers\models\Trainers */
/* @var $user app\models\Users */
/* @var $view string view to be rendered for detail */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Sign Up';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="sign-up-form">
    <fieldset>
        <legend><?= Html::encode($this->title) ?></legend>

        <?php $form = ActiveForm::begin(); ?>

        <?= $this->render($view, ['form' => $form, 'model' => $detail]); ?>

        <?= $this->render('user', ['form' => $form, 'user' => $user]); ?>
        
        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Sign Up', ['class' => 'btn btn-primary navbar-right', 'name' => 'sign-up-button']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </fieldset>
</div>
