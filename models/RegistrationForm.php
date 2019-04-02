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
    public $name;
    public $nric;
    public $hp;
    public $dob;
    public $consent;
    public $usertype;
    public $country;
    public $location;
    public $password_repeat;
    //public $profile_pic;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules[] = ['usertype', 'required'];
//        $rules[] = ['name', 'required'];
        $rules[] = ['name', 'string', 'max' => 255];
//        $rules[] = ['nric', 'required'];
        $rules[] = ['nric', 'string', 'max' => 44];
//        $rules[] = ['hp', 'required'];
//        $rules[] = ['dob', 'required'];
        $rules[] = ['consent', 'required'];
        //$rules[] = ['consent', 'requiredValue'=>1];
        $rules[] = ['consent', 'compare', 'compareValue' => 1, 'message' => 'Please accept terms and condition.'];
        $rules[] = ['country', 'required'];
//        $rules[] = ['location', 'required'];
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
        $labels['usertype'] = \Yii::t('user', 'Type');
        $labels['name'] = \Yii::t('user', 'Name');
        $labels['nric'] = \Yii::t('user', 'NRIC');
        $labels['hp'] = \Yii::t('user', 'HP');
        $labels['dob'] = \Yii::t('user', 'DOB');
        $labels['country'] = \Yii::t('user', 'Country');
        $labels['location'] = \Yii::t('user', 'Address');
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