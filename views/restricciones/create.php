<?php

use macgyer\yii2materializecss\lib\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DefRestricciones */

$this->title = Yii::t('app', 'Create Restricciones');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Restricciones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="def-restricciones-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
