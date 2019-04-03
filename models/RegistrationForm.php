<?php
namespace app\models;

use app\models\Profile;
//use dektrium\user\models\RegistrationForm as BaseRegistrationForm;
use app\models\User;

class RegistrationForm extends \dektrium\user\models\RegistrationForm
{
    /**
     * Add a new field
     * @var string
     */
    public $sponser_id;
    public $affiliate_id;
    public $rank;
    public $name;
    public $mobile;
    public $pincode;
    public $password_repeat;
    //public $profile_pic;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules[] = ['sponser_id', 'required'];
        $rules[] = ['affiliate_id', 'required'];
        $rules[] = ['rank', 'required'];
        $rules[] = ['name', 'required'];
        $rules[] = ['mobile', 'required'];
        $rules[] = ['pincode', 'required'];
        $rules[] = ['password_repeat', 'required'];
        $rules[] = ['password_repeat', 'compare', 'compareAttribute'=>'password', 'message'=>"Passwords don't match" ];
        return $rules;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        $labels = parent::attributeLabels();
        $labels['sponser_id'] = \Yii::t('user', 'Sponser Id');
        $labels['affiliate_id'] = \Yii::t('user', 'Affiliate Id');
        $labels['rank'] = \Yii::t('user', 'Leg');
        $labels['usertype'] = \Yii::t('user', 'Type');
        $labels['name'] = \Yii::t('user', 'Name');
        $labels['mobile'] = \Yii::t('user', 'Mobile');
        $labels['pincode'] = \Yii::t('user', 'Pincode');
        $labels['password_repeat'] = \Yii::t('user', 'Password repeat');
        //$labels['profile_pic'] = \Yii::t('user', 'Profile Picture');
        return $labels;
    }

    /**
     * @inheritdoc
     */
    /*public function loadAttributes(User $user)
    {
        // here is the magic happens
        $user->setAttributes([
            'email'    => $this->email,
            'username' => $this->username,
            'password' => $this->password,
            'usertype' => $this->usertype,
        ]);
        
        $profile = \Yii::createObject(Profile::className());
        $profile->setAttributes([
            'name' => $this->name,
            'nric' => $this->nric,
            'hp' => $this->hp,
            'dob' => $this->dob,
            'consent' => $this->consent,
            'country' => $this->country,
            'location' => $this->location,
            //'profile_pic' => $this->profile_pic,
        ]);
//        $profile->unsetAttributes([
//            'public_email' => $this->public_email,
//        ]);
        $user->setProfile($profile);
    }*/
}