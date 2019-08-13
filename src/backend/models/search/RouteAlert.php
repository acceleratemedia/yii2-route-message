<?php

namespace bvb\routealert\backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * RouteAlert represents the model behind the search form about `bvb\routealert\backend\models\RouteAlert`.
 */
class RouteAlert extends \bvb\routealert\backend\models\RouteAlert
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['app_id', 'route', 'message', 'query_string', 'active'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = static::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

         $dataProvider->setSort([
            'defaultOrder' => [
                'id' => SORT_DESC
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
        ]);

        $query->andFilterWhere(['like', 'route', $this->route])
            ->andFilterWhere(['like', 'message', $this->message])
            ->andFilterWhere(['like', 'query_string', $this->query_string]);

        return $dataProvider;
    }
}
