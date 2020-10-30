<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tindakan */

$this->title = 'Update Tindakan: ' . $model->id_tindakan;
$this->params['breadcrumbs'][] = ['label' => 'Tindakans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tindakan, 'url' => ['view', 'id' => $model->id_tindakan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tindakan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
