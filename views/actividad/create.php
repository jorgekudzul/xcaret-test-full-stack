<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DefActividad */

$this->title = Yii::t('app', 'Create Actividad');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Actividads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="def-actividad-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
