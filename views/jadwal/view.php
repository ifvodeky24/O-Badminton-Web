<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Jadwal */
?>
<div class="jadwal-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_jadwal',
            'id_lapangan',
            'hari',
            'jam',
            'status',
            'createdAt',
            'updatedAt',
        ],
    ]) ?>

</div>
