<?php

namespace ContainerE8hukVY;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_5XonMaQService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.5XonMaQ' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.5XonMaQ'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'article' => ['privates', '.errored..service_locator.5XonMaQ.App\\Entity\\Article', NULL, 'Cannot autowire service ".service_locator.5XonMaQ": it needs an instance of "App\\Entity\\Article" but this type has been excluded in "config/services.yaml".'],
            'commentRepository' => ['privates', 'App\\Repository\\CommentRepository', 'getCommentRepositoryService', true],
        ], [
            'article' => 'App\\Entity\\Article',
            'commentRepository' => 'App\\Repository\\CommentRepository',
        ]);
    }
}