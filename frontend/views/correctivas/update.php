<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Correctivas */

$this->title = 'Update Correctivas: ' . ' ' . $model->id_correctiva;
$this->params['breadcrumbs'][] = ['label' => 'Correctivas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_correctiva, 'url' => ['view', 'id' => $model->id_correctiva]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="correctivas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
