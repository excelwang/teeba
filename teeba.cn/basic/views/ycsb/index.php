<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\YcsbSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'YCSB 并行数据库测试');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ycsb-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', '发起新测试', [
    'modelClass' => 'Ycsb',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'recordcount',
            'operationcount',
            'requestdistribution',
            'status',
            'summary:html',
            'log:html',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
