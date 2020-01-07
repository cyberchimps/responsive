<?php

namespace Kolyunya\Codeception\Lib\MarkupValidator;

use Kolyunya\Codeception\Lib\Base\ComponentInterface;
use Kolyunya\Codeception\Lib\MarkupValidator\MarkupValidatorMessageInterface;

/**
 * An interface of a markup validator message printer.
 */
interface MessagePrinterInterface extends ComponentInterface
{
    /**
     * Returns a string representation of a single message.
     *
     * @return string A string representation of a single message.
     */
    public function getMessageString(MarkupValidatorMessageInterface $message);

    /**
     * Returns a string representation of multiple message.
     *
     * @return string A string representation of multiple message.
     */
    public function getMessagesString(array $messages);
}
