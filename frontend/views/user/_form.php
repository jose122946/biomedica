<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Areas;
/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
	<?
	$areas = Areas::find()->all();
            $areaslista = ArrayHelper::map($areas,'id_area','nombre_area');
	?>
    <?= $form->field($model, 'status')->label('Estado')->radioList(array('10'=>'Activo', '0'=>'Inactivo')); ?>
	<?= $form->field($model, 'rol_id')->radioList(array('1'=>'Usuario', '2'=>'Biomedica','3'=>'Administrador'));?>
    <?= $form->field($model, 'id_departamento')->dropDownList($areaslista,['prompt' => 'Seleccione el area']);?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
