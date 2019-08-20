<?php

namespace bvb\routemessage\backend\controllers;

use bvb\routemessage\backend\models\RouteMessage;

/**
 * CreateController is for creating RouteMessage models and their records in the db
 */
class CreateController extends \bvb\crud\controllers\CreateController
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