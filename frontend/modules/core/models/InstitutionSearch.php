<?php

namespace frontend\modules\core\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\core\models\Institution;

/**
 * InstitutionSearch represents the model behind the search form of `frontend\modules\core\models\Institution`.
 */
class InstitutionSearch extends Institution
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['institution_id', 'institution_groupid', 'isautogeneration', 'status'], 'integer'],
            [['institution_name', 'institution_contactperson', 'institution_contactemail', 'institution_phone', 'institution_address', 'institution_fax', 'institution_mobile', 'institution_created_on', 'institution_updated_on', 'institution_language', 'institution_timezone', 'institution_logo', 'institution_country', 'institution_currency_type', 'institution_liscencestatus', 'institution_code', 'institution_facebookurl', 'institution_youtubeurl', 'institution_twitterurl', 'institution_website', 'slug'], 'safe'],
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
        $query = Institution::find();

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
            'institution_id' => $this->institution_id,
            'institution_created_on' => $this->institution_created_on,
            'institution_updated_on' => $this->institution_updated_on,
            'institution_groupid' => $this->institution_groupid,
            'isautogeneration' => $this->isautogeneration,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'institution_name', $this->institution_name])
            ->andFilterWhere(['like', 'institution_contactperson', $this->institution_contactperson])
            ->andFilterWhere(['like', 'institution_contactemail', $this->institution_contactemail])
            ->andFilterWhere(['like', 'institution_phone', $this->institution_phone])
            ->andFilterWhere(['like', 'institution_address', $this->institution_address])
            ->andFilterWhere(['like', 'institution_fax', $this->institution_fax])
            ->andFilterWhere(['like', 'institution_mobile', $this->institution_mobile])
            ->andFilterWhere(['like', 'institution_language', $this->institution_language])
            ->andFilterWhere(['like', 'institution_timezone', $this->institution_timezone])
            ->andFilterWhere(['like', 'institution_logo', $this->institution_logo])
            ->andFilterWhere(['like', 'institution_country', $this->institution_country])
            ->andFilterWhere(['like', 'institution_currency_type', $this->institution_currency_type])
            ->andFilterWhere(['like', 'institution_liscencestatus', $this->institution_liscencestatus])
            ->andFilterWhere(['like', 'institution_code', $this->institution_code])
            ->andFilterWhere(['like', 'institution_facebookurl', $this->institution_facebookurl])
            ->andFilterWhere(['like', 'institution_youtubeurl', $this->institution_youtubeurl])
            ->andFilterWhere(['like', 'institution_twitterurl', $this->institution_twitterurl])
            ->andFilterWhere(['like', 'institution_website', $this->institution_website])
            ->andFilterWhere(['like', 'slug', $this->slug]);

        return $dataProvider;
    }
}
