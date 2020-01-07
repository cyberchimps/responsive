<?php

namespace Kolyunya\Codeception\Lib\MarkupValidator;

use Codeception\Lib\ModuleContainer;
use Codeception\Module\PhpBrowser;
use Codeception\Module\WebDriver;
use Exception;
use Kolyunya\Codeception\Lib\Base\Component;
use Kolyunya\Codeception\Lib\MarkupValidator\MarkupProviderInterface;

/**
 * Default markup provider which attemps to get markup from
 * `PhpBrowser` and `WebDriver` modules.
 */
class DefaultMarkupProvider extends Component implements MarkupProviderInterface
{
    /**
     * Module container.
     *
     * @var ModuleContainer
     */
    private $moduleContainer;

    /**
     * {@inheritDoc}
     */
    public function __construct(ModuleContainer $moduleContainer, array $configuration = array())
    {
        parent::__construct($configuration);

        $this->moduleContainer = $moduleContainer;
    }

    /**
     * {@inheritDoc}
     */
    public function getMarkup()
    {
        try {
            return $this->getMarkupFromPhpBrowser();
        } catch (Exception $exception) {
            // Wasn't able to get markup from the `PhpBrowser` module.
        }

        try {
            return $this->getMarkupFromWebDriver();
        } catch (Exception $exception) {
            // Wasn't able to get markup from the `WebDriver` module.
        }

        throw new Exception('Unable to obtain current page markup.');
    }

    /**
     * Returns current page markup form the `PhpBrowser` module.
     *
     * @return string Current page markup.
     */
    private function getMarkupFromPhpBrowser()
    {
        /* @var $phpBrowser PhpBrowser */
        $phpBrowser = $this->getModule('PhpBrowser');
        $markup = $phpBrowser->_getResponseContent();

        return $markup;
    }

    /**
     * Returns current page markup form the `WebDriver` module.
     *
     * @return string Current page markup.
     */
    private function getMarkupFromWebDriver()
    {
        /* @var $webDriver WebDriver */
        $webDriver = $this->getModule('WebDriver');
        $markup = $webDriver->webDriver->getPageSource();

        return $markup;
    }

    /**
     * Returns a module instance by its name.
     *
     * @param string $name Module name.
     * @return object Module instance.
     */
    private function getModule($name)
    {
        if (!$this->moduleContainer->hasModule($name)) {
            throw new Exception(sprintf('«%s» module is not available.', $name));
        }

        $module = $this->moduleContainer->getModule($name);

        return $module;
    }
}
