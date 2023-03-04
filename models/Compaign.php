<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "compaigns".
 *
 * @property int $id
 * @property string $type
 * @property string $name
 * @property string|null $contact_no
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string $status
 * @property string|null $total_collection
 * @property string $next_date
 * @property string $coordinator
 */
class Compaign extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'compaigns';
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
            [['type', 'name', 'next_date', 'coordinator'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['type', 'name', 'contact_no', 'status', 'total_collection', 'next_date', 'coordinator'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'name' => 'Name',
            'contact_no' => 'Contact No',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
            'total_collection' => 'Total Collection',
            'next_date' => 'Next Date',
            'coordinator' => 'Coordinator',
        ];
    }
}
