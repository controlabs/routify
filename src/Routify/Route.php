<?php

namespace Controlabs\Routify;

class Route
{
    /**
     * The GET method requests a representation of the specified resource. Requests using GET should only retrieve data.
     *
     * @type string
     */
    const GET = 'GET';

    /**
     * The HEAD method asks for a response identical to that of a GET request, but without the response body.
     *
     * @type string
     */
    const HEAD = 'HEAD';

    /**
     * The POST method is used to submit an entity to the specified resource, often causing a change in state or side effects on the server.
     *
     * @type string
     */
    const POST = 'POST';

    /**
     * The PUT method replaces all current representations of the target resource with the request payload.
     *
     * @type string
     */
    const PUT = 'PUT';

    /**
     * The DELETE method deletes the specified resource.
     *
     * @type string
     */
    const DELETE = 'DELETE';

    /**
     * The CONNECT method establishes a tunnel to the server identified by the target resource.
     *
     * @type string
     */
    const CONNECT = 'CONNECT';

    /**
     * The OPTIONS method is used to describe the communication options for the target resource.
     *
     * @type string
     */
    const OPTIONS = 'OPTIONS';

    /**
     * The TRACE method performs a message loop-back test along the path to the target resource.
     *
     * @type string
     */
    const TRACE = 'TRACE';

    /**
     * The PATCH method is used to apply partial modifications to a resource.
     *
     * @type string
     */
    const PATCH = 'PATCH';


    private $action;
    // private $group;
    private $handler;
    private $httpMethod;
    private $route;

    public function __construct(
        $httpMethod,
        $route,
        $handler,
        $action
    ) {
        $this->setHttpMethod($httpMethod);
        $this->setRoute($route);
        $this->setHandler($handler);
        $this->setAction($action);
    }

    public function method()
    {
        return $this->httpMethod;
    }

    public function route()
    {
        return $this->route;
    }

    protected function setAction($action)
    {
        if (empty($action)) {
            throw new RouteException("Invalid action.");
        }
        $this->action = $action;
    }

    protected function setHandler($handler)
    {
        if (empty($handler)) {
            throw new RouteException("Invalid handler.");
        }
        $this->handler = $handler;
    }

    protected function setHttpMethod($httpMethod)
    {
        if (!in_array($httpMethod, [self::GET, self::HEAD, self::POST, self::PUT, self::DELETE, self::CONNECT, self::OPTIONS, self::TRACE, self::PATCH])) {
            throw new RouteException("Invalid HTTP method.");
        }
        $this->httpMethod = $httpMethod;
    }

    protected function setRoute($route)
    {
        if (empty($route)) {
            throw new RouteException("Invalid route.");
        }
        $this->route = $route;
    }
}
