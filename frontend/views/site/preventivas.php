<?
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
$this->title = 'Preventivas';
?>
<div class="">

    <div class="jumbotron">
        <h1>Mantenimiento Preventivo</h1>

       
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
                     
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    
                    <th>Nombre de equipo</th>
                    <th>Clave</th>
                    <th>Próximo Mantenimiento</th>
                    <th>Fecha de término</th>
                    <th>Estado</th>
                    <th>&nbsp;</th>
                </tr>
                <tr><td>Incubadora</td>
                <td>TG-32</td>
                <td>6-oct-2015</td>
                <td>10-oct-2015</td>
                <td>Pendiente</td>
                
                <td><img src="<?=Yii::getAlias('@web');?>/imagenes/editar.png" width="24" height="24" alt=""><img src="<?=Yii::getAlias('@web');?>/imagenes/delete.png" width="24" height="24" alt=""></td>
                </tr>
                <tr><td>Rayo X</td>
                <td>MH-34</td>
                <td>31-sep-2015</td>
                <td>05-oct-2015</td>
                <td>En Mantenimiento</td>

                <td><a href=""><img src="<?=Yii::getAlias('@web');?>/imagenes/editar.png" width="24" height="24" alt=""></a><a href=""><img src="<?=Yii::getAlias('@web');?>/imagenes/delete.png" width="24" height="24" alt=""></a></td>
                </tr>
                <tr><td>Electrocardiograma</td>
                <td>LF-11</td>
                <td>22-sep-2015</td>
                <td>25-sep-2015</td>
                <td>Terminado</td>
                
                <td><img src="<?=Yii::getAlias('@web');?>/imagenes/editar.png" width="24" height="24" alt=""><img src="<?=Yii::getAlias('@web');?>/imagenes/delete.png" width="24" height="24" alt=""><a href=""><img src="<?=Yii::getAlias('@web');?>/imagenes/informe.png" width="24" height="24" alt=""></a></td>
                </tr>
            </table>
                </div>
            
        </div>

    </div>
</div>
