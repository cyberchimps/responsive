<?php

namespace Kolyunya\Codeception\Tests\Lib\Base;

use Kolyunya\Codeception\Lib\Base\Component;
use Kolyunya\Codeception\Lib\MarkupValidator\DefaultMarkupProvider;
use Kolyunya\Codeception\Lib\MarkupValidator\DefaultMessageFilter;
use Kolyunya\Codeception\Lib\MarkupValidator\DefaultMessagePrinter;
use Kolyunya\Codeception\Lib\MarkupValidator\W3CMarkupValidator;
use Kolyunya\Codeception\Tests\Base\TestCase;

class ComponentTest extends TestCase
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
     * @dataProvider dataProviderGetClassName
     */
    public function testGetClassName($classNameActual, $classNameExpected)
    {
        $this->assertEquals($classNameActual, $classNameExpected);
    }

    public function dataProviderGetClassName()
    {
        return array(
            array(
                'Kolyunya\Codeception\Lib\Base\Component',
                Component::getClassName(),
            ),
            array(
                'Kolyunya\Codeception\Lib\MarkupValidator\DefaultMarkupProvider',
                DefaultMarkupProvider::getClassName(),
            ),
            array(
                'Kolyunya\Codeception\Lib\MarkupValidator\DefaultMessageFilter',
                DefaultMessageFilter::getClassName(),
            ),
            array(
                'Kolyunya\Codeception\Lib\MarkupValidator\DefaultMessagePrinter',
                DefaultMessagePrinter::getClassName(),
            ),
            array(
                'Kolyunya\Codeception\Lib\MarkupValidator\W3CMarkupValidator',
                W3CMarkupValidator::getClassName(),
            ),
        );
    }
}
