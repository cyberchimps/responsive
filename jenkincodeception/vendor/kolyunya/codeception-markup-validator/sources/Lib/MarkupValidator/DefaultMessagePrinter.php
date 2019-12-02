<?php

namespace Kolyunya\Codeception\Lib\MarkupValidator;

use Kolyunya\Codeception\Lib\Base\Component;
use Kolyunya\Codeception\Lib\MarkupValidator\MarkupValidatorMessageInterface;
use Kolyunya\Codeception\Lib\MarkupValidator\MessagePrinterInterface;

/**
 * Default markup validator message printer.
 */
class DefaultMessagePrinter extends Component implements MessagePrinterInterface
{
    /**
     * Placeholder for unavailable message data.
     */
    const UNAVAILABLE_DATA_PLACEHOLDER = 'unavailable';

    /**
     * {@inheritDoc}
     */
    public function getMessageString(MarkupValidatorMessageInterface $message)
    {
        return vsprintf($this->getMessageStringTemplate(), array(
            $message->getType(),
            $message->getSummary() ?: self::UNAVAILABLE_DATA_PLACEHOLDER,
            $message->getDetails() ?: self::UNAVAILABLE_DATA_PLACEHOLDER,
            $message->getFirstLineNumber() ?: self::UNAVAILABLE_DATA_PLACEHOLDER,
            $message->getLastLineNumber() ?: self::UNAVAILABLE_DATA_PLACEHOLDER,
            $message->getMarkup() ?: self::UNAVAILABLE_DATA_PLACEHOLDER,
        ));
    }

    /**
     * {@inheritDoc}
     */
    public function getMessagesString(array $messages)
    {
        $messagesStrings = array_map(array($this, 'getMessageString'), $messages);
        $messagesString = implode("\n", $messagesStrings);

        return $messagesString;
    }

    /**
     * Returns message string representation template.
     *
     * @return string Message string representation template.
     */
    protected function getMessageStringTemplate()
    {
        return
            <<<TXT
Markup validator message:
Type: %s
Summary: %s
Details: %s
First Line: %s
Last Line: %s
Markup: %s

TXT
        ;
    }
}
