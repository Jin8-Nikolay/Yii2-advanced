<?php

use common\components\UrlManager;

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'language' => 'ru',
    'sourceLanguage' => 'ru',
    'modules' => [
        'mm' => [
            'class' => 'iutbay\yii2\mm\Module',
        ],
    ],
    'components' => [
        'request' => [
            'baseUrl' => '/admin',
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
        'cache' => [
            'class' => 'yii\caching\FileCache',
            'cachePath' => '@backend/runtime/cache',
        ],
        'i18n' => [
            'translations' => [
                'backend' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'sourceLanguage' => 'ru',
                ],
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'sourceLanguage' => 'ua',
                ]
            ]
        ],
        'urlManager' => [
            'class' => UrlManager::class,
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'thumbs/<path:.*>' => 'mm/thumb/thumb',
                'mm/api/list' => 'mm/api/list',
                'mm/api/upload' => 'mm/api/upload',
                'mm/api/download' => 'mm/api/download',
            ],
        ],
        'fs' => [
            'class' => 'creocoder\flysystem\LocalFilesystem',
            'path' => '@frontend/web/upload',
        ],
    ],
    'params' => $params,
];
