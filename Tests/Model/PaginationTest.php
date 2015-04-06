<?php

namespace Evheniy\SimplePaginationBundle\Tests\Model;


use Evheniy\SimplePaginationBundle\Model\Pagination;

/**
 * Class PaginationTest
 *
 * @package Evheniy\SimplePaginationBundle\Tests\Model
 */
class PaginationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Pagination
     */
    private $pagination;

    /**
     *
     */
    protected function setUp()
    {
        $this->pagination = new Pagination('home', 200, 2, 20, array('q' => 'test'));
    }

    /**
     *
     */
    public function testFetResultsCount()
    {
        $this->assertEquals($this->pagination->getResultsCount(), 200);
    }

    /**
     *
     */
    public function testGetFirst()
    {
        $this->assertEquals($this->pagination->getFirst(), 1);
    }

    /**
     *
     */
    public function testGetCurrent()
    {
        $this->assertEquals($this->pagination->getCurrent(), 2);
    }

    /**
     *
     */
    public function testGetRoute()
    {
        $this->assertEquals($this->pagination->getRoute(), 'home');
    }

    /**
     *
     */
    public function testGetPrevious()
    {
        $this->assertEquals($this->pagination->getPrevious(), 1);
    }

    /**
     *
     */
    public function testGetNext()
    {
        $this->assertEquals($this->pagination->getNext(), 3);
    }

    /**
     *
     */
    public function testGetLast()
    {
        $this->assertEquals(
            $this->pagination->getLast(),
            $this->pagination->getResultsCount() / 20
        );
    }

    /**
     *
     */
    public function testGetPageParameterName()
    {
        $this->assertEquals($this->pagination->getPageParameterName(), Pagination::PAGE_PARAMETER);
    }

    /**
     *
     */
    public function testGetQuery()
    {
        $this->assertEquals($this->pagination->getQuery(), array('q' => 'test'));
    }

    /**
     *
     */
    public function testGetPagesInRange()
    {
        $this->assertEquals($this->pagination->getPagesInRange(), range(1, 10));
    }

    /**
     *
     */
    public function testGetPagesInRangeLast()
    {
        $pagination = new Pagination('home', 300, 20, 10);
        $this->assertEquals($pagination->getPagesInRange(), range(16, 25));
    }

    /**
     *
     */
    public function testGetPagesInRangeSmall()
    {
        $pagination = new Pagination('home', 40, 3, 10);
        $this->assertEquals($pagination->getPagesInRange(), range(1, 4));
    }
} 