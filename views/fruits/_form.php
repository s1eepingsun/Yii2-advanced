<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Fruits */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fruits-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 52]) ?>

    <?= $form->field($model, 'color')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'weight')->textInput() ?>

    <?= $form->field($model, 'somedata1')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
