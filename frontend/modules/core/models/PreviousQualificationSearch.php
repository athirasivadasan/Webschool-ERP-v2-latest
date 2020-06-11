<?php

namespace frontend\modules\core\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\core\models\PreviousQualification;

/**
 * PreviousQualificationSearch represents the model behind the search form of `frontend\modules\core\models\PreviousQualification`.
 */
class PreviousQualificationSearch extends PreviousQualification
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['previousqualification_id', 'score', 'online_enquiryid', 'status'], 'integer'],
            [['qualification', 'previousqualification_schoolname', 'previousqualification_address', 'slug'], 'safe'],
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
        $query = PreviousQualification::find();

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
            'previousqualification_id' => $this->previousqualification_id,
            'score' => $this->score,
            'online_enquiryid' => $this->online_enquiryid,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'qualification', $this->qualification])
            ->andFilterWhere(['like', 'previousqualification_schoolname', $this->previousqualification_schoolname])
            ->andFilterWhere(['like', 'previousqualification_address', $this->previousqualification_address])
            ->andFilterWhere(['like', 'slug', $this->slug]);

        return $dataProvider;
    }
}
