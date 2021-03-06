<?php
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'Inicio';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Bienvenidos</h1>

        <p class="lead">Si no tienes una cuenta registrate aqui</p>

        <p><?= Html::a('Registro Aqui', ['/site/signup'], ['class' => 'btn btn-success']); ?></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-3">
                <h2>Misión</h2>

                <p class="justificado">Contribuir a satisfacer niveles de bienestar integral de los trabajadores al servicio del Estado, pensionados, jubilados y familiares derechohabientes, con el otorgamiento eficaz y eficiente de los seguros, prestaciones y servicios, con atención esmerada, respeto, calidad y cumpliendo siempre con los valores institucionales de honestidad, legalidad y transparencia.</p>

                </div>
            <div class="col-lg-4">
                <h2>Visión</h2>

                <p class="justificado">Posicionar al ISSSTE como la institución que garantice la protección integral de los trabajadores de la Administración Pública Federal, pensionados, jubilados y sus familias de acuerdo al nuevo perfil demográfico de la derechohabiencia, con el otorgamiento de seguros, prestaciones y servicios de conformidad con la normatividad vigente, bajo códigos normados de calidad y calidez, con solvencia financiera, que permitan generar valores y prácticas que fomenten la mejora sostenida de bienestar, calidad de vida y el desarrollo del capital humano.</p>

                 </div>
            
        </div>

    </div>
</div>
