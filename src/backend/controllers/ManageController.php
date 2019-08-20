<?php

namespace bvb\routemessage\backend\controllers;

use bvb\routemessage\backend\models\RouteMessage;
use bvb\routemessage\backend\models\search\RouteMessage as RouteMessageSearch;
use bvb\user\backend\controllers\traits\AdminAccess;

/**
 * ManageController displays a list of route messages
 */
class ManageController extends \bvb\crud\controllers\ManageController
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
    public $searchModelClass = RouteMessageSearch::class;
}