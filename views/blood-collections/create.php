<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BloodCollection $model */

$this->title = Yii::t('app', 'Add Blood Collection');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Blood Collections'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blood-collection-create">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
