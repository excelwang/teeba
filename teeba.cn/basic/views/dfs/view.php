<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Dfs */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '并行文件系统测试'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dfs-view">

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
            'id',
            'type',
            'min_file_size',
            'max_file_size',
			'isDirectIO:boolean', 
           'isSumClose:boolean', 
           'isSyncTest:boolean', 
           'status', 
            'atime',
            'status',
            'summary:ntext',
            'log:html',
        ],
    ]) ?>

</div>
