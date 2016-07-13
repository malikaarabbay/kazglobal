<?php

use yii\db\Schema;
use yii\db\Migration;

class m160121_180909_create_text_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%text}}', [
            'id' => $this->primaryKey(),
            'key' => $this->string(),
            'value' => $this->string(),
            'text' => $this->text(),
            'created' => $this->integer(),
            'updated' => $this->integer(),
            'created_user_id' => $this->integer(),
            'updated_user_id' => $this->integer(),

        ], $tableOptions);

        $this->batchInsert('{{%text}}',
            ['key', 'value', 'text'],
            [
                ['email', 'info@kazglobal.kz', ''],
                ['address', 'ул. Рыскулова 8', ''],
                ['phone', '+7 (7212) 42-64-95', ''],
                ['whatsapp', '+7 708 436-63-05', ''],
                ['skype', 'kazglobaltravel', ''],
                ['vk', 'https://new.vk.com/', ''],
                ['youtube', 'https://www.youtube.com/', ''],
                ['insta', 'https://www.instagram.com/', ''],
                ['main_article', '', '<p class="compani_text"><strong>KazGlobal.kz </strong>- contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p><p class="compani_text">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>'],
            ]
        );
    }

    public function down()
    {
        $this->dropTable('{{%text}}');
    }
}
