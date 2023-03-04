<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "answers".
 *
 * @property int $id
 * @property int|null $donor_id
 * @property string $answer
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Donor $donor
 */
class Answer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'answers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['donor_id'], 'integer'],
            [['donor_id'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['answer'],'safe'],
            [['donor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Donor::class, 'targetAttribute' => ['donor_id' => 'id']],
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
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'donor_id' => 'Donor ID',
            'answer' => 'Answer',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Donor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDonor()
    {
        return $this->hasOne(Donor::class, ['id' => 'donor_id']);
    }
}
