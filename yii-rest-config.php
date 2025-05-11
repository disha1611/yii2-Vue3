// yii-rest-config.php
<?php
return [
    'components' => [
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'product',
                    'extraPatterns' => [
                        'GET search' => 'search',
                    ]
                ],
            ],
        ],
    ]
];