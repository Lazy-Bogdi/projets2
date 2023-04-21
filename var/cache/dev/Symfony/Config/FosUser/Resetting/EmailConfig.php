<?php

namespace Symfony\Config\FosUser\Resetting;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Email'.\DIRECTORY_SEPARATOR.'FromEmailConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class EmailConfig 
{
    private $template;
    private $fromEmail;
    private $_usedProperties = [];

    /**
     * @default '@FOSUser/Resetting/email.txt.twig'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function template($value): static
    {
        $this->_usedProperties['template'] = true;
        $this->template = $value;

        return $this;
    }

    public function fromEmail(array $value = []): \Symfony\Config\FosUser\Resetting\Email\FromEmailConfig
    {
        if (null === $this->fromEmail) {
            $this->_usedProperties['fromEmail'] = true;
            $this->fromEmail = new \Symfony\Config\FosUser\Resetting\Email\FromEmailConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "fromEmail()" has already been initialized. You cannot pass values the second time you call fromEmail().');
        }

        return $this->fromEmail;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('template', $value)) {
            $this->_usedProperties['template'] = true;
            $this->template = $value['template'];
            unset($value['template']);
        }

        if (array_key_exists('from_email', $value)) {
            $this->_usedProperties['fromEmail'] = true;
            $this->fromEmail = new \Symfony\Config\FosUser\Resetting\Email\FromEmailConfig($value['from_email']);
            unset($value['from_email']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['template'])) {
            $output['template'] = $this->template;
        }
        if (isset($this->_usedProperties['fromEmail'])) {
            $output['from_email'] = $this->fromEmail->toArray();
        }

        return $output;
    }

}
