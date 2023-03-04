<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Compaign $model */

$this->title = Yii::t('app', 'Create Compaign');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Compaigns'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="compaign-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
