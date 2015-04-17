<?php

namespace Evheniy\SimplePaginationBundle\Tests\Model;

use Evheniy\SimplePaginationBundle\Model\Service;

/**
 * Class ServiceTest
 *
 * @package Evheniy\SimplePaginationBundle\Tests\Model
 */
class ServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function testPaginate()
    {
        $service = new Service();
        $this->assertInstanceOf(
            '\Evheniy\SimplePaginationBundle\Model\Pagination',
            $service->paginate('home', 100)
        );
    }
} 