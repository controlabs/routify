<?php

namespace Controlabs\Routify;

class Routify implements RoutifyInterface
{
    /**
     * The route groups.
     *
     * @var \Controlabs\Routify\RouteGroup
     */
    protected $routeGroup;

    /**
     * The route collection.
     *
     * @var \Controlabs\Routify\RouteCollection
     */
    protected $routeCollection;

    public function __construct(
    ) {
        $this->routeCollection = new RouteCollection();
        $this->routeGroup = new RouteGroup();
    }

    /**
     * @inheritdoc
     */
    public function group(string $group)
    {
        $this->startGroup($group);
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function startGroup(string $group)
    {
        $this->routeGroup->startGroup($group);
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function endGroup()
    {
        $this->routeGroup->endGroup();
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function routes()
    {
        return $this->routeCollection;
    }

    /**
     * @inheritdoc
     */
    public function delete(string $route, string $handler, string $action)
    {
        $this->addRoute(Route::DELETE, $route, $handler, $action);
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function get(string $route, string $handler, string $action)
    {
        $this->addRoute(Route::GET, $route, $handler, $action);
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function head(string $route, string $handler, string $action)
    {
        $this->addRoute(Route::HEAD, $route, $handler, $action);
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function options(string $route, string $handler, string $action)
    {
        $this->addRoute(Route::OPTIONS, $route, $handler, $action);
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function patch(string $route, string $handler, string $action)
    {
        $this->addRoute(Route::PATCH, $route, $handler, $action);
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function post(string $route, string $handler, string $action)
    {
        $this->addRoute(Route::POST, $route, $handler, $action);
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function put(string $route, string $handler, string $action)
    {
        $this->addRoute(Route::PUT, $route, $handler, $action);
        return $this;
    }

    private function addRoute(string $httpMethod, string $route, string $handler, string $action)
    {
        $route = new Route($httpMethod, $this->formatRoute($route), $handler, $action);
        $this->routeCollection->add($route);
    }

    private function formatRoute(string $route)
    {
        return $this->routeGroup->path() . $route;
    }
}
