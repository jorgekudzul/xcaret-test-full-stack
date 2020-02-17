<?php

use macgyer\yii2materializecss\lib\Html;
use macgyer\yii2materializecss\widgets\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DefTipoProductoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Def Tipo Productos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="def-tipo-producto-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Tipo Producto'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'iddef_tipo_producto',
            'tipo',
            'descripcion',
            'estado',
            'usuario_creacion',
            //'fecha_creacion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
