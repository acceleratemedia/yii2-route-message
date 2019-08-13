<?php

namespace bvb\routealert\backend\controllers;

use bvb\routealert\backend\models\RouteAlert;

/**
 * UpdateController is for updating RouteAlert records
 */
class UpdateController extends \bvb\crud\controllers\UpdateController
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