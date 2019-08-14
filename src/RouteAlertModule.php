<?php

namespace bvb\routealert;

use Yii;

/**
 * Here to set the alias
 */
class RouteAlertModule extends \yii\base\Module
{
	/**
	 * Set an alias for ths root directory of the module
	 * {@inheritdoc}
	 */
	public function init()
	{
		Yii::setAlias('@bvb-route-alert', __DIR__);
		parent::init();
	}
}