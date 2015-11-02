<?php

namespace app\modules\institutions\searchModels;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\institutions\models\Campuses;

/**
 * CampusesSearch represents the model behind the search form about `app\modules\institutions\models\Campuses`.
 */
class CampusesSearch extends Campuses
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'inst_id', 'county', 'constituency'], 'integer'],
            [['name', 'phone1', 'phone2', 'phone3', 'email1', 'email2', 'postal_address', 'town', 'physical_address', 'main'], 'safe'],
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
        $query = Campuses::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'inst_id' => $this->inst_id,
            'county' => $this->county,
            'constituency' => $this->constituency,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'phone1', $this->phone1])
            ->andFilterWhere(['like', 'phone2', $this->phone2])
            ->andFilterWhere(['like', 'phone3', $this->phone3])
            ->andFilterWhere(['like', 'email1', $this->email1])
            ->andFilterWhere(['like', 'email2', $this->email2])
            ->andFilterWhere(['like', 'postal_address', $this->postal_address])
            ->andFilterWhere(['like', 'town', $this->town])
            ->andFilterWhere(['like', 'physical_address', $this->physical_address])
            ->andFilterWhere(['like', 'main', $this->main]);

        return $dataProvider;
    }
}
