<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CorrectivasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="correctivas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_correctiva') ?>

    <?= $form->field($model, 'id_equipo') ?>

    <?= $form->field($model, 'fecha_inicio') ?>

    <?= $form->field($model, 'dias') ?>

    <?= $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'diagnostico') ?>

    <?php // echo $form->field($model, 'reparacion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
