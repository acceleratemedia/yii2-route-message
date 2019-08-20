<?php

namespace bvb\routemessage\common\models;

use Yii;

/**
 * This is the model class for table "route_message".
 *
 * @property integer $id
 * @property string $app_id
 * @property string $route
 * @property string $message
 * @property string $params
 * @property string $create_time
 * @property string $update_time
 */
class RouteMessage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'route_message';
    }
}
