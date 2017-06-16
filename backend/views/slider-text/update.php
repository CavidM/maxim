<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SliderText */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Slider Text',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Slider Texts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => Html::decode($model->name), 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="slider-text-update">

    <h1><?= Html::decode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
