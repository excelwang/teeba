<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ycsb */

$this->title = Yii::t('app', '更新 YCSB 测试: ', [
    'modelClass' => 'Ycsb',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ycsbs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="ycsb-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
