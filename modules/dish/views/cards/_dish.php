<?php if(empty($ingredients)){
	$ingredients = [0];
} ?>
<div class="col-md-12">
	<div class="dish">
		<div class="title">
			<?= $dish->title; ?>
		</div>
		<div class="text">
			<?= $dish->text; ?>
		</div>
		<?php if (!empty($dish->ingredient)): ?>
			<div class="dish-list">
				<?php foreach ($dish->ingredient as $item): ?>
					<div class="dish-list-ingredient <?= in_array($item->ingredient->id, $ingredients) ? 'active' : ''; ?>">
						<?= $item->ingredient->title; ?>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</div>