<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "blood_collections".
 *
 * @property int $id
 * @property int $donor_id
 * @property string|null $bag_no
 * @property string|null $blood_bag
 * @property string|null $start_time
 * @property string|null $end_time
 * @property string|null $vein
 * @property string|null $wb
 * @property string|null $prbc
 * @property string|null $ffp
 * @property string|null $plts
 * @property string|null $over_coll
 * @property string|null $low_coll
 * @property string|null $fair_coll
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string $tube_reference_no
 * @property string|null $blood_bag_reference_no
 */
class BloodCollection extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blood_collections';
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => \yii\behaviors\TimestampBehavior::className(),
                'attributes' => [
                    \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    \yii\db\ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => new \yii\db\Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['donor_id', 'tube_reference_no', 'blood_bag_reference_no'], 'required'],
            [['donor_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['tube_reference_no'], 'string'],
            [['bag_no', 'blood_bag', 'start_time', 'end_time', 'vein', 'wb', 'prbc', 'ffp', 'plts', 'over_coll', 'low_coll', 'fair_coll', 'blood_bag_reference_no'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'donor_id' => 'Donor ID',
            'bag_no' => 'Bag No',
            'blood_bag' => 'Blood Bag',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'vein' => 'Vein',
            'wb' => 'Wb',
            'prbc' => 'Prbc',
            'ffp' => 'Ffp',
            'plts' => 'Plts',
            'over_coll' => 'Over Coll',
            'low_coll' => 'Low Coll',
            'fair_coll' => 'Fair Coll',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'tube_reference_no' => 'Tube Reference No',
            'blood_bag_reference_no' => 'Blood Bag Reference No',
        ];
    }
}
