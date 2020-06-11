<?php

namespace frontend\modules\core\models;

use frontend\modules\core\models\SubjectAllocation;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * SubjectAllocationSearch represents the model behind the search form of `frontend\modules\core\models\SubjectAllocation`.
 */
class SubjectAllocationSearch extends SubjectAllocation
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // [['subjectallocation_id', 'course_id', 'batch_id', 'subject_id', 'institution_id', 'employee_id', 'department_id', 'academic_id'], 'integer'],
            [['subjectallocation_id', 'institution_id', 'academic_id'], 'integer'],
            [['course_id', 'batch_id', 'subject_id', 'employee_id', 'department_id'], 'string'],
            [['slug'], 'safe'],
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
        $query = SubjectAllocation::find();

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
            'subjectallocation_id' => $this->subjectallocation_id,
            'course_id' => $this->course_id,
            'batch_id' => $this->batch_id,
            'subject_id' => $this->subject_id,
            'institution_id' => $this->institution_id,
            'employee_id' => $this->employee_id,
            'department_id' => $this->department_id,
            'academic_id' => $this->academic_id,
        ]);

        $query->andFilterWhere(['like', 'slug', $this->slug]);

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

        $query = SubjectAllocation::find()->joinWith('employee')->joinWith('department')->joinWith('subject')->joinWith('course');
        

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

        if (isset($_POST['SubjectAllocationSearch'])) {

            $search = $_POST['SubjectAllocationSearch']['search'];
           
            $query->orFilterWhere(['OR',
                ['like', 'department.department_name', $search],
                ['like', 'employee.employee_firstname', $search],
                ['like', 'subject.subject_name', $search],
                ['like', 'course.course_name', $search],
            ]);

        }

        return $dataProvider;
    }
}
