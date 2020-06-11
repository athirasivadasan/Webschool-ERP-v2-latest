<?php

namespace frontend\modules\core\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\core\models\StudentHouse;

/**
 * StudentHouseSearch represents the model behind the search form of `frontend\modules\core\models\StudentHouse`.
 */
class StudentHouseSearch extends StudentHouse
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_house_id', 'status'], 'integer'],
            [['student_house_name', 'slug'], 'safe'],
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
        $query = StudentHouse::find();

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
            'student_house_id' => $this->student_house_id,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'student_house_name', $this->student_house_name])
            ->andFilterWhere(['like', 'slug', $this->slug]);

        return $dataProvider;
    }
}
