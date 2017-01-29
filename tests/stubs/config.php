<?php

/**
 * A model configuration for the classes in the package. Used to test against
 * for unit tests.
 */

return [

    // Represents a subset of config/database.php
    'database' => [
        'redis' => [
            'driver' => 'sentinel',
        ],
        'redis-sentinel' => [
            'connection1' => [
                [
                    'host' => 'localhost',
                    'port' => 6379,
                ],
            ],
            'connection2' => [
                [
                    'host' => 'localhost',
                    'port' => 6379,
                ],
                'options' => [
                    'service' => 'another-master',
                ],
            ],
            'options' => [
                'service' => 'mymaster',

                'parameters' => [
                    'password' => 'secret',
                    'database' => 0,
                ],

                'sentinel_timeout' => 0.99, // Predis default: 0.100
                'retry_limit' => 99,        // Predis default: 20
                'retry_wait' => 9999,       // Predis default: 1000
                'update_sentinels' => true, // Predis default: false
            ],
        ],
    ],

    // Represents a subset of config/cache.php
    'cache' => [
        'stores' => [
            'redis-sentinel' => [
                'driver' => 'redis-sentinel',
                'connection' => 'connection1',
            ],
        ],
    ],

    // Represents a subset of config/queue.php
    'queue' => [
        'connections' => [
            'redis-sentinel' => [
                'driver' => 'redis-sentinel',
                'connection' => 'connection1',
                'queue' => 'default',
                'expire' => 60,
            ],
        ],
    ],

    // Represents a subset of config/session.php
    'session' => [
        'driver' => 'redis-sentinel',
        'connection' => 'connection1',
    ],

];