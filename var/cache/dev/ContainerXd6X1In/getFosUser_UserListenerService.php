<?php

namespace ContainerXd6X1In;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getFosUser_UserListenerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'fos_user.user_listener' shared service.
     *
     * @return \FOS\UserBundle\Doctrine\UserListener
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'doctrine'.\DIRECTORY_SEPARATOR.'event-manager'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'EventSubscriber.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'friendsofsymfony'.\DIRECTORY_SEPARATOR.'user-bundle'.\DIRECTORY_SEPARATOR.'Doctrine'.\DIRECTORY_SEPARATOR.'UserListener.php';

        return $container->privates['fos_user.user_listener'] = new \FOS\UserBundle\Doctrine\UserListener(($container->privates['fos_user.util.password_updater'] ?? $container->load('getFosUser_Util_PasswordUpdaterService')), ($container->privates['fos_user.util.canonical_fields_updater'] ?? $container->getFosUser_Util_CanonicalFieldsUpdaterService()));
    }
}
