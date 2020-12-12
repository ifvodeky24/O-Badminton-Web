<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Lapangan */
?>
<div class="lapangan-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_lapangan',
            'id_gor',
            'nomor_lapangan',
            'harga',
            'jenis',
            'createdAt',
            'updatedAt',
        ],
    ]) ?>

</div>
