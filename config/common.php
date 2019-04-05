<?php

use yii\helpers\ArrayHelper;

$params = ArrayHelper::merge(
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'basePath'   => dirname(__DIR__),
    'bootstrap'  => ['log'],
    'aliases'    => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'cache'      => [
            'class' => 'yii\caching\DummyCache',
        ],
        'db'         => [
            'class'   => 'yii\db\Connection',
            'charset' => 'utf8',
        ],
        'i18n' => [
            'translations' => [
                'app' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'forceTranslation' => true,
                ],
            ],
        ],
        'mailer'     => [
            'class' => 'yii\swiftmailer\Mailer',
        ],
        'log'        => [
            'class' => 'yii\log\Dispatcher',
        ],
        'urlManager' => [
            'class'               => 'yii\web\UrlManager',
            'enablePrettyUrl'     => true,
            'showScriptName'      => false,
            //'enableStrictParsing' => true,
            'rules'               => [
                ['class' => 'yii\rest\UrlRule', 'controller' => 'api/advert',],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'api/image',],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'api/location',],

                ''      => 'site/index',
                'admin' => 'admin/default/index',

                '<_c:[\w\-]+>/<id:\d+>'              => '<_c>/view',
                '<_c:[\w\-]+>'                       => '<_c>/index',
                '<_c:[\w\-]+>/<_a:[\w\-]+>/<id:\d+>' => '<_c>/<_a>',
            ],
        ],
    ],
    'params'     => $params,
];