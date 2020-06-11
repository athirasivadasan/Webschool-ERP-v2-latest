<?php

namespace frontend\modules\core\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\core\models\Academic;

/**
 * AcademicSearch represents the model behind the search form of `frontend\modules\core\models\Academic`.
 */
class AcademicSearch extends Academic
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['academicid', 'status'], 'integer'],
            [['academic_startyear', 'academic_endyear', 'academic_startmonth', 'academic_endmonth'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Academic::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'academicid' => $this->academicid,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'academic_startyear', $this->academic_startyear])
            ->andFilterWhere(['like', 'academic_endyear', $this->academic_endyear])
            ->andFilterWhere(['like', 'academic_startmonth', $this->academic_startmonth])
            ->andFilterWhere(['like', 'academic_endmonth', $this->academic_endmonth]);

        return $dataProvider;
    }
}
