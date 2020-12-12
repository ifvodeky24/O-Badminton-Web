<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pengelola */
?>
<div class="pengelola-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_pengelola',
            'username',
            'email:email',
            'nama_lengkap',
            'password',
            'alamat',
            'no_hp',
            'foto',
            'createdAt',
            'updatedAt',
        ],
    ]) ?>

</div>
