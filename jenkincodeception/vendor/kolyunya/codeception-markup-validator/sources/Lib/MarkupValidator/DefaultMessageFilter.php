<?php

namespace Kolyunya\Codeception\Lib\MarkupValidator;

use Exception;
use Kolyunya\Codeception\Lib\Base\Component;
use Kolyunya\Codeception\Lib\MarkupValidator\MarkupValidatorMessageInterface;
use Kolyunya\Codeception\Lib\MarkupValidator\MessageFilterInterface;

/**
 * Default markup validation message filter.
 */
class DefaultMessageFilter extends Component implements MessageFilterInterface
{
    const ERROR_COUNT_THRESHOLD_KEY = 'errorCountThreshold';

    const IGNORE_WARNINGS_CONFIG_KEY = 'ignoreWarnings';

    const IGNORED_ERRORS_CONFIG_KEY = 'ignoredErrors';

    /**
     * Configuration parameters.
     *
     * @var array
     */
    protected $configuration = array(
        self::ERROR_COUNT_THRESHOLD_KEY => 0,
        self::IGNORE_WARNINGS_CONFIG_KEY => true,
        self::IGNORED_ERRORS_CONFIG_KEY => array(),
    );

    /**
     * {@inheritDoc}
     */
    public function filterMessages(array $messages)
    {
        $filteredMessages = array();

        foreach ($messages as $message) {
            /* @var $message MarkupValidatorMessageInterface */
            $messageType = $message->getType();

            if ($messageType === MarkupValidatorMessageInterface::TYPE_UNDEFINED ||
                $messageType === MarkupValidatorMessageInterface::TYPE_INFO
            ) {
                continue;
            }

            if ($messageType === MarkupValidatorMessageInterface::TYPE_WARNING &&
                $this->ignoreWarnings() === true
            ) {
                continue;
            }

            if ($this->ignoreError($message->getSummary()) === true) {
                continue;
            }

            $filteredMessages[] = $message;
        }

        if ($this->belowErrorCountThreshold($filteredMessages) === true) {
            // Error count threshold was not reached.
            return array();
        }

        return $filteredMessages;
    }

    /**
     * Returns a boolean indicating whether messages count
     * is below the threshold or not.
     *
     * @param array $messages Messages to report about.
     *
     * @return boolean Whether messages count is below the threshold or not.
     */
    private function belowErrorCountThreshold(array $messages)
    {
        if (is_int($this->configuration[self::ERROR_COUNT_THRESHOLD_KEY]) === false) {
            throw new Exception(sprintf('Invalid «%s» config key.', self::ERROR_COUNT_THRESHOLD_KEY));
        }

        $threshold = $this->configuration[self::ERROR_COUNT_THRESHOLD_KEY];
        $belowThreshold = count($messages) <= $threshold;

        return $belowThreshold;
    }

    /**
     * Returns a boolean indicating whether the filter ignores warnings or not.
     *
     * @return bool Whether the filter ignores warnings or not.
     */
    private function ignoreWarnings()
    {
        if (is_bool($this->configuration[self::IGNORE_WARNINGS_CONFIG_KEY]) === false) {
            throw new Exception(sprintf('Invalid «%s» config key.', self::IGNORE_WARNINGS_CONFIG_KEY));
        }

        /* @var $ignoreWarnings bool */
        $ignoreWarnings = $this->configuration[self::IGNORE_WARNINGS_CONFIG_KEY];

        return $ignoreWarnings;
    }

    /**
     * Returns a boolean indicating whether an error is ignored or not.
     *
     * @param string|null $summary Error summary.
     * @return boolean Whether an error is ignored or not.
     */
    private function ignoreError($summary)
    {
        if (is_array($this->configuration[self::IGNORED_ERRORS_CONFIG_KEY]) === false) {
            throw new Exception(sprintf('Invalid «%s» config key.', self::IGNORED_ERRORS_CONFIG_KEY));
        }

        $ignoreError = false;

        if ($summary === null) {
            return $ignoreError;
        }

        $ignoredErrors = $this->configuration[self::IGNORED_ERRORS_CONFIG_KEY];
        foreach ($ignoredErrors as $ignoredError) {
            $erorIsIgnored = preg_match($ignoredError, $summary) === 1;
            if ($erorIsIgnored) {
                $ignoreError = true;
                break;
            }
        }

        return $ignoreError;
    }
}
