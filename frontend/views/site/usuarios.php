<?
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
$this->title = 'Usuarios';
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
        
        ['label' => 'Equipos', 'url' => ['site/equipos']],
           
        
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
        <h1>Usuarios</h1>

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
                    <td><input type="text" class="form-control"></td>

                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>Departamento</th>
                    <th>Permisos</th>
                    <th>Autorizado</th>
                    <th>&nbsp;</th>
                </tr>
                <tr><td>Humberto Jose cen Meza</td>
                <td>jose122946</td>
                <td>Biomédica</td>
                <td>Administrador</td>
                <td>Si</td>
                <td><img src="<?=Yii::getAlias('@web');?>/imagenes/editar.png" width="24" height="24" alt=""><img src="<?=Yii::getAlias('@web');?>/imagenes/delete.png" width="24" height="24" alt=""></td>
                </tr>
                <tr><td>Alvin Alberto Perez Hernandez</td>
                <td>alvin123</td>
                <td>Imageneología</td>
                <td>Usuario</td>
                <td>Si</td>
                <td><a href=""><img src="<?=Yii::getAlias('@web');?>/imagenes/editar.png" width="24" height="24" alt=""></a><a href=""><img src="<?=Yii::getAlias('@web');?>/imagenes/delete.png" width="24" height="24" alt=""></a><a href=""><img src="<?=Yii::getAlias('@web');?>/imagenes/autorizar.png" width="24" height="24" alt=""></a></td>
                </tr>
                <tr><td>Roberto Salgado Huchim</td>
                <td>Robert98</td>
                <td>Urgencias</td>
                <td>Biomedico</td>
                <td>Si</td>
                <td><img src="<?=Yii::getAlias('@web');?>/imagenes/editar.png" width="24" height="24" alt=""><img src="<?=Yii::getAlias('@web');?>/imagenes/delete.png" width="24" height="24" alt=""></td>
                </tr>
            </table>
                </div>
            
        </div>

    </div>
</div>
