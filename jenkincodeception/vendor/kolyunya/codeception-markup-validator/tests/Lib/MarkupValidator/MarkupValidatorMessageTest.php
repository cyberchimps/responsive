<?php

namespace Kolyunya\Codeception\Tests\Lib\MarkupValidator;

use Kolyunya\Codeception\Lib\MarkupValidator\MarkupValidatorMessage;
use Kolyunya\Codeception\Lib\MarkupValidator\MarkupValidatorMessageInterface;
use Kolyunya\Codeception\Tests\Base\TestCase;

class MarkupValidatorMessageTest extends TestCase
{
    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
    }

    /**
     * {@inheritDoc}
     */
    public function tearDown()
    {
    }

    public function testDefaultInitialization()
    {
        $message = new MarkupValidatorMessage();

        $this->assertEquals(
            $message->getType(),
            MarkupValidatorMessageInterface::TYPE_UNDEFINED
        );
        $this->assertNull($message->getSummary());
        $this->assertNull($message->getDetails());
        $this->assertNull($message->getFirstLineNumber());
        $this->assertNull($message->getLastLineNumber());
        $this->assertNull($message->getMarkup());
    }

    /**
     * @dataProvider dataProviderCustomInitialization
     */
    public function testCustomInitialization($type, $summary, $details, $markup, $firstLineNumber, $lastLineNumber)
    {
        $message = (new MarkupValidatorMessage())
            ->setType($type)
            ->setSummary($summary)
            ->setDetails($details)
            ->setMarkup($markup)
            ->setFirstLineNumber($firstLineNumber)
            ->setLastLineNumber($lastLineNumber)
        ;

        if ($type === null) {
            $this->assertEquals(MarkupValidatorMessageInterface::TYPE_UNDEFINED, $message->getType());
        } else {
            $this->assertEquals($type, $message->getType());
        }
        $this->assertEquals($summary, $message->getSummary());
        $this->assertEquals($details, $message->getDetails());
        $this->assertEquals($firstLineNumber, $message->getFirstLineNumber());
        $this->assertEquals($lastLineNumber, $message->getLastLineNumber());
        $this->assertEquals($markup, $message->getMarkup());
    }

    /**
     * @dataProvider dataProviderToString
     */
    public function testToString($type, $summary, $details, $firstLineNumber, $lastLineNumber, $markup, $string)
    {
        $message = (new MarkupValidatorMessage())
            ->setType($type)
            ->setSummary($summary)
            ->setDetails($details)
            ->setFirstLineNumber($firstLineNumber)
            ->setLastLineNumber($lastLineNumber)
            ->setMarkup($markup)
        ;
        $messageString = $message->__toString();
        $this->assertEquals($string, $messageString);
    }

    public function dataProviderCustomInitialization()
    {
        return array(
            array(
                'type' => null,
                'summary' => null,
                'details' => null,
                'markup' => null,
                'firstLineNumber' => null,
                'lastLineNumber' => null,
            ),
            array(
                'type' => MarkupValidatorMessageInterface::TYPE_UNDEFINED,
                'summary' => null,
                'details' => null,
                'markup' => null,
                'firstLineNumber' => null,
                'lastLineNumber' => null,
            ),
            array(
                'type' => MarkupValidatorMessageInterface::TYPE_ERROR,
                'summary' => 'Short error summary.',
                'details' => 'Detailed error description.',
                'markup' => '<html></html>',
                'firstLineNumber' => 42,
                'lastLineNumber' => 43,
            ),
        );
    }

    public function dataProviderToString()
    {
        return array(
            array(
                'type' => null,
                'summary' => null,
                'details' => null,
                'firstLineNumber' => null,
                'lastLineNumber' => null,
                'markup' => null,
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
                'type' => MarkupValidatorMessageInterface::TYPE_UNDEFINED,
                'summary' => null,
                'details' => null,
                'firstLineNumber' => null,
                'lastLineNumber' => null,
                'markup' => null,
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
                'type' => MarkupValidatorMessageInterface::TYPE_ERROR,
                'summary' => 'Short error summary.',
                'details' => 'Detailed error description.',
                'firstLineNumber' => 103,
                'lastLineNumber' => 105,
                'markup' => '<html></html>',
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
}
