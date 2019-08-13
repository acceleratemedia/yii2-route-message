<?php

namespace bvb\routealert\backend;

/**
 * Here to automatically sets up the controllerNamespace for backend routes
 */
class RouteAlertModule extends \yii\base\Module
{
	/**
	 * An array with keys being application IDs and values being application 
	 * names. This is used to populate additional values into the `app_id`
	 * or Application field when configuring route alerts. 
	 * 
	 * Keys should correlate to the 'id' property set on application 
	 * configurations for web apps in Yii. This allows for the same database
	 * table of route alerts to be used across multiple applications
	 * @var array
	 */
	public $additionalApplications = [];
}