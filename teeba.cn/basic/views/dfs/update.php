<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dfs */

$this->title = Yii::t('app', '更新并行文件系统测试: ', [
    'modelClass' => 'Dfs',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '并行文件系统测试'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', '更新');
?>
<div class="dfs-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
