<?php

namespace Symfony\Config\FosUser;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ServiceConfig 
{
    private $mailer;
    private $emailCanonicalizer;
    private $tokenGenerator;
    private $usernameCanonicalizer;
    private $userManager;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function mailer($value): static
    {
        $this->_usedProperties['mailer'] = true;
        $this->mailer = $value;

        return $this;
    }

    /**
     * @default 'fos_user.util.canonicalizer.default'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function emailCanonicalizer($value): static
    {
        $this->_usedProperties['emailCanonicalizer'] = true;
        $this->emailCanonicalizer = $value;

        return $this;
    }

    /**
     * @default 'fos_user.util.token_generator.default'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function tokenGenerator($value): static
    {
        $this->_usedProperties['tokenGenerator'] = true;
        $this->tokenGenerator = $value;

        return $this;
    }

    /**
     * @default 'fos_user.util.canonicalizer.default'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function usernameCanonicalizer($value): static
    {
        $this->_usedProperties['usernameCanonicalizer'] = true;
        $this->usernameCanonicalizer = $value;

        return $this;
    }

    /**
     * @default 'fos_user.user_manager.default'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function userManager($value): static
    {
        $this->_usedProperties['userManager'] = true;
        $this->userManager = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('mailer', $value)) {
            $this->_usedProperties['mailer'] = true;
            $this->mailer = $value['mailer'];
            unset($value['mailer']);
        }

        if (array_key_exists('email_canonicalizer', $value)) {
            $this->_usedProperties['emailCanonicalizer'] = true;
            $this->emailCanonicalizer = $value['email_canonicalizer'];
            unset($value['email_canonicalizer']);
        }

        if (array_key_exists('token_generator', $value)) {
            $this->_usedProperties['tokenGenerator'] = true;
            $this->tokenGenerator = $value['token_generator'];
            unset($value['token_generator']);
        }

        if (array_key_exists('username_canonicalizer', $value)) {
            $this->_usedProperties['usernameCanonicalizer'] = true;
            $this->usernameCanonicalizer = $value['username_canonicalizer'];
            unset($value['username_canonicalizer']);
        }

        if (array_key_exists('user_manager', $value)) {
            $this->_usedProperties['userManager'] = true;
            $this->userManager = $value['user_manager'];
            unset($value['user_manager']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['mailer'])) {
            $output['mailer'] = $this->mailer;
        }
        if (isset($this->_usedProperties['emailCanonicalizer'])) {
            $output['email_canonicalizer'] = $this->emailCanonicalizer;
        }
        if (isset($this->_usedProperties['tokenGenerator'])) {
            $output['token_generator'] = $this->tokenGenerator;
        }
        if (isset($this->_usedProperties['usernameCanonicalizer'])) {
            $output['username_canonicalizer'] = $this->usernameCanonicalizer;
        }
        if (isset($this->_usedProperties['userManager'])) {
            $output['user_manager'] = $this->userManager;
        }

        return $output;
    }

}
