<?php

namespace app\models\dish;

use app\models\DishToIngredient;
use Yii;

/**
 * This is the model class for table "dish".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $text
 */
class Dish extends \yii\db\ActiveRecord
{
	public $ingredients;
	public $ingredientOverall;
	public $ingredientCount;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dish';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['text'], 'string'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'text' => 'Текст',
            'ingredients' => 'Ингредиенты',
        ];
    }

	public function getIngredient(){
		return $this->hasMany(DishToIngredient::className(), ['dish_id'=>'id'])->with('ingredient');
	}
}
