<?php

namespace bvb\routemessage\backend\controllers;

use bvb\routemessage\backend\models\RouteMessage;
use bvb\routemessage\backend\models\search\RouteMessage as RouteMessageSearch;

/**
 * ManageController displays a list of route messages
 */
class ManageController extends \bvb\crud\controllers\ManageController
{
    /**
     * {@inheritdoc}
     */
    public $modelClass = RouteMessage::class;

    /**
     * {@inheritdoc}
     */
    public $searchModelClass = RouteMessageSearch::class;
}