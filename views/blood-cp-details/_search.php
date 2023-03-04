<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\BloodCPDetailFilter $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="blood-cpdetail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'donor_id') ?>

    <?= $form->field($model, 'p_id') ?>

    <?= $form->field($model, 'wbc') ?>

    <?= $form->field($model, 'plt') ?>

    <?php // echo $form->field($model, 'hb') ?>

    <?php // echo $form->field($model, 'mcv') ?>

    <?php // echo $form->field($model, 'hbs_ag') ?>

    <?php // echo $form->field($model, 'mch') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'neutrophil') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
