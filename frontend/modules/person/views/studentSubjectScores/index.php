<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\person\searchModels\StudentSubjectScoresSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Student Subject Scores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-subject-scores-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Student Subject Scores', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'stud_id',
            'subject',
            'grade',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
