<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation for table `status_table`.
 */
class m160620_101820_create_status_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%status}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'is_published' => $this->smallInteger()->defaultValue(0),
            'created' => $this->integer(),
            'updated' => $this->integer(),

        ], $tableOptions);

        $this->batchInsert('{{%status}}',
            ['title', 'created', 'updated', 'is_published'],
            [
                ['Главный ответственный', time(), time(), 1],
                ['Ответственный', time(), time(), 1],
                ['Сотрудник', time(), time(), 1],
            ]
        );
    }

    public function down()
    {
        $this->dropTable('{{%status}}');
    }
}
