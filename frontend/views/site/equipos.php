<?
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
$this->title = 'Equipos';
?>
<div class="">
<?php
    NavBar::begin([
        'brandLabel' => '',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        
        ['label' => 'Usuarios', 'url' => ['site/usuarios']],
           
        
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
    <div class="jumbotron">
        <h1>Equipos</h1>

        <p class="lead"></p>

        
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-100">
            <table class="table">
                <tr>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>

                    <th>Nombre</th>
                    <th>Clave</th>
                    <th>Modelo</th>
                    <th>Departamento</th>
                    
                    <th>&nbsp;</th>
                </tr>
                <tr><td>Incubadora</td>
                <td>GSFV-123</td>
                <td>IN-16</td>
                <td>Tocología</td>
                
                <td><img src="<?=Yii::getAlias('@web');?>/imagenes/editar.png" width="24" height="24" alt=""><img src="<?=Yii::getAlias('@web');?>/imagenes/delete.png" width="24" height="24" alt=""></td>
                </tr>
                <tr><td>Electrocardiograma</td>
                <td>FRT-9</td>
                <td>EC-22</td>
                <td>Tocología</td>
                
                <td><img src="<?=Yii::getAlias('@web');?>/imagenes/editar.png" width="24" height="24" alt=""><img src="<?=Yii::getAlias('@web');?>/imagenes/delete.png" width="24" height="24" alt=""></td>
                </tr>
                <tr><td>Tomógrago</td>
                <td>TG-34</td>
                <td>ABE-3</td>
                <td>Tocología</td>
                
                <td><img src="<?=Yii::getAlias('@web');?>/imagenes/editar.png" width="24" height="24" alt=""><img src="<?=Yii::getAlias('@web');?>/imagenes/delete.png" width="24" height="24" alt=""></td>
                </tr>
            </table>
                </div>
            
        </div>

    </div>
</div>
