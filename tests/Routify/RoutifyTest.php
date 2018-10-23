<?php

declare(strict_types=1);

namespace Controlabs\Tests\Routify;

use Controlabs\Routify\Route;
use Controlabs\Routify\Routify;
use Controlabs\Routify\RouteException;

class RoutifyTest extends \Controlabs\Tests\AbstractTestCase
{
    public function testMethods()
    {
        $routes = (new Routify())->delete('/users', 'UserController', 'delete')
            ->get('/users', 'UserController', 'get')
            ->options('/users', 'UserController', 'options')
            ->patch('/users', 'UserController', 'patch')
            ->post('/users', 'UserController', 'post')
            ->put('/users', 'UserController', 'put')
            ->routes();
        $this->assertEquals(6, count($routes));
    }
}
