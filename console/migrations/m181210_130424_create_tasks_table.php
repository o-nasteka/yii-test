<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tasks`.
 */
class m181210_130424_create_tasks_table extends Migration
{

    public function up()
    {
        $this->createTable('tasks', [
            'id' => $this->primaryKey(),
            'company_name' => $this->string()->notNull(),
            'position' => $this->string()->notNull(),
            'position_description' => $this->text(),
            'salary' => $this->integer(),
            'date_start' => $this->string()->notNull(),
            'date_end' => $this->string()->notNull(),
            'date_publication' => $this->string()->notNull(),
        ]);

    }

    public function down()
    {
        $this->dropTable('tasks');
    }

    /**
     * {@inheritdoc}
     */
//    public function safeUp()
//    {
//        $this->createTable('tasks', [
//            'id' => $this->primaryKey(),
//        ]);
//    }
//
//    /**
//     * {@inheritdoc}
//     */
//    public function safeDown()
//    {
//        $this->dropTable('tasks');
//    }
}
