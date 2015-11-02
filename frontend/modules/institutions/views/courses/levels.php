<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Conveniencies;

/* @var $this yii\web\View */
/* @var $models app\modules\institutions\models\CourseLevels */
/* @var $model app\modules\institutions\models\CourseLevels */
/* @var $form yii\widgets\ActiveForm */
?>

<fieldset class="courses-levels-form">
    <legend>Study Levels</legend>

    <table>
        <tr>
            <?php foreach ($models as $lvl => $model): ?>
            <td style="text-align: center">
                    <?= $form->field($model, "[$lvl]active")->checkbox(['checked' => '1', 'value' => ''], true) ?>
                </td>
            <?php endforeach; ?>
        </tr>
    </table>
</fieldset>
