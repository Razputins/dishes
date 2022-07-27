<div class="ingredient">
	<input type="checkbox" name="ingredients[]" value="<?= $ingredient->id; ?>" id="ingredient_<?= $ingredient->id; ?>">
	<label for="ingredient_<?= $ingredient->id; ?>"><?= $ingredient->title; ?></label>
</div>