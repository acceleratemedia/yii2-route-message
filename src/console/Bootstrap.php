<?php

namespace bvb\routemessage\console;

use Yii;
use yii\base\BootstrapInterface;

class Bootstrap implements BootstrapInterface
{
    /**
     * Apply configuration to the console so that we can see the migration commands
     * @return void
     */
    public function bootstrap($app)
    {
        Yii::$app->controllerMap['migrate-route-message'] = [
            'class' => \yii\console\controllers\MigrateController::class,
            'migrationNamespaces' => ['bvb\routemessage\console\migrations'],
            'migrationTable' => 'm_bvb_route_message',
            'migrationPath' => null // This seems to make sure it doesn't pick up other migrations when using the migrate-user command
        ];
    }
}