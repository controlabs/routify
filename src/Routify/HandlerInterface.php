<?php

namespace Controlabs\Routify;

interface HandlerInterface
{
    /**
     * Handles the routes
     *
     * @param  \Controlabs\Routify\RouteCollection  $routes
     */
    public function handle(RouteCollection $routes);
}
