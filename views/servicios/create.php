<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DefServicios */

$this->title = Yii::t('app', 'Create Servicios');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Servicios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="def-servicios-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
