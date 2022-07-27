<?php foreach ($dishes as $dish): ?>
	<?= $this->render('../cards/_dish', [
		'dish' => $dish,
		'ingredients' => $ingredients,
	]) ?>
<?php endforeach; ?>