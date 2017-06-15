<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Blog */

$this->title = Yii::t('backend', 'Create Blog');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Blogs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
