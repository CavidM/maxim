<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Team */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Team',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Teams'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="team-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
