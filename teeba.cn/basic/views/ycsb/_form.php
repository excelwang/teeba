<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Ycsb */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ycsb-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'recordcount')->textInput(['maxlength' => 6])//原来是20,测试环境限制为6 ?>

    <?= $form->field($model, 'operationcount')->textInput(['maxlength' => 6])//原来是20,测试环境限制为6 ?>

    <?= $form->field($model, 'readallfields')->checkbox() ?>

    <?= $form->field($model, 'readproportion')->textInput() ?>

    <?= $form->field($model, 'updateproportion')->textInput() ?>

    <?= $form->field($model, 'scanproportion')->textInput() ?>

    <?= $form->field($model, 'insertproportion')->textInput() ?>

    <?= $form->field($model, 'requestdistribution')->dropDownList([ 'zipfian' => 'Zipfian', 'uniform' => 'Uniform', 'latest' => 'Latest', ], ['prompt' => '']) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', '创建') : Yii::t('app', '更新'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
