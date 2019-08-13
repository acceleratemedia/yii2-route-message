<?php

namespace bvb\routealert\frontend\widgets;

use Yii;
use yii\base\Widget;

/**
 * RouteAlert as a widget registers the javascript which will make an AJAX
 * call to a route that queries the database for alerts for the current route
 * and it will render the alert if one is found
 */
class RouteAlert extends \yii\base\Widget
{
    /**
     * Implements an opening 'nav' tag with changea
     * {@inheritdoc}
     */
    public function run()
    {
        $this->registerJavascript();
    }   

    /**
     * Register the javascript that will collapse the sidebar navigation nad give the cookie
     * that will remember the state
     * @return void
     */
    private function registerJavascript()
    {
    	$appId = Yii::$app->id;
        $ready_js = <<<JAVASCRIPT
$.get(
	"/route-alert/find",
	{
		url: window.location.href,
		app_id: '{$appId}'
	}
).done(function(data, textStatus, jqXHR){
	console.log("success")
	if(data){
		// --- Open the modal with the alert
		console.log(data)
		console.log(textStatus)
		console.log(jqXHR)       			
	}
})
.fail(function( jqXHR, textStatus, errorThrown){
	console.log("faile")
	console.log(jqXHR)
	console.log(textStatus)
	console.log(errorThrown)
});
JAVASCRIPT;

        $this->getView()->registerJs($ready_js);
    }
}
