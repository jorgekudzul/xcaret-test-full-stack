<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use macgyer\yii2materializecss\lib\Html;
use macgyer\yii2materializecss\widgets\form\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
      <div class="container">
        <div class="row">
            <div class="col m4 offset-m4">
                <h2 class='center-align'><?= Html::encode($this->title) ?></h2>
                <div class="row">
                    <?php $form = ActiveForm::begin([
                        'id' => 'login-form',
                        // 'layout' => 'horizontal',
                        'class' => 'col s12',
                        'fieldConfig' => [
                            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                            'labelOptions' => ['class' => 'col-lg-1 control-label'],
                        ],
                    ]); ?>

                        <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'User'])->label(false) ?>

                        <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Password'])->label(false) ?>

                        <?= $form->field($model, 'rememberMe')->checkbox([
                            'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
                        ]) ?>

                        <div class="divider"></div>
                        <div class="row">
                            <div class="col m12">
                                <p class="right-align">
                                    <?= Html::submitButton('Login', ['class' => 'btn btn-large waves-effect waves-light blue lighten-1', 'name' => 'login-button']) ?>
                                </p>
                            </div>
                        </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
