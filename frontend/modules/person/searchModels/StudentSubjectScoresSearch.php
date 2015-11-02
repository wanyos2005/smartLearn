<?php

namespace app\modules\person\searchModels;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\person\models\StudentSubjectScores;

/**
 * StudentSubjectScoresSearch represents the model behind the search form about `app\modules\person\models\StudentSubjectScores`.
 */
class StudentSubjectScoresSearch extends StudentSubjectScores
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'stud_id'], 'integer'],
            [['subject', 'grade'], 'safe'],
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
        $query = StudentSubjectScores::find();

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
            'stud_id' => $this->stud_id,
        ]);

        $query->andFilterWhere(['like', 'subject', $this->subject])
            ->andFilterWhere(['like', 'grade', $this->grade]);

        return $dataProvider;
    }
}
