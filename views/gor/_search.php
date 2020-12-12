<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_gor') ?>

    <?= $form->field($model, 'nama_gor') ?>

    <?= $form->field($model, 'alamat_gor') ?>

    <?= $form->field($model, 'longitude') ?>

    <?= $form->field($model, 'latitude') ?>

    <?php // echo $form->field($model, 'deskripsi') ?>

    <?php // echo $form->field($model, 'jumlah_lapangan') ?>

    <?php // echo $form->field($model, 'foto') ?>

    <?php // echo $form->field($model, 'fasilitas') ?>

    <?php // echo $form->field($model, 'id_pengelola') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
