<?php

namespace frontend\modules\core\models;

use frontend\modules\core\models\Student;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * StudentSearch represents the model behind the search form of `frontend\modules\core\models\Student`.
 */
class StudentSearch extends Student
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id', 'course_id', 'batch_id', 'student_category_id', 'student_previous_qualification_id', 'institution_id', 'guardian_id', 'parent_id', 'student_rollno', 'status', 'academic_id', 'student_house_id'], 'integer'],
            [['student_admission_no', 'student_userid', 'student_admission_date', 'student_first_name', 'student_middle_name', 'student_last_name', 'student_dob', 'student_gender', 'student_blood_group', 'student_birthplace', 'student_nationality', 'student_mothertoung', 'student_religion', 'student_caste', 'student_address1', 'student_address2', 'student_city', 'student_state', 'student_pincode', 'student_country', 'student_phone', 'student_mobile', 'student_email', 'student_photo', 'student_idcard_issue_date', 'student_aadhar', 'student_abilities', 'student_hobbies', 'withdraw_date', 'document_typeid', 'slug'], 'safe'],
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
        $query = Student::find();

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
            'student_id' => $this->student_id,
            'student_admission_date' => $this->student_admission_date,
            'student_dob' => $this->student_dob,
            'course_id' => $this->course_id,
            'batch_id' => $this->batch_id,
            'student_category_id' => $this->student_category_id,
            'student_previous_qualification_id' => $this->student_previous_qualification_id,
            'institution_id' => $this->institution_id,
            'guardian_id' => $this->guardian_id,
            'parent_id' => $this->parent_id,
            'student_idcard_issue_date' => $this->student_idcard_issue_date,
            'student_rollno' => $this->student_rollno,
            'status' => $this->status,
            'withdraw_date' => $this->withdraw_date,
            'academic_id' => $this->academic_id,
            'student_house_id' => $this->student_house_id,
        ]);

        $query->andFilterWhere(['like', 'student_admission_no', $this->student_admission_no])
            ->andFilterWhere(['like', 'student_userid', $this->student_userid])
            ->andFilterWhere(['like', 'student_first_name', $this->student_first_name])
            ->andFilterWhere(['like', 'student_middle_name', $this->student_middle_name])
            ->andFilterWhere(['like', 'student_last_name', $this->student_last_name])
            ->andFilterWhere(['like', 'student_gender', $this->student_gender])
            ->andFilterWhere(['like', 'student_blood_group', $this->student_blood_group])
            ->andFilterWhere(['like', 'student_birthplace', $this->student_birthplace])
            ->andFilterWhere(['like', 'student_nationality', $this->student_nationality])
            ->andFilterWhere(['like', 'student_mothertoung', $this->student_mothertoung])
            ->andFilterWhere(['like', 'student_religion', $this->student_religion])
            ->andFilterWhere(['like', 'student_caste', $this->student_caste])
            ->andFilterWhere(['like', 'student_address1', $this->student_address1])
            ->andFilterWhere(['like', 'student_address2', $this->student_address2])
            ->andFilterWhere(['like', 'student_city', $this->student_city])
            ->andFilterWhere(['like', 'student_state', $this->student_state])
            ->andFilterWhere(['like', 'student_pincode', $this->student_pincode])
            ->andFilterWhere(['like', 'student_country', $this->student_country])
            ->andFilterWhere(['like', 'student_phone', $this->student_phone])
            ->andFilterWhere(['like', 'student_mobile', $this->student_mobile])
            ->andFilterWhere(['like', 'student_email', $this->student_email])
            ->andFilterWhere(['like', 'student_photo', $this->student_photo])
            ->andFilterWhere(['like', 'student_aadhar', $this->student_aadhar])
            ->andFilterWhere(['like', 'student_abilities', $this->student_abilities])
            ->andFilterWhere(['like', 'student_hobbies', $this->student_hobbies])
            ->andFilterWhere(['like', 'document_typeid', $this->document_typeid])
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

        $query = Student::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => array('pageSize' => 10),
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // $query->where('0=1');
            return $dataProvider;
        }
        

        if (isset($_POST['StudentSearch'])) {
          

            $search = $_POST['StudentSearch']['student_admission_no'];

            $query->orFilterWhere([
                'course_id' => $this->course_id,
                'batch_id' => $this->batch_id,
            ]);
         
            $query->orFilterWhere(['OR',
                ['like', 'student_admission_no', $search],
                ['like', 'student_first_name', $search],
            ]);

            


        }

        return $dataProvider;
    }
}
