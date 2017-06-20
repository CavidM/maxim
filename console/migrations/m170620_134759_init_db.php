<?php

use yii\db\Migration;

class m170620_134759_init_db extends Migration
{
    public function safeUp()
    {
        $this->execute(file_get_contents('dump.sql'));
    }

    public function safeDown()
    {
        echo "m170620_134759_init_db cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170620_134759_init_db cannot be reverted.\n";

        return false;
    }
    */
}
