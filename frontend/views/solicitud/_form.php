<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Areas;
use app\models\Equipos;
use yii\helpers\ArrayHelper;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use yii\widgets\Pjax;
use yii\widgets\ListView; 
/* @var $this yii\web\View */
/* @var $model app\models\Solicitud */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="solicitud-form">

    <?php $form = ActiveForm::begin(); ?>
<? /*$data = Equipos::find()
->select(['nombre_equipo as label','id_equipo as value'])
->where(['id_area' => Yii::$app->user->identity->id_departamento])
->asArray()
->all();
*/
?>
<? $areas = Areas::find()->all();
        $areaslista = ArrayHelper::map($areas,'id_area','nombre_area');?>

       <? 
       if (Yii::$app->user->identity->rol_id==2) {
           $equipos = Equipos::find()->all();
       }else
       {
       $equipos = Equipos::find()
       ->where(['id_area' => Yii::$app->user->identity->id_departamento])
       ->all();
   }
       $equiposlista = ArrayHelper::map($equipos,'id_equipo','clave_equipo');?>
   

    <?= /*$form->field($model, 'id_equipo')->widget(Autocomplete::className(),['clientOptions' =>['source' => $data,
    	'name' => 'equipo',
    	'id' => 'ddd'],
    ])->label('Equipo')

     */

    $form->field($model, 'id_equipo')->dropDownList($equiposlista,['prompt' => 'Seleccione el equipo'])->label('Equipo')?>
    <?= $form->field($model, 'id_area')->hiddenInput(['value' => Yii::$app->user->identity->id_departamento])->label(false); ?>

    <?// $form->field($model, 'estado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha')->hiddenInput(['value' => date("Y-m-d H:i:s")])->label(false); ?>
    
    <? if (Yii::$app->user->identity->rol_id==2) {
        echo $form->field($model,'estado')->radioList(array('Aceptado'=>'Aceptado', 'Rechazado'=>'Rechazado'));
    }else
    {

    echo $form->field($model, 'estado')->hiddenInput(['value' => 'Pendiente'])->label(false); 
    }?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <div>
  <?Pjax::begin(['enablePushState' => false]);?>
      
      <?
      Pjax::end();
            ?>


      
    </div>
    <?php ActiveForm::end(); ?>

</div>
