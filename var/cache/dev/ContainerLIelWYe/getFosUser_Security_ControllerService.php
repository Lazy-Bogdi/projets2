<?php

namespace ContainerLIelWYe;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getFosUser_Security_ControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'fos_user.security.controller' shared service.
     *
     * @return \FOS\UserBundle\Controller\SecurityController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'framework-bundle'.\DIRECTORY_SEPARATOR.'Controller'.\DIRECTORY_SEPARATOR.'AbstractController.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'friendsofsymfony'.\DIRECTORY_SEPARATOR.'user-bundle'.\DIRECTORY_SEPARATOR.'Controller'.\DIRECTORY_SEPARATOR.'SecurityController.php';

        $container->services['fos_user.security.controller'] = $instance = new \FOS\UserBundle\Controller\SecurityController(($container->privates['security.authentication_utils'] ?? $container->load('getSecurity_AuthenticationUtilsService')), ($container->privates['security.csrf.token_manager'] ?? $container->getSecurity_Csrf_TokenManagerService()));

        $instance->setContainer(($container->privates['.service_locator.CshazM0'] ?? $container->load('get_ServiceLocator_CshazM0Service'))->withContext('fos_user.security.controller', $container));

        return $instance;
    }
}
