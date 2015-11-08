<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Preventivas */

$this->title = 'Mantenimientos Preventivos';
$this->params['breadcrumbs'][] = ['label' => 'Preventivas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="preventivas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
	<div id ="contenedor1"></div>
</div>
