<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use \app\models\Conveniencies;

/* @var $this yii\web\View */
/* @var $models app\modules\person\models\StudentSubjectScores array */
/* @var $form yii\widgets\ActiveForm */

$prsn = \app\modules\person\models\Person::findOne(Yii::$app->user->identity->id);

$this->title = 'My Grades';
$this->params['breadcrumbs'] = [Conveniencies::names($prsn->fname, $prsn->mname, $prsn->lname), $this->title];

$maxHeight = 7;
$cols = 0;
foreach (Yii::$app->params['subjects'] as $cats)
    foreach ($cats as $subjects)
        $cols = $cols + (count($subjects) > $maxHeight ? 2 : 1);

$width = round(100 / $cols, 0) - 0.25;
?>

<fieldset class="student-subject-scores-form">
    <legend>My Grades</legend>

    <?php $form = ActiveForm::begin(); ?>

    <?php
    foreach (Yii::$app->params['subjects'] as $cats)
        foreach ($cats as $catName => $subjects):
            $colspan = count($subjects);
            $effective_width = $width * ($maxCol = $colspan > $maxHeight ? 2 : 1);
            $td = 0;
            ?>
            <?= "<fieldset class='cat-name-form' style='width: $effective_width%'><legend>$catName</legend>" ?>

            <table>
                <?php
                foreach ($subjects = Conveniencies::arraySort($subjects, Conveniencies::asc) as $symbol => $subject):
                    ?>
                    <?php if (++$td % $maxCol == 1) echo '<tr>' ?>
                    <td><?= $form->field($models[$symbol], "[$symbol]grade")->dropDownList(Conveniencies::gradesForDropDown(), ['prompt' => '-- Grade --']) ?></td>
                    <?php if ($td % $maxCol == 0) echo '</tr>'; ?>
                    <?php
                endforeach;
                ?>
            </table>

            <?= '</fieldset>' ?>
        <?php endforeach; ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-success navbar-right']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</fieldset>