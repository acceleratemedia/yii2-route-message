<?php

namespace bvb\routealert\common\models;

use Yii;

/**
 * This is the model class for table "route_alert".
 *
 * @property integer $id
 * @property string $app_id
 * @property string $route
 * @property string $message
 * @property string $params
 * @property string $create_time
 * @property string $update_time
 */
class RouteAlert extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'route_alert';
    }
}
