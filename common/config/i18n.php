<?php
/**
 * Created by PhpStorm.
 * User: Cavid
 * Date: 4/1/2017
 * Time: 11:05 AM
 */

return [
    'sourcePath' => __DIR__ . DIRECTORY_SEPARATOR,
    'languages' => ['az', 'en', 'ru'], //Add languages to the array for the language files to be generated.
    'translator' => 'Yii::t',
    'sort' => false,
    'removeUnused' => false,
    'only' => ['*.php'],
    'except' => [
        '.svn',
        '.git',
        '.gitignore',
        '.gitkeep',
        '.hgignore',
        '.hgkeep',
        '/messages',
        '/vendor',
    ],
    'format' => 'php',
    'messagePath' => __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'messages',
    'overwrite' => true,
];