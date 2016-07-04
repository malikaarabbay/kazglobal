<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation for table `order_table`.
 */
class m160629_090546_create_order_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%order}}', [
            'id' => Schema::TYPE_PK,
            'user_id' => Schema::TYPE_INTEGER,
            'service_id' => Schema::TYPE_INTEGER,
            'company_id' => Schema::TYPE_INTEGER,
            'manager_id' => Schema::TYPE_INTEGER,
            'secret_key' => Schema::TYPE_STRING,
            'delivery_id' => Schema::TYPE_INTEGER,
            'payment_id' => Schema::TYPE_INTEGER,
            'delivery_price' => Schema::TYPE_DECIMAL,
            'total_price' => Schema::TYPE_DECIMAL,
            'full_price' => Schema::TYPE_DECIMAL,
            'status_id' => Schema::TYPE_INTEGER,
            'paid' => Schema::TYPE_BOOLEAN,
            'user_login' => Schema::TYPE_INTEGER,
            'user_firstname' => Schema::TYPE_STRING,
            'user_lastname' => Schema::TYPE_STRING,
            'user_secondname' => Schema::TYPE_STRING,
            'user_email' => Schema::TYPE_STRING,
            'user_address' => Schema::TYPE_STRING,
            'delivery_method_name' => Schema::TYPE_STRING,
            'payment_method_name' => Schema::TYPE_STRING,
            'delivery_address' => Schema::TYPE_STRING,
            'user_phone' => Schema::TYPE_STRING,
            'user_comment' => Schema::TYPE_STRING,
            'ip_address' => Schema::TYPE_STRING,
            'created' => Schema::TYPE_INTEGER,
            'updated' => Schema::TYPE_INTEGER,
            'discount' =>  Schema::TYPE_STRING,
            'admin_comment' =>  Schema::TYPE_TEXT,
        ], $tableOptions);

        $this->batchInsert('{{%order}}',
            ['user_id', 'user_login', 'user_firstname', 'user_lastname', 'user_secondname', 'company_id', 'service_id', 'created', 'updated'],
            [
                [3, '100002', 'dina', 'ivanova', 'ivanovna', 1, 2, time(), time()],
                [4, '100003', 'ruslan', 'ivanov', 'ivanovich', 1, 1, time(), time()],
            ]
        );
    }

    public function down()
    {
        $this->dropTable('{{%order}}');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
