<?php

namespace Container3ESaY97;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getFosUser_Listener_FlashService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'fos_user.listener.flash' shared service.
     *
     * @return \FOS\UserBundle\EventListener\FlashListener
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'friendsofsymfony'.\DIRECTORY_SEPARATOR.'user-bundle'.\DIRECTORY_SEPARATOR.'EventListener'.\DIRECTORY_SEPARATOR.'FlashListener.php';

        return $container->privates['fos_user.listener.flash'] = new \FOS\UserBundle\EventListener\FlashListener(($container->services['request_stack'] ??= new \Symfony\Component\HttpFoundation\RequestStack()), ($container->services['translator'] ?? $container->getTranslatorService()));
    }
}
