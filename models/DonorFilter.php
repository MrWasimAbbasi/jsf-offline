<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Donor;

/**
 * DonorFilter represents the model behind the search form of `app\models\Donor`.
 */
class DonorFilter extends Donor
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'no_of_donation', 'compaign_id', 'patient_id'], 'integer'],
            [['reg_no', 'name', 'father_name', 'dob', 'blood_group', 'last_date_donation', 'class', 'gender', 'cnic', 'address', 'email', 'telephone_number', 'whatsapp_number', 'donor_type', 'created_at', 'updated_at', 'sr_no', 'collection_status', 'deleted_at'], 'safe'],
            [['weight'], 'number'],
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
        $query = Donor::find();

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
            'weight' => $this->weight,
            'no_of_donation' => $this->no_of_donation,
            'compaign_id' => $this->compaign_id,
            'patient_id' => $this->patient_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ]);

        $query->andFilterWhere(['like', 'reg_no', $this->reg_no])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'father_name', $this->father_name])
            ->andFilterWhere(['like', 'dob', $this->dob])
            ->andFilterWhere(['like', 'blood_group', $this->blood_group])
            ->andFilterWhere(['like', 'last_date_donation', $this->last_date_donation])
            ->andFilterWhere(['like', 'class', $this->class])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'cnic', $this->cnic])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'telephone_number', $this->telephone_number])
            ->andFilterWhere(['like', 'whatsapp_number', $this->whatsapp_number])
            ->andFilterWhere(['like', 'donor_type', $this->donor_type])
            ->andFilterWhere(['like', 'sr_no', $this->sr_no])
            ->andFilterWhere(['like', 'collection_status', $this->collection_status]);

        return $dataProvider;
    }
}
