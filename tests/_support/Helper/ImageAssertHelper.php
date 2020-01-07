<?php
namespace Helper;

// here you can define custom functions for FunctionalTester

class ImageAssertHelper extends \Codeception\Module
{
    public function seeImageWithSource($image_url)
{
    $phpBrowser = $this->getModule('\\Helper\\ImageAssertHelper');
    $phpBrowser->seeElement('//img[@src="'.$image_url.'"]');
}
}
