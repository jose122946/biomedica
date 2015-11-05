<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Preventivas */

$this->title = 'Update Preventivas: ' . ' ' . $model->id_preventica;
$this->params['breadcrumbs'][] = ['label' => 'Preventivas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_preventica, 'url' => ['view', 'id' => $model->id_preventica]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="preventivas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
