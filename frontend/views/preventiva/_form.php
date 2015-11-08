<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use app\models\Equipos;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model app\models\Preventivas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="preventivas-form">
<? $array =[
['estado' => 'Pendiente','id' => 'Pendiente'],
['estado' => 'En mantenimiento','id' => 'En mantenimiento'],
['estado' => 'Terminado','id' => 'Terminado'],

];
$equipos = Equipos::find()->all();
$equiposlista = ArrayHelper::map($equipos,'id_equipo','numinv');
?>
    <?php $form = ActiveForm::begin(); ?>
<?if(isset($_GET['id']))
    { 
    $model->id_equipo = $_GET['id'];
    }?>
    <?= $form->field($model, 'id_equipo')->dropDownList($equiposlista,['prompt' => 'Seleccione el equipo',
        'onchange' => '$.post("'.Yii::$app->urlManager->createUrl(["preventiva/cambio"]).'",{valor:value},
    function(data) {
      $("#contenedor1").html(data);
              })'])->label('Equipo') ?>
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
    <?= $form->field($model, 'fecha_inicio')->textInput()->widget(DatePicker::className(),[
    'language' => 'es',
    'dateFormat' => 'yyyy-MM-dd',

    ]
    ); ?>

    <?= $form->field($model, 'dias')->input('number') ?>

    <?= $form->field($model, 'estado')->dropDownList(ArrayHelper::map($array,'id','estado'),['prompt' => 'Seleccione un estado']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
	
    <?php ActiveForm::end(); ?>

</div>
