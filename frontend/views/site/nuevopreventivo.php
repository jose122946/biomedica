<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */


use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
$this->title = 'Nueva mantenimiento preventivo';
$this->params['breadcrumbs'][] = $this->title;
?>
<?
NavBar::begin([
        'brandLabel' => '',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        
        ['label' => 'Correctivos', 'url' => ['site/equipos']],
           
         ['label' => 'Solicitudes', 'url' => ['site/solicitudes']],
        ['label' => 'Contacto', 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Registro', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = [
            'label' => 'Cerrar sesión (' . Yii::$app->user->identity->username . ')',
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post']
        ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Por favor llene los campos para poder ingresar un nuevo mantenimiento preventivo :</p>

    <div class="row">
        <div class="col-lg-5">
            <form action="">
                <label for="">Clave</label><input type="text" name="" id="" class="form-control">

                <label for="">Fecha</label><input type="text" name="" id="" class="form-control"><br>
                <label for="">Dias </label><input type="text" name="" id="" class="form-control"><br>

                <button class="btn btn-primary">Enviar Solicitud</button>

            </form>
        </div>
    </div>
</div>
