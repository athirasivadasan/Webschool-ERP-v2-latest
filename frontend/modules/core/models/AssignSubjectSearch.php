<?php

namespace frontend\modules\core\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\core\models\AssignSubject;

/**
 * AssignSubjectSearch represents the model behind the search form of `frontend\modules\core\models\AssignSubject`.
 */
class AssignSubjectSearch extends AssignSubject
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['assign_subject_id', 'subject_id', 'course_id', 'batch_id', 'institution_id', 'ccesubjectgroup'], 'integer'],
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
        $query = AssignSubject::find();

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
            'assign_subject_id' => $this->assign_subject_id,
            'subject_id' => $this->subject_id,
            'course_id' => $this->course_id,
            'batch_id' => $this->batch_id,
            'institution_id' => $this->institution_id,
            'ccesubjectgroup' => $this->ccesubjectgroup,
        ]);

        return $dataProvider;
    }
}
