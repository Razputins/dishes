<?php

	namespace app\modules\dish\controllers;

	use app\models\dish\Dish;
	use app\models\DishToIngredient;
	use app\models\ingredient\Ingredient;
	use Yii;
	use yii\helpers\ArrayHelper;
	use yii\web\Controller;

	/**
	 * Default controller for the `recipe` module
	 */
	class DefaultController extends Controller
	{
		public function init()
		{
			parent::init();
		}


		public function actionIndex()
		{
			$dishes = Dish::find()->with('ingredient')->all();
			$ingredients = Ingredient::find()->all();

			return $this->render('index', [
				'dishes' => $dishes,
				'ingredients' => $ingredients,
			]);
		}

		public function actionWithIngredients()
		{
			$ingredients = Yii::$app->request->post('ingredients');

			if (empty($ingredients)) {
				return '';
			}

			$ingredients_count = count($ingredients);

			if($ingredients_count < 2 || $ingredients_count > 5){
				return '';
			}

			$dishes_list = Dish::find()
				->select([
					'dish.*',
					'COUNT(dish_to_ingredient.id) AS ingredientCount',
					'(SELECT COUNT(*) FROM dish_to_ingredient AS dti WHERE dti.dish_id = dish.id) AS ingredientOverall',])
				->leftJoin('dish_to_ingredient', 'dish_to_ingredient.dish_id = dish.id')
				->where(['in', 'dish_to_ingredient.ingredient_id', $ingredients])
				->groupBy(['dish.id'])
				->orderBy(['ingredientCount' => SORT_DESC,'ingredientOverall' => SORT_DESC])
				->all();

			$dishes = [];

			foreach ($dishes_list as $key => $dish) {
				if ($dish['ingredientCount'] == $ingredients_count && $dish['ingredientOverall'] === $ingredients_count) {
					$dishes['full'][] = $dish;
				}
				if ($dish['ingredientCount'] >= 2) {
					$dishes['partly'][] = $dish;
				}
			}

			$dishes_sort = [];

			if (!empty($dishes['full'])) {
				$dishes_sort = $dishes['full'];
			} elseif (!empty($dishes['partly'])) {
				$dishes_sort = $dishes['partly'];
			}

			if (empty($dishes_sort)) {
				return '';
			}

			return $this->renderAjax('../ajax/_list', [
				'dishes' => $dishes_sort,
				'ingredients' => $ingredients
			]);
		}
	}
