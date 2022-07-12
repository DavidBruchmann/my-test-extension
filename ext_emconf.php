<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'My Test Extension',
    'description' => 'This is an example extension according an answer on StackOverflow: https://stackoverflow.com/a/72939070/1019850',
    'category' => 'plugin',
    'author' => '',
    'author_email' => '',
    'state' => 'experimental',
    'clearCacheOnLoad' => 0,
    'version' => '1.0.1',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.0-11.5.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
