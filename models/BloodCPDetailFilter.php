<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BloodCPDetail;

/**
 * BloodCPDetailFilter represents the model behind the search form of `app\models\BloodCPDetail`.
 */
class BloodCPDetailFilter extends BloodCPDetail
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'donor_id', 'p_id'], 'integer'],
            [['wbc', 'plt', 'hb', 'mcv', 'hbs_ag', 'mch', 'status', 'neutrophil', 'created_at', 'updated_at'], 'safe'],
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
        $query = BloodCPDetail::find();

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
            'id' => $this->id,
            'donor_id' => $this->donor_id,
            'p_id' => $this->p_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'wbc', $this->wbc])
            ->andFilterWhere(['like', 'plt', $this->plt])
            ->andFilterWhere(['like', 'hb', $this->hb])
            ->andFilterWhere(['like', 'mcv', $this->mcv])
            ->andFilterWhere(['like', 'hbs_ag', $this->hbs_ag])
            ->andFilterWhere(['like', 'mch', $this->mch])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'neutrophil', $this->neutrophil]);

        return $dataProvider;
    }
}
