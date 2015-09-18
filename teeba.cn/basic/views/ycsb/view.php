<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Ycsb */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'YCSB 并行数据库测试'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ycsb-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if($model->status=="finish") {?><?= Html::a(Yii::t('app', 'Replay'), ['replay', 'id' => $model->id], ['class' => 'btn btn-primary']) ?><?php }?>
        <?= Html::a(Yii::t('app', '更新'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', '删除'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'recordcount',
            'operationcount',
            'readallfields:boolean',
            'readproportion',
            'updateproportion',
            'scanproportion',
            'insertproportion',
            'requestdistribution',
			'status',
			'summary:html',
			'log:html',
        ],
    ]) ?>

</div>
