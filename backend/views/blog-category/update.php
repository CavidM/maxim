<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BlogCategory */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Blog Category',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Blog Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="blog-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
