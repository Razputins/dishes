<?php
	$this->title = 'Список блюд';
?>
<div class="container">
	<div class="ingredient-cover">
		<?php foreach ($ingredients as $ingredient): ?>
			<?= $this->render('../cards/_ingredient', [
				'ingredient' => $ingredient
			]) ?>
		<?php endforeach; ?>
	</div>
	<div class="row">
		<div class="ingredient-error">Выберите больше ингредиентов</div>
	</div>
	<div class="row">
		<h1 class="dish-title">Блюда</h1>
	</div>
	<div class="row" id="dish-list">
		<?php foreach ($dishes as $dish): ?>
			<?= $this->render('../cards/_dish', [
					'dish' => $dish
			]) ?>
		<?php endforeach; ?>
	</div>
</div>