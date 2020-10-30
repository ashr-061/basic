<?php
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;
?>
<div class="row">
	<div class="col-sm-6">
		<?php
		$form = ActiveForm::begin([
			'method' => 'post',
			'action' => Url::to(['site/antrian']),
		]);
		?>
		<?= $form->field($model, 'ping')->textInput() ?>

		<div class="form-group">
			<?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
		</div>

		<?php
		ActiveForm::end();
		?>
	</div>
</div>