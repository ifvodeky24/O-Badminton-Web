<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Lapangan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lapangan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_gor')->textInput() ?>

    <?= $form->field($model, 'nomor_lapangan')->textInput() ?>

    <?= $form->field($model, 'harga')->textInput() ?>

    <?= $form->field($model, 'jenis')->dropDownList([ 'Sintetis' => 'Sintetis', 'Semen' => 'Semen', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'createdAt')->textInput() ?>

    <?= $form->field($model, 'updatedAt')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
