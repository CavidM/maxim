<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\AutoComplete;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\Portfolio */
/* @var $form yii\widgets\ActiveForm */

if($model->category)
    $model->category = explode(',', $model->category);

?>

<div class="portfolio-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <?php if($model->image){

        echo  Html::img(Yii::$app->request->baseUrl.'/../uploads/portfolio/'.$model->image, ['height' => 200]);

    } ?>

    <?= $form->field($model, 'category')->widget(Select2::classname(), [
        'data' => ArrayHelper::map($model->categories, 'name', 'name'),
        'options' => [
            'placeholder' => 'Select a state ...',
            'multiple' => true
            ],
        'pluginOptions' => [
            'allowClear' => true
            ],
        ]);
    ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
