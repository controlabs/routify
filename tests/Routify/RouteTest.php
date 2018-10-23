<?php

declare(strict_types=1);

namespace Controlabs\Tests\Routify;

use Controlabs\Routify\Route;
use Controlabs\Routify\RouteException;

class RouteTest extends \Controlabs\Tests\AbstractTestCase
{
    public function testInvalidAction()
    {
        $this->expectException(RouteException::class);
        $this->expectExceptionMessage('Invalid action.');
        new Route(Route::PUT, '/users', 'UserController', '');
    }

    public function testInvalidHandler()
    {
        $this->expectException(RouteException::class);
        $this->expectExceptionMessage('Invalid handler.');
        new Route(Route::PUT, '/users', '', '');
    }

    public function testInvalidHttpMethod()
    {
        $this->expectException(RouteException::class);
        $this->expectExceptionMessage('Invalid HTTP method.');
        new Route('ANY', '', '', '');
    }

    public function testInvalidRoute()
    {
        $this->expectException(RouteException::class);
        $this->expectExceptionMessage('Invalid route.');
        new Route(Route::GET, '', '', '');
    }

    public function testMethod()
    {
        $router = new Route(Route::DELETE, '/users', 'UserController', 'delete');
        $this->assertEquals(Route::DELETE, $router->method());
    }
}
