<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Preventivas */

$this->title = $model->id_preventica;
$this->params['breadcrumbs'][] = ['label' => 'Preventivas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="preventivas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_preventica], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_preventica], [
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
            'id_preventica',
            'id_equipo',
            'fecha_inicio',
            'dias',
            'estado',
        ],
    ]) ?>

</div>
