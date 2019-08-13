<?php

namespace bvb\routealert\backend\models;

use Yii;

/**
 * This is the model class for table "route_alert".
 *
 * @property integer $id
 * @property string $route
 * @property string $message
 * @property string $query_string
 * @property boolean $active
 * @property string $create_time
 * @property string $update_time
 */
class RouteAlert extends \bvb\routealert\common\models\RouteAlert
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['app_id', 'message'], 'required'],
            [['route', 'app_id'], 'string', 'max' => 100],
            [['message'], 'string', 'max' => 1000],
            [['query_string'], 'string', 'max' => 200],
            [['active'], 'boolean'],
            [['app_id', 'route', 'query_string'], 'unique', 'targetAttribute' => ['app_id', 'route', 'query_string']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'app_id' => 'Application'
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeHints()
    {
        return [
            'app_id' => 'The application to run this alert on. Only applicable when creating route alerts for multiple applications',
            'route' => 'The part of the url after the domain name on routes this alert should be displayed. For example: http://www.example.com/<b>run-on-this-route</b>. Wildcards (*) may be used. Leave blank to run on the "home page".',
            'query_string' => 'The query string after the route when this alert should be displayed. Leave blank if it should be run with any query string. For example: http://www.example.com/run-on-this-route?<b>abc=def&zyx=wvu</b>'
        ];
    }
}
