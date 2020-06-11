<?php

namespace frontend\modules\core\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\core\models\Subject;

/**
 * SubjectSearch represents the model behind the search form of `frontend\modules\core\models\Subject`.
 */
class SubjectSearch extends Subject
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['subject_id', 'status'], 'integer'],
            [['subject_name', 'subject_code', 'subject_description', 'slug'], 'safe'],
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
        $query = Subject::find();

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
            'subject_id' => $this->subject_id,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'subject_name', $this->subject_name])
            ->andFilterWhere(['like', 'subject_code', $this->subject_code])
            ->andFilterWhere(['like', 'subject_description', $this->subject_description])
            ->andFilterWhere(['like', 'slug', $this->slug]);

        return $dataProvider;
    }
}
