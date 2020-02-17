<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DefServicios */

$this->title = Yii::t('app', 'Update Servicios: {name}', [
    'name' => $model->iddef_servicios,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Servicios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->iddef_servicios, 'url' => ['view', 'iddef_servicios' => $model->iddef_servicios, 'iddef_tipo_servicio' => $model->iddef_tipo_servicio]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="def-servicios-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
