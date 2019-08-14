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
	 * List of default frequncies with array key being the number of seconds
	 * to delay between showings and value being the label for use in a dropdown
	 * @var array 
	 */
	static $defaultFrequencyList = [
		0 => 'Show every time',
		60*60*24 => 'Once per day max',
		60*60*24*7 => 'Once per week max'
	];

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