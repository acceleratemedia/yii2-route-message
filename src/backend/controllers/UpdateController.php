<?php

namespace bvb\routemessage\backend\controllers;

use bvb\routemessage\backend\models\RouteMessage;

/**
 * UpdateController is for updating RouteMessage records
 */
class UpdateController extends \bvb\crud\controllers\UpdateController
{
    /**
     * {@inheritdoc}
     */
    public $modelClass = RouteMessage::class;

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        $actions = parent::actions();
        $actions['index']['view'] = 'index';
        $actions['index']['redirect'] = ['manage/index/'];
        return $actions;
    }
}