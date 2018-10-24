<?php

namespace Controlabs\Routify;

class Routify
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
     * Start a group
     *
     * @param string  $group
     *
     * @return $this
     */
    public function group(string $group)
    {
        $this->startGroup($group);
        return $this;
    }

    /**
     * Start a group
     *
     * @param string  $group
     *
     * @return $this
     */
    public function startGroup(string $group)
    {
        $this->routeGroup->startGroup($group);
        return $this;
    }

    /**
     * Ends a group
     *
     * @return $this
     */
    public function endGroup()
    {
        $this->routeGroup->endGroup();
        return $this;
    }

    /**
     * Get all routes.
     *
     * @return array
     */
    public function routes()
    {
        return $this->routeCollection->get();
    }

    /**
     * Method DELETE.
     *
     * @param  string  $route
     * @param  string  $handler
     * @param  string  $action
     *
     * @return $this
     */
    public function delete(string $route, string $handler, string $action)
    {
        $this->addRoute(Route::DELETE, $route, $handler, $action);
        return $this;
    }

    /**
     * Method GET.
     *
     * @param  string  $route
     * @param  string  $handler
     * @param  string  $action
     *
     * @return $this
     */
    public function get(string $route, string $handler, string $action)
    {
        $this->addRoute(Route::GET, $route, $handler, $action);
        return $this;
    }

    /**
     * Method HEAD.
     *
     * @param  string  $route
     * @param  string  $handler
     * @param  string  $action
     *
     * @return $this
     */
    public function head(string $route, string $handler, string $action)
    {
        $this->addRoute(Route::HEAD, $route, $handler, $action);
        return $this;
    }

    /**
     * Method OPTIONS.
     *
     * @param  string  $route
     * @param  string  $handler
     * @param  string  $action
     *
     * @return $this
     */
    public function options(string $route, string $handler, string $action)
    {
        $this->addRoute(Route::OPTIONS, $route, $handler, $action);
        return $this;
    }

    /**
     * Method PATCH.
     *
     * @param  string  $route
     * @param  string  $handler
     * @param  string  $action
     *
     * @return $this
     */
    public function patch(string $route, string $handler, string $action)
    {
        $this->addRoute(Route::PATCH, $route, $handler, $action);
        return $this;
    }

    /**
     * Method POST.
     *
     * @param  string  $route
     * @param  string  $handler
     * @param  string  $action
     *
     * @return $this
     */
    public function post(string $route, string $handler, string $action)
    {
        $this->addRoute(Route::POST, $route, $handler, $action);
        return $this;
    }

    /**
     * Method PUT.
     *
     * @param  string  $route
     * @param  string  $handler
     * @param  string  $action
     *
     * @return $this
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
