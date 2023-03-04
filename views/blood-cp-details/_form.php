<?php

use app\models\Donor;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\BloodCPDetail $model */
/** @var app\models\DonorQuestion $donor_questions */
/** @var app\models\Answer $donor_answers */
/** @var yii\widgets\ActiveForm $form */
$donors = Donor::find()
    ->leftJoin('blood_c_p_details', 'blood_c_p_details.donor_id=donors.id');
if ($model->isNewRecord) {
    $donors = $donors
        ->where(['is', 'reg_no', null])
        ->orWhere(['reg_no' => ''])
        ->andWhere(['is', 'hb', null]);
}
$donors = $donors->asArray()
    ->all();

?>

    <div class="blood-cpdetail-form">

        <?php $form = \yii\bootstrap5\ActiveForm::begin(); ?>
        <div class="row">
            <div class="col-md-3">
                <?= $form->field($model, 'donor_id')->dropDownList(ArrayHelper::map($donors, 'id', function ($item) {
                    return $item ? $item['name'] . ' | ' . $item['sr_no'] : '🙃';
                }),
                    ['prompt' => 'Choose Donor'])
                    ->label('Donor | SR #') ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'hb')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-3">
                <!--                --><?php //= $form->field($model, 'wbc')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-3">
                <!--                --><?php //= $form->field($model, 'plt')->textInput(['maxlength' => true]) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <!--                --><?php //= $form->field($model, 'mcv')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-3">
                <!--                --><?php //= $form->field($model, 'hbs_ag')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-3">
                <!--                --><?php //= $form->field($model, 'mch')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-3">
                <!--                --><?php //= $form->field($model, 'neutrophil')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-12">
                <?= $form->field($donor_answers, 'answer')->inline(true)->checkboxList(
                    [
                        'Fainting' => 'Fainting',
                        'Surgery' => 'Surgery',
                        'Piles' => 'Piles',
                        'Anemia' => 'Anemia',
                        'Cancer' => 'Cancer',
                        'Breakfast' => 'Breakfast',
                    ],
                    ['name' => 'answers[]']
                ) ?>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-3">
                <?= $form->field($model, 'status')->radioList(['f' => 'Fit', 'uf' => 'Un-Fit'])->label('Ok for collection?') ?>
            </div>
        </div>
        <br/>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

        <?php \yii\bootstrap5\ActiveForm::end(); ?>

    </div>
<?php
$js = <<<JS
    $(function (){
    $('select').select2({ width: '100%', placeholder: "Select an Option", allowClear: true });
    })
    JS;
$this->registerJs($js, View::POS_END, "select-2-js")
?>