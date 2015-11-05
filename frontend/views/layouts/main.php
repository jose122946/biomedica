<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
Yii::$app->language='es';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    
    <link rel="stylesheet" href="<?= Yii::getAlias('@web');?>/css/estilo.css">

    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    
    <?php

    NavBar::begin([
        'brandLabel' => '',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Inicio', 'url' => ['/site/index'],'visible' =>Yii::$app->user->isGuest],
        

        //['label'=> 'Usuarios', 'url' =>['/user/index'],'visible' =>!Yii::$app->user->isGuest && Yii::$app->user->identity->rol_id==3],
    ];
        
    if(!Yii::$app->user->isGuest && Yii::$app->user->identity->rol_id==3)
    {
        $menuItems[] =['label'=> 'Inicio', 'url' =>['/site/administrador']];
        $menuItems[] =['label'=> 'Usuarios', 'url' =>['/user/index']];
        $menuItems[] =['label'=> 'Equipos', 'url' =>['/equipos/index']];
        
        $menuItems[] =['label' => 'Roles', 'url' => ['/rol/index']];
        $menuItems[] =['label' => 'Permisos', 'url' => ['/operacion/index']];
        //$menuItems[] =['label' => 'Contacto', 'url' => ['/site/contact']];
        //$menuItems[] =['label'=> 'Usuarios', 'url' =>['/user/index']],
    }else
    {
    if(!Yii::$app->user->isGuest && Yii::$app->user->identity->rol_id==2)
    {
        $menuItems[] =['label'=> 'Inicio', 'url' =>['/site/biomedica']];
                $menuItems[] =['label' => 'Solicitudes', 'url' => ['/solicitud']];
        $menuItems[] =['label' => 'Reparaciones', 'url' => ['#'],'items' => [
            ['label' => 'Correctivas', 'url' => ['/correctivas']],
            ['label' => 'Preventivas', 'url' => ['/preventiva']]
           ]];
        //$menuItems[] =['label'=> 'Contacto', 'url' =>['/site/contact']];
    }
    else
    {
        if (!Yii::$app->user->isGuest && Yii::$app->user->identity->rol_id==1) {
            $menuItems[] =['label'=> 'Inicio', 'url' =>['/site/departamento']];
            $menuItems[] =['label'=> 'Solicitudes', 'url' =>['/solicitud']];
            
             $menuItems[] =['label' => 'Reparaciones', 'url' => ['#'],'items' => [
            ['label' => 'Correctivas', 'url' => ['/correctivas']],
            ['label' => 'Preventivas', 'url' => ['/preventiva']]
           ]];
        //$menuItems[] =['label'=> 'Contacto', 'url' =>['/site/contact']];
        }
    }
    }
        $menuItems[] =['label' => 'Contacto', 'url' => ['/site/contact']];

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

    echo '<br><br><br><img src="'.Yii::getAlias("@web").'/imagenes/issstelogo.png" alt="" width="200px" height="90px">';
        echo '<h3 class="titulo">Sistema para la gestión de equipo Biomédico</h3>';
   
    ?>

    <div class="container">
        
        <?= Alert::widget() ?>

        <?= $content ?>
        
   
    </div>
</div>

<footer class="footer">
    <div class="container">
    <img src="<?= Yii::getAlias('@web');?>/imagenes/footer.jpg" alt="">
        <p class="pull-left"></p>
        
        <p class="pull-right"></p>
        <p>&copy; ISSSTE derechos reservados <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
 <script src="<?= Yii::getAlias('@web');?>/js/script.js"></script>
</body>
</html>
<?php $this->endPage() ?>
