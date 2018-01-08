<?php

namespace App;

/**
 * The configuration provider for the App module
 *
 * @see https://docs.zendframework.com/zend-component-installer/
 */
class ConfigProvider
{
    /**
     * Returns the configuration array
     *
     * To add a bit of a structure, each section is defined in a separate
     * method which returns an array with its configuration.
     *
     * @return array
     */
    public function __invoke()
    {
        return [
            'dependencies' => $this->getDependencies(),
            'templates' => $this->getTemplates(),
        ];
    }

    /**
     * Returns the container dependencies
     *
     * @return array
     */
    public function getDependencies()
    {
        return [
            'invokables' => [
                Action\PingAction::class => Action\PingAction::class,
            ],
            'factories' => [
                Action\HomePageAction::class => Action\HomePageFactory::class,
                Application\Action\TesteAction::class => Application\Action\TesteFactory::class,

                Application\Action\ClienteListAction::class => Application\Action\Factory\ClienteListFactory::class,
                Application\Action\ClienteCreateAction::class => Application\Action\Factory\ClienteCreateFactory::class,
                Application\Action\ClienteUpdateAction::class => Application\Action\Factory\ClienteUpdateFactory::class,

                Application\Middleware\BootstrapMiddleware::class => Application\Middleware\BootstrapMiddlewareFactory::class,
                Domain\Persistence\ClienteRepositoryInterface::class => Infrastructure\Persistence\Doctrine\Repository\ClienteRepositoryFactory::class,
                Domain\Persistence\EnderecoRepositoryInterface::class => Infrastructure\Persistence\Doctrine\Repository\EnderecoRepositoryFactory::class,
            ],
        ];
    }

    /**
     * Returns the templates configuration
     *
     * @return array
     */
    public function getTemplates()
    {
        return [
            'paths' => [
                'app' => ['templates/app'],
                'error' => ['templates/error'],
                'layout' => ['templates/layout'],
            ],
        ];
    }
}
