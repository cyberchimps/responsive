<?php

use \page\RespTheme\Customizer;
use \page\RespTheme\LogInAndLogOut;
use \Page\RespTheme\HeaderSearchComponents;
use \Facebook\WebDriver\Remote\RemoteWebDriver;
use \Facebook\WebDriver\WebDriverBy;
use \Facebook\WebDriver\WebDriverKeys;
use \page\RespTheme\CommonFunctionsPage;


class HeaderSearchCest
{
    public function _before(RespThemeTester $I, LogInAndLogOut $loginAndLogout, Customizer $customizer, HeaderSearchComponents $HeaderSearchComponents)
    {
        $I->amGoingTo('Login as Admin');
        $loginAndLogout->userLogin($I);
        
        $I->click($HeaderSearchComponents->customizeButton);
        $I->wait(1);
        $I->scrollTo($HeaderSearchComponents->headerButton);
        $I->wait(1);
        $I->click($HeaderSearchComponents->headerButton);
        $I->wait(1);
        $I->scrollTo($HeaderSearchComponents->searchSection);
        $I->wait(1);
        $I->click($HeaderSearchComponents->searchSection);
        $I->wait(1);   
    }

    // tests
    public function DesktopSearchButtonSettingsTest(RespThemeTester $I, Customizer $customizer, HeaderSearchComponents $HeaderSearchComponents, CommonFunctionsPage $commonFunctionsPage)
    {
        $I->amGoingTo('Change the search button settings for desktop');
        
        $I->selectOption($HeaderSearchComponents->searchStyle, 'bordered');
        $I->wait(1);
        $I->selectOption($HeaderSearchComponents->borderStyle, 'dashed');
        $I->wait(2);
        $I->fillField($HeaderSearchComponents->borderWidth, '5');
        $I->wait(1);
        $I->click($HeaderSearchComponents->borderColour);
        $I->click($HeaderSearchComponents->borderColour5);
        $I->wait(1);
        $I->scrollTo($HeaderSearchComponents->headerSearchLabel);
        $I->wait(1);
        $I->fillField($HeaderSearchComponents->headerSearchLabel, 'Search Here');
        $I->wait(3);
        $I->selectOption($HeaderSearchComponents->searchIcon, 'search2');
        $I->click($HeaderSearchComponents->searchColour);
        $I->wait(2);
        $I->click($HeaderSearchComponents->searchColour2);
        $I->wait(2);
        $I->click($HeaderSearchComponents->backgroundColour);
        $I->wait(2);
        $I->click($HeaderSearchComponents->backgroundColour3);
        $I->wait(2);
        $I->fillField($HeaderSearchComponents->paddingInput, '25');
        $I->wait(2);
        $I->fillField($HeaderSearchComponents->marginInput, '15');
        $I->wait(2);
        $I->fillField($HeaderSearchComponents->iconSizeDesktop, '25');
        $I->wait(2);
        $I->click($HeaderSearchComponents->publishButton);
        $I->wait(3);

        $I->amGoingTo('Check the changes made on the front end');
        $I->amOnPage('/');
        $I->wait(1);
        $I->seeElement($HeaderSearchComponents->searchButton);
        $commonFunctionsPage->_checkStyle($I, $HeaderSearchComponents->searchButton, 'border', 'xpath', '5px dashed rgb(238, 238, 34)');
        $commonFunctionsPage->_checkStyle($I, $HeaderSearchComponents->searchColourCheck, 'color', 'xpath', 'rgba(255, 255, 255, 1)');
        $commonFunctionsPage->_checkStyle($I, $HeaderSearchComponents->searchButton, 'background-color', 'xpath', 'rgba(221, 51, 51, 1)');
        $commonFunctionsPage->_checkStyle($I, $HeaderSearchComponents->searchButton, 'border-radius', 'xpath', '15px');
        $commonFunctionsPage->_checkStyle($I, $HeaderSearchComponents->searchButton, 'padding', 'xpath', '25px');
        $commonFunctionsPage->_checkStyle($I, $HeaderSearchComponents->searchButton, 'margin', 'xpath', '15px');
        $commonFunctionsPage->_checkStyle($I, $HeaderSearchComponents->iconSizeCheck, 'font-size', 'xpath', '25px');

    }
}
