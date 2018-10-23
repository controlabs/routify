<?php

namespace Controlabs\Routify;

use ArrayIterator;
use Countable;
use IteratorAggregate;

class RouteCollection implements Countable, IteratorAggregate
{
    /**
     * An array of the routes keyed by method.
     *
     * @var array
     */
    protected $routes = [];

    /**
     * Add a Route instance to the collection.
     *
     * @param  \Controlabs\Routify\Route  $route
     *
     * @return \Controlabs\Routify\Route
     */
    public function add(Route $route)
    {
        // $this->routes[$route->method()][$route->uri()] = $route;
        $this->routes[$route->method().$route->route()] = $route;
        return $route;
    }

    /**
     * Get all of the routes in the collection.
     *
     * @return array
     */
    public function get()
    {
        return array_values($this->routes);
    }

    /**
     * Get an iterator for the items.
     *
     * @return \ArrayIterator
     */
    public function getIterator()
    {
        return new ArrayIterator($this->get());
    }

    /**
     * Count the number of items in the collection.
     *
     * @return int
     */
    public function count()
    {
        return count($this->get());
    }
}
