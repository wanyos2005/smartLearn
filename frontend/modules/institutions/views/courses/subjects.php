<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Conveniencies;

/* @var $this yii\web\View */
/* @var $models app\modules\institutions\models\CourseSubjectGrades */
/* @var $model app\modules\institutions\models\CourseSubjectGrades */
/* @var $form yii\widgets\ActiveForm */
?>

<fieldset class="courses-subjects-form">
    <legend>Subjects</legend>

    <?php foreach ($models as $cat => $subjects): ?>

        <fieldset>
            <legend><?= Conveniencies::categoryName($cat) ?></legend>
            <?php foreach ($subjects as $model): ?>
                <?= $form->field($model, "[$model->subject]min_grade")->dropDownList(Conveniencies::gradesForDropDown(), ['prompt' => '-- Grades --']) ?>
            <?php endforeach; ?>
        </fieldset>

    <?php endforeach; ?>

</fieldset>
