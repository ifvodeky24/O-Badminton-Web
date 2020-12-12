<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pemesanan */
?>
<div class="pemesanan-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_pemesanan',
            'id_pengguna',
            'id_lapangan',
            'status',
            'id_jadwal',
            'createdAt',
            'updatedAt',
        ],
    ]) ?>

</div>
