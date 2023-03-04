<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BloodCollection;

/**
 * BloodCollectionFilter represents the model behind the search form of `app\models\BloodCollection`.
 */
class BloodCollectionFilter extends BloodCollection
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'donor_id'], 'integer'],
            [['bag_no', 'blood_bag', 'start_time', 'end_time', 'vein', 'wb', 'prbc', 'ffp', 'plts', 'over_coll', 'low_coll', 'fair_coll', 'created_at', 'updated_at', 'tube_reference_no', 'blood_bag_reference_no'], 'safe'],
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
        $query = BloodCollection::find();

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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'bag_no', $this->bag_no])
            ->andFilterWhere(['like', 'blood_bag', $this->blood_bag])
            ->andFilterWhere(['like', 'start_time', $this->start_time])
            ->andFilterWhere(['like', 'end_time', $this->end_time])
            ->andFilterWhere(['like', 'vein', $this->vein])
            ->andFilterWhere(['like', 'wb', $this->wb])
            ->andFilterWhere(['like', 'prbc', $this->prbc])
            ->andFilterWhere(['like', 'ffp', $this->ffp])
            ->andFilterWhere(['like', 'plts', $this->plts])
            ->andFilterWhere(['like', 'over_coll', $this->over_coll])
            ->andFilterWhere(['like', 'low_coll', $this->low_coll])
            ->andFilterWhere(['like', 'fair_coll', $this->fair_coll])
            ->andFilterWhere(['like', 'tube_reference_no', $this->tube_reference_no])
            ->andFilterWhere(['like', 'blood_bag_reference_no', $this->blood_bag_reference_no]);

        return $dataProvider;
    }
}
