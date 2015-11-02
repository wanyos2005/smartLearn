<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\institutions\models\Campuses */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Campuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="campuses-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'inst_id',
            'name',
            'phone1',
            'phone2',
            'phone3',
            'email1:email',
            'email2:email',
            'postal_address',
            'county',
            'constituency',
            'town',
            'physical_address',
            'main',
        ],
    ]) ?>

</div>
