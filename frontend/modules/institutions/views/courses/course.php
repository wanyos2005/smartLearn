<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Conveniencies;

/* @var $this yii\web\View */
/* @var $model app\modules\institutions\models\Courses */
/* @var $form yii\widgets\ActiveForm */
?>

<fieldset class="courses-course-form">
    <legend>Course Details</legend>
    <table>
        <tr><td colspan="3"> <?= $form->field($model, 'course_name')->textInput(['maxlength' => true]) ?></td></tr>

        <tr>
            <td><?= $form->field($model, 'course_type')->dropDownList(Conveniencies::courseTypes(), ['prompt' => '-- Course Type --']) ?></td>
            <td><?= $form->field($model, 'course_duration')->dropDownList(range(1, 8), ['prompt' => '-- Academic Years --']) ?></td>
            <td><?= $form->field($model, 'sessions_per_year')->dropDownList(range(1, 4), ['prompt' => '-- Sessions --']) ?></td>
        </tr>

        <tr>
            <td><?= $form->field($model, 'mean_grade')->dropDownList(Conveniencies::gradesForDropDown(), ['prompt' => '-- Grades --']) ?></td>
            <td><?= $form->field($model, 'annual_fees')->textInput(['maxlength' => true]) ?></td>
            <td><?= $form->field($model, 'active')->dropDownList($model->activeNotActive(), []) ?></td>
        </tr>
    </table>
</fieldset>
