<?php

namespace bvb\routealert\backend\helpers;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * Here to automatically sets up the controllerNamespace for backend routes
 */
class Helper
{
	/**
	 * Return a list of possible applications a route may be applied to
	 * Default values are the current application and * for All Applications
	 * Additional values come from module 
	 * [[\bvb\routealert\backend\RouteAlertModule::$additionalApplications]]
	 * @return array
	 */
	static function getApplicationsList()
	{
		$defaultApplications = [
		    '*' => 'All Applications',
		    Yii::$app->id => Yii::$app->name
		];
		return ArrayHelper::merge($defaultApplications, Yii::$app->controller->module->additionalApplications);
	}
}