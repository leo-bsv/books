<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Book */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'year')->textInput() ?>

    <?= Html::activeLabel($model, 'genre') ?>
    <?= $form->field($model, 'genre_id')->dropDownList($genre_list)->label(false) ?>

    <?= Html::activeLabel($model, 'authors') ?>
    <div class="form-control book-authors-list">
        <?= $form->field($model, 'authors')->checkboxList($author_list,['separator' => '<br>'])->label(false) ?>
    </div>

    <?= $form->field($model, 'image_file')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
