<?php

namespace bvb\routemessage\frontend\helpers;

use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Cookie;

class RouteMessageHelper
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
			self::setRouteMessageCookie($routeAlert);
		}
		return true;
	}

	/**
	 * @param array $routeAlert
	 * @return string The unique cookie name for the route message
	 */
	static function getCookieName($routeAlert)
	{
		return 'seenRouteMessage-'.$routeAlert['app_id'].'-'.$routeAlert['route'];
	}

	/**
	 * @param array $routeAlert
	 * @return void
	 */
	static function setRouteMessageCookie($routeAlert)
	{
		$seenRouteMessageCookie = new Cookie([
		    'name' => self::getCookieName($routeAlert),
		    'value' => time(),
		    'expire' => time()+intval($routeAlert['frequency'])
		]);
		Yii::$app->response->cookies->add($seenRouteMessageCookie);
	}
}