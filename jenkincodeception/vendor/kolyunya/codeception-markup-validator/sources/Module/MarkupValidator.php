<?php

namespace Kolyunya\Codeception\Module;

use Codeception\Lib\ModuleContainer;
use Codeception\Module;
use Exception;
use Kolyunya\Codeception\Lib\Base\ComponentInterface;
use Kolyunya\Codeception\Lib\MarkupValidator\MarkupProviderInterface;
use Kolyunya\Codeception\Lib\MarkupValidator\MarkupValidatorInterface;
use Kolyunya\Codeception\Lib\MarkupValidator\MessageFilterInterface;
use Kolyunya\Codeception\Lib\MarkupValidator\MessagePrinterInterface;
use ReflectionClass;

/**
 * A module which validates page markup via a markup validator.
 */
class MarkupValidator extends Module
{
    const COMPONENT_CLASS_CONFIG_KEY = 'class';

    const COMPONENT_CONFIG_CONFIG_KEY = 'config';

    const PROVIDER_CONFIG_KEY = 'provider';

    const VALIDATOR_CONFIG_KEY = 'validator';

    const FILTER_CONFIG_KEY = 'filter';

    const PRINTER_CONFIG_KEY = 'printer';

    /**
     * {@inheritDoc}
     */
    protected $config = array(
        self::PROVIDER_CONFIG_KEY => array(
            self::COMPONENT_CLASS_CONFIG_KEY => 'Kolyunya\Codeception\Lib\MarkupValidator\DefaultMarkupProvider',
        ),
        self::VALIDATOR_CONFIG_KEY => array(
            self::COMPONENT_CLASS_CONFIG_KEY => 'Kolyunya\Codeception\Lib\MarkupValidator\W3CMarkupValidator',
        ),
        self::FILTER_CONFIG_KEY => array(
            self::COMPONENT_CLASS_CONFIG_KEY => 'Kolyunya\Codeception\Lib\MarkupValidator\DefaultMessageFilter',
        ),
        self::PRINTER_CONFIG_KEY => array(
            self::COMPONENT_CLASS_CONFIG_KEY => 'Kolyunya\Codeception\Lib\MarkupValidator\DefaultMessagePrinter',
        ),
    );

    /**
     * Markup provider.
     *
     * @var MarkupProviderInterface|object
     */
    private $markupProvider;

    /**
     * Markup validator.
     *
     * @var MarkupValidatorInterface|object
     */
    private $markupValidator;

    /**
     * Message filter.
     *
     * @var MessageFilterInterface|object
     */
    private $messageFilter;

    /**
     * Message printer.
     *
     * @var MessagePrinterInterface|object
     */
    private $messagePrinter;

    /**
     * {@inheritDoc}
     */
    public function __construct(ModuleContainer $moduleContainer, $config = null)
    {
        parent::__construct($moduleContainer, $config);

        $this->initializeMarkupProvider();
        $this->initializeMarkupValidator();
        $this->initializeMessageFilter();
        $this->initializeMessagePrinter();
    }

    /**
     * Validates page markup via a markup validator.
     * Allows to recongigure message filter component.
     *
     * @param array $messageFilterConfiguration Message filter configuration.
     */
    public function validateMarkup(array $messageFilterConfiguration = array())
    {
        $markup = $this->markupProvider->getMarkup();
        $messages = $this->markupValidator->validate($markup);

        $this->messageFilter->setConfiguration($messageFilterConfiguration);
        $filteredMessages = $this->messageFilter->filterMessages($messages);

        if (empty($filteredMessages) === false) {
            $messagesString = $this->messagePrinter->getMessagesString($filteredMessages);
            $this->fail($messagesString);
        }

        // Validation succeeded.
        $this->assertTrue(true);
    }

    /**
     * Initializes markup provider.
     */
    private function initializeMarkupProvider()
    {
        $interface = 'Kolyunya\Codeception\Lib\MarkupValidator\MarkupProviderInterface';
        $this->markupProvider = $this->instantiateComponent(self::PROVIDER_CONFIG_KEY, $interface, array(
            $this->moduleContainer,
        ));
    }

    /**
     * Initializes markup validator.
     */
    private function initializeMarkupValidator()
    {
        $interface = 'Kolyunya\Codeception\Lib\MarkupValidator\MarkupValidatorInterface';
        $this->markupValidator = $this->instantiateComponent(self::VALIDATOR_CONFIG_KEY, $interface);
    }

    /**
     * Initializes message filter.
     */
    private function initializeMessageFilter()
    {
        $interface = 'Kolyunya\Codeception\Lib\MarkupValidator\MessageFilterInterface';
        $this->messageFilter = $this->instantiateComponent(self::FILTER_CONFIG_KEY, $interface);
    }

    /**
     * Initializes message printer.
     */
    private function initializeMessagePrinter()
    {
        $interface = 'Kolyunya\Codeception\Lib\MarkupValidator\MessagePrinterInterface';
        $this->messagePrinter = $this->instantiateComponent(self::PRINTER_CONFIG_KEY, $interface);
    }

    /**
     * Instantiates and returns a module component.
     *
     * @param string $componentName Component name.
     * @param string $interface An interface component must implement.
     * @param array $arguments Component's constructor arguments.
     *
     * @throws Exception When component does not implement expected interface.
     *
     * @return object Instance of a module component.
     */
    private function instantiateComponent($componentName, $interface, array $arguments = array())
    {
        $componentClass = $this->getComponentClass($componentName);
        $componentReflectionClass = new ReflectionClass($componentClass);
        if ($componentReflectionClass->implementsInterface($interface) === false) {
            $errorMessageTemplate = 'Invalid class «%s» provided for component «%s». It must implement «%s».';
            $errorMessage = sprintf($errorMessageTemplate, $componentClass, $componentName, $interface);
            throw new Exception($errorMessage);
        }

        /* @var $component ComponentInterface */
        $component = $componentReflectionClass->newInstanceArgs($arguments);
        $componentConfiguration = $this->getComponentConfiguration($componentName);
        $component->setConfiguration($componentConfiguration);

        return $component;
    }

    /**
     * Returns component class name.
     *
     * @param string $componentName Component name.
     *
     * @return string Component class name.
     */
    private function getComponentClass($componentName)
    {
        $componentClassKey = self::COMPONENT_CLASS_CONFIG_KEY;
        if (isset($this->config[$componentName][$componentClassKey]) === false ||
            is_string($this->config[$componentName][$componentClassKey]) === false
        ) {
            $errorMessage = sprintf('Invalid class configuration of component «%s».', $componentName);
            throw new Exception($errorMessage);
        }

        $componentClass = $this->config[$componentName][$componentClassKey];

        return $componentClass;
    }

    /**
     * Returns component configuration parameters.
     *
     * @param string $componentName Component name.
     *
     * @return array Component configuration parameters.
     */
    private function getComponentConfiguration($componentName)
    {
        $componentConfig = array();

        $componentConfigKey = self::COMPONENT_CONFIG_CONFIG_KEY;
        if (isset($this->config[$componentName][$componentConfigKey]) === true) {
            if (is_array($this->config[$componentName][$componentConfigKey]) === false) {
                $errorMessage = sprintf('Invalid configuration of component «%s».', $componentName);
                throw new Exception($errorMessage);
            }

            $componentConfig = $this->config[$componentName][$componentConfigKey];
        }

        return $componentConfig;
    }
}
