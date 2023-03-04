<?php

use app\models\BloodCPDetail;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\BloodCPDetailFilter $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Blood Cp Details');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blood-cpdetail-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', ' + Enter Blood Cp Detail'), ['create'], ['class' => 'btn btn-success']) ?>
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
//            'p_id',
            'wbc',
            'plt',
            'hb',
            'mcv',
            'hbs_ag',
            'mch',
//            'status',
            'neutrophil',
            [
                'attribute' => 'created_at',
                'label' => 'Created',
                'value' => function ($model) {
                    return date('d M, Y', strtotime($model->created_at));
                }
            ],            //'updated_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, BloodCPDetail $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                },
                'template' => '{view} {update}'
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
