<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Dfs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dfs-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type')->dropDownList([ 'big' => 'Big', 'small' => 'Small', '' => '', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'min_file_size')->textInput() ?>

    <?= $form->field($model, 'max_file_size')->textInput() ?>
	
	<?= $form->field($model, 'isDirectIO')->checkbox() ?> 
 
   <?= $form->field($model, 'isSumClose')->checkbox() ?> 
 
   <?= $form->field($model, 'isSyncTest')->checkbox() ?> 
 

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
