<?php

declare(strict_types=1);

namespace Controlabs\Tests\Routify;

use Controlabs\Routify\Route;
use Controlabs\Routify\RouteCollection;
use Controlabs\Routify\RouteException;

class RouteCollectionTest extends \Controlabs\Tests\AbstractTestCase
{
    public function testCollectionSize()
    {
        $collection = new RouteCollection();
        $collection->add($this->route(Route::DELETE));
        $collection->add($this->route(Route::GET));
        $collection->add($this->route(Route::POST));
        $collection->add($this->route(Route::PUT));
        $this->assertEquals(4, $collection->count());
    }

    public function testGetEmptyCollection()
    {
        $collection = new RouteCollection();
        $this->assertSame([], $collection->get());
        $this->assertSame([], $collection->get(Route::GET));
    }

    public function testIterator()
    {
        $collection = new RouteCollection();
        $collection->add($this->route(Route::DELETE));
        $collection->add($this->route(Route::GET));
        $collection->add($this->route(Route::POST));
        $collection->add($this->route(Route::PUT));

        $count = 0;
        $methods = [];
        foreach ($collection as $r) {
            $methods[] = $r->method();
            $count += 1;
        }

        $this->assertEquals(4, $count);
        $this->assertSame([Route::DELETE, Route::GET, Route::POST, Route::PUT], $methods);
    }

    private function route(
        $httpMethod = Route::GET,
        $route = '/users',
        $handler = 'UserController',
        $action = 'create'
    ) {
        return new Route($httpMethod, $route, $handler, $action);
    }
}
