<?php

namespace bvb\routemessage\backend\controllers;

use bvb\routemessage\backend\models\RouteMessage;
use bvb\user\backend\controllers\traits\AdminAccess;

/**
 * UpdateController is for updating RouteMessage records
 */
class UpdateController extends \bvb\crud\controllers\UpdateController
{
    /**
     * Implement AccessControl that requires admin role to access actions
     */
    use AdminAccess;

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