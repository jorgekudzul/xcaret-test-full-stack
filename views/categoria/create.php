<?php

use macgyer\yii2materializecss\lib\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DefCategoria */

$this->title = Yii::t('app', 'Create Def Categoria');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categorias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="def-categoria-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
