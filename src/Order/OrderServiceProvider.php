<?php

namespace Cblink\Jddj\Order;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class OrderServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple['order'] = function ($pimple) {
            return new Order($pimple);
        };
    }
}