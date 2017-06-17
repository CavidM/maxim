<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use backend\models\Status;
use sjaakp\sortable\SortableGridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Pages');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pages-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('backend', 'Create Pages'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= SortableGridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'orderUrl' => ['order'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'ord',
            'url:url',
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

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} {order}',
                /*'buttons' => [

                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                            'title' => Yii::t('app', 'lead-update'),
                        ]);
                    },

                    'order' => function ($url) {

                        return Html::a('=', $url);
                    }


                ],
                'urlCreator' => function ( $action, $model, $key, $index, $thi) {
                    if($action == 'order') {

//                        \yii\helpers\VarDumper::dump($thi->grid->dataProvider,6,true); die();
//                        \yii\helpers\VarDumper::dump($model,6,true); die();

                        echo $action . ' - ' .$model->name. ' - ' . $key . ' - '. $index."<br>";

                        return $action . ' - ' . ' - ' . $key . ' - '. $index;
                    }
                }*/
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
