<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "donors".
 *
 * @property int $id
 * @property string|null $reg_no
 * @property string $name
 * @property string $father_name
 * @property string $dob
 * @property float $weight
 * @property string|null $blood_group
 * @property string|null $last_date_donation
 * @property int|null $no_of_donation
 * @property string|null $class
 * @property string $gender
 * @property string|null $cnic
 * @property string $address
 * @property string|null $email
 * @property string|null $telephone_number
 * @property string $whatsapp_number
 * @property string $donor_type
 * @property int|null $compaign_id
 * @property int|null $patient_id
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $sr_no
 * @property string|null $collection_status
 * @property string|null $deleted_at
 *
 * @property Answer[] $answers
 * @property BloodBank[] $bloodBanks
 */
class Donor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'donors';
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
            [['name', 'father_name', 'dob', 'weight', 'gender', 'address', 'whatsapp_number', 'donor_type','sr_no'], 'required'],
            [['dob', 'last_date_donation', 'collection_status'], 'string'],
            [['weight'], 'number'],
            [['no_of_donation', 'compaign_id', 'patient_id'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['reg_no', 'name', 'father_name', 'blood_group', 'class', 'gender', 'cnic', 'address', 'email', 'telephone_number', 'whatsapp_number', 'donor_type'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'reg_no' => 'Reg No',
            'name' => 'Name',
            'father_name' => 'Father Name',
            'dob' => 'Dob',
            'weight' => 'Weight',
            'blood_group' => 'Blood Group',
            'last_date_donation' => 'Last Date Donation',
            'no_of_donation' => 'No Of Donation',
            'class' => 'Class',
            'gender' => 'Gender',
            'cnic' => 'Cnic',
            'address' => 'Address',
            'email' => 'Email',
            'telephone_number' => 'Telephone Number',
            'whatsapp_number' => 'Whatsapp Number',
            'donor_type' => 'Donor Type',
            'compaign_id' => 'Compaign ID',
            'patient_id' => 'Patient ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'sr_no' => 'Sr No',
            'collection_status' => 'Collection Status',
            'deleted_at' => 'Deleted At',
        ];
    }

    /**
     * Gets query for [[Answers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAnswers()
    {
        return $this->hasMany(Answer::class, ['donor_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCpDetails()
    {
        return $this->hasMany(BloodCPDetail::class, ['donor_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCollections()
    {
        return $this->hasMany(BloodCollection::class, ['donor_id' => 'id']);
    }

    /**
     * Gets query for [[BloodBanks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBloodBanks()
    {
        return $this->hasMany(BloodBank::class, ['donor_id' => 'id']);
    }
}
