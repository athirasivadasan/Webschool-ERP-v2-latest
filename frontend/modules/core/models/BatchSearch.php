<?php

namespace frontend\modules\core\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\core\models\Batch;

/**
 * BatchSearch represents the model behind the search form of `frontend\modules\core\models\Batch`.
 */
class BatchSearch extends Batch
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['batchid', 'institutionid', 'courseid'], 'integer'],
            [['batch_name', 'batch_startdate', 'batch_enddate', 'max_no_of_students', 'venue', 'slug'], 'safe'],
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
        $query = Batch::find();

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
            'batchid' => $this->batchid,
            'institutionid' => $this->institutionid,
            'courseid' => $this->courseid,
            'batch_startdate' => $this->batch_startdate,
            'batch_enddate' => $this->batch_enddate,
        ]);

        $query->andFilterWhere(['like', 'batch_name', $this->batch_name])
            ->andFilterWhere(['like', 'max_no_of_students', $this->max_no_of_students])
            ->andFilterWhere(['like', 'venue', $this->venue])
            ->andFilterWhere(['like', 'slug', $this->slug]);

        return $dataProvider;
    }
}
