<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PreventivasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Preventivas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="preventivas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?
            if (Yii::$app->user->identity->rol_id == 2) {
            echo Html::a('Nuevo Mantenimiento', ['create'], ['class' => 'btn btn-success']); 
    
            }
         
         ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_preventica',
            'idEquipo.nombre_equipo',
            'idEquipo.clave_equipo',
            'idEquipo.idArea.nombre_area',
            [
            'attribute' => 'Fecha Inicio',
            'value' => function($data)
            {
                return date('d/m/y',strtotime($data->fecha_inicio));
            },

            ],
            'dias',
            [
            'attribute' => 'Fecha Termino',
            'value' => function($data)
            {
                $fecha_inicio = $data->fecha_inicio;
                $intfecha = strtotime($fecha_inicio);

                $dias = $data->dias;
                $dias= $dias * 86400;
                $intfecha_termino = $intfecha + $dias;
                $fecha_termino = date('d/m/y' ,$intfecha_termino);
                return $fecha_termino;

            },
            ],
            'estado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
