<?php

namespace frontend\modules\core\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\core\models\EmployeeDetails;

/**
 * EmployeeDetailsSearch represents the model behind the search form of `frontend\modules\core\models\EmployeeDetails`.
 */
class EmployeeDetailsSearch extends EmployeeDetails
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['employee_details_id', 'employee_id'], 'integer'],
            [['employeedetails_address1', 'employeedetails_city1', 'employeedetails_state1', 'employeedetails_country1', 'employeedetails_pincode1', 'employeedetails_address2', 'employeedetails_city2', 'employeedetails_state2', 'employeedetails_country2', 'employeedetails_pincode2', 'employeedetails_phone', 'employeedetails_mobile', 'employeedetails_email', 'employeedetails_photo', 'employeedetails_aadhar', 'employeedetails_pan', 'employeedetails_pf', 'employeedetails_esi', 'slug'], 'safe'],
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
        $query = EmployeeDetails::find();

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
            'employee_details_id' => $this->employee_details_id,
            'employee_id' => $this->employee_id,
        ]);

        $query->andFilterWhere(['like', 'employeedetails_address1', $this->employeedetails_address1])
            ->andFilterWhere(['like', 'employeedetails_city1', $this->employeedetails_city1])
            ->andFilterWhere(['like', 'employeedetails_state1', $this->employeedetails_state1])
            ->andFilterWhere(['like', 'employeedetails_country1', $this->employeedetails_country1])
            ->andFilterWhere(['like', 'employeedetails_pincode1', $this->employeedetails_pincode1])
            ->andFilterWhere(['like', 'employeedetails_address2', $this->employeedetails_address2])
            ->andFilterWhere(['like', 'employeedetails_city2', $this->employeedetails_city2])
            ->andFilterWhere(['like', 'employeedetails_state2', $this->employeedetails_state2])
            ->andFilterWhere(['like', 'employeedetails_country2', $this->employeedetails_country2])
            ->andFilterWhere(['like', 'employeedetails_pincode2', $this->employeedetails_pincode2])
            ->andFilterWhere(['like', 'employeedetails_phone', $this->employeedetails_phone])
            ->andFilterWhere(['like', 'employeedetails_mobile', $this->employeedetails_mobile])
            ->andFilterWhere(['like', 'employeedetails_email', $this->employeedetails_email])
            ->andFilterWhere(['like', 'employeedetails_photo', $this->employeedetails_photo])
            ->andFilterWhere(['like', 'employeedetails_aadhar', $this->employeedetails_aadhar])
            ->andFilterWhere(['like', 'employeedetails_pan', $this->employeedetails_pan])
            ->andFilterWhere(['like', 'employeedetails_pf', $this->employeedetails_pf])
            ->andFilterWhere(['like', 'employeedetails_esi', $this->employeedetails_esi])
            ->andFilterWhere(['like', 'slug', $this->slug]);

        return $dataProvider;
    }
}
