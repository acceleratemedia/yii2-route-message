<?php

namespace bvb\routemessage\console\migrations;

use yii\db\Migration;

/**
 * Class M190812224429CreateRouteMessageTable
 */
class M190812224429CreateRouteMessageTable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%route_message}}', [
            'id' => $this->primaryKey(),
            'app_id' => $this->string(100)->notNull()->defaultValue('*'),
            'route' => $this->string(100)->notNull(),
            'frequency' => $this->integer()->notNull()->defaultValue(0),
            'css_class' => $this->string(200)->null(),
            'message' => $this->string(1000)->notNull(),
            'active' => $this->boolean()->notNull()->defaultValue(1),
            'create_time' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'update_time' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')->append('ON UPDATE CURRENT_TIMESTAMP'),
        ]);

        // creates unique index on the app and route
        $this->createIndex(
            'idx-route_message-app_id-route-unique',
            'route_message',
            ['app_id', 'route'],
            true
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%route_message}}');
    }
}
