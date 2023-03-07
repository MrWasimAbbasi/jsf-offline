<?php

use app\models\Compaign;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Donor $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="donor-form">

    <?php $form = \yii\bootstrap5\ActiveForm::begin(); ?>
    <div class="row">
        <?php
        /**
         * dont show the reg_no on registration form...
         */
        if (!$model->isNewRecord) {
            ?>
            <div class="col-md-3">
                <?= $form->field($model, 'reg_no')->textInput(['maxlength' => true]) ?>
            </div>
        <?php } ?>
        <div class="col-md-3">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'father_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'dob')->textInput(['rows' => 6]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'weight')->textInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'blood_group')->dropDownList([
                'A+' => 'A+',
                'B+' => 'B+',
                'AB+' => 'AB+',
                'A-' => 'A-',
                'B-' => 'B-',
                'AB-' => 'AB-',
                'O+' => 'O+',
                'O-' => 'O-',
            ], ['prompt' => 'Choose Blood Group']) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'last_date_donation')->textInput(['rows' => 6]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'no_of_donation')->textInput() ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'class')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'gender')->dropDownList(['male' => 'male', 'female' => 'female', 'other' => 'other'], ['prompt' => 'Choose Gender']) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'cnic')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'telephone_number')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'whatsapp_number')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'donor_type')->dropDownList(['campaign' => 'campaign']) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'compaign_id')->dropDownList(ArrayHelper::map(Compaign::find()->asArray()->all(), 'id', 'name'), ['prompt' => 'Choose Campaign']) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'sr_no')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
        </div>
        <div class="col-md-3">
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php \yii\bootstrap5\ActiveForm::end(); ?>

</div>
