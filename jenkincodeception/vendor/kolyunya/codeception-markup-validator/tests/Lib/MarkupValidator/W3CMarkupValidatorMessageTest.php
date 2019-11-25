<?php

namespace Kolyunya\Codeception\Tests\Lib\MarkupValidator;

use Kolyunya\Codeception\Lib\MarkupValidator\MarkupValidatorMessageInterface;
use Kolyunya\Codeception\Lib\MarkupValidator\W3CMarkupValidatorMessage;
use Kolyunya\Codeception\Tests\Base\TestCase;

class W3CMarkupValidatorMessageTest extends TestCase
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

    /**
     * @dataProvider dataProviderConstructor
     */
    public function testConstructor($data, $type, $summary, $details, $firstLineNumber, $lastLineNumber, $markup)
    {
        $message = new W3CMarkupValidatorMessage($data);

        $this->assertEquals($message->getType(), $type);
        $this->assertEquals($message->getSummary(), $summary);
        $this->assertEquals($message->getDetails(), $details);
        $this->assertEquals($message->getFirstLineNumber(), $firstLineNumber);
        $this->assertEquals($message->getLastLineNumber(), $lastLineNumber);
        $this->assertEquals($message->getMarkup(), $markup);
    }

    public function dataProviderConstructor()
    {
        return array(
            array(
                'data' => array(
                    'type' => 'error',
                    'lastLine' => 4,
                    'lastColumn' => 27,
                    'firstColumn' => 21,
                    'message' => 'Element “head” is missing a required instance of child element “title”.',
                    'extract' => '</head>\n',
                    'hiliteStart' => 10,
                    'hiliteLength' => 6,
                ),
                'type' => MarkupValidatorMessageInterface::TYPE_ERROR,
                'summary' => 'Element “head” is missing a required instance of child element “title”.',
                'details' => null,
                'firstLineNumber' => null,
                'lastLineNumber' => 4,
                'markup' => '</head>\n',
            ),
            array(
                'data' => array(
                    'type' => 'info',
                    'lastLine' => 7,
                    'lastColumn' => 50,
                    'firstColumn' => 29,
                    'subType' => 'warning',
                    'message' => 'The “button” role is unnecessary for element “button”.',
                    'extract' => ' <button role=\"button\">\n ',
                    'hiliteStart' => 10,
                    'hiliteLength' => 22,
                ),
                'type' => MarkupValidatorMessageInterface::TYPE_WARNING,
                'summary' => 'The “button” role is unnecessary for element “button”.',
                'details' => null,
                'firstLineNumber' => null,
                'lastLineNumber' => 7,
                'markup' => ' <button role=\"button\">\n ',
            ),
            array(
                'data' => array(
                    'type' => 'info',
                    'lastLine' => 7,
                    'lastColumn' => 50,
                    'firstColumn' => 29,
                    'subType' => null,
                    'message' => 'Informative message.',
                    'extract' => null,
                    'hiliteStart' => 10,
                    'hiliteLength' => 22,
                ),
                'type' => MarkupValidatorMessageInterface::TYPE_INFO,
                'summary' => 'Informative message.',
                'details' => null,
                'firstLineNumber' => null,
                'lastLineNumber' => 7,
                'markup' => null,
            ),
            array(
                'data' => array(
                    'type' => 'info',
                    'firstLine' => 5,
                    'lastLine' => 9,
                    'lastColumn' => 50,
                    'firstColumn' => 29,
                    'subType' => 'undefined',
                    'message' => 'Informative message.',
                    'extract' => '<some-markup></some-markup>',
                    'hiliteStart' => 10,
                    'hiliteLength' => 22,
                ),
                'type' => MarkupValidatorMessageInterface::TYPE_INFO,
                'summary' => 'Informative message.',
                'details' => null,
                'firstLineNumber' => 5,
                'lastLineNumber' => 9,
                'markup' => '<some-markup></some-markup>',
            ),
            array(
                'data' => array(
                    'type' => null,
                    'firstLine' => 30,
                    'lastLine' => 40,
                    'lastColumn' => 50,
                    'firstColumn' => 29,
                    'subType' => null,
                    'message' => 'Undefined message.',
                    'extract' => null,
                    'hiliteStart' => 10,
                    'hiliteLength' => 22,
                ),
                'type' => MarkupValidatorMessageInterface::TYPE_UNDEFINED,
                'summary' => 'Undefined message.',
                'details' => null,
                'firstLineNumber' => 30,
                'lastLineNumber' => 40,
                'markup' => null,
            ),
            array(
                'data' => array(
                ),
                'type' => MarkupValidatorMessageInterface::TYPE_UNDEFINED,
                'summary' => null,
                'details' => null,
                'firstLineNumber' => null,
                'lastLineNumber' => null,
                'markup' => null,
            ),
        );
    }
}
