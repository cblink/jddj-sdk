<?php

namespace Cblink\Jddj;

use Cblink\Jddj\Order\Order;
use Cblink\Jddj\Order\OrderServiceProvider;
use Cblink\Jddj\Tool\Tool;
use Cblink\Jddj\Tool\ToolServiceProvider;
use Mouyong\Foundation\Foundation;

/**
 * Class Application
 * @package Cblink\Jddj
 *
 * @property-read Order $order
 * @property-read Tool $tool
 */
class Application extends Foundation
{
    protected $config = [
        'debug' => false,

        'token' => 'your-token',
        'app_key' => 'your-app-key',
        'secret' => 'your-app-secret',
        'version' => '2.0',

        'log' => [
            'name' => 'alias',
        ],
        'http' => [
            'response_type' => 'array', // array, raw
            'timeout' => 3,
            'base_uri' => '',
            'http_errors' => false,
            'headers' => [
                'accept' => 'application/json',
                'content-type' => 'application/x-www-form-urlencoded; charset=UTF-8',
            ],
        ],
        'cache' => [
            'namespace' => 'alias',
        ],
    ];

    protected $providers = [
        OrderServiceProvider::class,
        ToolServiceProvider::class,
    ];
}