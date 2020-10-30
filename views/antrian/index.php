<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Antrians';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="antrian-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
        if(Yii::$app->user->getIdentity()){
            $user_role = Yii::$app->user->identity->role;
            if($user_role == 'Pasien'){
                echo Html::a('Daftar Antrian', ['create'], ['class' => 'btn btn-success']);
                echo '</p>';
                echo GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                            'id_antrian',
                            'no_ktp',
                            'poli',
                            'tanggal',
                            'sudah_dilayani',
                            'keterangan',
                    ],
                ]); 

            } else if($user_role == 'Pegawai'){
                echo Html::a('Create Antrian', ['create'], ['class' => 'btn btn-success']);
                echo '</p>';
                echo GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                            'id_antrian',
                            'no_ktp',
                            'poli',
                            'tanggal',
                            'sudah_dilayani',
                            'keterangan',

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); 
            } else if($user_role == 'Admin'){
                echo Html::a('Create Antrian', ['create'], ['class' => 'btn btn-success']);
                echo '</p>';
                echo GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                            'id_antrian',
                            'no_ktp',
                            'poli',
                            'tanggal',
                            'sudah_dilayani',
                            'keterangan',

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); 
            }
        } 
        ?>


</div>
