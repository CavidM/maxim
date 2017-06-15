<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Blog */
/* @var $form yii\widgets\ActiveForm */


if($model->category)
    $model->category = explode(',', $model->category);

?>

<div class="blog-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <?php if($model->image){

        echo  Html::img(Yii::$app->request->baseUrl.'/../uploads/blog/'.$model->image, ['height' => 200]);

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

    <?= $form->field($model, 'status')->checkboxList([
        1 => yii::t('backend', 'active')
    ]);
    ?>

    <?=
    $form->field($model, 'date')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter birth date ...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'mm/dd/yyyy'
        ]
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
