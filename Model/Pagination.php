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
     * @var int
     */
    protected $range;
    /**
     * @var array
     */
    protected $pageParameters;
    /**
     * @var string
     */
    protected $pageParameter;

    /**
     * @param string $route
     * @param int    $count
     * @param int    $page
     * @param int    $size
     * @param int    $range
     * @param array  $pageParameters
     * @param string $pageParameter
     */
    public function __construct($route, $count, $page = 1, $size = 10, $range = 10, array $pageParameters = array(), $pageParameter = 'page')
    {
        $this->route          = $route;
        $this->count          = $count;
        $this->page           = $page;
        $this->size           = $size;
        $this->range          = $range;
        $this->pageParameters = $pageParameters;
        $this->pageParameter  = $pageParameter;
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
        return $this->pageParameter;
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
        $delta = ceil($this->range / 2);

        if ($this->getLast() <= $this->range) {
            $pages = range(1, $this->getLast());
        } elseif ($this->getCurrent() - $delta > $this->getLast() - $this->range) {
            $pages = range($this->getLast() - $this->range + 1, $this->getLast());
        } else {
            if ($this->getCurrent() - $delta < 0) {
                $delta = $this->getCurrent();
            }

            $offset = $this->getCurrent() - $delta;
            $pages = range($offset + 1, $offset + $this->range);
        }

        return $pages;
    }
}