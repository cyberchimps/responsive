<?php

namespace Kolyunya\Codeception\Tests\Module;

use Codeception\Lib\ModuleContainer;
use Exception;
use Kolyunya\Codeception\Lib\MarkupValidator\DefaultMessageFilter;
use Kolyunya\Codeception\Module\MarkupValidator;
use Kolyunya\Codeception\Tests\Base\TestCase;
use PHPUnit_Framework_MockObject_MockObject;

class MarkupValidatorTest extends TestCase
{
    /**
     * @var ModuleContainer|PHPUnit_Framework_MockObject_MockObject
     */
    private $moduleContainer;

    /**
     * @var MarkupValidator
     */
    private $module;

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

        $this->module = new MarkupValidator($this->moduleContainer, array(
            'filter' => array(
                'class' => DefaultMessageFilter::getClassName(),
                'config' => array(
                    'errorCountThreshold' => 0,
                    'ignoreWarnings' => true,
                    'ignoredErrors' => array(),
                ),
            ),
        ));
    }

    /**
     * {@inheritDoc}
     */
    public function tearDown()
    {
    }

    public function testInvalidProvider()
    {
        $exceptionTemplate = 'Invalid class «%s» provided for component «%s». It must implement «%s».';
        $this->setExpectedException('Exception', vsprintf($exceptionTemplate, array(
            'stdClass',
            'provider',
            'Kolyunya\Codeception\Lib\MarkupValidator\MarkupProviderInterface',
        )));

        $this->module = new MarkupValidator($this->moduleContainer, array(
            'provider' => array(
                'class' => 'stdClass',
            ),
        ));
    }

    public function testInvalidValidator()
    {
        $exceptionTemplate = 'Invalid class «%s» provided for component «%s». It must implement «%s».';
        $this->setExpectedException('Exception', vsprintf($exceptionTemplate, array(
            'stdClass',
            'validator',
            'Kolyunya\Codeception\Lib\MarkupValidator\MarkupValidatorInterface',
        )));

        $this->module = new MarkupValidator($this->moduleContainer, array(
            'validator' => array(
                'class' => 'stdClass',
            ),
        ));
    }

    public function testInvalidFilter()
    {
        $exceptionTemplate = 'Invalid class «%s» provided for component «%s». It must implement «%s».';
        $this->setExpectedException('Exception', vsprintf($exceptionTemplate, array(
            'stdClass',
            'filter',
            'Kolyunya\Codeception\Lib\MarkupValidator\MessageFilterInterface',
        )));

        $this->module = new MarkupValidator($this->moduleContainer, array(
            'filter' => array(
                'class' => 'stdClass',
            ),
        ));
    }

    public function testInvalidComponentClass()
    {
        $this->setExpectedException('Exception', 'Invalid class configuration of component «filter».');

        $this->module = new MarkupValidator($this->moduleContainer, array(
            'filter' => array(
                'class' => false,
            ),
        ));
    }

    public function testInvalidComponentConfig()
    {
        $this->setExpectedException('Exception', 'Invalid configuration of component «filter».');

        $this->module = new MarkupValidator($this->moduleContainer, array(
            'filter' => array(
                'class' => 'Kolyunya\Codeception\Lib\MarkupValidator\DefaultMessageFilter',
                'config' => 'configuration-parameter',
            ),
        ));
    }

    public function testMissingComponentConfig()
    {
        $this->module = new MarkupValidator($this->moduleContainer, array(
            'filter' => array(
                'class' => 'Kolyunya\Codeception\Lib\MarkupValidator\DefaultMessageFilter',
            ),
        ));

        // This is a hack to suppress the `risky test` warning.
        // Replace with the `$this->expectNotToPerformAssertions();` for PHPUnit v6+.
        $this->assertTrue(true);
    }

    /**
     * @dataProvider dataProviderValidateMarkup
     */
    public function testValidateMarkup($markup, $valid)
    {
        $this->mockMarkup($markup);

        if ($valid === true) {
            $this->module->validateMarkup(array(
                'ignoreWarnings' => false,
            ));
            $this->assertTrue(true);
            return;
        }

        try {
            $this->module->validateMarkup(array(
                'ignoreWarnings' => false,
            ));
        } catch (Exception $exception) {
            $this->assertTrue(true);
            return;
        }

        $this->assertTrue(false);
    }

    /**
     * @dataProvider dataProviderOverrideFilterConfigurationWarnings
     */
    public function testOverrideFilterConfigurationWarnings($markup)
    {
        $this->mockMarkup($markup);

        try {
            $this->module->validateMarkup(array(
                'ignoreWarnings' => false,
            ));
        } catch (Exception $exception) {
            $this->assertTrue(true);
            return;
        }

        $this->fail();
    }

    /**
     * @dataProvider dataProviderOverrideFilterConfigurationErrors
     */
    public function testOverrideFilterConfigurationErrors($markup, array $ignoredErrors)
    {
        $this->mockMarkup($markup);

        try {
            $this->module->validateMarkup(array(
                'ignoredErrors' => $ignoredErrors,
            ));
        } catch (Exception $exception) {
            $this->fail();
        }

        $this->assertTrue(true);
    }

    public function dataProviderValidateMarkup()
    {
        return array(
            array(
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
                ,
                true,
            ),
            array(
                <<<HTML
                    <!DOCTYPE HTML>
                    <html lang="en">
                        <head>
                        </head>
                    </html>
HTML
                ,
                false,
            ),
            array(
                <<<HTML
                    <!DOCTYPE HTML>
                    <html lang="en">
                        <head>
                        </head>
                        <body>
                            <form>
                                <button role="button">
                                </button>
                            </form>
                        </body>
                    </html>
HTML
                ,
                false,
            ),
            array(
                <<<HTML
                    <!DOCTYPE HTML>
                    <html lang="en">
                        <head>
                            <title>
                                A page with a warning.
                            </title>
                        </head>
                        <body>
                            <form>
                                <button role="button">
                                </button>
                            </form>
                        </body>
                    </html>
HTML
                ,
                false,
            ),
        );
    }

    public function dataProviderOverrideFilterConfigurationWarnings()
    {
        return array(
            array(
                <<<HTML
                    <!DOCTYPE HTML>
                    <html lang="en">
                        <head>
                            <title>
                                A page with a warning.
                            </title>
                        </head>
                        <body>
                            <form>
                                <button role="button">
                                </button>
                            </form>
                        </body>
                    </html>
HTML
                ,
            ),
        );
    }

    public function dataProviderOverrideFilterConfigurationErrors()
    {
        return array(
            array(
                <<<HTML
                    <!DOCTYPE HTML>
                    <html lang="en">
                        <head>
                        </head>
                    </html>
HTML
                ,
                array(
                    '/Element “head” is missing a required instance of child element “title”./',
                ),
            ),
        );
    }

    private function mockMarkup($markup)
    {
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
            ->will($this->returnValue($markup))
        ;

        $this->moduleContainer
            ->method('hasModule')
            ->will($this->returnValueMap(array(
                array('PhpBrowser', true),
            )))
        ;
        $this->moduleContainer
            ->method('getModule')
            ->will($this->returnValueMap(array(
                array('PhpBrowser', $phpBrowser),
            )))
        ;
    }
}
