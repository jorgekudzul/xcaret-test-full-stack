<?php

use macgyer\yii2materializecss\lib\Html;
use macgyer\yii2materializecss\widgets\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DefActividadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Def Actividads');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="def-actividad-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Def Actividad'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'iddef_actividad',
            'nombre',
            'descripcion',
            'iddef_categoria',
            'iddef_restricciones',
            //'estado',
            //'usuario_creacion',
            //'fecha_creacion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
