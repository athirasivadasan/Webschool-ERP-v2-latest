<?php

namespace frontend\modules\core\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\core\models\Employee;

/**
 * EmployeeSearch represents the model behind the search form of `frontend\modules\core\models\Employee`.
 */
class EmployeeSearch extends Employee
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['employee_id', 'employee_gender', 'department_id', 'employee_designation', 'institution_id', 'employee_type_id', 'status', 'created_by', 'updated_by'], 'integer'],
            [['employee_code', 'employee_firstname', 'employee_middlename', 'employee_lastname', 'employee_dob', 'employee_qualification', 'employee_experience', 'idcard_issue_date', 'employee_joiningdate', 'withdrawdate', 'cardno', 'slug', 'created_at', 'updated_at'], 'safe'],
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
        $query = Employee::find();

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
            'employee_id' => $this->employee_id,
            'employee_dob' => $this->employee_dob,
            'employee_gender' => $this->employee_gender,
            'department_id' => $this->department_id,
            'employee_designation' => $this->employee_designation,
            'institution_id' => $this->institution_id,
            'employee_type_id' => $this->employee_type_id,
            'idcard_issue_date' => $this->idcard_issue_date,
            'employee_joiningdate' => $this->employee_joiningdate,
            'status' => $this->status,
            'withdrawdate' => $this->withdrawdate,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'employee_code', $this->employee_code])
            ->andFilterWhere(['like', 'employee_firstname', $this->employee_firstname])
            ->andFilterWhere(['like', 'employee_middlename', $this->employee_middlename])
            ->andFilterWhere(['like', 'employee_lastname', $this->employee_lastname])
            ->andFilterWhere(['like', 'employee_qualification', $this->employee_qualification])
            ->andFilterWhere(['like', 'employee_experience', $this->employee_experience])
            ->andFilterWhere(['like', 'cardno', $this->cardno])
            ->andFilterWhere(['like', 'slug', $this->slug]);

        return $dataProvider;
    }
     /**
     * Creates data provider instance with search query applied  //custom search function
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function searchData($params)
    {

        $query = Employee::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => array('pageSize' => 10),
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // $query->where('0=1');
            return $dataProvider;
        }
        

        if (isset($_POST['EmployeeSearch'])) {
          

            $search = $_POST['EmployeeSearch']['employee_firstname'];

            $query->orFilterWhere(['like', 'employee_code', $search])
            ->orFilterWhere(['like', 'employee_firstname', $search])
            ->orFilterWhere(['like', 'employee_middlename', $search])
            ->orFilterWhere(['like', 'employee_lastname', $search])
            ->orFilterWhere(['like', 'employee_qualification', $search])
            ->orFilterWhere(['like', 'employee_experience', $search]);
        }

        return $dataProvider;
    }
}