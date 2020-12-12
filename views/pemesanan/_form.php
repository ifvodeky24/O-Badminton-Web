<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pemesanan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pemesanan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_pengguna')->textInput() ?>

    <?= $form->field($model, 'id_lapangan')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Menunggu Konfirmasi' => 'Menunggu Konfirmasi', 'Sedang Memesan' => 'Sedang Memesan', 'Selesai' => 'Selesai', 'Batal' => 'Batal', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'id_jadwal')->textInput() ?>

    <?= $form->field($model, 'createdAt')->textInput() ?>

    <?= $form->field($model, 'updatedAt')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
