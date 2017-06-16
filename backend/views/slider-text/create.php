<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\SliderText */

$this->title = Yii::t('backend', 'Create Slider Text');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Slider Texts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slider-text-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
