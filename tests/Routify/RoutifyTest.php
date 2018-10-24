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

    public function testGroups()
    {
        $validRoutes = [
            [Route::DELETE, 'posts/{id}', 'UserController', 'delete'],
            [Route::GET, 'posts/', 'UserController', 'get'],
            [Route::POST, 'posts/', 'UserController', 'post'],
            [Route::PUT, 'posts/cancel', 'UserController', 'cancel'],
            [Route::DELETE, 'posts/tags/', 'TagsController', 'delete'],
            [Route::GET, 'posts/tags/', 'TagsController', 'get'],
            [Route::POST, 'posts/tags/', 'TagsController', 'post'],
            [Route::HEAD, 'posts/after', 'UserController', 'after'],
        ];
        $routes = (new Routify())
            ->group('posts')
            ->delete('/{id}', 'UserController', 'delete')
            ->get('/', 'UserController', 'get')
            ->post('/', 'UserController', 'post')
            ->put('/cancel', 'UserController', 'cancel')
            ->startGroup('tags')
            ->delete('/', 'TagsController', 'delete')
            ->get('/', 'TagsController', 'get')
            ->post('/', 'TagsController', 'post')
            ->endGroup()
            ->head('/after', 'UserController', 'after')
            ->endGroup()
            ->routes();
        $this->assertEquals(8, count($routes));
        foreach ($routes as $r) {
            $expected = array_shift($validRoutes);
            $this->assertEquals($expected[0], $r->method());
            $this->assertEquals($expected[1], $r->route());
            $this->assertEquals($expected[2], $r->handler());
            $this->assertEquals($expected[3], $r->action());
        }
    }
}
