<?php
$baseUrl = str_replace('/web', '/web', (new \yii\web\Request)->getBaseUrl());
$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'Star MLM',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'KWOJPOC8yAjxB81cTO_rngBdrcCqbFvK',
            'baseUrl' => $baseUrl,
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
//        'user' => [
//            'identityClass' => 'app\models\User',
//            'enableAutoLogin' => true,
//        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],        
        'db' => $db,
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '' => 'site/index',
                '<controller>' => '<controller>/index',     
                '<controller>/create' => '<controller>/create',
                'user/<controller>/<action>' => 'user/<controller>/<action>',
                '<controller>/<action>/<id:\w+>' => '<controller>/<action>',
                'user/<controller>/<action>/<id:\w+>' => 'user/<controller>/<action>',
                '<controller>/<id:\d+>' => '<controller>/view',
            ],
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@dektrium/user/views' => '@app/views/user',
//                    '@hscstudio/mailbox/views/default' => '@app/views/mailbox'
    ],
            ],
        ],
    ],
    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
            'modelMap' => [
                'User' => 'app\models\User',
                'RegistrationForm' => 'app\models\RegistrationForm',
                'Profile' => 'app\models\Profile'
        ],
            'controllerMap' => [
                'registration' => [
                    'class' => \dektrium\user\controllers\RegistrationController::className(),
                    'on ' . \dektrium\user\controllers\RegistrationController::EVENT_AFTER_REGISTER => function ($e) {
                        Yii::$app->response->redirect(array('/user/security/login'))->send();
                        Yii::$app->end();
                    }
    ],
            ],
            'enableUnconfirmedLogin' => true,
            'confirmWithin' => 21600,
            'cost' => 12,
            'admins' => ['admin']
        ],
        'rbac' => 'dektrium\rbac\RbacWebModule',
        'authManager' => [
            'class' => 'dektrium\rbac\components\DbManager',
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        /*uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1'],*/
    ];
}

return $config;
