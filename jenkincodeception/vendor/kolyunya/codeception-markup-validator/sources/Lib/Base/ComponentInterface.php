<?php

namespace Kolyunya\Codeception\Lib\Base;

interface ComponentInterface
{
    /**
     * Returns fully qualified name of the component class.
     *
     * @return string Fully qualified name of the component class.
     */
    public static function getClassName();

    /**
     * Merges provided configuration array with an existing one.
     *
     * @param array $configuration Configuration array to merge with current configuration.
     */
    public function setConfiguration(array $configuration);
}
