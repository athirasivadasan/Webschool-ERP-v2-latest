<?php

namespace frontend\modules\bank\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\bank\models\BankDetails;

/**
 * BankDetailsSearch represents the model behind the search form of `frontend\modules\bank\models\BankDetails`.
 */
class BankDetailsSearch extends BankDetails
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bank_id', 'status'], 'integer'],
            [['bank_name', 'slug'], 'safe'],
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
        $query = BankDetails::find();

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
            'bank_id' => $this->bank_id,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'bank_name', $this->bank_name])
            ->andFilterWhere(['like', 'slug', $this->slug]);

        return $dataProvider;
    }
}
