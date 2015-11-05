<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SolicitudSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Solicitudes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solicitud-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p> 
        <? if (Yii::$app->user->identity->rol_id == 1) {
         echo Html::a('Nueva solicitud', ['create'], ['class' => 'btn btn-success']);
        }  ?>
    </p>
<?Pjax::begin(['enablePushState' => false]);?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_solicitud',
            'idEquipo.clave_equipo',
            'idEquipo.nombre_equipo',
            'idEquipo.modelo',
            'idArea.nombre_area',
            'estado',
            [
            'attribute'=>'fecha',
            'value' => 'fecha'
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); 
    Pjax::end();?>

</div>
