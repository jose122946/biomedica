<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Areas;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Equipos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="equipos-form">
<?$areas = Areas::find()->all();
            $areaslista = ArrayHelper::map($areas,'id_area','nombre_area');?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre_equipo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'clave_equipo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modelo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_area')->dropDownList($areaslista,['prompt'=>'Selecciona tu departamento'])->label('Departamento') ?>

    <?= $form->field($model, 'marca')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcionins')->textInput(['maxlength' => false]) ?>
    
    <?= $form->field($model, 'descripcionesp')->textInput() ?>
    
    <?= $form->field($model, 'fisico')->textInput() ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
