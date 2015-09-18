<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\YcsbSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ycsb-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'recordcount') ?>

    <?= $form->field($model, 'operationcount') ?>

    <?= $form->field($model, 'readallfields') ?>

    <?= $form->field($model, 'readproportion') ?>

    <?= $form->field($model, 'updateproportion') ?>

    <?php // echo $form->field($model, 'scanproportion') ?>

    <?php // echo $form->field($model, 'insertproportion') ?>

    <?php // echo $form->field($model, 'requestdistribution') ?>

    <?php // echo $form->field($model, 'id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
