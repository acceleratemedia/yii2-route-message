<?php

namespace bvb\routealert\backend\controllers;

use bvb\routealert\backend\models\RouteAlert;
use bvb\routealert\backend\models\search\RouteAlert as RouteAlertSearch;

/**
 * ManageController displays a list of route alerts
 */
class ManageController extends \bvb\crud\controllers\ManageController
{
    /**
     * {@inheritdoc}
     */
    public $modelClass = RouteAlert::class;

    /**
     * {@inheritdoc}
     */
    public $searchModelClass = RouteAlertSearch::class;
}