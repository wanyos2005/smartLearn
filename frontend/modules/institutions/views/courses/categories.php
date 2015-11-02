<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Conveniencies;

/* @var $this yii\web\View */
/* @var $models app\modules\institutions\models\CourseSubjectCatGrades */
/* @var $model app\modules\institutions\models\CourseSubjectCatGrades */
/* @var $form yii\widgets\ActiveForm */
?>

<fieldset class="courses-categories-form">
    <legend>Categories</legend>

    <table>
        <tr>
            <?php foreach ($models as $cat => $model): ?>
                <td>
                    <fieldset class="courses-categories-form">
                        <legend><?= Conveniencies::categoryName($cat) ?></legend>
                        <table>
                            <tr>
                                <td><?= $form->field($model, "[$cat]no_of_subjects")->dropDownList(range(0, 4), ['prompt' => '-- No --']) ?></td>
                                <td><?= $form->field($model, "[$cat]min_grade")->dropDownList(Conveniencies::gradesForDropDown(), ['prompt' => '-- Grades --'])->label('Grade') ?></td>
                            </tr>
                        </table>
                    </fieldset>
                </td>
            <?php endforeach; ?>
        </tr>
    </table>


</fieldset>
