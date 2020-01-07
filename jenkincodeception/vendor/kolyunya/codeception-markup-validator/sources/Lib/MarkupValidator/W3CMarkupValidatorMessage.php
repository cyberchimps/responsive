<?php

namespace Kolyunya\Codeception\Lib\MarkupValidator;

use Kolyunya\Codeception\Lib\MarkupValidator\MarkupValidatorMessage;
use Kolyunya\Codeception\Lib\MarkupValidator\MarkupValidatorMessageInterface;

/**
 * A message of a W3C markup validator.
 */
class W3CMarkupValidatorMessage extends MarkupValidatorMessage implements MarkupValidatorMessageInterface
{
    /**
     * Constructs a W3C markup validator message from the message data received
     * from a W3C Markup Validation Service.
     *
     * @param array $data Message data.
     */
    public function __construct(array $data)
    {
        parent::__construct();

        $this->initializeType($data);
        $this->initializeSummary($data);
        $this->initializeFirstLineNumber($data);
        $this->initializeLastLineNumber($data);
        $this->initializeMarkup($data);
    }

    /**
     * Initializes message type.
     *
     * @param array $data Message data.
     */
    private function initializeType(array $data)
    {
        if (isset($data['type']) === false) {
            return;
        }

        if ($data['type'] === 'error') {
            $this->type = self::TYPE_ERROR;
        } elseif ($data['type'] === 'info') {
            if (isset($data['subType']) === true &&
                $data['subType'] === 'warning'
            ) {
                $this->type = self::TYPE_WARNING;
            } else {
                $this->type = self::TYPE_INFO;
            }
        }
    }

    /**
     * Initializes message summary.
     *
     * @param array $data Message data.
     */
    private function initializeSummary(array $data)
    {
        if (isset($data['message']) === true) {
            $this->setSummary($data['message']);
        }
    }

    /**
     * Initializes first line number.
     *
     * @param array $data Message data.
     */
    private function initializeFirstLineNumber(array $data)
    {
        if (isset($data['firstLine']) === true) {
            $this->setFirstLineNumber($data['firstLine']);
        }
    }

    /**
     * Initializes last line number.
     *
     * @param array $data Message data.
     */
    private function initializeLastLineNumber(array $data)
    {
        if (isset($data['lastLine']) === true) {
            $this->setLastLineNumber($data['lastLine']);
        }
    }

    /**
     * Initializes message markup.
     *
     * @param array $data Message data.
     */
    private function initializeMarkup(array $data)
    {
        if (isset($data['extract']) === true) {
            $this->setMarkup($data['extract']);
        }
    }
}
