<?php

use yii\db\Schema;
use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => Schema::TYPE_PK,
            'login' => Schema::TYPE_INTEGER,
            'parent_id' => Schema::TYPE_INTEGER,
            'firstname' => Schema::TYPE_STRING,
            'lastname' => Schema::TYPE_STRING,
            'secondname' => Schema::TYPE_STRING,
            'username' => Schema::TYPE_STRING,
            'auth_key' => Schema::TYPE_STRING,
            'password_hash' => Schema::TYPE_STRING,
            'password_reset_token' => Schema::TYPE_STRING,
            'email' => Schema::TYPE_STRING,
            'phone' => Schema::TYPE_STRING,
            'birthday' => Schema::TYPE_INTEGER,
            'sex' => Schema::TYPE_SMALLINT . ' DEFAULT 0',
            'role' => Schema::TYPE_SMALLINT . ' DEFAULT 0',

            'status_id' => Schema::TYPE_INTEGER . ' DEFAULT 0',
            'company_id' => Schema::TYPE_INTEGER . ' DEFAULT 0',
            'special' => Schema::TYPE_SMALLINT . ' DEFAULT 0',
            'activated' => Schema::TYPE_SMALLINT . ' DEFAULT 0',
            'status' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 10',
            'created' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated' => Schema::TYPE_INTEGER . ' NOT NULL',
            'deleted' => Schema::TYPE_SMALLINT . ' DEFAULT 0',
            
            'number_id' => Schema::TYPE_INTEGER,
            'date_issue' => Schema::TYPE_INTEGER,
            'date_validity' => Schema::TYPE_INTEGER,
            'organ_issue' => Schema::TYPE_STRING,
            'iin' => Schema::TYPE_INTEGER,
            'skype' => Schema::TYPE_STRING,

            'pass_surname' => Schema::TYPE_STRING,
            'pass_name' => Schema::TYPE_STRING,
            'pass_state' => Schema::TYPE_STRING,
            'pass_type' => Schema::TYPE_STRING,
            'pass_number' => Schema::TYPE_INTEGER,
            'pass_national' => Schema::TYPE_STRING,
            'pass_issue' => Schema::TYPE_INTEGER,
            'pass_validity' => Schema::TYPE_INTEGER,
            'pass_authority' => Schema::TYPE_STRING,
            'pass_id' => Schema::TYPE_INTEGER,

        ], $tableOptions);

        $this->batchInsert('{{%user}}',
            ['login', 'firstname', 'lastname', 'secondname', 'status_id', 'company_id', 'parent_id', 'phone',  'auth_key', 'password_hash', 'email', 'role', 'activated', 'created', 'updated', 'deleted'],
            [
                ['100000', 'malika', 'arabbay', 'balataykizi', '0', '0', '', '87716252926',  'KSIUVGQArA59pE-EZFY4CCD8MpvIOvE0', '$2y$13$wQeo.4DFTOlAn4f/bzwPnOymmn5k9ijj7a4eSB8QXEm30VIEiIqJu', 'malikarabbay@gmail.com', '10', '1', time(), time(), '0'],
                ['100001', 'janar', 'qqqq', 'wwww', '1', '1', '1', '87716252926',  '0u-A9_Uujk0laXxSf5HT7-cvrp95P5bl', '$2y$13$wQeo.4DFTOlAn4f/bzwPnOymmn5k9ijj7a4eSB8QXEm30VIEiIqJu', 'janar@gmail.com', '0', '1', time(), time(), '0'],
                ['100002', 'dina', 'ivanova', 'ivanovna', '2', '1', '2', '87716252926',  'h-UbHPZ27Ovj8BXipK3w-HIsLOv52zHt', '$2y$13$wQeo.4DFTOlAn4f/bzwPnOymmn5k9ijj7a4eSB8QXEm30VIEiIqJu', 'dina@gmail.com', '0', '1', time(), time(), '0'],
                ['100003', 'ruslan', 'ivanov', 'ivanovich', '3', '1', '3', '87716252926',  'h-UbHPZ27Ovj8BXipK3w-HIsLOv52zHt', '$2y$13$wQeo.4DFTOlAn4f/bzwPnOymmn5k9ijj7a4eSB8QXEm30VIEiIqJu', 'ruslan@gmail.com', '0', '1', time(), time(), '0'],
            ]
        );
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
