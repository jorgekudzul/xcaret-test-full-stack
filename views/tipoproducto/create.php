<?php

use macgyer\yii2materializecss\lib\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DefTipoProducto */

$this->title = Yii::t('app', 'Create Tipo Producto');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tipo Productos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="def-tipo-producto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
