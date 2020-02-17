<?php

use macgyer\yii2materializecss\lib\Html;
use macgyer\yii2materializecss\widgets\data\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DefServicios */

$this->title = $model->iddef_servicios;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Servicios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="def-servicios-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'iddef_servicios' => $model->iddef_servicios, 'iddef_tipo_servicio' => $model->iddef_tipo_servicio], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'iddef_servicios' => $model->iddef_servicios, 'iddef_tipo_servicio' => $model->iddef_tipo_servicio], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'iddef_servicios',
            'nombre',
            'iddef_tipo_servicio',
            'id_producto',
            'descripcion',
            'horario',
            'latitud',
            'longitud',
            'estado',
            'usuario_creacion',
            'fecha_creacion',
        ],
    ]) ?>

</div>
