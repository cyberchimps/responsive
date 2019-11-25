<?php

namespace Kolyunya\Codeception\Tests\Lib\MarkupValidator;

use Codeception\Lib\ModuleContainer;
use Kolyunya\Codeception\Lib\MarkupValidator\DefaultMarkupProvider;
use Kolyunya\Codeception\Tests\Base\TestCase;
use PHPUnit_Framework_MockObject_MockObject;

class DefaultMarkupProviderTest extends TestCase
{
    /**
     * @var ModuleContainer|PHPUnit_Framework_MockObject_MockObject
     */
    private $moduleContainer;

    /**
     * @var DefaultMarkupProvider
     */
    private $provider;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->moduleContainer = $this
            ->getMockBuilder('Codeception\Lib\ModuleContainer')
            ->disableOriginalConstructor()
            ->setMethods(array(
                'hasModule',
                'getModule',
            ))
            ->getMock()
        ;

        $this->provider = new DefaultMarkupProvider($this->moduleContainer);
    }

    /**
     * {@inheritDoc}
     */
    public function tearDown()
    {
    }

    public function testWithNoPhpBrowserNoWebDriver()
    {
        $this->setExpectedException('Exception', 'Unable to obtain current page markup.');
        $this->provider->getMarkup();
    }

    public function testWithPhpBrowser()
    {
        $expectedMarkup =
            <<<HTML
                <!DOCTYPE HTML>
                <html lang="en">
                    <head>
                        <title>
                            A valid page.
                        </title>
                    </head>
                </html>
HTML
        ;

        $phpBrowser = $this
            ->getMockBuilder('Codeception\Module\PhpBrowser')
            ->disableOriginalConstructor()
            ->setMethods(array(
                '_getResponseContent',
            ))
            ->getMock()
        ;
        $phpBrowser
            ->method('_getResponseContent')
            ->will($this->returnValue($expectedMarkup))
        ;

        $this->moduleContainer
            ->method('hasModule')
            ->will($this->returnValueMap(array(
                array('PhpBrowser', true)
            )))
        ;
        $this->moduleContainer
            ->method('getModule')
            ->will($this->returnValueMap(array(
                array('PhpBrowser', $phpBrowser)
            )))
        ;

        $actualMarkup = $this->provider->getMarkup();
        $this->assertEquals($expectedMarkup, $actualMarkup);
    }

    public function testWithWebDrive()
    {
        $expectedMarkup =
            <<<HTML
                <!DOCTYPE HTML>
                <html lang="en">
                    <head>
                        <title>
                            A valid page.
                        </title>
                    </head>
                </html>
HTML
        ;

        $remoteWebDriver = $this
            ->getMockBuilder('Facebook\WebDriver\Remote\RemoteWebDriver')
            ->disableOriginalConstructor()
            ->setMethods(array(
                'getPageSource'
            ))
            ->getMock()
        ;
        $remoteWebDriver
            ->method('getPageSource')
            ->will($this->returnValue($expectedMarkup))
        ;

        $webDriver = $this
            ->getMockBuilder('Codeception\Module\WebDriver')
            ->disableOriginalConstructor()
            ->getMock()
        ;
        $webDriver->webDriver = $remoteWebDriver;

        $this->moduleContainer
            ->method('hasModule')
            ->will($this->returnValueMap(array(
                array('WebDriver', true)
            )))
        ;
        $this->moduleContainer
            ->method('getModule')
            ->will($this->returnValueMap(array(
                array('WebDriver', $webDriver)
            )))
        ;

        $actualMarkup = $this->provider->getMarkup();
        $this->assertEquals($expectedMarkup, $actualMarkup);
    }
}
