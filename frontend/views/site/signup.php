<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\Areas;

$this->title = 'Registro';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Por favor llene los campos para poder darse de alta:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            <? $areas = Areas::find()->all();
            $areaslista = ArrayHelper::map($areas,'id_area','nombre_area');
            ?>
                <?= $form->field($model, 'nombre') ?>

                <?= $form->field($model, 'username')->label('Nombre de usuario') ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput()->label('Contraseña') ?>
                
                <?= $form->field($model,'id_departamento')->dropDownList($areaslista,['prompt'=>'Selecciona tu departamento'])->label('Departamento')?>
                <div class="form-group">
                    <?= Html::submitButton('Registrar', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
