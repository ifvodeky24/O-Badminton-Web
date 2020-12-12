<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Topup */
?>
<div class="topup-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_topup',
            'id_pengguna',
            'jumlah',
            'bukti_transfer',
            'status',
            'createdAt',
            'updatedAt',
        ],
    ]) ?>

</div>
