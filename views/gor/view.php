<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Gor */
?>
<div class="gor-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_gor',
            'nama_gor',
            'alamat_gor',
            'longitude',
            'latitude',
            'deskripsi',
            'jumlah_lapangan',
            'foto',
            'fasilitas',
            'id_pengelola',
            'createdAt',
            'updatedAt',
        ],
    ]) ?>

</div>
