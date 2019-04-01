<?php

namespace app\models;

//use dektrium\user\models\Profile as BaseProfile;


class Profile extends \dektrium\user\models\Profile
{
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        // add field to scenarios
        //$scenarios['create'][]   = 'nric';
        //$scenarios['update'][]   = 'nric';
        //$scenarios['register'][] = 'nric';
//        $scenarios['imageupload'][] = 'profile_pic';
        return $scenarios;
    }
    
    public function rules()
    {
        $rules = parent::rules();
        // add some rules
        $rules['nricRequired'] = ['nric', 'required'];
        $rules['nricLength']   = ['nric', 'string', 'max' => 44];
        $rules['hpRequired'] = ['hp', 'required'];
        $rules['hpLength']   = ['hp', 'string', 'max' => 44];
        $rules['dobRequired'] = ['dob', 'required'];
        $rules['consentRequired'] = ['consent', 'required'];
        $rules['countryRequired'] = ['country', 'required'];
//        $rules['profile_picSafe'] = ['profile_pic', 'required'];
        return $rules;
    }
    
    public function attributeLabels() {
        $labels = parent::attributeLabels();
        $labels['nric'] = \Yii::t('user', 'NRIC');
        $labels['hp'] = \Yii::t('user', 'HP');
        $labels['dob'] = \Yii::t('user', 'DOB');
        $labels['consent'] = \Yii::t('user', 'Consent');
        $labels['location'] = \Yii::t('user', 'Address');
        $labels['country'] = \Yii::t('user', 'Country');
//        $labels['profile_pic'] = \Yii::t('user', 'Profile Picture');
        return $labels;
    }
}