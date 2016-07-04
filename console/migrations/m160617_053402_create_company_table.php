<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation for table `company_table`.
 */
class m160617_053402_create_company_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%company}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'description' => $this->text(),
            'photo' => $this->string(),

            'is_published' => $this->integer()->defaultValue(0),
            
            'balance' => $this->decimal(),
            
            'created' => $this->integer(),
            'updated' => $this->integer(),

            'slug' => $this->string(),
            'meta_title' => $this->string(),
            'meta_keywords' => $this->string(),
            'meta_description' => $this->string(),

        ], $tableOptions);

        $this->batchInsert('{{%company}}',
            ['title', 'balance', 'created', 'updated', 'slug','is_published'],
            [
                ['Компания 1', '500000', time(), time(), 'company-1', 1],
                ['Компания 2', '700000', time(), time(), 'company-2', 1],
                ['Компания 3', '300000', time(), time(), 'company-3', 1],
            ]
        );


    }

    public function down()
    {
        $this->dropTable('{{%company}}');
    }
}
