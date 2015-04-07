SimplePaginationBundle
=================

[![knpbundles.com](http://knpbundles.com/evheniy/SimplePaginationBundle/badge)](http://knpbundles.com/evheniy/SimplePaginationBundle)

[![Latest Stable Version](https://poser.pugx.org/evheniy/simple-pagination-bundle/v/stable.svg)](https://packagist.org/packages/evheniy/simple-pagination-bundle) [![Total Downloads](https://poser.pugx.org/evheniy/simple-pagination-bundle/downloads.svg)](https://packagist.org/packages/evheniy/simple-pagination-bundle) [![Latest Unstable Version](https://poser.pugx.org/evheniy/simple-pagination-bundle/v/unstable.svg)](https://packagist.org/packages/evheniy/simple-pagination-bundle) [![License](https://poser.pugx.org/evheniy/simple-pagination-bundle/license.svg)](https://packagist.org/packages/evheniy/simple-pagination-bundle)

This bundle provides the ability to use simple pagination in your Symfony2 application.


Installation
------------

SimplePaginationBundle:

    $ composer require evheniy/simple-pagination-bundle "1.*"

    Or add to composer.json

    "evheniy/simple-pagination-bundle": "1.*"


AppKernel:

        public function registerBundles()
            {
                $bundles = array(
                    ...
                    new Evheniy\SimplePaginationBundle\SimplePaginationBundle(),
                );
                ...

Controller

    $pagination = $this->container->get('pagination');
    
    return $this->render(
                'AppBundle:Default:index.html.twig',
                array(
                    ...
                    'pagination'  => $pagination->paginate($request->get('_route'), $resultsCount, $page, $size, $request->query->all())
                )
            );

Layout for [Twitter Bootstrap][3]

    {% include "SimplePaginationBundle::pagination.bootstrap.html.twig" %}

Or standard

    {% include "SimplePaginationBundle::pagination.html.twig" %}

And styles for exaple like this

    <style>
    .pagination {
        text-align: center;
    }
    .pagination span a {
        display: inline-block;
        padding: 4px 8px;
        margin: 3px;
        font-size: 12px;
        font-weight: normal;
        line-height: 1.42857143;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        border: 1px solid transparent;
        border-radius: 4px;
        color: #333;
        background-color: #fff;
        border-color: #ccc;
    }
    .pagination span a:hover {
        color: #333;
        text-decoration: none;
    }
    .pagination span a:active {
        outline: thin dotted;
        outline: 5px auto -webkit-focus-ring-color;
        outline-offset: -2px;
    }
    .pagination span.current {
        display: inline-block;
        padding: 4px 8px;
        margin-bottom: 0;
        font-size: 14px;
        font-weight: bold;
        line-height: 1.42857143;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background-image: none;
        border: 1px solid transparent;
        border-radius: 4px;
        color: #333;
        background-color: #fff;
        border-color: #ccc;
    }
    </style>

License
-------

This bundle is under the MIT license. See the complete license in the bundle:

    Resources/meta/LICENSE

[Документация на русском языке][1]

[Demo][2]

[1]:  http://makedev.org/articles/symfony/bundles/pagination_bundle.html
[2]:  http://makedev.org/search/?q=php+Composer+Symfony2+Google+phpunit
[3]:  https://github.com/evheniy/TwitterBootstrapBundle
