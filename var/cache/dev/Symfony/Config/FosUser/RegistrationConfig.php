<?php

namespace Symfony\Config\FosUser;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Registration'.\DIRECTORY_SEPARATOR.'ConfirmationConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Registration'.\DIRECTORY_SEPARATOR.'FormConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class RegistrationConfig 
{
    private $confirmation;
    private $form;
    private $_usedProperties = [];

    /**
     * @default {"enabled":false,"template":"@FOSUser\/Registration\/email.txt.twig"}
    */
    public function confirmation(array $value = []): \Symfony\Config\FosUser\Registration\ConfirmationConfig
    {
        if (null === $this->confirmation) {
            $this->_usedProperties['confirmation'] = true;
            $this->confirmation = new \Symfony\Config\FosUser\Registration\ConfirmationConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "confirmation()" has already been initialized. You cannot pass values the second time you call confirmation().');
        }

        return $this->confirmation;
    }

    /**
     * @default {"type":"FOS\\UserBundle\\Form\\Type\\RegistrationFormType","name":"fos_user_registration_form","validation_groups":["Registration","Default"]}
    */
    public function form(array $value = []): \Symfony\Config\FosUser\Registration\FormConfig
    {
        if (null === $this->form) {
            $this->_usedProperties['form'] = true;
            $this->form = new \Symfony\Config\FosUser\Registration\FormConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "form()" has already been initialized. You cannot pass values the second time you call form().');
        }

        return $this->form;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('confirmation', $value)) {
            $this->_usedProperties['confirmation'] = true;
            $this->confirmation = new \Symfony\Config\FosUser\Registration\ConfirmationConfig($value['confirmation']);
            unset($value['confirmation']);
        }

        if (array_key_exists('form', $value)) {
            $this->_usedProperties['form'] = true;
            $this->form = new \Symfony\Config\FosUser\Registration\FormConfig($value['form']);
            unset($value['form']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['confirmation'])) {
            $output['confirmation'] = $this->confirmation->toArray();
        }
        if (isset($this->_usedProperties['form'])) {
            $output['form'] = $this->form->toArray();
        }

        return $output;
    }

}
