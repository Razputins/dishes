<?php

	use yii\helpers\Html;

	/* @var $this yii\web\View */
	/* @var $model app\models\dish\Dish */

	$this->title = 'Добавить блюдо';
	$this->params['breadcrumbs'][] = ['label' => 'Блюда', 'url' => ['index']];
	$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dish-create">

	<h1><?= Html::encode($this->title) ?></h1>

	<?= $this->render('_form', [
		'model' => $model,
		'ingredients_list' => $ingredients_list,
		'ingredients_in' => $ingredients_in,
	]) ?>

</div>
