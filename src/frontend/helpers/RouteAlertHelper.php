<?php

namespace bvb\routealert\frontend\helpers;

use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Cookie;

class RouteAlertHelper
{
	/**
	 * @param array $routeAlert
	 * @return boolean
	 */
	static function userShouldView($routeAlert)
	{
		if(empty($routeAlert['frequency'])){
			return true;
		}

		$cookieName = self::getCookieName($routeAlert);
		Yii::info($cookieName);
		if( Yii::$app->request->cookies->has($cookieName) ){
			// --- Check the frequency and the time of the cookie to see if it
			// --- should be displayed for them again
			$routeAlertCookie = Yii::$app->request->cookies->get($cookieName);
			Yii::info(print_r($_COOKIE,true));
			Yii::info(print_r($routeAlertCookie,true));
			Yii::info(print_r($routeAlert,true));
			if($routeAlertCookie->value >= (time() - $routeAlert['frequency']) ){
				return false;
			}
		} else {
			self::setRouteAlertCookie($routeAlert);
		}
		return true;
	}

	/**
	 * @param array $routeAlert
	 * @return string The unique cookie name for the route alert
	 */
	static function getCookieName($routeAlert)
	{
		return 'seenRouteAlert-'.$routeAlert['app_id'].'-'.$routeAlert['route'];
	}

	/**
	 * @param array $routeAlert
	 * @return void
	 */
	static function setRouteAlertCookie($routeAlert)
	{
		$seenRouteAlertCookie = new Cookie([
		    'name' => self::getCookieName($routeAlert),
		    'value' => time(),
		    'expire' => time()+intval($routeAlert['frequency'])
		]);
		Yii::$app->response->cookies->add($seenRouteAlertCookie);
	}
}