<?php

namespace bvb\routemessage\frontend\controllers;

use bvb\routemessage\common\models\RouteMessage;
use bvb\routemessage\frontend\helpers\RouteMessageHelper;
use Yii;
use yii\web\Controller;
use yii\web\Response;

/**
 * CreateController is for creating RouteMessage models and their records in the db
 */
class FindController extends Controller
{
    /**
     * Check to see if there is an message for the given route and app
     * @param string $route
     * @param string $app_id
     * @return array
     */
    public function actionIndex($url, $app_id)
    {
        $parts = parse_url($url);
        $route = ltrim($parts['path'], '/');
        $result = RouteMessage::find()->where([
                'AND',
                ['active' => 1],
                [
                    'OR',
                    ['app_id' => $app_id],
                    ['app_id' => '*']
                ],
                [
                    'OR',
                    ['route' => $route],
                    ['route' => '*'.$route],
                    ['route' => $route.'*'],
                    ['route' => '*'.$route.'*'],
                ],
            ])->asArray()
            ->one();

        Yii::$app->response->format = Response::FORMAT_JSON;        
        return ($result && RouteMessageHelper::userShouldView($result)) ? $result : null;
    }
}