<?php

namespace bvb\routealert\backend\controllers;

use bvb\routealert\backend\models\RouteAlert;

/**
 * DeleteController is for deleting RouteAlerts and their db records
 */
class DeleteController extends \bvb\crud\controllers\DeleteController
{   
    /**
     * {@inheritdoc}
     */
    public $modelClass = RouteAlert::class;

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