<?php

namespace Controlabs\Routify;

class RouteGroup
{
    /**
     * An array of the groups.
     *
     * @var array
     */
    protected $groups = [];

    /**
     * Start a group
     *
     * @param string  $group
     *
     * @return void
     */
    public function startGroup(string $group)
    {
        ($group) && array_push($this->groups, $group);
    }

    /**
     * Ends a group
     *
     * @return void
     */
    public function endGroup()
    {
        array_pop($this->groups);
    }

    /**
     * Returns a complete path
     *
     * @return string
     */
    public function path()
    {
        $clean = function($v) {
            return str_replace('/', '', $v);
        };

        return join(
            '/',
            array_map($clean, $this->groups)
        );
    }
}
