<?php

namespace ContainerLIelWYe;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_FosUser_Command_ChangePassword_LazyService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.fos_user.command.change_password.lazy' shared service.
     *
     * @return \Symfony\Component\Console\Command\LazyCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'console'.\DIRECTORY_SEPARATOR.'Command'.\DIRECTORY_SEPARATOR.'Command.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'console'.\DIRECTORY_SEPARATOR.'Command'.\DIRECTORY_SEPARATOR.'LazyCommand.php';

        return $container->privates['.fos_user.command.change_password.lazy'] = new \Symfony\Component\Console\Command\LazyCommand('fos:user:change-password', [], 'Change the password of a user.', false, #[\Closure(name: 'fos_user.command.change_password', class: 'FOS\\UserBundle\\Command\\ChangePasswordCommand')] function () use ($container): \FOS\UserBundle\Command\ChangePasswordCommand {
            return ($container->privates['fos_user.command.change_password'] ?? $container->load('getFosUser_Command_ChangePasswordService'));
        });
    }
}
