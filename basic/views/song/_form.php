<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Song $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="song-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'artist')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'timeline')->textInput() ?>

    <?= $form->field($model, 'album')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'filephoto')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
