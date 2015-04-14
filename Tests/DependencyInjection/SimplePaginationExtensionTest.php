<?php

namespace Evheniy\SimplePaginationBundle\Tests\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Evheniy\SimplePaginationBundle\DependencyInjection\SimplePaginationExtension;

/**
 * Class SimplePaginationExtensionTest
 *
 * @package Evheniy\SimplePaginationBundle\Tests\DependencyInjection
 */
class SimplePaginationExtensionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SimplePaginationExtension
     */
    private $extension;
    /**
     * @var ContainerBuilder
     */
    private $container;

    /**
     *
     */
    protected function setUp()
    {
        $this->extension = new SimplePaginationExtension();

        $this->container = new ContainerBuilder();
        $this->container->registerExtension($this->extension);
    }

    /**
     * Test empty config
     */
    public function testLoad()
    {
        $this->container->loadFromExtension($this->extension->getAlias());
        $this->container->compile();

        $this->assertInstanceOf(
            '\Evheniy\SimplePaginationBundle\Model\Service',
            $this->container->get('pagination')
        );
    }

    /**
     *
     */
    public function testGetAlias()
    {
        $this->assertEquals($this->extension->getAlias(), 'simple_pagination');
    }
}