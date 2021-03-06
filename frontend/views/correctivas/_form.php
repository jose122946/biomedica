<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use app\models\Equipos;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $model app\models\Correctivas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="correctivas-form">
<? $array =[
['estado' => 'Pendiente','id' => 'Pendiente'],
['estado' => 'En diagnóstico','id' => 'En diagnostico'],
['estado' => 'En reparación','id' => 'En reparacion'],
['estado' => 'Terminado','id' => 'Terminado'],

];
$equipos = Equipos::find()
->orderBy('clave_equipo')
->all();
$equiposlista = ArrayHelper::map($equipos,'id_equipo','numinv');
?>
    <?php $form = ActiveForm::begin(); ?>
    <?if(isset($_GET['id']))
    { 
    $model->id_equipo = $_GET['id'];
    }?>
    <?Pjax::begin();?>
    <?= $form->field($model, 'id_equipo')->dropDownList($equiposlista,['prompt' => 'Seleccione un equipo','class' => 'lista form-control',
    'onchange' => '$.post("'.Yii::$app->urlManager->createUrl(["correctivas/cambio"]).'",{valor:value},
    function(data) {
      $("#contenedor1").html(data);
              })'])->label('Numero de inventario') ?>
      
    <?if(isset($model)){
      echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            
            'idEquipo.nombre_equipo',
            'idEquipo.clave_equipo',
            'idEquipo.modelo',
            'idEquipo.idArea.nombre_area',
            'idEquipo.descripcionins',
            'idEquipo.descripcionesp',
            'idEquipo.marca',
            'idEquipo.fisico'
        ],
    ]);}else
    {
        echo 1;
    } ?>
    <?Pjax::end();?>
    <?= $form->field($model, 'fecha_inicio')->widget(DatePicker::className(),
    [
    'language' => 'es',
    'dateFormat' => 'yyyy-MM-dd',

    ],
    ['class' => 'form-control']) ?>

    <?= $form->field($model, 'dias')->input('number') ?>

    <?= $form->field($model, 'estado')->dropDownList(ArrayHelper::map($array,'id','estado'),['prompt' => 'Seleccione un estado'])?>

    <?= $form->field($model, 'diagnostico')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'reparacion')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
