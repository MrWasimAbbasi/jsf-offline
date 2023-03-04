<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\BloodCPDetail $model */

$this->title = 'Donor : '.$model->donor->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Blood Cp Details'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="blood-cpdetail-view">

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
            'donor_id',
            'p_id',
            'wbc',
            'plt',
            'hb',
            'mcv',
            'hbs_ag',
            'mch',
            'status',
            'neutrophil',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
