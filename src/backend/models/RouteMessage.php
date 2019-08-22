<?php

namespace bvb\routemessage\backend\models;

use Yii;

/**
 * This is the model class for table "route_message".
 *
 * @property integer $id
 * @property string $route
 * @property string $message
 * @property string $css_class
 * @property string $frequency
 * @property boolean $active
 * @property string $create_time
 * @property string $update_time
 */
class RouteMessage extends \bvb\routemessage\common\models\RouteMessage
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['app_id', 'message'], 'required'],
            [['frequency'], 'integer'],
            [['route', 'app_id'], 'string', 'max' => 100],
            [['message'], 'string', 'max' => 1000],
            [['css_class'], 'string', 'max' => 200],
            [['active'], 'boolean'],
            [['app_id', 'route'], 'unique', 'targetAttribute' => ['app_id', 'route']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'app_id' => 'Application',
            'css_class' => 'CSS Class'
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeHints()
    {
        return [
            'app_id' => 'The application to run this message on. Only applicable when creating route messages for multiple applications',
            'css_class' => 'A class that will be added to the modal so it can be uniquely styled',
            'frequency' => 'The amount of time to hide the message for after it has been dismissed',
            'route' => 'The part of the url after the domain name on routes this message should be displayed. For example: http://www.example.com/<b>run-on-this-route</b>. Wildcards (*) may be used. Leave blank to run on the "home page".',
        ];
    }
}
