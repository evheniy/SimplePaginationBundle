<?php

namespace Evheniy\SimplePaginationBundle\Model;

/**
 * Class Service
 * @package Evheniy\SimplePaginationBundle\Model
 */
class Service
{
    /**
     * @param string $route
     * @param int    $count
     * @param int    $page
     * @param int    $size
     * @param array  $pageParameters
     *
     * @return Pagination
     */
    public function paginate($route, $count, $page = 1, $size = 10, array $pageParameters = array())
    {
        return new Pagination($route, $count, $page, $size, $pageParameters);
    }
}