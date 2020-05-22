<?php
namespace Humcommerce;
use Codeception\Module\WebDriver;
use Codeception\Exception\ModuleException;

class PiwikMatomoTextSearch extends WebDriver{
    /*
    public function wait($timeout){
        parent::wait($timeout);
        //$this->dontSeeInSource('.php');
        $logs = $this->webDriver->manage()->getLog('browser');
        foreach ($logs as $log) {
            if($log['source'] == "network")
                print_r($log);
            elseif($log['level'] == 'SEVERE'){
                throw new ModuleException($this, 'Errors in JavaScript: ' . var_dump($log));
            }
        }
    }

    public function waitForText($text, $timeout = 10, $selector = NULL){
        parent::waitForText($text, $timeout);
        //$this->dontSeeInSource('.php');
        $logs = $this->webDriver->manage()->getLog('browser');
        foreach ($logs as $log) {
            if($log['source'] == "network")
                print_r($log);
            elseif($log['level'] == 'SEVERE'){
                throw new ModuleException($this, 'Errors in JavaScript: ' . var_dump($log));
            }
        }
    }

    public function waitForElementVisible($element, $timeout = 10){
        parent::waitForElementVisible($element, $timeout);
        //$this->dontSeeInSource('.php');
        $logs = $this->webDriver->manage()->getLog('browser');
        foreach ($logs as $log) {
            if($log['source'] == "network")
                print_r($log);
            elseif($log['level'] == 'SEVERE'){
                throw new ModuleException($this, 'Errors in JavaScript: ' . var_dump($log));
            }
        }
    }

    public function grabCookie($cookie, array $params = []){
        parent::grabCookie($cookie);
        $cookie = $this->webDriver->manage()->getCookies('browser');
        $humcommerccookie = $cookie[0]['name'];
        $humdashcookie = $cookie[1]['name'];
        $httponly1 = $cookie[0]['httpOnly'];
        $httponly2 = $cookie[1]['httpOnly'];
        $HUMCOMMERCE_SESSIDDate = date('Y-m-d', $cookie[0]['expiry']);
        $humdashDate = date('Y-m-d', $cookie[1]['expiry']);
        $this->assertEquals($humcommerccookie, 'HUMCOMMERCE_SESSID', 'cookie name should be match');
        $this->assertEquals($humdashcookie, 'sso_token_humdash', 'cookie name should be match');
        $this->assertEquals($httponly1, '1', 'httponly for both cookie should be same');
        $this->assertEquals($httponly2, '1', 'httponly for both cookie should be same');
        $this->assertEquals($HUMCOMMERCE_SESSIDDate, $humdashDate, "cookie expiry date should  be match");
    }
    */
}