<?php

namespace Kolyunya\Codeception\Lib\MarkupValidator;

use Kolyunya\Codeception\Lib\Base\ComponentInterface;
use Kolyunya\Codeception\Lib\MarkupValidator\MarkupValidatorMessageInterface;

/**
 * An interface of a markup validator message filter.
 */
interface MessageFilterInterface extends ComponentInterface
{
    /**
     * Constructs a message filter. Injects configuration parameters.
     *
     * @param array $config Configuration parameters.
     */
    public function __construct(array $config);

    /**
     * Filters and returns messages.
     *
     * @param MarkupValidatorMessageInterface[] $messages Messages to filter.
     *
     * @return MarkupValidatorMessageInterface[] Filtered messages.
     */
    public function filterMessages(array $messages);
}
