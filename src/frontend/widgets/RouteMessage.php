<?php

namespace bvb\routemessage\frontend\widgets;

use bvb\routemessage\RouteMessageModule;
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
     * Register the alias for the root of this module so we can use it to render
     * the view to allow for theming. 
     * {@inheritdoc}
     */
    public function init()
    {
        RouteMessageModule::setRouteMessageAlias();
        $this->registerJavascript();
        return parent::init();
    }

    /**
     * Implements an opening 'nav' tag with changea
     * {@inheritdoc}
     */
    public function run()
    {
        return $this->render('@bvb-route-message/frontend/widgets/views/modal');
    }   

    /**
     * Register javascript to make a request for a message for the curernt route
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
        $("#route-message-modal .modal-content #route-message-text").html(data.message);
        $("#route-message-modal .modal-dialog").addClass(data.css_class);
        $("#route-message-modal").modal("show");
	}
})
.fail(function( jqXHR, textStatus, errorThrown){

});
JAVASCRIPT;

        $this->getView()->registerJs($ready_js);
    }
}
