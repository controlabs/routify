<?php

namespace Controlabs\Routify;

interface RoutifyInterface
{
    /**
     * Start a group
     *
     * @param string  $group
     *
     * @return $this
     */
    public function group(string $group);

    /**
     * Start a group
     *
     * @param string  $group
     *
     * @return $this
     */
    public function startGroup(string $group);

    /**
     * Ends a group
     *
     * @return $this
     */
    public function endGroup();

    /**
     * Get all routes.
     *
     * @return \Controlabs\Routify\RouteCollection
     */
    public function routes();

    /**
     * Method DELETE.
     *
     * @param  string  $route
     * @param  string  $handler
     * @param  string  $action
     *
     * @return $this
     */
    public function delete(string $route, string $handler, string $action);

    /**
     * Method GET.
     *
     * @param  string  $route
     * @param  string  $handler
     * @param  string  $action
     *
     * @return $this
     */
    public function get(string $route, string $handler, string $action);

    /**
     * Method HEAD.
     *
     * @param  string  $route
     * @param  string  $handler
     * @param  string  $action
     *
     * @return $this
     */
    public function head(string $route, string $handler, string $action);

    /**
     * Method OPTIONS.
     *
     * @param  string  $route
     * @param  string  $handler
     * @param  string  $action
     *
     * @return $this
     */
    public function options(string $route, string $handler, string $action);

    /**
     * Method PATCH.
     *
     * @param  string  $route
     * @param  string  $handler
     * @param  string  $action
     *
     * @return $this
     */
    public function patch(string $route, string $handler, string $action);

    /**
     * Method POST.
     *
     * @param  string  $route
     * @param  string  $handler
     * @param  string  $action
     *
     * @return $this
     */
    public function post(string $route, string $handler, string $action);

    /**
     * Method PUT.
     *
     * @param  string  $route
     * @param  string  $handler
     * @param  string  $action
     *
     * @return $this
     */
    public function put(string $route, string $handler, string $action);
}
