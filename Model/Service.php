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
     * @param int    $range
     * @param array  $pageParameters
     * @param string $pageParameter
     *
     * @return Pagination
     */
    public function paginate($route, $count, $page = 1, $size = 10, $range = 10, array $pageParameters = array(), $pageParameter = 'page')
    {
        return new Pagination($route, $count, $page, $size, $range, $pageParameters, $pageParameter);
    }
}