<?php

namespace bvb\routealert\console;

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
        Yii::$app->controllerMap['m-route-alert'] = [
            'class' => \yii\console\controllers\MigrateController::class,
            'migrationNamespaces' => ['bvb\routealert\console\migrations'],
            'migrationTable' => 'm_bvb_route_alert',
            'migrationPath' => null // This seems to make sure it doesn't pick up other migrations when using the migrate-user command
        ];
    }
}