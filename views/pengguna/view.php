<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pengguna */
?>
<div class="pengguna-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_pengguna',
            'username',
            'nama_lengkap',
            'password',
            'email:email',
            'alamat',
            'no_hp',
            'foto',
            'no_rekening',
            'nama_bank',
            'total_saldo',
            'createdAt',
            'updatedAt',
        ],
    ]) ?>

</div>
