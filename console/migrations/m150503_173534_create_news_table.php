<?php

use yii\db\Schema;
use yii\db\Migration;

class m150503_173534_create_news_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%news}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->defaultValue(0),
            'title' => $this->string(),
            'anounce' => $this->text(),
            'description' => $this->text(),
            'photo' => $this->string(),

            'views' => $this->integer()->defaultValue(0),
            'lang_id' => $this->integer(),
            'is_published' => $this->integer()->defaultValue(0),
            'sort_index' => $this->integer(),

            'created' => $this->integer(),
            'updated' => $this->integer(),
            'created_user_id' => $this->integer(),
            'updated_user_id' => $this->integer(),

            'slug' => $this->string(),
            'meta_title' => $this->string(),
            'meta_keywords' => $this->string(),
            'meta_description' => $this->string(),

        ], $tableOptions);

        $this->batchInsert('{{%news}}',
            ['title', 'anounce', 'description', 'photo','created', 'updated', 'slug','is_published'],
            [
                ['Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Анонс контента' , 'Описание контента' , 'news_slider1.jpg', time(), time(), 'news-1', 1],
                ['Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Анонс контента' , 'Описание контента' , 'news_slider1.jpg', time(), time(), 'news-2', 1],
                ['Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Анонс контента' , 'Описание контента' , 'news_slider1.jpg', time(), time(), 'news-3', 1],
                ['Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Анонс контента' , 'Описание контента' , 'news_slider1.jpg', time(), time(), 'news-4', 1],
                ['Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Анонс контента' , 'Описание контента' , 'news_slider1.jpg', time(), time(), 'news-5', 1],
            ]
        );

    }

    public function down()
    {
        $this->dropTable('{{%news}}');
    }
}
