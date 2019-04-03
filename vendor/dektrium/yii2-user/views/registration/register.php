<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var dektrium\user\models\User $model
 * @var dektrium\user\Module $module
 */

$this->title = Yii::t('user', 'Sign up');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <div class="panel-body">
                <?php $form = ActiveForm::begin([
                    'id' => 'registration-form',
                    'enableAjaxValidation' => true,
                    'enableClientValidation' => false,
                ]); ?>
                
                <h4>Sponsor ID : <?= $user['sponser_id'] ?></h4>    
                
                <?php if($user['username']){
                    ?>
                    <h5>User Name : <?= $user['username'] ?></h5>    
                    <?php
                } ?>
                <?php if($user['mobile']){
                    ?>
                    <h5>Mobile : <?= $user['mobile'] ?></h5>    
                    <?php
                } ?>
                <label>Leg : </label>
                <?= $form->field($model, 'rank')->radio(['label' => 'Left', 'value' => 1, 'uncheck' => null]) ?>
                <?= $form->field($model, 'rank')->radio(['label' => 'Right', 'value' => 2, 'uncheck' => null]) ?>
                
                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'username') ?>
                                
                <?php
                    echo $form->field($model, 'sponser_id')->hiddenInput(['value' => $user['sponser_id']])->label(false);
                ?>
                <?php
                    $affiliate_id='CP_'.rand(100,1000000000);
                    echo $form->field($model, 'affiliate_id')->hiddenInput(['value' =>  $affiliate_id ])->label(false);
                ?>                
                <?= $form->field($model, 'name') ?>
                
                <?= $form->field($model, 'mobile') ?>
                
                
                <?= $form->field($model, 'pincode') ?>

                <?php if ($module->enableGeneratingPassword == false): ?>
                    <?= $form->field($model, 'password')->passwordInput() ?>
                <?php endif ?>
                
                 <?= $form->field($model, 'password_repeat')->passwordInput() ?>

                <?= Html::submitButton(Yii::t('user', 'Sign up'), ['class' => 'btn btn-success btn-block']) ?>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
        <p class="text-center">
            <!-- <= Html::a(Yii::t('user', 'Already registered? Sign in!'), ['index.php/user/security/login']) ?> -->
            <?= Html::a('Already registered? Sign in!',Yii::$app->getUrlManager()->getBaseUrl().'/index.php/user/security/login') ?>
        </p>
    </div>
</div>