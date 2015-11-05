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

    <div class="jumbotron">
        <h1>Solicitudes</h1>

       
    </div>

    <div class="body-content">

        <div class="row">
            <div class="">
            <table class="table">
                 <tr>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                     <td><input type="text" class="form-control"></td>

                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <th>Solicitante</th>
                    <th>Clave de equipo</th>
                    <th>Nombre de equipo</th>
                    <th>Departamento</th>
                    <th>Fecha</th>
                    <th>Autorizado</th>
                    <th>&nbsp;</th>
                </tr>
                <tr><td>Humberto Jose cen Meza</td>
                <td>TG-32</td>
                <td>Incubadora</td>
                <td>Tocología</td>
                <td>29-sep-2015</td>
                <td>Si</td>
                <td><img src="<?=Yii::getAlias('@web');?>/imagenes/editar.png" width="24" height="24" alt=""><img src="<?=Yii::getAlias('@web');?>/imagenes/delete.png" width="24" height="24" alt=""></td>
                </tr>
                <tr><td>Alvin Alberto Perez Hernandez</td>
                <td>MH-34</td>
                <td>Rayo X</td>
                <td>Imageneología</td>
                <td>30-sep-2015</td>
                <td>No</td>
                <td><a href=""><img src="<?=Yii::getAlias('@web');?>/imagenes/editar.png" width="24" height="24" alt=""></a><a href=""><img src="<?=Yii::getAlias('@web');?>/imagenes/delete.png" width="24" height="24" alt=""></a><a href=""><img src="<?=Yii::getAlias('@web');?>/imagenes/autorizar.png" width="24" height="24" alt=""></a></td>
                </tr>
                <tr><td>Alberto del Rio</td>
                <td>LF-11</td>
                <td>Electrocardiograma</td>
                <td>Cardiología</td>
                <td>25-sep-2015</td>
                <td>si</td>
                <td><img src="<?=Yii::getAlias('@web');?>/imagenes/editar.png" width="24" height="24" alt=""><img src="<?=Yii::getAlias('@web');?>/imagenes/delete.png" width="24" height="24" alt=""></td>
                </tr>
            </table>
                </div>
            
        </div>

    </div>
</div>
