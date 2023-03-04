<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\BloodCollectionFilter $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="blood-collection-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'donor_id') ?>

    <?= $form->field($model, 'bag_no') ?>

    <?= $form->field($model, 'blood_bag') ?>

    <?= $form->field($model, 'start_time') ?>

    <?php // echo $form->field($model, 'end_time') ?>

    <?php // echo $form->field($model, 'vein') ?>

    <?php // echo $form->field($model, 'wb') ?>

    <?php // echo $form->field($model, 'prbc') ?>

    <?php // echo $form->field($model, 'ffp') ?>

    <?php // echo $form->field($model, 'plts') ?>

    <?php // echo $form->field($model, 'over_coll') ?>

    <?php // echo $form->field($model, 'low_coll') ?>

    <?php // echo $form->field($model, 'fair_coll') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'tube_reference_no') ?>

    <?php // echo $form->field($model, 'blood_bag_reference_no') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
