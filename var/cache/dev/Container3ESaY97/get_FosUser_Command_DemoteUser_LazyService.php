<?php

namespace Container3ESaY97;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_FosUser_Command_DemoteUser_LazyService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.fos_user.command.demote_user.lazy' shared service.
     *
     * @return \Symfony\Component\Console\Command\LazyCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'console'.\DIRECTORY_SEPARATOR.'Command'.\DIRECTORY_SEPARATOR.'Command.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'console'.\DIRECTORY_SEPARATOR.'Command'.\DIRECTORY_SEPARATOR.'LazyCommand.php';

        return $container->privates['.fos_user.command.demote_user.lazy'] = new \Symfony\Component\Console\Command\LazyCommand('fos:user:demote', [], 'Demote a user by removing a role', false, #[\Closure(name: 'fos_user.command.demote_user', class: 'FOS\\UserBundle\\Command\\DemoteUserCommand')] function () use ($container): \FOS\UserBundle\Command\DemoteUserCommand {
            return ($container->privates['fos_user.command.demote_user'] ?? $container->load('getFosUser_Command_DemoteUserService'));
        });
    }
}
