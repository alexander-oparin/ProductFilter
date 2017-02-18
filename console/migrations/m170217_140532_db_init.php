<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

class m170217_140532_db_init extends Migration {
    public function up() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%users}}', [
            'id' => Schema::TYPE_PK,
            'login' => "VARCHAR(20) NOT NULL DEFAULT ''",
            'pass' => "VARCHAR(100) NOT NULL DEFAULT ''",
        ], $tableOptions);

        $this->execute("insert into users set login='user1', pass='" . Yii::$app->security->generatePasswordHash('secret') . "'");

        $this->createTable('{{%pages}}', [
            'id' => Schema::TYPE_PK,
            'name' => "VARCHAR(100) NOT NULL DEFAULT ''",
            'search_link' => "VARCHAR(100) NOT NULL DEFAULT ''",
            'text' => Schema::TYPE_TEXT,
            'bottom_text' => Schema::TYPE_TEXT
        ], $tableOptions);

        $this->createTable('{{%catalog}}', [
            'id' => Schema::TYPE_PK,
            'name' => "VARCHAR(100) NOT NULL DEFAULT ''",
            'width' => $this->integer()->notNull()->defaultValue(0),
            'height' => $this->integer()->notNull()->defaultValue(0),
            'price' => $this->integer()->notNull()->defaultValue(0),
        ], $tableOptions);
    }

    public function down() {
        $this->dropTable('{{%users}}');
        $this->dropTable('{{%pages}}');
        $this->dropTable('{{%catalog}}');
    }
}
