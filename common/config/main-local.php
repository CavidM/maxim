<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=sql11.freemysqlhosting.net;dbname=sql11181211',
//            'dsn' => 'mysql:host=localhost;dbname=maxim',
//            'username' => 'root',
            'username' => 'sql11181211',
//            'password' => '',
            'password' => 'ukA2l3Ilh9',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
    ],
];
