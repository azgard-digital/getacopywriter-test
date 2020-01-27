<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\library\model\Book */
/* @var $form ActiveForm */
$this->title = Yii::t('app', 'View');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Admin'), 'url' => Url::toRoute(['/admin'])];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-lg-12">
    <?php $form = ActiveForm::begin([
        'enableClientValidation' => true,
        'enableAjaxValidation' => false,
        'method' => 'post'
    ]);
    ?>

    <?= $form->field($model, 'name') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>