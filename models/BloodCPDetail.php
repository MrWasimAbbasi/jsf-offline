<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "blood_c_p_details".
 *
 * @property int $id
 * @property int|null $donor_id
 * @property int|null $p_id
 * @property string|null $wbc
 * @property string|null $plt
 * @property string $hb
 * @property string|null $mcv
 * @property string|null $hbs_ag
 * @property string|null $mch
 * @property string|null $status
 * @property string|null $neutrophil
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class BloodCPDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blood_c_p_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['donor_id', 'p_id'], 'integer'],
            [['hb'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['wbc', 'plt', 'hb', 'mcv', 'hbs_ag', 'mch', 'status', 'neutrophil'], 'string', 'max' => 255],
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
            'p_id' => 'P ID',
            'wbc' => 'Wbc',
            'plt' => 'Plt',
            'hb' => 'Hb',
            'mcv' => 'Mcv',
            'hbs_ag' => 'Hbs Ag',
            'mch' => 'Mch',
            'status' => 'Status',
            'neutrophil' => 'Neutrophil',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
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
    public function getDonor()
    {
        return $this->hasOne(Donor::class, ['id' => 'donor_id']);
    }
}
