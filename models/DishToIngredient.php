<?php

namespace app\models;

use app\models\dish\Dish;
use app\models\ingredient\Ingredient;
use Yii;

/**
 * This is the model class for table "dist_to_ingredient".
 *
 * @property int $id
 * @property int|null $dish_id
 * @property int|null $ingredient_id
 */
class DishToIngredient extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dish_to_ingredient';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dish_id', 'ingredient_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dish_id' => 'Dish ID',
            'ingredient_id' => 'Ingredient ID',
        ];
    }

	public function getIngredient(){
		return $this->hasOne(Ingredient::className(), ['id' => 'ingredient_id']);
	}

	public function getDish(){
		return $this->hasOne(Dish::className(), ['id' => 'dish_id'])->with('ingredient');
	}
}
