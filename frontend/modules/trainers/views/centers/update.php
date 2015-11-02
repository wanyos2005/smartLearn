<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\trainers\models\Centers */

$this->title = 'Update Centers: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Centers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="centers-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
