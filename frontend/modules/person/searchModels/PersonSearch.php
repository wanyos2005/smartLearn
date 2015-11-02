<?php

namespace app\modules\person\searchModels;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\person\models\Person;

/**
 * PersonSearch represents the model behind the search form about `app\modules\person\models\Person`.
 */
class PersonSearch extends Person
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cse_yr', 'grade'], 'integer'],
            [['fname', 'mname', 'lname', 'gender', 'dob', 'id_no', 'phone', 'cse_index'], 'safe'],
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
        $query = Person::find();

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
            'dob' => $this->dob,
            'cse_yr' => $this->cse_yr,
            'grade' => $this->grade,
        ]);

        $query->andFilterWhere(['like', 'fname', $this->fname])
            ->andFilterWhere(['like', 'mname', $this->mname])
            ->andFilterWhere(['like', 'lname', $this->lname])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'id_no', $this->id_no])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'cse_index', $this->cse_index]);

        return $dataProvider;
    }
}
