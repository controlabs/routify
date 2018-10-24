<?php

declare(strict_types=1);

namespace Controlabs\Tests\Routify;

use Controlabs\Routify\RouteGroup;

class RouteGroupTest extends \Controlabs\Tests\AbstractTestCase
{
    public function testGroups()
    {
        $group = new RouteGroup();
        $group->startGroup('posts/');
        $group->startGroup('tags');
        $this->assertEquals('posts/tags', $group->path());
    }
}
