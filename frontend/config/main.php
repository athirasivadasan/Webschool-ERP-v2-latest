<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'core' => [
            'class' => 'frontend\modules\core\Core',
        ],
        'bank' => [
            'class' => 'frontend\modules\bank\Bank',
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'baseUrl' => '/webschool',
        ],
        'assetManager' => [
            'bundles' => [
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [],
                ],
            ],
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => false,
            // 'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            //'name' => 'advanced-frontend',
            'timeout' => 3600,
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'baseUrl' => '/webschool',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',

                '<module:\w+>/<controller:\w+>/<action:\w+>/<id:\w+>' => '<module>/<controller>/<action>',
                '<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
                '<module:\w+>/<controller:\w+>/<id:\w+>' => '<module>/<controller>',

                '<module:\w+>/<controller:[\w-]+>/<action:\w+>/<id:\w+>' => '<module>/<controller>/<action>',
                '<module:\w+>/<controller:[\w-]+>/<action:\w+>' => '<module>/<controller>/<action>',
                '<module:\w+>/<controller:[\w-]+>/<id:\w+>' => '<module>/<controller>',

                
               
               
            ],

        ],

    ],
    'params' => $params,
];
