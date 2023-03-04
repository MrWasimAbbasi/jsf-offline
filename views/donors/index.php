<?php

use app\models\Donor;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\DonorFilter $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Donors');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="donor-index table-responsive">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Donor'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pager' => [
            'class' => \yii\bootstrap5\LinkPager::class
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'reg_no',
            'sr_no',
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
//            'address',
            'email:email',
            'telephone_number',
            'whatsapp_number',
            'donor_type',
//            'patient_id',
            [
                'attribute' => 'compaign_id',
                'label' => 'Campaign',
                'value' => function ($model) {
                    $campaign = \app\models\Compaign::find()->where(['id' => $model->compaign_id])->one();
                    return $campaign ? $campaign->name : '-';
                }
            ],
            [
                'attribute' => 'created_at',
                'label' => 'Created',
                'value' => function ($model) {
                    return date('d M, Y', strtotime($model->created_at));
                }
            ],
//            'updated_at',
//            'collection_status:ntext',
            //'deleted_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Donor $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                },
                'template' => '{view} {update}'
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
