<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Donor $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Donors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="donor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'reg_no',
            'name',
            'father_name',
            'dob:ntext',
            'weight',
            'blood_group',
            'last_date_donation:ntext',
            'no_of_donation',
            'class',
            'gender',
            'cnic',
            'address',
            'email:email',
            'telephone_number',
            'whatsapp_number',
            'donor_type',
            'compaign_id',
            'patient_id',
            'created_at',
            'updated_at',
            'sr_no',
            'collection_status:ntext',
            'deleted_at',
        ],
    ]) ?>

</div>
