<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BloodCPDetail $model */

$this->title = Yii::t('app', 'Update Blood Cp Detail: {name}', [
    'name' => $model->donor->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Blood Cp Details'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="blood-cpdetail-update">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
