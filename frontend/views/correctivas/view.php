<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Correctivas */

$this->title = $model->id_correctiva;
$this->params['breadcrumbs'][] = ['label' => 'Correctivas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="correctivas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id_correctiva], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id_correctiva], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Está seguro que desea eliminar?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_correctiva',
            'idEquipo.nombre_equipo',
            'fecha_inicio',
            'dias',
            'estado',
            'diagnostico:ntext',
            'reparacion:ntext',
        ],
    ]) ?>

</div>
