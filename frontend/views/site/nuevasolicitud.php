<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Solicitud */
/* @var $form ActiveForm */
?>
<div class="site-nuevasolicitud">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'clave_equipo') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-nuevasolicitud -->
