<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $models app\modules\institutions\models\CoursesCampuses */
/* @var $model app\modules\institutions\models\CoursesCampuses */
/* @var $form yii\widgets\ActiveForm */

$column_width = 5;
$i = 0;
?>

<fieldset class="courses-campuses-form">
    <legend>Campuses</legend>

    <table>
        <?php for ($w=0; $w<10; $w++) foreach ($models as $model): ?>
            <?php if (++$i % $column_width == 1): ?> <tr> <?php endif; ?>
                <td style="text-align: center">
                    <?= $form->field($model, "[$model->campus_id]campus_id")->checkbox(['checked' => '1', 'value' => ''], true) ?>
                </td>
                <?php if ($i % $column_width == 0): ?> </tr> <?php endif; ?>
        <?php endforeach; ?>
    </table>
</fieldset>
