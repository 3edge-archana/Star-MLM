<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Join';

?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out Referal ID</p>

    <?php $form = ActiveForm::begin([
            'id' => 'join-form',
            'enableAjaxValidation' => true,
            'enableClientValidation' => false,
        ]); ?>
        <div class="form-group">
            <?= Html::textInput('sponser_id') ?>
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
            
        </div>

    <?php ActiveForm::end(); ?>

    
</div>
