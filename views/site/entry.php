<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use yii\bootstrap\ActiveForm; 
?>
<?= "test русский"?>
<?php $form = ActiveForm::begin(['method' => 'get', 'action' => ['site/entry'], 'id' => 'custom_id', 'enableAjaxValidation' => false]); ?> <!--id as in CSS id here-->

    <?= $form->field($model, 'name')->label('Имя') ?>

    <?= $form->field($model, 'email')->input('email') ?>

    <div class="form-group">
        <?= Html::submitButton('Submittt', ['class' => 'btn btn-primary']) ?>
    </div>
    <div>
    <?= "form's id is ". $form->id ?>
    </div>
    
    
<?php ActiveForm::end(); ?>

<?= $model->test ?>