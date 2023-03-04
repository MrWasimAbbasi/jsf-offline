<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BloodCPDetail $model */
/** @var app\models\DonorQuestion $donor_questions */
/** @var app\models\Answer $donor_answers */


$this->title = Yii::t('app', 'Enter Blood Cp Detail');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Blood Cp Details'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blood-cpdetail-create">

    <h2><?= Html::encode($this->title) ?></h2>
    <span style="font-size: 12px;color: red"> (Only those donors whose reg_no & hb is not entered yet!)</span>
    <hr/>
    <?= $this->render('_form', [
        'model' => $model,
        'donor_questions' => $donor_questions,
        'donor_answers' => $donor_answers,
    ]) ?>

</div>
