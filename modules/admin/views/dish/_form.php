<?php

	use kartik\select2\Select2;
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;

	/* @var $this yii\web\View */
	/* @var $model app\models\dish\DishSearch */
	/* @var $form yii\widgets\ActiveForm */
?>
	<div class="dish-search">

		<?php $form = ActiveForm::begin(); ?>

		<?= $form->field($model, 'title') ?>
		<?= $form->field($model, 'text') ?>
		<?= Select2::widget([
			'name' => 'ingredients',
			'value' => $ingredients_in,
			'data' => $ingredients_list,
			'options' => [
				'multiple' => true,
				'placeholder' => 'Выберите ингредиент',
			]
		]); ?>

		<div class="form-group">
			<?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
		</div>

		<?php ActiveForm::end(); ?>

	</div>
<?php
