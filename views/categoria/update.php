<?php

use macgyer\yii2materializecss\lib\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DefCategoria */

$this->title = Yii::t('app', 'Update Categoria: {name}', [
    'name' => $model->iddef_categoria,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categorias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->iddef_categoria, 'url' => ['view', 'id' => $model->iddef_categoria]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="def-categoria-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
