<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PengelolaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pengelola-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_pengelola') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'nama_lengkap') ?>

    <?= $form->field($model, 'password') ?>

    <?= $form->field($model, 'alamat') ?>

    <?php // echo $form->field($model, 'no_hp') ?>

    <?php // echo $form->field($model, 'foto') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
