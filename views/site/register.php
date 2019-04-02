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

    <?= Html::beginForm(['index.php/site/join'], 'post') ?>
        <div class="form-group">
            <?= Html::textInput('sponser_id') ?>
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
            
        </div>

    <?php Html::endForm(); ?>

    
</div>
