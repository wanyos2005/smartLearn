<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\institutions\searchModels\CampusesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Campuses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="campuses-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Campuses', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'inst_id',
            'name',
            'phone1',
            'phone2',
            // 'phone3',
            // 'email1:email',
            // 'email2:email',
            // 'postal_address',
            // 'county',
            // 'constituency',
            // 'town',
            // 'physical_address',
            // 'main',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
