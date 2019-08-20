<?php

namespace bvb\routemessage\backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * RouteMessage represents the model behind the search form about `bvb\routemessage\backend\models\RouteMessage`.
 */
class RouteMessage extends \bvb\routemessage\backend\models\RouteMessage
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['app_id', 'route', 'message', 'css_class', 'active', 'frequency'], 'safe'],
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
            'active' => $this->active,
            'frequency' => $this->frequency,
        ]);

        $query->andFilterWhere(['like', 'route', $this->route])
            ->andFilterWhere(['like', 'message', $this->message])
            ->andFilterWhere(['like', 'css_class', $this->css_class]);

        return $dataProvider;
    }
}
