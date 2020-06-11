<?php

namespace frontend\modules\core\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\core\models\Course;

/**
 * CourseSearch represents the model behind the search form of `frontend\modules\core\models\Course`.
 */
class CourseSearch extends Course
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['courseid', 'attendancetype', 'status'], 'integer'],
            [['course_name', 'course_description', 'course_code', 'minimumattendance', 'totalworkingdays', 'slug'], 'safe'],
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
        $query = Course::find();

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
            'courseid' => $this->courseid,
            'attendancetype' => $this->attendancetype,
            'status' => $this->status
        ]);

        $query->andFilterWhere(['like', 'course_name', $this->course_name])
            ->andFilterWhere(['like', 'course_description', $this->course_description])
            ->andFilterWhere(['like', 'course_code', $this->course_code])
            ->andFilterWhere(['like', 'minimumattendance', $this->minimumattendance])
            ->andFilterWhere(['like', 'totalworkingdays', $this->totalworkingdays])
            ->andFilterWhere(['like', 'slug', $this->slug]);

        return $dataProvider;
    }
}
