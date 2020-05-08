<?php

namespace Cblink\Jddj\Tool;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ToolServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple['tool'] = function ($app) {
            return new Tool($app);
        };
    }
}