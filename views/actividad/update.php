<?php

use macgyer\yii2materializecss\lib\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DefActividad */

$this->title = Yii::t('app', 'Update Actividad: {name}', [
    'name' => $model->iddef_actividad,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Def Actividads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->iddef_actividad, 'url' => ['view', 'id' => $model->iddef_actividad]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="def-actividad-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
