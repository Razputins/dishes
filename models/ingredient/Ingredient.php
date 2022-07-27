<?php

namespace app\models\ingredient;

use app\models\DishToIngredient;
use Yii;

/**
 * This is the model class for table "ingredient".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $text
 */
class Ingredient extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ingredient';
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
            'text' => 'текст',
        ];
    }

	public function getDishIds(){
		return $this->hasMany(DishToIngredient::className(), ['ingredient_id' => 'id']);
	}
}
