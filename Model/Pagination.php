<?php

namespace Evheniy\SimplePaginationBundle\Model;

/**
 * Class Pagination
 * @package Evheniy\SimplePaginationBundle\Model
 */
class Pagination
{
    /**
     * @var string
     */
    protected $route;
    /**
     * @var int
     */
    protected $count;
    /**
     * @var int
     */
    protected $page;
    /**
     * @var int
     */
    protected $size;
    /**
     * @var array
     */
    protected $pageParameters;

    /**
     * Page parameter
     */
    const PAGE_PARAMETER = 'page';
    /**
     * Page range
     */
    const PAGE_RANGE = 10;

    /**
     * @param string $route
     * @param int    $count
     * @param int    $page
     * @param int    $size
     * @param array  $pageParameters
     */
    public function __construct($route, $count, $page = 1, $size = 10, array $pageParameters = array())
    {
        $this->route          = $route;
        $this->count          = $count;
        $this->page           = $page;
        $this->size           = $size;
        $this->pageParameters = $pageParameters;
    }

    /**
     * @return int
     */
    public function getResultsCount()
    {
        return $this->count;
    }

    /**
     * @return int
     */
    public function getFirst()
    {
        return 1;
    }

    /**
     * @return int
     */
    public function getCurrent()
    {
        return $this->page;
    }

    /**
     * @return string
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @return int
     */
    public function getPrevious()
    {
        return $this->page > 1 ? $this->page - 1 : '';
    }

    /**
     * @return int
     */
    public function getNext()
    {
        return $this->page + 1 > $this->getLast() ? '' : $this->page + 1;
    }

    /**
     * @return int
     */
    public function getLast()
    {
        if ($this->count % $this->size) {
            return 1 + intval($this->count / $this->size);
        } else {
            return intval($this->count / $this->size);
        }
    }

    /**
     * @return string
     */
    public function getPageParameterName()
    {
        return self::PAGE_PARAMETER;
    }

    /**
     * @return array
     */
    public function getQuery()
    {
        return $this->pageParameters;
    }

    /**
     * @return array
     */
    public function getPagesInRange()
    {
        $delta = ceil(self::PAGE_RANGE / 2);

        if ($this->getLast() <= self::PAGE_RANGE) {
            $pages = range(1, $this->getLast());
        } elseif ($this->getCurrent() - $delta > $this->getLast() - self::PAGE_RANGE) {
            $pages = range($this->getLast() - self::PAGE_RANGE + 1, $this->getLast());
        } else {
            if ($this->getCurrent() - $delta < 0) {
                $delta = $this->getCurrent();
            }

            $offset = $this->getCurrent() - $delta;
            $pages = range($offset + 1, $offset + self::PAGE_RANGE);
        }

        return $pages;
    }
}