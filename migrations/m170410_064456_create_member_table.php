<?php

use yii\db\Migration;

/**
 * Handles the creation of table `member`.
 */
class m170410_064456_create_member_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('member', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('member');
    }
}
