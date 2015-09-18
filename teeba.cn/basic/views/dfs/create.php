<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Dfs */

$this->title = Yii::t('app', '创建 {modelClass}', [
    'modelClass' => '并行文件系统测试',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '并行文件系统测试'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dfs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
