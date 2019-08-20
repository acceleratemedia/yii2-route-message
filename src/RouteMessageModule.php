<?php

namespace bvb\routemessage;

use Yii;

/**
 * Here to set the alias
 */
class RouteMessageModule extends \yii\base\Module
{
	/**
	 * Set an alias for ths root directory of the module
	 * {@inheritdoc}
	 */
	public function init()
	{
		Yii::setAlias('@bvb-route-message', __DIR__);
		parent::init();
	}
}