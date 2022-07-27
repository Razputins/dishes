<?php

use yii\db\Migration;

/**
 * Class m220727_164847_ingredients
 */
class m220727_164847_ingredients extends Migration
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

		$this->createTable('{{%ingredient}}', [
			'id' => $this->primaryKey(),
			'title' => $this->string(),
			'text' => $this->text()
		], $tableOptions);

		$this->insert('ingredient', [
			'title' => 'Курица',
			'text' => 'Курица в гастрономическом плане существо причудливое: у нее вялое и неинтересное мясо',
		]);

		$this->insert('ingredient', [
			'title' => 'Утка',
			'text' => 'Мясо утки сочетает в себе качества хорошей говядины и птицы одновременно.',
		]);

		$this->insert('ingredient', [
			'title' => 'Куриное яйцо',
			'text' => 'Когда в кулинарных рецептах пишут слово «яйцо», чаще всего даже не говорится, что оно куриное.',
		]);

		$this->insert('ingredient', [
			'title' => 'Молоко',
			'text' => 'Промышленная субстанция под названием молоко по своим органолептическим свойствам радикально отличается от натурального коровьего молока',
		]);

		$this->insert('ingredient', [
			'title' => 'Сливочное масло',
			'text' => 'сливочное масло — самый доступный из усилителей вкуса. фокусов в обращении на кухне со сливочным маслом существует множество. но главных — два',
		]);

		$this->insert('ingredient', [
			'title' => 'Лук-шалот',
			'text' => 'маленький лук с кисло-сладким вкусом, луковица которого обычно состоит из двух половинок. обязательный элемент французской кухни',
		]);

		$this->insert('ingredient', [
			'title' => 'Помидоры',
			'text' => 'в свои идеальные кондиции помидоры начинают входить в июле — вкус, аромат, цвет, плотность томатного мяса и количество жидкости приближаются к идеалу',
		]);

		$this->insert('ingredient', [
			'title' => 'Картофель',
			'text' => 'без картофеля европейцам и дальше пришлось бы есть вместо картофельного пюре — пюре из брюквы, заправлять супы пастернаком, подавать к мясу репу и отказаться от чипсов',
		]);

		$this->insert('ingredient', [
			'title' => 'Чеснок',
			'text' => 'лучше всего свой аромат и вкус чеснок отдает, если его не резать, а грубо крошить или давить плоской частью ножа',
		]);

		$this->insert('ingredient', [
			'title' => 'Соль',
			'text' => 'соль — это специя, универсальный катализатор вкуса, которым нельзя пренебрегать и нельзя увлекаться. на профессиональных кухнях используют сразу несколько видов соли',
		]);

		$this->insert('ingredient', [
			'title' => 'Черный перец',
			'text' => 'внешне похож на почерневшие березовые почки, он более жгучий и чуть более сладкий, чем обычный черный',
		]);
	}

    /**
     * {@inheritdoc}
     */
	public function safeDown()
	{
		$this->dropTable('ingredient');
	}

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220727_164847_ingredients cannot be reverted.\n";

        return false;
    }
    */
}
