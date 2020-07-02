<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'redirect' => [
            'class' => 'common\components\RedirectComponent'
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
