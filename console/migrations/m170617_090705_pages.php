<?php

use yii\db\Migration;

class m170617_090705_pages extends Migration
{
    public function safeUp()
    {
        $this->execute('ALTER TABLE `pages` ADD `ord` INT(11) NOT NULL AFTER `status`;');
    }

    public function safeDown()
    {
        echo "m170617_090705_pages cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170617_090705_pages cannot be reverted.\n";

        return false;
    }
    */
}
