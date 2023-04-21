<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'FosUser'.\DIRECTORY_SEPARATOR.'FromEmailConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'FosUser'.\DIRECTORY_SEPARATOR.'ProfileConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'FosUser'.\DIRECTORY_SEPARATOR.'ChangePasswordConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'FosUser'.\DIRECTORY_SEPARATOR.'RegistrationConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'FosUser'.\DIRECTORY_SEPARATOR.'ResettingConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'FosUser'.\DIRECTORY_SEPARATOR.'ServiceConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class FosUserConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $dbDriver;
    private $userClass;
    private $firewallName;
    private $modelManagerName;
    private $useAuthenticationListener;
    private $registerLastLogin;
    private $useListener;
    private $useFlashNotifications;
    private $useUsernameFormType;
    private $fromEmail;
    private $profile;
    private $changePassword;
    private $registration;
    private $resetting;
    private $service;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function dbDriver($value): static
    {
        $this->_usedProperties['dbDriver'] = true;
        $this->dbDriver = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function userClass($value): static
    {
        $this->_usedProperties['userClass'] = true;
        $this->userClass = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function firewallName($value): static
    {
        $this->_usedProperties['firewallName'] = true;
        $this->firewallName = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function modelManagerName($value): static
    {
        $this->_usedProperties['modelManagerName'] = true;
        $this->modelManagerName = $value;

        return $this;
    }

    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function useAuthenticationListener($value): static
    {
        $this->_usedProperties['useAuthenticationListener'] = true;
        $this->useAuthenticationListener = $value;

        return $this;
    }

    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function registerLastLogin($value): static
    {
        $this->_usedProperties['registerLastLogin'] = true;
        $this->registerLastLogin = $value;

        return $this;
    }

    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function useListener($value): static
    {
        $this->_usedProperties['useListener'] = true;
        $this->useListener = $value;

        return $this;
    }

    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function useFlashNotifications($value): static
    {
        $this->_usedProperties['useFlashNotifications'] = true;
        $this->useFlashNotifications = $value;

        return $this;
    }

    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function useUsernameFormType($value): static
    {
        $this->_usedProperties['useUsernameFormType'] = true;
        $this->useUsernameFormType = $value;

        return $this;
    }

    public function fromEmail(array $value = []): \Symfony\Config\FosUser\FromEmailConfig
    {
        if (null === $this->fromEmail) {
            $this->_usedProperties['fromEmail'] = true;
            $this->fromEmail = new \Symfony\Config\FosUser\FromEmailConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "fromEmail()" has already been initialized. You cannot pass values the second time you call fromEmail().');
        }

        return $this->fromEmail;
    }

    /**
     * @default {"form":{"type":"FOS\\UserBundle\\Form\\Type\\ProfileFormType","name":"fos_user_profile_form","validation_groups":["Profile","Default"]}}
    */
    public function profile(array $value = []): \Symfony\Config\FosUser\ProfileConfig
    {
        if (null === $this->profile) {
            $this->_usedProperties['profile'] = true;
            $this->profile = new \Symfony\Config\FosUser\ProfileConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "profile()" has already been initialized. You cannot pass values the second time you call profile().');
        }

        return $this->profile;
    }

    /**
     * @default {"form":{"type":"FOS\\UserBundle\\Form\\Type\\ChangePasswordFormType","name":"fos_user_change_password_form","validation_groups":["ChangePassword","Default"]}}
    */
    public function changePassword(array $value = []): \Symfony\Config\FosUser\ChangePasswordConfig
    {
        if (null === $this->changePassword) {
            $this->_usedProperties['changePassword'] = true;
            $this->changePassword = new \Symfony\Config\FosUser\ChangePasswordConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "changePassword()" has already been initialized. You cannot pass values the second time you call changePassword().');
        }

        return $this->changePassword;
    }

    /**
     * @default {"confirmation":{"enabled":false,"template":"@FOSUser\/Registration\/email.txt.twig"},"form":{"type":"FOS\\UserBundle\\Form\\Type\\RegistrationFormType","name":"fos_user_registration_form","validation_groups":["Registration","Default"]}}
    */
    public function registration(array $value = []): \Symfony\Config\FosUser\RegistrationConfig
    {
        if (null === $this->registration) {
            $this->_usedProperties['registration'] = true;
            $this->registration = new \Symfony\Config\FosUser\RegistrationConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "registration()" has already been initialized. You cannot pass values the second time you call registration().');
        }

        return $this->registration;
    }

    /**
     * @default {"retry_ttl":7200,"token_ttl":86400,"email":{"template":"@FOSUser\/Resetting\/email.txt.twig"},"form":{"type":"FOS\\UserBundle\\Form\\Type\\ResettingFormType","name":"fos_user_resetting_form","validation_groups":["ResetPassword","Default"]}}
    */
    public function resetting(array $value = []): \Symfony\Config\FosUser\ResettingConfig
    {
        if (null === $this->resetting) {
            $this->_usedProperties['resetting'] = true;
            $this->resetting = new \Symfony\Config\FosUser\ResettingConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "resetting()" has already been initialized. You cannot pass values the second time you call resetting().');
        }

        return $this->resetting;
    }

    /**
     * @default {"mailer":null,"email_canonicalizer":"fos_user.util.canonicalizer.default","token_generator":"fos_user.util.token_generator.default","username_canonicalizer":"fos_user.util.canonicalizer.default","user_manager":"fos_user.user_manager.default"}
    */
    public function service(array $value = []): \Symfony\Config\FosUser\ServiceConfig
    {
        if (null === $this->service) {
            $this->_usedProperties['service'] = true;
            $this->service = new \Symfony\Config\FosUser\ServiceConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "service()" has already been initialized. You cannot pass values the second time you call service().');
        }

        return $this->service;
    }

    public function getExtensionAlias(): string
    {
        return 'fos_user';
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('db_driver', $value)) {
            $this->_usedProperties['dbDriver'] = true;
            $this->dbDriver = $value['db_driver'];
            unset($value['db_driver']);
        }

        if (array_key_exists('user_class', $value)) {
            $this->_usedProperties['userClass'] = true;
            $this->userClass = $value['user_class'];
            unset($value['user_class']);
        }

        if (array_key_exists('firewall_name', $value)) {
            $this->_usedProperties['firewallName'] = true;
            $this->firewallName = $value['firewall_name'];
            unset($value['firewall_name']);
        }

        if (array_key_exists('model_manager_name', $value)) {
            $this->_usedProperties['modelManagerName'] = true;
            $this->modelManagerName = $value['model_manager_name'];
            unset($value['model_manager_name']);
        }

        if (array_key_exists('use_authentication_listener', $value)) {
            $this->_usedProperties['useAuthenticationListener'] = true;
            $this->useAuthenticationListener = $value['use_authentication_listener'];
            unset($value['use_authentication_listener']);
        }

        if (array_key_exists('register_last_login', $value)) {
            $this->_usedProperties['registerLastLogin'] = true;
            $this->registerLastLogin = $value['register_last_login'];
            unset($value['register_last_login']);
        }

        if (array_key_exists('use_listener', $value)) {
            $this->_usedProperties['useListener'] = true;
            $this->useListener = $value['use_listener'];
            unset($value['use_listener']);
        }

        if (array_key_exists('use_flash_notifications', $value)) {
            $this->_usedProperties['useFlashNotifications'] = true;
            $this->useFlashNotifications = $value['use_flash_notifications'];
            unset($value['use_flash_notifications']);
        }

        if (array_key_exists('use_username_form_type', $value)) {
            $this->_usedProperties['useUsernameFormType'] = true;
            $this->useUsernameFormType = $value['use_username_form_type'];
            unset($value['use_username_form_type']);
        }

        if (array_key_exists('from_email', $value)) {
            $this->_usedProperties['fromEmail'] = true;
            $this->fromEmail = new \Symfony\Config\FosUser\FromEmailConfig($value['from_email']);
            unset($value['from_email']);
        }

        if (array_key_exists('profile', $value)) {
            $this->_usedProperties['profile'] = true;
            $this->profile = new \Symfony\Config\FosUser\ProfileConfig($value['profile']);
            unset($value['profile']);
        }

        if (array_key_exists('change_password', $value)) {
            $this->_usedProperties['changePassword'] = true;
            $this->changePassword = new \Symfony\Config\FosUser\ChangePasswordConfig($value['change_password']);
            unset($value['change_password']);
        }

        if (array_key_exists('registration', $value)) {
            $this->_usedProperties['registration'] = true;
            $this->registration = new \Symfony\Config\FosUser\RegistrationConfig($value['registration']);
            unset($value['registration']);
        }

        if (array_key_exists('resetting', $value)) {
            $this->_usedProperties['resetting'] = true;
            $this->resetting = new \Symfony\Config\FosUser\ResettingConfig($value['resetting']);
            unset($value['resetting']);
        }

        if (array_key_exists('service', $value)) {
            $this->_usedProperties['service'] = true;
            $this->service = new \Symfony\Config\FosUser\ServiceConfig($value['service']);
            unset($value['service']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['dbDriver'])) {
            $output['db_driver'] = $this->dbDriver;
        }
        if (isset($this->_usedProperties['userClass'])) {
            $output['user_class'] = $this->userClass;
        }
        if (isset($this->_usedProperties['firewallName'])) {
            $output['firewall_name'] = $this->firewallName;
        }
        if (isset($this->_usedProperties['modelManagerName'])) {
            $output['model_manager_name'] = $this->modelManagerName;
        }
        if (isset($this->_usedProperties['useAuthenticationListener'])) {
            $output['use_authentication_listener'] = $this->useAuthenticationListener;
        }
        if (isset($this->_usedProperties['registerLastLogin'])) {
            $output['register_last_login'] = $this->registerLastLogin;
        }
        if (isset($this->_usedProperties['useListener'])) {
            $output['use_listener'] = $this->useListener;
        }
        if (isset($this->_usedProperties['useFlashNotifications'])) {
            $output['use_flash_notifications'] = $this->useFlashNotifications;
        }
        if (isset($this->_usedProperties['useUsernameFormType'])) {
            $output['use_username_form_type'] = $this->useUsernameFormType;
        }
        if (isset($this->_usedProperties['fromEmail'])) {
            $output['from_email'] = $this->fromEmail->toArray();
        }
        if (isset($this->_usedProperties['profile'])) {
            $output['profile'] = $this->profile->toArray();
        }
        if (isset($this->_usedProperties['changePassword'])) {
            $output['change_password'] = $this->changePassword->toArray();
        }
        if (isset($this->_usedProperties['registration'])) {
            $output['registration'] = $this->registration->toArray();
        }
        if (isset($this->_usedProperties['resetting'])) {
            $output['resetting'] = $this->resetting->toArray();
        }
        if (isset($this->_usedProperties['service'])) {
            $output['service'] = $this->service->toArray();
        }

        return $output;
    }

}
