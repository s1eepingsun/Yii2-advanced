<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Fruits;

/**
 * FruitsSearch represents the model behind the search form about `app\models\Fruits`.
 */
class FruitsSearch extends Fruits
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'weight', 'somedata1'], 'integer'],
            [['name', 'color'], 'safe'],
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
        $query = Fruits::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'weight' => $this->weight,
            'somedata1' => $this->somedata1,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'color', $this->color]);

        return $dataProvider;
    }
}
