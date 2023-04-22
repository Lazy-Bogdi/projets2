<?php

namespace ContainerLIelWYe;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getFosUser_Security_InteractiveLoginListenerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'fos_user.security.interactive_login_listener' shared service.
     *
     * @return \FOS\UserBundle\EventListener\LastLoginListener
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'friendsofsymfony'.\DIRECTORY_SEPARATOR.'user-bundle'.\DIRECTORY_SEPARATOR.'EventListener'.\DIRECTORY_SEPARATOR.'LastLoginListener.php';

        return $container->privates['fos_user.security.interactive_login_listener'] = new \FOS\UserBundle\EventListener\LastLoginListener(($container->services['fos_user.user_manager'] ?? $container->load('getFosUser_UserManagerService')));
    }
}