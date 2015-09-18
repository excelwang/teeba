<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Ycsb */

$this->title = Yii::t('app', '发起 YCSB 并行数据库测试', [
    'modelClass' => 'Ycsb',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'YCSB 并行数据库测试'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ycsb-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
