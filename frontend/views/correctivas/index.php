<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CorrectivasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Correctivas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="correctivas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <? if (Yii::$app->user->identity->rol_id == 2)
        {
        echo Html::a('Nueva Reparación', ['create'], ['class' => 'btn btn-success']);} ?>
    
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_correctiva',
            'idEquipo.nombre_equipo',
            'idEquipo.idArea.nombre_area',
            [
            'attribute' => 'Fecha Inicio',
            'value' => function($data)
            {
                return date("d/m/y",strtotime($data->fecha_inicio));
            }
            ],
            
            ['attribute' => 'Fecha Termino',
             'value' => function($data)
             {
                $fecha_inicio = $data->fecha_inicio;
                $intfecha = strtotime($fecha_inicio);
                $dias = 86400 * $data->dias;
                $inttermino = $dias + $intfecha;
                return date("d/m/y",$inttermino);
             }

            ],
            'estado',
            // 'diagnostico:ntext',
            // 'reparacion:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
