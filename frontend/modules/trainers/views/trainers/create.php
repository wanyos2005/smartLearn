<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\trainers\models\Trainers */

$this->title = 'Create Trainers';
$this->params['breadcrumbs'][] = ['label' => 'Trainers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trainers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
