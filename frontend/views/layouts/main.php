<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;

use backend\models\Pages;

$pages = new Pages();

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="img/favicon.ico">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<!-- navbar -->
<div class="navbar-wrapper">
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <!-- Responsive navbar -->
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                </a>
                <h1 class="brand"><a href="/">Maxim</a></h1>
                <!-- navigation -->
                <nav class="pull-right nav-collapse collapse">
                    <ul id="menu-main" class="nav">

                        <?php foreach ($pages->pages as $k => $v): ?>

                            <li data-key="<?=$v['id']?>"><a title="<?= $v['name'] ?>" href="<?=Url::to(['/'.$v["url"]])?>"><?= $v['name'] ?></a></li>

                        <?php endforeach; ?>

                        <li ><a title="admin" href="<?=Url::to(['/admin'])?>"> Admin </a></li>

                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= Alert::widget() ?>
    <?= $content ?>


<footer>
    <div class="container">
        <div class="row">
            <div class="span6 offset3">
                <ul class="social-networks">
                    <li><a href="#"><i class="icon-circled icon-bgdark icon-instagram icon-2x"></i></a></li>
                    <li><a href="#"><i class="icon-circled icon-bgdark icon-twitter icon-2x"></i></a></li>
                    <li><a href="#"><i class="icon-circled icon-bgdark icon-dribbble icon-2x"></i></a></li>
                    <li><a href="#"><i class="icon-circled icon-bgdark icon-pinterest icon-2x"></i></a></li>
                </ul>
                <p class="copyright">
                    &copy; Maxim Theme. All rights reserved.
                <div class="credits">
                    <!--
                        All the links in the footer should remain intact.
                        You can delete the links only if you purchased the pro version.
                        Licensing information: https://bootstrapmade.com/license/
                        Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Maxim
                    -->
                    <a href="https://bootstrapmade.com/">Free Bootstrap Themes</a> by BootstrapMade.com
                </div>
                </p>
            </div>
        </div>
    </div>
    <!-- ./container -->
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
