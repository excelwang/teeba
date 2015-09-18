<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DfsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dfs-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'type') ?>

    <?= $form->field($model, 'min_file_size') ?>

    <?= $form->field($model, 'max_file_size') ?>

    <?= $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'atime') ?>

    <?php // echo $form->field($model, 'summary') ?>

    <?php // echo $form->field($model, 'log') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', '搜索'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', '重置'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
