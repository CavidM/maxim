<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use backend\models\Status;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ServiceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Services');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="services-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('backend', 'Create Services'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'description',
            [
                'attribute' => 'image',
                'format' => 'raw',
                'value' => function($model) {

                    return Html::img($model->memberImage, ['height' => 80]);
                }
            ],
            [
                'attribute' => 'status',
                'label' => 'status',
                'value' => function($model) {
                    return ($model->status) ? yii::t('backend', 'active') : yii::t('backend', 'deleted');
                },
                'filter'=>[
                    Status::STATUS_DELETED => yii::t('backend', 'deleted'),
                    Status::STATUS_ACTIVE => yii::t('backend', 'active')
                ],
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
