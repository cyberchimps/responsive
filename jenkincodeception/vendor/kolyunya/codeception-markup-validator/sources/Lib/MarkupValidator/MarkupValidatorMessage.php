<?php

namespace Kolyunya\Codeception\Lib\MarkupValidator;

use Kolyunya\Codeception\Lib\MarkupValidator\MarkupValidatorMessageInterface;

/**
 * Base markup validator message.
 */
class MarkupValidatorMessage implements MarkupValidatorMessageInterface
{
    /**
     * Placeholder for unavailable message data.
     */
    const UNAVAILABLE_DATA_PLACEHOLDER = 'unavailable';

    /**
     * Message type.
     *
     * @var string
     */
    protected $type;

    /**
     * Message summary.
     *
     * @var string
     */
    protected $summary;

    /**
     * Message details.
     *
     * @var string
     */
    protected $details;

    /**
     * A number of the first related markup line.
     *
     * @var integer
     */
    protected $firstLineNumber;

    /**
     * A number of the last related markup line.
     *
     * @var integer
     */
    protected $lastLineNumber;

    /**
     * Related markup.
     *
     * @var string
     */
    protected $markup;

    /**
     * Constructs a new message. Sets message type.
     *
     * @param string $type Message type.
     */
    public function __construct($type = self::TYPE_UNDEFINED)
    {
        $this->setType($type);
    }

    /**
     * {@inheritDoc}
     */
    public function __toString()
    {
        return vsprintf($this->getStringTemplate(), array(
            $this->getType(),
            $this->getSummary() ?: self::UNAVAILABLE_DATA_PLACEHOLDER,
            $this->getDetails() ?: self::UNAVAILABLE_DATA_PLACEHOLDER,
            $this->getFirstLineNumber() ?: self::UNAVAILABLE_DATA_PLACEHOLDER,
            $this->getLastLineNumber() ?: self::UNAVAILABLE_DATA_PLACEHOLDER,
            $this->getMarkup() ?: self::UNAVAILABLE_DATA_PLACEHOLDER,
        ));
    }

    /**
     * Sets message type.
     *
     * @param string|null $type Message type.
     *
     * @return self Returns self.
     */
    public function setType($type)
    {
        if ($type === null) {
            $type = self::TYPE_UNDEFINED;
        }

        $this->type = $type;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets message summary.
     *
     * @param string $summary Message summary.
     *
     * @return self Returns self.
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Sets message details.
     *
     * @param string $details Message details.
     *
     * @return self Returns self.
     */
    public function setDetails($details)
    {
        $this->details = $details;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * Sets first line number.
     *
     * @param integer $firstLineNumber First line number.
     *
     * @return self Returns self.
     */
    public function setFirstLineNumber($firstLineNumber)
    {
        $this->firstLineNumber = $firstLineNumber;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFirstLineNumber()
    {
        return $this->firstLineNumber;
    }

    /**
     * Sets last line number.
     *
     * @param integer $lastLineNumber Last line number.
     *
     * @return self Returns self.
     */
    public function setLastLineNumber($lastLineNumber)
    {
        $this->lastLineNumber = $lastLineNumber;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getLastLineNumber()
    {
        return $this->lastLineNumber;
    }

    /**
     * Sets markup.
     *
     * @param string $markup Markup.
     *
     * @return self Returns self.
     */
    public function setMarkup($markup)
    {
        $this->markup = $markup;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getMarkup()
    {
        return $this->markup;
    }

    /**
     * Returns string representation template.
     *
     * @return string String representation template.
     */
    protected function getStringTemplate()
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
