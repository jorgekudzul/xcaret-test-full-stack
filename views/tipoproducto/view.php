<?php

use macgyer\yii2materializecss\lib\Html;
use macgyer\yii2materializecss\widgets\form\data\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DefTipoProducto */

$this->title = $model->iddef_tipo_producto;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Def Tipo Productos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="def-tipo-producto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->iddef_tipo_producto], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->iddef_tipo_producto], [
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
            'iddef_tipo_producto',
            'tipo',
            'descripcion',
            'estado',
            'usuario_creacion',
            'fecha_creacion',
        ],
    ]) ?>

</div>
