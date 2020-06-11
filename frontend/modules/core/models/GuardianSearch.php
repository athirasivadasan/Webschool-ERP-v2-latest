<?php

namespace frontend\modules\core\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\core\models\Guardian;

/**
 * GuardianSearch represents the model behind the search form of `frontend\modules\core\models\Guardian`.
 */
class GuardianSearch extends Guardian
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['guardian_id', 'status'], 'integer'],
            [['guardian_name', 'guardian_phone', 'guardian_address', 'guardian_city', 'guardian_state', 'guardian_country', 'guardian_email', 'guardian_photo', 'guardian_mobile', 'guardian_relation', 'guardian_education', 'guardian_occupation', 'guardian_income', 'slug'], 'safe'],
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
        $query = Guardian::find();

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
            'guardian_id' => $this->guardian_id,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'guardian_name', $this->guardian_name])
            ->andFilterWhere(['like', 'guardian_phone', $this->guardian_phone])
            ->andFilterWhere(['like', 'guardian_address', $this->guardian_address])
            ->andFilterWhere(['like', 'guardian_city', $this->guardian_city])
            ->andFilterWhere(['like', 'guardian_state', $this->guardian_state])
            ->andFilterWhere(['like', 'guardian_country', $this->guardian_country])
            ->andFilterWhere(['like', 'guardian_email', $this->guardian_email])
            ->andFilterWhere(['like', 'guardian_photo', $this->guardian_photo])
            ->andFilterWhere(['like', 'guardian_mobile', $this->guardian_mobile])
            ->andFilterWhere(['like', 'guardian_relation', $this->guardian_relation])
            ->andFilterWhere(['like', 'guardian_education', $this->guardian_education])
            ->andFilterWhere(['like', 'guardian_occupation', $this->guardian_occupation])
            ->andFilterWhere(['like', 'guardian_income', $this->guardian_income])
            ->andFilterWhere(['like', 'slug', $this->slug]);

        return $dataProvider;
    }
}
