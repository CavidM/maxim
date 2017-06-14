<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Portfolio */

$this->title = Yii::t('backend', 'Create Portfolio');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Portfolios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portfolio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
