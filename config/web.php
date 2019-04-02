<?php

use sadovojav\image\Thumbnail;

$config = [
    'id' => 'app',
    'language'=>'ru-RU',
    'name' => 'gorod-zagorod.com',
    'components' => [
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
        ],
        'thumbnail' => [
            'class' => 'sadovojav\image\Thumbnail',
            'cachePath' => '@webroot/images/thumbnails',
            'options' => [
                'placeholder' => [
                    'type' => sadovojav\image\Thumbnail::PLACEHOLDER_TYPE_IMAGINE,
                    'backgroundColor' => '#f5f5f5',
                    'textColor' => '#cdcdcd',
                    'textSize' => 30,
                    'text' => 'No image'
                ],
            ]
        ],
    ],
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
        ],
        'api' => [
            'class' => 'app\modules\api\Module',
        ],
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1', '192.168.83.1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1', '192.168.83.1'],
    ];
}

return $config;
