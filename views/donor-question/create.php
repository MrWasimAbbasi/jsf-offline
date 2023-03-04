<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\DonorQuestion $model */

$this->title = Yii::t('app', 'Create Donor Question');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Donor Questions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="donor-question-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
