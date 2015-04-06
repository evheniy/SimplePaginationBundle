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

Layout

    {% include "SimplePaginationBundle::pagination.html.twig" %}

Or for [Twitter Bootstrap][3]

    {% include "SimplePaginationBundle::pagination.bootstrap.html.twig" %}

License
-------

This bundle is under the MIT license. See the complete license in the bundle:

    Resources/meta/LICENSE

[Документация на русском языке][1]

[Demo][2]

[1]:  http://makedev.org/articles/symfony/bundles/pagination_bundle.html
[2]:  http://makedev.org/search/?q=PHP
[3]:  https://github.com/evheniy/TwitterBootstrapBundle
