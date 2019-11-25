<?php

namespace Kolyunya\Codeception\Tests\Base;

use PHPUnit\Framework\TestCase as BaseTestCase;

/**
 * @method setExpectedException($exceptionClass, $exceptionMessage = '', $exceptionCode = null)
 */
class TestCase extends BaseTestCase
{
    public function __call($method, $arguments)
    {
        switch ($method) {
            // Required to support both older and newer versions of PHPUnit.
            case 'setExpectedException':
                $this->customSetExpectedException($arguments);
                break;
        }
    }

    private function customSetExpectedException($arguments)
    {
        $exceptionClass = $arguments[0];
        $this->expectException($exceptionClass);

        $exceptionMessage = $arguments[1];
        $this->expectExceptionMessage($exceptionMessage);

        if (isset($arguments[2]) === true) {
            $exceptionCode = $arguments[2];
            $this->expectExceptionCode($exceptionCode);
        }
    }
}
