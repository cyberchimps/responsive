<?php
namespace Humcommerce;
use Codeception\Module\WebDriver;
use Codeception\Exception\ModuleException;


class WarningAndError extends WebDriver
{
    public function wait($timeout){
        parent::wait($timeout);
        $this->dontSee('warning');

        $this->dontSee('error');







                // $logs = $this->webDriver->manage()->getAllCookies('browser');
                // print_r($logs);
                // $logs = $this->webDriver->manage()->getLog('browser');
                // print_r($logs);

                // $logs = $this->webDriver->manage()->getLog('browser');

                // foreach ($logs as $log) {
                //      if ($log['level'] == 'SEVERE') {
                //
                //        throw new ModuleException($this, 'Errors in JavaScript: ' . json_encode($log));
                //     }


        //}



    }
    public function waitForText($text, $timeout = 10, $selector = NULL){
        parent::waitForText($text,$timeout);
        $this->dontSee('warning');
        $this->dontSee('error');



    }
    public function waitForElementVisible($element,$timeout=30){
        parent::waitForElementVisible($element,$timeout);
        // $this->dontSeeInSource('error');

        $this->dontSee('warning');
        $this->dontSee('error');

}
}
