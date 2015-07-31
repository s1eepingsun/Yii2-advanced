<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FruitsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Fruits');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fruits-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Fruits'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <p><?= Yii::t('app', 'List View') ?></p>
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            return Html::a(Html::encode($model->name), ['view', 'id' => $model->id]);
        },
    ]) ?>

    
    <p>Grdid View</p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'weight',
            'color',
            'somedata1',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
