<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tindakans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tindakan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tindakan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_tindakan',
            'id_pasien',
            'tindakan_ke',
            'hasil_periksa',
            'hasil_perkembangan',
            //'tanggal',
            //'id_obat',
            //'id_pegawai_pj',
            //'tarif',
            //'status_bayar',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
