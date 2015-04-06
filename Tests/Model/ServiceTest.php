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
        $this->assertInstanceOf(
            '\Evheniy\SimplePaginationBundle\Model\Pagination',
            (new Service())->paginate('home', 100)
        );
    }
} 