<?php

namespace app\modules\institutions\searchModels;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\institutions\models\Institutions;

/**
 * InstitutionsSearch represents the model behind the search form about `app\modules\institutions\models\Institutions`.
 */
class InstitutionsSearch extends Institutions
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['inst_name', 'inst_type', 'website', 'logo', 'motto', 'mission', 'vision', 'active'], 'safe'],
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
        $query = Institutions::find();

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
        ]);

        $query->andFilterWhere(['like', 'inst_name', $this->inst_name])
            ->andFilterWhere(['like', 'inst_type', $this->inst_type])
            ->andFilterWhere(['like', 'website', $this->website])
            ->andFilterWhere(['like', 'logo', $this->logo])
            ->andFilterWhere(['like', 'motto', $this->motto])
            ->andFilterWhere(['like', 'mission', $this->mission])
            ->andFilterWhere(['like', 'vision', $this->vision])
            ->andFilterWhere(['like', 'active', $this->active]);

        return $dataProvider;
    }
}
