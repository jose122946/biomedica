<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\Correctivas */

$this->title = 'Nueva Reparación';
$this->params['breadcrumbs'][] = ['label' => 'Correctivas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="correctivas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
<??>
     <? //DetailView::widget([
    //     'model' => $model,
    //     'attributes' => [
    //         'idEquipo.nombre_equipo',
    //         'idEquipo.clave_equipo',
    //         'idEquipo.modelo',
    //         'idEquipo.idArea.nombre_area',
    //         'idEquipo.descripcionins',
    //         'idEquipo.descripcionesp',
    //         'idEquipo.marca',
    //         'idEquipo.fisico'
    //     ],
    // ]) ?>
    <div id = "contenedor"></div>

</div>
