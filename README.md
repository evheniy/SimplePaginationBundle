SimplePaginationBundle
=================

This bundle provides the ability to use simple pagination in your Symfony2 application.

Installation
------------

SimplePaginationBundle:

    $ composer require evheniy/simple-pagination-bundle "dev-master"

    Or add to composer.json

    "evheniy/simple-pagination-bundle": "dev-master"


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

License
-------

This bundle is under the MIT license. See the complete license in the bundle:

    Resources/meta/LICENSE

[MakeDev.org][1]

[1]:  http://makedev.org/
