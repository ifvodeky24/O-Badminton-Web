<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Gor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_gor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat_gor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'longitude')->textInput() ?>

    <?= $form->field($model, 'latitude')->textInput() ?>

    <?= $form->field($model, 'deskripsi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jumlah_lapangan')->textInput() ?>

    <?= $form->field($model, 'foto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fasilitas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_pengelola')->textInput() ?>

    <!-- <?= $form->field($model, 'createdAt')->textInput() ?>

    <?= $form->field($model, 'updatedAt')->textInput() ?> -->

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
