<?php

namespace Controlabs\Routify;

class Routify
{
    protected $routeCollection;

    public function __construct(
    ) {
        $this->routeCollection = new RouteCollection();
    }

    public function routes()
    {
        return $this->routeCollection->get();
    }

    public function delete($route, $handler, $action)
    {
        $this->addRoute(Route::DELETE, $route, $handler, $action);
        return $this;
    }

    public function get($route, $handler, $action)
    {
        $this->addRoute(Route::GET, $route, $handler, $action);
        return $this;
    }

    public function options($route, $handler, $action)
    {
        $this->addRoute(Route::OPTIONS, $route, $handler, $action);
        return $this;
    }

    public function patch($route, $handler, $action)
    {
        $this->addRoute(Route::PATCH, $route, $handler, $action);
        return $this;
    }

    public function post($route, $handler, $action)
    {
        $this->addRoute(Route::POST, $route, $handler, $action);
        return $this;
    }

    public function put($route, $handler, $action)
    {
        $this->addRoute(Route::PUT, $route, $handler, $action);
        return $this;
    }

    private function addRoute($httpMethod, $route, $handler, $action)
    {
        $route = new Route($httpMethod, $route, $handler, $action);
        $this->routeCollection->add($route);
    }
}
