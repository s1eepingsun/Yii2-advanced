<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'page for pages1';
$this->params['breadcrumbs'][] = $this->title;
$this->registerMetaTag(['name' => 'keywords', 'content' => 'yii, framework, js, kirill']);

?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        This page is not defined in the controller. s
    </p>
    
    
</div>