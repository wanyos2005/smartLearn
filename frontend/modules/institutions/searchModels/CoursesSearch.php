<?php

namespace app\modules\institutions\searchModels;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\institutions\models\Courses;

/**
 * CoursesSearch represents the model behind the search form about `app\modules\institutions\models\Courses`.
 */
class CoursesSearch extends Courses
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'inst_id', 'annual_fees', 'course_duration', 'sessions_per_year'], 'integer'],
            [['course_type', 'course_name', 'mean_grade', 'active'], 'safe'],
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
        $query = Courses::find();

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
            'annual_fees' => $this->annual_fees,
            'course_duration' => $this->course_duration,
            'sessions_per_year' => $this->sessions_per_year,
        ]);

        $query->andFilterWhere(['like', 'course_type', $this->course_type])
            ->andFilterWhere(['like', 'course_name', $this->course_name])
            ->andFilterWhere(['like', 'mean_grade', $this->mean_grade])
            ->andFilterWhere(['like', 'active', $this->active]);

        return $dataProvider;
    }
}
