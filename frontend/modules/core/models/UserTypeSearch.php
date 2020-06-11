<?php

namespace frontend\modules\core\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\core\models\UserType;

/**
 * UserTypeSearch represents the model behind the search form of `frontend\modules\core\models\UserType`.
 */
class UserTypeSearch extends UserType
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usertypeid', 'status'], 'integer'],
            [['usertype_name', 'slug'], 'safe'],
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
        $query = UserType::find();

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
            'usertypeid' => $this->usertypeid,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'usertype_name', $this->usertype_name])
            ->andFilterWhere(['like', 'slug', $this->slug]);

        return $dataProvider;
    }
}
