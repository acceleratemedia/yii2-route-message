<?php

namespace bvb\routemessage\frontend\helpers;

use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Cookie;

class RouteMessageHelper
{
	/**
	 * @param array $routeMessage
	 * @return boolean
	 */
	static function userShouldView($routeMessage)
	{
		if(empty($routeMessage['frequency'])){
			return true;
		}

		$cookieName = self::getCookieName($routeMessage);
		Yii::info($cookieName);
		if( Yii::$app->request->cookies->has($cookieName) ){
			// --- Check the frequency and the time of the cookie to see if it
			// --- should be displayed for them again
			$routeMessageCookie = Yii::$app->request->cookies->get($cookieName);
			Yii::info(print_r($_COOKIE,true));
			Yii::info(print_r($routeMessageCookie,true));
			Yii::info(print_r($routeMessage,true));
			if($routeMessageCookie->value >= (time() - $routeMessage['frequency']) ){
				return false;
			}
		} else {
			self::setRouteMessageCookie($routeMessage);
		}
		return true;
	}

	/**
	 * @param array $routeMessage
	 * @return string The unique cookie name for the route message
	 */
	static function getCookieName($routeMessage)
	{
		return 'seenRouteMessage-'.$routeMessage['app_id'].'-'.$routeMessage['route'];
	}

	/**
	 * @param array $routeMessage
	 * @return void
	 */
	static function setRouteMessageCookie($routeMessage)
	{
		$seenRouteMessageCookie = new Cookie([
		    'name' => self::getCookieName($routeMessage),
		    'value' => time(),
		    'expire' => time()+intval($routeMessage['frequency'])
		]);
		Yii::$app->response->cookies->add($seenRouteMessageCookie);
	}
}