<?php

namespace bvb\routemessage\backend\controllers;

use bvb\routemessage\backend\models\RouteMessage;

/**
 * DeleteController is for deleting RouteMessages and their db records
 */
class DeleteController extends \bvb\crud\controllers\DeleteController
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
    	$actions['index']['redirect'] = ['manage/index/'];
    	return $actions;
    }
}