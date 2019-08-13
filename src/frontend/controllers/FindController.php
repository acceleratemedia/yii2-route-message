<?php

namespace bvb\routealert\frontend\controllers;

use bvb\routealert\common\models\RouteAlert;
use Yii;
use yii\web\Controller;
use yii\web\Response;

/**
 * CreateController is for creating RouteAlert models and their records in the db
 */
class FindController extends Controller
{
    /**
     * Check to see if there is an alert for the given route and app
     * @param string $route
     * @param string $app_id
     * @return array
     */
    public function actionIndex($url, $app_id)
    {
        $parts = parse_url($url);
        $route = ltrim($parts['path'], '/');
        $query = RouteAlert::find()->where([
                'AND',
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
            ])->asArray();

        if(isset($parts['query'])){
            $query->andWhere([
                'OR',
                ['query_string' => ''],
                ['query_string' => $parts['query']],
            ]);
        }

        Yii::$app->response->format = Response::FORMAT_JSON;
        return $query->one();
    }
}