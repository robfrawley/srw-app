<?php

/*
 * This file is part of the `src-run/src-run-app` project.
 *
 * (c) Rob Frawley 2nd <rmf@src.run>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace App;

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\Config\Exception\FileLoaderLoadException;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\Config\Resource\FileResource;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Component\Routing\RouteCollectionBuilder;

/**
 * Class Kernel
 */
class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    /**
     * @var string
     */
    const CONFIG_EXTS = '.{php,xml,yaml,yml}';

    /**
     * @return string
     */
    public function getCacheDir(): string
    {
        return self::makePath($this->getProjectDir(), 'var', 'cache', $this->getEnvironment());
    }

    /**
     * @return string
     */
    public function getLogDir(): string
    {
        return self::makePath($this->getProjectDir(), 'var', 'log');
    }

    /**
     * @return string
     */
    public function getConfigDir(): string
    {
        return self::makePath($this->getProjectDir(), 'config');
    }

    /**
     * @return string
     */
    public function getBundlesConfigFile(): string
    {
        return self::makePath($this->getConfigDir(), 'bundles.php');
    }

    /**
     * @return \Generator
     */
    public function registerBundles(): \Generator
    {
        foreach ((require $this->getBundlesConfigFile()) as $class => $environments) {
            if (isset($environments['all']) || isset($environments[$this->getEnvironment()])) {
                yield new $class();
            }
        }
    }

    /**
     * @param ContainerBuilder $container
     * @param LoaderInterface  $loader
     *
     * @throws \Exception
     */
    protected function configureContainer(ContainerBuilder $container, LoaderInterface $loader): void
    {
        $container->addResource(new FileResource($this->getBundlesConfigFile()));
        $container->setParameter('container.dumper.inline_class_loader', true);

        $loader->load(self::makePath($this->getConfigDir(), '{packages}', '*'.self::CONFIG_EXTS), 'glob');
        $loader->load(self::makePath($this->getConfigDir(), '{packages}', $this->getEnvironment(), '**', '*'.self::CONFIG_EXTS), 'glob');
        $loader->load(self::makePath($this->getConfigDir(), '{services}'.self::CONFIG_EXTS), 'glob');
        $loader->load(self::makePath($this->getConfigDir(), '{services}_'.$this->getEnvironment().self::CONFIG_EXTS), 'glob');
    }

    /**
     * @param RouteCollectionBuilder $routes
     *
     * @throws FileLoaderLoadException
     */
    protected function configureRoutes(RouteCollectionBuilder $routes): void
    {
        $routes->import(self::makePath($this->getConfigDir(), '{routes}', '*'.self::CONFIG_EXTS), '/', 'glob');
        $routes->import(self::makePath($this->getConfigDir(), '{routes}', $this->getEnvironment(), '**', '*'.self::CONFIG_EXTS), '/', 'glob');
        $routes->import(self::makePath($this->getConfigDir(), '{routes}'.self::CONFIG_EXTS), '/', 'glob');
    }

    protected function getKernelParameters()
    {
        return array_merge(parent::getKernelParameters(), [
            'kernel.config_dir' => $this->getConfigDir(),
        ]);
    }

    /**
     * @param string ...$sections
     *
     * @return string
     */
    private static function makePath(string ...$sections): string
    {
        return preg_replace('/[\/]{2,}/', '/', implode('/', $sections));
    }
}
