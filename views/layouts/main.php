<?php

/* @var $this \yii\web\View */
/* @var $content string */

use macgyer\yii2materializecss\lib\Html;
use macgyer\yii2materializecss\widgets\navigation\Nav;
use macgyer\yii2materializecss\widgets\navigation\NavBar;
use macgyer\yii2materializecss\widgets\navigation\Breadcrumbs;
use macgyer\yii2materializecss\widgets\Alert;
use app\components\helpers\MenuHelper;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">

    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>

    <body>
    <?php $this->beginBody() ?>

        <header class="page-header">
            <?php
            NavBar::begin([
                'brandLabel' => '<b>XCARET</b>',
                'brandUrl' => Yii::$app->homeUrl,
                'fixed' => true,
                'wrapperOptions' => [
                    'class' => 'blue'
                ],
            ]);

            echo Nav::widget([
                'options' => ['class' => 'right blue'],
                // 'items' => $menuItems,
                'items' => MenuHelper::getItems(),
            ]);

            NavBar::end();
            ?>
        </header>

        <main class="content">
            <div class="container">

                <?= Alert::widget() ?>
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    'options' => ['class' => 'flat expand']
                ]) ?>
                <?= $content ?>
            </div>
        </main>

        <footer class="footer page-footer blue">
            <div class="container blue">
                <div class="row">
                    <div class="col l6 s12">
                        <!-- <h5 class="white-text">Síguenos</h5> -->
                        <p class="grey-text text-lighten-4">Xcaret es una empresa 100% mexicana.</p>
                    </div>
                    <div class="col l4 offset-l2 s12">
                        <!-- <h5 class="white-text">Síguenos</h5>
                        <ul>
                            <a class="waves-effect waves-light btn-floating social facebook">
                            <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                        </ul> -->
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    &copy; XCARET <?= date('Y') ?>
                </div>
            </div>
        </footer>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>

<style media="screen">
.container {
  width: 95%;
}

body {
  display: flex;
  min-height: 100vh;
  flex-direction: column;
}

main {
  flex: 1 0 auto;
}
.sidenav-trigger {
  display:none;
}
.breadcrumbs {
    background-color: #00b8ff;
}
</style>
