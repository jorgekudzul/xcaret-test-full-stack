<?php

use macgyer\yii2materializecss\lib\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DefRestricciones */

$this->title = Yii::t('app', 'Update Restricciones: {name}', [
    'name' => $model->iddef_restricciones,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Restricciones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->iddef_restricciones, 'url' => ['view', 'id' => $model->iddef_restricciones]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="def-restricciones-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
