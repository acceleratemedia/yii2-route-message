<?php

namespace bvb\routealert\backend\controllers;

use bvb\routealert\backend\models\RouteAlert;

/**
 * CreateController is for creating RouteAlert models and their records in the db
 */
class CreateController extends \bvb\crud\controllers\CreateController
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
    	$actions['index']['view'] = 'index';
    	$actions['index']['redirect'] = ['manage/index/'];
    	return $actions;
    }
}