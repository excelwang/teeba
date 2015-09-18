<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DfsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '并行文件系统测试');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dfs-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', '发起新测试', [
    'modelClass' => '并行文件系统测试',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'id',
            'type',
            'min_file_size',
            'max_file_size',
			'isDirectIO:boolean', 
           'isSumClose:boolean', 
           'isSyncTest:boolean', 
            'status',
            'atime',
            'summary:ntext',
            'log:html',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
