<?php

namespace frontend\modules\bank\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\bank\models\EmployeeBankDetails;

/**
 * EmployeeBankDetailsSearch represents the model behind the search form of `frontend\modules\bank\models\EmployeeBankDetails`.
 */
class EmployeeBankDetailsSearch extends EmployeeBankDetails
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bank_details_id', 'bank_id', 'employee_id', 'created_by', 'updated_by'], 'integer'],
            [['bankdetails_address', 'bankdetails_phone', 'bankdetails_branch', 'bankdetails_ifsccode', 'bankdetails_accountno', 'bankdetails_dd_payable_address', 'slug', 'created_at', 'updated_at'], 'safe'],
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
        $query = EmployeeBankDetails::find();

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
            'bank_details_id' => $this->bank_details_id,
            'bank_id' => $this->bank_id,
            'employee_id' => $this->employee_id,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'bankdetails_address', $this->bankdetails_address])
            ->andFilterWhere(['like', 'bankdetails_phone', $this->bankdetails_phone])
            ->andFilterWhere(['like', 'bankdetails_branch', $this->bankdetails_branch])
            ->andFilterWhere(['like', 'bankdetails_ifsccode', $this->bankdetails_ifsccode])
            ->andFilterWhere(['like', 'bankdetails_accountno', $this->bankdetails_accountno])
            ->andFilterWhere(['like', 'bankdetails_dd_payable_address', $this->bankdetails_dd_payable_address])
            ->andFilterWhere(['like', 'slug', $this->slug]);

        return $dataProvider;
    }
}
