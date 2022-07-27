<?php

use yii\db\Migration;

/**
 * Class m220727_164903_dish
 */
class m220727_164903_dish extends Migration
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

		$lore = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Risus viverra adipiscing at in.';

		$this->createTable('{{%dish}}', [
			'id' => $this->primaryKey(),
			'title' => $this->string(),
			'text' => $this->text()
		], $tableOptions);


		$this->insert('dish', [
			'title' => 'Харчо из курицы',
			'text' => $lore
		]);

		$this->insert('dish', [
			'title' => 'Буррито с курицей и рисом',
			'text' => $lore
		]);

		$this->insert('dish', [
			'title' => 'Жульен с курицей и грибами',
			'text' => $lore
		]);

		$this->insert('dish', [
			'title' => 'Пекинская утка',
			'text' => $lore
		]);

		$this->insert('dish', [
			'title' => 'Пряная утка с рагу',
			'text' => $lore
		]);

		$this->insert('dish', [
			'title' => 'Картофель Айдахо',
			'text' => $lore
		]);

		$this->insert('dish', [
			'title' => 'Овощное рагу',
			'text' => $lore
		]);

		$this->insert('dish', [
			'title' => 'Жареный картофель',
			'text' => $lore
		]);
	}

    /**
     * {@inheritdoc}
     */
	public function safeDown()
	{
		$this->dropTable('dish');
	}

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220727_164903_dish cannot be reverted.\n";

        return false;
    }
    */
}
