<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\DonorFilter $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="donor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'reg_no') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'father_name') ?>

    <?= $form->field($model, 'dob') ?>

    <?php // echo $form->field($model, 'weight') ?>

    <?php // echo $form->field($model, 'blood_group') ?>

    <?php // echo $form->field($model, 'last_date_donation') ?>

    <?php // echo $form->field($model, 'no_of_donation') ?>

    <?php // echo $form->field($model, 'class') ?>

    <?php // echo $form->field($model, 'gender') ?>

    <?php // echo $form->field($model, 'cnic') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'telephone_number') ?>

    <?php // echo $form->field($model, 'whatsapp_number') ?>

    <?php // echo $form->field($model, 'donor_type') ?>

    <?php // echo $form->field($model, 'compaign_id') ?>

    <?php // echo $form->field($model, 'patient_id') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'sr_no') ?>

    <?php // echo $form->field($model, 'collection_status') ?>

    <?php // echo $form->field($model, 'deleted_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
