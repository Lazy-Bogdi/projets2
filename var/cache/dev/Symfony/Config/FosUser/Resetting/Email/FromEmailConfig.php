<?php

namespace Symfony\Config\FosUser\Resetting\Email;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class FromEmailConfig 
{
    private $address;
    private $senderName;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function address($value): static
    {
        $this->_usedProperties['address'] = true;
        $this->address = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function senderName($value): static
    {
        $this->_usedProperties['senderName'] = true;
        $this->senderName = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('address', $value)) {
            $this->_usedProperties['address'] = true;
            $this->address = $value['address'];
            unset($value['address']);
        }

        if (array_key_exists('sender_name', $value)) {
            $this->_usedProperties['senderName'] = true;
            $this->senderName = $value['sender_name'];
            unset($value['sender_name']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['address'])) {
            $output['address'] = $this->address;
        }
        if (isset($this->_usedProperties['senderName'])) {
            $output['sender_name'] = $this->senderName;
        }

        return $output;
    }

}
