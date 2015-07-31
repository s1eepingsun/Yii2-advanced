<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    //'defaultRoute' => 'site/about',
    //'catchAll' => ['site/index'],
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'ru-RU',
    'aliases' => ['@foo' => '/path/to/foo'],
    'components' => [
		//components can later be accessed globally using the expression \Yii::$app->ComponentID
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'xT6FSABjCQCxIL4vCz98mUIwFxtaB_KM',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'urlManager' => [
            'enablePrettyUrl' => false,
            'showScriptName' => true,
            'enableStrictParsing' => false,
            //'suffix' => '.html',
            'rules' => [
                ['class' => 'yii\rest\UrlRule', 
                'controller' => 'frukt',  
                /* 'except' => ['delete', 'create', 'update'] */ 
                'extraPatterns' => [ 'GET test' => 'test',],
                ],
                '<controller>/<action>' => '<controller>/<action>'
            ],
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
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
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    //'basePath' => '@app/messages',
                    //'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'app' => 'app.php',
                        'app/error' => 'error.php',
                    ],
                ],
            ],
        ],
        /* 'request' => [
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],  */
        'db' => require(__DIR__ . '/db.php'),
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'panels' => [
            'views' => ['class' => 'app\panels\ViewsPanel'],
        ],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',      
        'allowedIPs' => ['127.0.0.1', '::1', '192.168.0.*', '192.168.178.20'],  
        'generators' => [ //here
            'crud' => [ // generator name
                'class' => 'yii\gii\generators\crud\Generator', // generator class
                'templates' => [ //setting for out templates
                    'myCrud' => '@app/myTemplates/crud/default', // template name => path to template
                ]
            ],
            'myCrud' => [ 
                'class' => 'app\myTemplates\crud\Generator',
                'templates' => [
                    'my' => '@app/myTemplates/crud/default',
                ]
            ] 
        ],
    ];
}

return $config;
