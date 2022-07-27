<?php

use yii\db\Migration;

/**
 * Class m220727_164925_dish_to_ingredient
 */
class m220727_164925_dish_to_ingredient extends Migration
{
    /**
     * {@inheritdoc}
     */
	public function safeUp()
	{
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		}

		$this->createTable('{{%dish_to_ingredient}}', [
			'id' => $this->primaryKey(),
			'dish_id' => $this->integer(),
			'ingredient_id' => $this->integer()
		], $tableOptions);

		$this->createIndex(
			'idx-dish_to_ingredient-dish_id',
			'dish_to_ingredient',
			'dish_id'
		);

		$this->addForeignKey(
			'fk-dish_to_ingredient-dish_id',
			'dish_to_ingredient',
			'dish_id',
			'dish',
			'id',
			'CASCADE'
		);

		$this->createIndex(
			'idx-dish_to_ingredient-ingredient_id',
			'dish_to_ingredient',
			'ingredient_id'
		);

		$this->addForeignKey(
			'fk-dish_to_ingredient-ingredient_id',
			'dish_to_ingredient',
			'ingredient_id',
			'ingredient',
			'id',
			'CASCADE'
		);

		$this->insert('dish_to_ingredient', [
			'dish_id' => 1,
			'ingredient_id' => 1,
		]);

		$this->insert('dish_to_ingredient', [
			'dish_id' => 1,
			'ingredient_id' => 10,
		]);

		$this->insert('dish_to_ingredient', [
			'dish_id' => 2,
			'ingredient_id' => 1,
		]);

		$this->insert('dish_to_ingredient', [
			'dish_id' => 2,
			'ingredient_id' => 10,
		]);

		$this->insert('dish_to_ingredient', [
			'dish_id' => 3,
			'ingredient_id' => 1,
		]);

		$this->insert('dish_to_ingredient', [
			'dish_id' => 3,
			'ingredient_id' => 10,
		]);

		$this->insert('dish_to_ingredient', [
			'dish_id' => 4,
			'ingredient_id' => 2,
		]);

		$this->insert('dish_to_ingredient', [
			'dish_id' => 4,
			'ingredient_id' => 10,
		]);

		$this->insert('dish_to_ingredient', [
			'dish_id' => 5,
			'ingredient_id' => 2,
		]);

		$this->insert('dish_to_ingredient', [
			'dish_id' => 5,
			'ingredient_id' => 10,
		]);

		$this->insert('dish_to_ingredient', [
			'dish_id' => 6,
			'ingredient_id' => 8,
		]);

		$this->insert('dish_to_ingredient', [
			'dish_id' => 6,
			'ingredient_id' => 10,
		]);

		$this->insert('dish_to_ingredient', [
			'dish_id' => 7,
			'ingredient_id' => 8,
		]);

		$this->insert('dish_to_ingredient', [
			'dish_id' => 7,
			'ingredient_id' => 7,
		]);

		$this->insert('dish_to_ingredient', [
			'dish_id' => 7,
			'ingredient_id' => 6,
		]);

		$this->insert('dish_to_ingredient', [
			'dish_id' => 7,
			'ingredient_id' => 9,
		]);

		$this->insert('dish_to_ingredient', [
			'dish_id' => 7,
			'ingredient_id' => 10,
		]);

		$this->insert('dish_to_ingredient', [
			'dish_id' => 8,
			'ingredient_id' => 8,
		]);

		$this->insert('dish_to_ingredient', [
			'dish_id' => 8,
			'ingredient_id' => 10,
		]);
	}

    /**
     * {@inheritdoc}
     */
	public function safeDown()
	{
		$this->dropForeignKey(
			'fk-dish_to_ingredient-dish_id',
			'dish_to_ingredient'
		);

		$this->dropIndex(
			'idx-dish_to_ingredient-dish_id',
			'dish_to_ingredient'
		);

		$this->dropIndex(
			'idx-dish_to_ingredient-ingredient_id',
			'dish_to_ingredient'
		);

		$this->dropForeignKey(
			'fk-dish_to_ingredient-ingredient_id',
			'dish_to_ingredient'
		);

		$this->dropTable('dish_to_ingredient');
	}

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220727_164925_dish_to_ingredient cannot be reverted.\n";

        return false;
    }
    */
}
