<?php

namespace Kolyunya\Codeception\Tests\Lib\MarkupValidator;

use Kolyunya\Codeception\Lib\MarkupValidator\DefaultMessagePrinter;
use Kolyunya\Codeception\Lib\MarkupValidator\MarkupValidatorMessage;
use Kolyunya\Codeception\Lib\MarkupValidator\MarkupValidatorMessageInterface;
use Kolyunya\Codeception\Tests\Base\TestCase;

class DefaultMessagePrinterTest extends TestCase
{
    /**
     * @var DefaultMessagePrinter
     */
    private $printer;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->printer = new DefaultMessagePrinter();
    }

    /**
     * {@inheritDoc}
     */
    public function tearDown()
    {
    }

    /**
     * @dataProvider dataProviderGetMessageString
     */
    public function testGetMessageString($message, $stringExpected)
    {
        $stringActual = $this->printer->getMessageString($message);
        $this->assertEquals($stringExpected, $stringActual);
    }

    /**
     * @dataProvider dataProviderGetMessagesString
     */
    public function testGetMessagesString(array $messages, $stringExpected)
    {
        $stringActual = $this->printer->getMessagesString($messages);
        $this->assertEquals($stringExpected, $stringActual);
    }

    public function dataProviderGetMessageString()
    {
        return array(
            array(
                (new MarkupValidatorMessage())
                ,
                <<<TXT
Markup validator message:
Type: undefined
Summary: unavailable
Details: unavailable
First Line: unavailable
Last Line: unavailable
Markup: unavailable

TXT
                ,
            ),
            array(
                (new MarkupValidatorMessage())
                    ->setType(MarkupValidatorMessageInterface::TYPE_UNDEFINED)
                ,
                <<<TXT
Markup validator message:
Type: undefined
Summary: unavailable
Details: unavailable
First Line: unavailable
Last Line: unavailable
Markup: unavailable

TXT
                ,
            ),
            array(
                (new MarkupValidatorMessage())
                    ->setType(MarkupValidatorMessageInterface::TYPE_ERROR)
                    ->setSummary('Short error summary.')
                    ->setDetails('Detailed error description.')
                    ->setFirstLineNumber(103)
                    ->setLastLineNumber(105)
                    ->setMarkup('<html></html>')
                ,
                <<<TXT
Markup validator message:
Type: error
Summary: Short error summary.
Details: Detailed error description.
First Line: 103
Last Line: 105
Markup: <html></html>

TXT
                ,
            ),
        );
    }

    public function dataProviderGetMessagesString()
    {
        return array(
            array(
                array(
                    (new MarkupValidatorMessage())
                    ,
                    (new MarkupValidatorMessage())
                        ->setType(MarkupValidatorMessageInterface::TYPE_UNDEFINED)
                    ,
                    (new MarkupValidatorMessage())
                        ->setType(MarkupValidatorMessageInterface::TYPE_ERROR)
                        ->setSummary('Short error summary.')
                        ->setDetails('Detailed error description.')
                        ->setFirstLineNumber(103)
                        ->setLastLineNumber(105)
                        ->setMarkup('<html></html>')
                    ,
                ),
                <<<TXT
Markup validator message:
Type: undefined
Summary: unavailable
Details: unavailable
First Line: unavailable
Last Line: unavailable
Markup: unavailable

Markup validator message:
Type: undefined
Summary: unavailable
Details: unavailable
First Line: unavailable
Last Line: unavailable
Markup: unavailable

Markup validator message:
Type: error
Summary: Short error summary.
Details: Detailed error description.
First Line: 103
Last Line: 105
Markup: <html></html>

TXT
                ,
            ),
            array(
                array(
                    (new MarkupValidatorMessage())
                        ->setType(MarkupValidatorMessageInterface::TYPE_UNDEFINED)
                    ,
                    (new MarkupValidatorMessage())
                        ->setType(MarkupValidatorMessageInterface::TYPE_ERROR)
                        ->setSummary('Short error summary.')
                        ->setDetails('Detailed error description.')
                        ->setFirstLineNumber(103)
                        ->setLastLineNumber(105)
                        ->setMarkup('<html></html>')
                    ,
                ),
                <<<TXT
Markup validator message:
Type: undefined
Summary: unavailable
Details: unavailable
First Line: unavailable
Last Line: unavailable
Markup: unavailable

Markup validator message:
Type: error
Summary: Short error summary.
Details: Detailed error description.
First Line: 103
Last Line: 105
Markup: <html></html>

TXT
                ,
            ),
            array(
                array(
                    (new MarkupValidatorMessage())
                        ->setType(MarkupValidatorMessageInterface::TYPE_ERROR)
                        ->setSummary('Short error summary.')
                        ->setDetails('Detailed error description.')
                        ->setFirstLineNumber(103)
                        ->setLastLineNumber(105)
                        ->setMarkup('<html></html>')
                    ,
                ),
                <<<TXT
Markup validator message:
Type: error
Summary: Short error summary.
Details: Detailed error description.
First Line: 103
Last Line: 105
Markup: <html></html>

TXT
                ,
            ),
            array(
                array(
                ),
                <<<TXT
TXT
                ,
            ),
        );
    }
}
