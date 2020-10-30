<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tindakan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tindakan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_tindakan')->textInput() ?>

    <?= $form->field($model, 'id_pasien')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tindakan_ke')->textInput() ?>

    <?= $form->field($model, 'hasil_periksa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hasil_perkembangan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal')->textInput() ?>

    <?= $form->field($model, 'id_obat')->textInput() ?>

    <?= $form->field($model, 'id_pegawai_pj')->textInput() ?>

    <?= $form->field($model, 'tarif')->textInput() ?>

    <?= $form->field($model, 'status_bayar')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
