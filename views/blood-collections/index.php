<?php

use app\models\BloodCollection;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\BloodCollectionFilter $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Blood Collections');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blood-collection-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Blood Collection'), ['create'], ['class' => 'btn btn-success']) ?>
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
            [
                'attribute' => 'donor_id',
                'label' => 'Donor',
                'value' => function ($model) {
                    $donor = \app\models\Donor::findOne($model->donor_id);
                    return $donor ? $donor->name : '-';
                }
            ],
            'bag_no',
            'blood_bag',
            'start_time',
//            'end_time',
//            'vein',
//            'wb',
//            'prbc',
//            'ffp',
//            'plts',
            'over_coll',
            'low_coll',
            'fair_coll',
            [
                'attribute' => 'created_at',
                'label' => 'Created',
                'value' => function ($model) {
                    return date('d M, Y', strtotime($model->created_at));
                }
            ],              //'updated_at',
            'tube_reference_no:ntext',
            'blood_bag_reference_no',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, BloodCollection $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                },
                'template' => '{view} {update}'
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
