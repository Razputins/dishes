<?php

	use yii\helpers\Html;

	/* @var $this yii\web\View */
	/* @var $model app\models\dish\Dish */

	$this->title = 'Обновить блюдо: ' . $model->title;
	$this->params['breadcrumbs'][] = ['label' => 'Блюда', 'url' => ['index']];
	$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
	$this->params['breadcrumbs'][] = 'обновить';
?>
<div class="dish-update">

	<h1><?= Html::encode($this->title) ?></h1>

	<?= $this->render('_form', [
		'model' => $model,
		'ingredients_list' => $ingredients_list,
		'ingredients_in' => $ingredients_in,
	]) ?>

</div>
