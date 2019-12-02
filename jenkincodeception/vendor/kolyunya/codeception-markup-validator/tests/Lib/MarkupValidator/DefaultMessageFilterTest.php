<?php

namespace Kolyunya\Codeception\Tests\Lib\MarkupValidator;

use Exception;
use Kolyunya\Codeception\Lib\MarkupValidator\DefaultMessageFilter;
use Kolyunya\Codeception\Lib\MarkupValidator\MarkupValidatorMessage;
use Kolyunya\Codeception\Lib\MarkupValidator\MarkupValidatorMessageInterface;
use Kolyunya\Codeception\Tests\Base\TestCase;

class DefaultMessageFilterTest extends TestCase
{
    /**
     * @var DefaultMessageFilter
     */
    private $filter;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->filter = new DefaultMessageFilter();
    }

    /**
     * {@inheritDoc}
     */
    public function tearDown()
    {
    }

    /**
     * @dataProvider dataProviderFilterMessages
     */
    public function testFilterMessages($sourceMessages, $filteredMessagesExpected)
    {
        $this->filter->setConfiguration(array(
            'ignoreWarnings' => false,
            'ignoredErrors' => array(),
        ));

        $filteredMessagesActual = $this->filter->filterMessages($sourceMessages);

        $this->assertEquals(count($filteredMessagesExpected), count($filteredMessagesActual));
        $this->assertArraySubset($filteredMessagesExpected, $filteredMessagesActual);
    }

    /**
     * @dataProvider dataProviderErrorCountThreshold
     */
    public function testerrorCountThreshold($messages, $threshold, $filteredMessagesExpected)
    {
        $this->filter->setConfiguration(array(
            'errorCountThreshold' => $threshold,
        ));

        $filteredMessagesActual = $this->filter->filterMessages($messages);

        $this->assertEquals(count($filteredMessagesExpected), count($filteredMessagesActual));
        $this->assertArraySubset($filteredMessagesExpected, $filteredMessagesActual);
    }

    /**
     * @dataProvider dataProviderIgnoreWarnings
     */
    public function testIgnoreWarnings($messages, $filteredMessagesExpected)
    {
        $this->filter->setConfiguration(array(
            'ignoreWarnings' => true,
        ));

        $filteredMessagesActual = $this->filter->filterMessages($messages);

        $this->assertEquals(count($filteredMessagesExpected), count($filteredMessagesActual));
        $this->assertArraySubset($filteredMessagesExpected, $filteredMessagesActual);
    }

    /**
     * @dataProvider dataProviderIgnoredErrors
     */
    public function testIgnoredErrors($messages, $ignoredErrors, $filteredMessagesExpected)
    {
        $this->filter->setConfiguration(array(
            'ignoredErrors' => $ignoredErrors,
        ));

        $filteredMessagesActual = $this->filter->filterMessages($messages);

        $this->assertEquals(count($filteredMessagesExpected), count($filteredMessagesActual));
        $this->assertArraySubset($filteredMessagesExpected, $filteredMessagesActual);
    }

    public function testInvaliderrorCountThresholdConfig()
    {
        $this->setExpectedException('Exception', 'Invalid «errorCountThreshold» config key.');

        $warning = new MarkupValidatorMessage();
        $warning->setType(MarkupValidatorMessageInterface::TYPE_WARNING);

        $this->filter->setConfiguration(array(
            'errorCountThreshold' => true,
        ));
        $this->filter->filterMessages(array($warning));
    }

    public function testInvalidIgnoreWarningsConfig()
    {
        $this->setExpectedException('Exception', 'Invalid «ignoreWarnings» config key.');

        $warning = new MarkupValidatorMessage();
        $warning->setType(MarkupValidatorMessageInterface::TYPE_WARNING);

        $this->filter->setConfiguration(array(
            'ignoreWarnings' => array(
                'foo' => false,
                'bar' => true,
            ),
        ));
        $this->filter->filterMessages(array($warning));
    }

    public function testInvalidIgnoreErrorsConfig()
    {
        $this->setExpectedException('Exception', 'Invalid «ignoredErrors» config key.');

        $error = new MarkupValidatorMessage();
        $error->setType(MarkupValidatorMessageInterface::TYPE_ERROR);

        $this->filter->setConfiguration(array(
            'ignoredErrors' => false,
        ));
        $this->filter->filterMessages(array($error));
    }

    public function dataProviderErrorCountThreshold()
    {
        return array(
            array(
                array(
                ),
                0,
                array(

                ),
            ),
            array(
                array(
                    new MarkupValidatorMessage(MarkupValidatorMessageInterface::TYPE_ERROR),
                ),
                1,
                array(

                ),
            ),
            array(
                array(
                    new MarkupValidatorMessage(MarkupValidatorMessageInterface::TYPE_ERROR),
                    new MarkupValidatorMessage(MarkupValidatorMessageInterface::TYPE_ERROR),
                ),
                2,
                array(

                ),
            ),
            array(
                array(
                    new MarkupValidatorMessage(MarkupValidatorMessageInterface::TYPE_ERROR),
                    new MarkupValidatorMessage(MarkupValidatorMessageInterface::TYPE_ERROR),
                    new MarkupValidatorMessage(MarkupValidatorMessageInterface::TYPE_ERROR),
                ),
                5,
                array(

                ),
            ),
            array(
                array(
                    new MarkupValidatorMessage(MarkupValidatorMessageInterface::TYPE_ERROR),
                    new MarkupValidatorMessage(MarkupValidatorMessageInterface::TYPE_ERROR),
                    new MarkupValidatorMessage(MarkupValidatorMessageInterface::TYPE_ERROR),
                ),
                -1,
                array(
                    new MarkupValidatorMessage(MarkupValidatorMessageInterface::TYPE_ERROR),
                    new MarkupValidatorMessage(MarkupValidatorMessageInterface::TYPE_ERROR),
                    new MarkupValidatorMessage(MarkupValidatorMessageInterface::TYPE_ERROR),
                ),
            ),
            array(
                array(
                    new MarkupValidatorMessage(MarkupValidatorMessageInterface::TYPE_ERROR),
                    new MarkupValidatorMessage(MarkupValidatorMessageInterface::TYPE_ERROR),
                    new MarkupValidatorMessage(MarkupValidatorMessageInterface::TYPE_ERROR),
                ),
                2,
                array(
                    new MarkupValidatorMessage(MarkupValidatorMessageInterface::TYPE_ERROR),
                    new MarkupValidatorMessage(MarkupValidatorMessageInterface::TYPE_ERROR),
                    new MarkupValidatorMessage(MarkupValidatorMessageInterface::TYPE_ERROR),
                ),
            ),
        );
    }

    public function dataProviderFilterMessages()
    {
        return array(
            array(
                array(
                    (new MarkupValidatorMessage())
                        ->setType(MarkupValidatorMessageInterface::TYPE_UNDEFINED)
                ),
                array(

                ),
            ),
            array(
                array(
                    (new MarkupValidatorMessage())
                        ->setType(MarkupValidatorMessageInterface::TYPE_INFO)
                ),
                array(

                ),
            ),
            array(
                array(
                    (new MarkupValidatorMessage())
                        ->setType(MarkupValidatorMessageInterface::TYPE_WARNING)
                        ->setSummary('Warning text.')
                        ->setMarkup('<h1></h1>')
                    ,
                ),
                array(
                    (new MarkupValidatorMessage())
                        ->setType(MarkupValidatorMessageInterface::TYPE_WARNING)
                        ->setSummary('Warning text.')
                        ->setMarkup('<h1></h1>')
                    ,
                ),
            ),
            array(
                array(
                    (new MarkupValidatorMessage())
                        ->setType(MarkupValidatorMessageInterface::TYPE_ERROR)
                        ->setSummary('Error text.')
                        ->setMarkup('<title></title>')
                    ,
                ),
                array(
                    (new MarkupValidatorMessage())
                        ->setType(MarkupValidatorMessageInterface::TYPE_ERROR)
                        ->setSummary('Error text.')
                        ->setMarkup('<title></title>')
                    ,
                ),
            ),
        );
    }

    public function dataProviderIgnoreWarnings()
    {
        return array(
            array(
                array(
                    (new MarkupValidatorMessage())
                        ->setType(MarkupValidatorMessageInterface::TYPE_WARNING)
                    ,
                    (new MarkupValidatorMessage())
                        ->setType(MarkupValidatorMessageInterface::TYPE_ERROR)
                    ,
                ),
                array(
                    (new MarkupValidatorMessage())
                        ->setType(MarkupValidatorMessageInterface::TYPE_ERROR)
                    ,
                ),
            ),
            array(
                array(
                    (new MarkupValidatorMessage())
                        ->setType(MarkupValidatorMessageInterface::TYPE_ERROR)
                    ,
                    (new MarkupValidatorMessage())
                        ->setType(MarkupValidatorMessageInterface::TYPE_WARNING)
                    ,
                    (new MarkupValidatorMessage())
                        ->setType(MarkupValidatorMessageInterface::TYPE_ERROR)
                    ,
                ),
                array(
                    (new MarkupValidatorMessage())
                        ->setType(MarkupValidatorMessageInterface::TYPE_ERROR)
                    ,
                    (new MarkupValidatorMessage())
                        ->setType(MarkupValidatorMessageInterface::TYPE_ERROR)
                    ,
                ),
            ),
            array(
                array(
                    (new MarkupValidatorMessage())
                        ->setType(MarkupValidatorMessageInterface::TYPE_WARNING)
                    ,
                    (new MarkupValidatorMessage())
                        ->setType(MarkupValidatorMessageInterface::TYPE_WARNING)
                    ,
                    (new MarkupValidatorMessage())
                        ->setType(MarkupValidatorMessageInterface::TYPE_WARNING)
                    ,
                ),
                array(

                ),
            ),
        );
    }

    public function dataProviderIgnoredErrors()
    {
        return array(
            array(
                array(
                    (new MarkupValidatorMessage())
                        ->setType(MarkupValidatorMessageInterface::TYPE_ERROR)
                        ->setSummary('Some error message.')
                    ,
                    (new MarkupValidatorMessage())
                        ->setType(MarkupValidatorMessageInterface::TYPE_ERROR)
                        ->setSummary('Some cryptic error message.')
                    ,
                ),
                array(
                    '/some error/i',
                    '/cryptic error/',
                    '/other error/',
                ),
                array(

                ),
            ),
            array(
                array(
                    (new MarkupValidatorMessage())
                        ->setType(MarkupValidatorMessageInterface::TYPE_ERROR)
                        ->setSummary('Some cryptic error message.')
                    ,
                ),
                array(
                    '/some error/',
                    '/other error/',
                ),
                array(
                    (new MarkupValidatorMessage())
                        ->setType(MarkupValidatorMessageInterface::TYPE_ERROR)
                        ->setSummary('Some cryptic error message.')
                    ,
                ),
            ),
            array(
                array(
                    (new MarkupValidatorMessage())
                        ->setType(MarkupValidatorMessageInterface::TYPE_ERROR)
                        ->setSummary('Some cryptic error message.')
                    ,
                ),
                array(
                    '/cryptic error/',
                ),
                array(

                ),
            ),
            array(
                array(
                    (new MarkupValidatorMessage())
                        ->setType(MarkupValidatorMessageInterface::TYPE_ERROR)
                        ->setSummary('Case insensitive error message.')
                    ,
                ),
                array(
                    '/case insensitive error message./i',
                ),
                array(

                ),
            ),
            array(
                array(
                    (new MarkupValidatorMessage())
                        ->setType(MarkupValidatorMessageInterface::TYPE_ERROR)
                        ->setSummary('Текст ошибки в UTF-8.')
                    ,
                ),
                array(
                    '/Текст ошибки в UTF-8./u',
                ),
                array(

                ),
            ),
            array(
                array(
                    (new MarkupValidatorMessage())
                        ->setType(MarkupValidatorMessageInterface::TYPE_ERROR)
                    ,
                ),
                array(
                    '/error/',
                ),
                array(
                    (new MarkupValidatorMessage())
                        ->setType(MarkupValidatorMessageInterface::TYPE_ERROR)
                    ,
                ),
            ),
        );
    }
}
