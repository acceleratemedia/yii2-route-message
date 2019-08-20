<?php

namespace bvb\routemessage\frontend\widgets;

use Yii;
use yii\base\Widget;

/**
 * RouteMessage as a widget registers the javascript which will make an AJAX
 * call to a route that queries the database for messages for the current route
 * and it will render the message if one is found
 */
class RouteMessage extends \yii\base\Widget
{
    /**
     * Implements an opening 'nav' tag with changea
     * {@inheritdoc}
     */
    public function run()
    {
        $this->registerJavascript();
        return $this->render('modal');
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
	"/route-message/find",
	{
		url: window.location.href,
		app_id: '{$appId}'
	}
).done(function(data, textStatus, jqXHR){
	if(data){
        $("#route-message-modal .modal-content").html(data.message);
        $("#route-message-modal").addClass("route-message-id-"+data.css_class);
        $("#route-message-modal").modal("show");
	}
})
.fail(function( jqXHR, textStatus, errorThrown){

});
JAVASCRIPT;

        $this->getView()->registerJs($ready_js);
    }
}
