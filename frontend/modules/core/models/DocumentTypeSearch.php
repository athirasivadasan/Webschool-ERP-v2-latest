<?php

namespace frontend\modules\core\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\core\models\DocumentType;

/**
 * DocumentTypeSearch represents the model behind the search form of `frontend\modules\core\models\DocumentType`.
 */
class DocumentTypeSearch extends DocumentType
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['document_type_id', 'status'], 'integer'],
            [['document_name', 'slug'], 'safe'],
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
        $query = DocumentType::find();

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
            'document_type_id' => $this->document_type_id,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'document_name', $this->document_name])
            ->andFilterWhere(['like', 'slug', $this->slug]);

        return $dataProvider;
    }
}
