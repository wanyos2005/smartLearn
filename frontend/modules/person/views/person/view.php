<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\person\models\Person */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'People', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-view">

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
            'fname',
            'mname',
            'lname',
            'gender',
            'dob',
            'id_no',
            'phone',
            'cse_yr',
            'cse_index',
            'grade',
        ],
    ]) ?>

</div>
