<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\RegistrationNoSetting $model */

$this->title = Yii::t('app', 'Create Registration No Setting');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Registration No Settings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registration-no-setting-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
