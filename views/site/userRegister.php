<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Join';
?>

<div class="row">
  <?= Html::beginForm(['index.php/site/register'], 'post',['class'=>'form-horizontal']) ?>
  <!-- <form class="form-horizontal" action="/action_page.php"> -->
    <input type="hidden" name="sponser_id" value="<?= $sponser_id ?>">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Name:</label>
      <div class="col-sm-10">
       <?= Html::textInput('name') ?>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Email:</label>
      <div class="col-sm-10">          
       <?= Html::textInput('email') ?>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Mobile:</label>
      <div class="col-sm-10">          
       <?= Html::textInput('mobile') ?>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Pin-code:</label>
      <div class="col-sm-10">          
       <?= Html::textInput('pincode') ?>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password</label>
      <div class="col-sm-10">          
       <?= Html::passwordInput('password') ?>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Confirm Password</label>
      <div class="col-sm-10">          
       <?= Html::textInput('confirmPassword') ?>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
</div>
