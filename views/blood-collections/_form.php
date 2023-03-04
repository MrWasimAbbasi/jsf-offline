<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\BloodCollection $model */
/** @var yii\widgets\ActiveForm $form */
$donors = \app\models\Donor::find()
    ->andWhere(['IS NOT', 'reg_no', null])
    ->andWhere(['collection_status' => null])
    ->asArray()
    ->all();
//dd(\app\models\Donor::find()
//    ->andWhere(['IS NOT', 'reg_no', null])
//    ->andWhere(['collection_status' => null])->createCommand()->getRawSql());

?>

<div class="blood-collection-form">

    <?php $form = \yii\bootstrap5\ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'donor_id')->dropDownList(\yii\helpers\ArrayHelper::map($donors, 'id', 'name'), ['prompt' => 'Choose Donor']) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'bag_no')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'blood_bag')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'start_time')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'end_time')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'vein')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'wb')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'prbc')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'ffp')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'plts')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'over_coll')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'low_coll')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'fair_coll')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'tube_reference_no')->textInput(['rows' => 6]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'blood_bag_reference_no')->textInput(['maxlength' => true]) ?>
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php \yii\bootstrap5\ActiveForm::end(); ?>

</div>
