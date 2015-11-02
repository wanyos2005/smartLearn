<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\trainers\searchModels\TrainersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Trainers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trainers-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Trainers', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'website',
            'logo',
            'motto:ntext',
            // 'mission:ntext',
            // 'vision:ntext',
            // 'brief:ntext',
            // 'active',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
