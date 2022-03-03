<?php

use \page\RespTheme\Customizer;
use \page\RespTheme\LogInAndLogOut;
use \Page\RespTheme\Toprow;
use \page\RespTheme\CommonFunctionsPage;
use \Facebook\WebDriver\Remote\RemoteWebDriver;
use \Facebook\WebDriver\WebDriverBy;
use \Facebook\WebDriver\WebDriverKeys;

class ToprowCest
{
    

    // tests
    public function TopRowCases(RespThemeTester $I,  LogInAndLogOut $loginAndLogout, Customizer $customizer, Toprow $Toprow, CommonFunctionsPage $commonFunctionsPage)
    {
        //$I->wait(5);
        $I->amGoingTo('Login as Admin');
        $loginAndLogout->userLogin($I);

        $I->click($Toprow->customizebutton);
        $I->wait(2);
        $I->scrollTo($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->toprowbutton);
        $I->wait(3);

        $I->amGoingTo('check the desktop layout settings for top row');
        $I->selectOption($Toprow->toprowdesklayout, 'fullwidth');
        $I->wait(1);
        $I->click($Toprow->publishbutton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->seeElement($Toprow->desklayoutelement);
        $I->click($Toprow->customizebutton);
        $I->wait(1);
        $I->scrollTo($Toprow->headerbutton);
        $I->wait(1);
        $I->click($Toprow->headerbutton);
        $I->wait(1);
        $I->click($Toprow->toprowbutton);
        $I->wait(1);
        
        $I->selectOption($Toprow->toprowdesklayout, 'standard');
        $I->wait(1);
        $I->click($Toprow->publishbutton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->seeElement($Toprow->desklayoutelement);
        $I->click($Toprow->customizebutton);
        $I->wait(1);
        $I->scrollTo($Toprow->headerbutton);
        $I->wait(1);
        $I->click($Toprow->headerbutton);
        $I->wait(1);
        $I->click($Toprow->toprowbutton);

        $I->amGoingTo('check the tablet layout settings for the top row');
        $I->click($Toprow->tabletlayout);   
        $I->wait(1);
        $I->selectOption($Toprow->toprowtabletlayout, 'fullwidth');
        $I->click($Toprow->publishbutton);
        $I->wait(2);
        $I->selectOption($Toprow->toprowtabletlayout, 'contained');
        $I->click($Toprow->publishbutton);
        $I->wait(2);
        $I->click($Toprow->collapsebtn);
        $I->wait(1);
        $I->click($Toprow->collapsebtn);
        $I->selectOption($Toprow->toprowtabletlayout, 'standard');
        $I->click($Toprow->publishbutton);
        $I->wait(2);

        $I->amGoingTo('check the mobile layout settings for the top row');
        $I->click($Toprow->mobilelayout);
        $I->wait(2);
        $I->selectOption($Toprow->toprowmoblayout, 'fullwidth');
        $I->wait(2);
        $I->selectOption($Toprow->toprowmoblayout, 'contained');
        $I->wait(2);
        $I->selectOption($Toprow->toprowmoblayout, 'standard');
        $I->wait(2);
        
        $I->amGoingTo('check min height settings for the top row');
        $I->click($Toprow->desktoplayout);
        $I->fillField($Toprow->minheightdesktop, '110');
        $I->wait(2);
        $I->click($Toprow->publishbutton);
        $I->wait(5);
       
        $I->amOnPage('/');
        $I->seeElement('//*[@id="main-header"]/div/div/div/div[1]/div/div/div');
        $I->click($Toprow->customizebutton);
        $I->wait(2);
        $I->scrollTo($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->toprowbutton);

        $I->amGoingTo('check the min height for tablet settings for the top row');
        $I->click($Toprow->tabletlayout);
        $I->fillField($Toprow->minheighttablet, '50');
        $I->wait(2);

        $I->amGoingTo('check the min height for mobile settings for the top row');
        $I->click($Toprow->mobilelayout);
        $I->fillField($Toprow->minheightmobile, '30');
        $I->wait(2);
        
        $I->amGoingTo('check the desktop background colour for top row');
        $I->click($Toprow->desktoplayout);
        $I->scrollTo($Toprow->backgrounddesktop);
        $I->click($Toprow->backgrounddesktop);
        $I->wait(2);
        $I->click($Toprow->colordesktop);
        $I->click($Toprow->publishbutton);
        $I->amOnPage('/');

        $commonFunctionsPage->_checkStyle($I, $commonFunctionsPage->field, 'background', 'xpath', 'rgba(130, 36, 227, 0)');
        $I->wait(2);
        $I->click($Toprow->customizebutton);
        $I->wait(1);
        $I->scrollTo($Toprow->headerbutton);
        $I->wait(1);
        $I->click($Toprow->headerbutton);
        $I->wait(1);
        $I->click($Toprow->toprowbutton);

        $I->amGoingTo('check the tablet background colour for top row');
        $I->click($Toprow->tabletlayout);
        $I->scrollTo($Toprow->backgroundtablet);
        $I->click($Toprow->backgroundtablet);
        $I->wait(2);
        $I->click($Toprow->colortablet);
        $I->wait(2);

        $I->amGoingTo('check the mobile background colour for top row');
        $I->click($Toprow->mobilelayout);
        $I->scrollTo($Toprow->backgroundmobile);
        $I->click($Toprow->backgroundmobile);
        $I->wait(2);
        $I->click($Toprow->colormobile);
        $I->wait(2);

        $I->amGoingTo('check the padding for desktop for the top row ');
        $I->scrollTo($Toprow->paddingspan);
        $I->wait(2);
        $I->click($Toprow->paddinglayoutdesktop);
        $I->wait(2);
        $I->fillField($Toprow->paddingfielddesktop, '50');
        $I->wait(2);
        $I->click($Toprow->paddinglayoutdesktop);


        $I->amGoingTo('check the padding for tablet for the top row');
        $I->scrollTo($Toprow->paddingspan);
        $I->wait(2);
        $I->click($Toprow->paddinglayouttablet);
        $I->wait(2);
        $I->fillField($Toprow->paddingfieldtablet, '30');
        $I->wait(2);

        $I->amGoingTo('check the padding for mobile for the top row ');
        $I->scrollTo($Toprow->paddingspan);
        $I->wait(2);
        $I->click($Toprow->paddinglayoutmobile);
        $I->wait(2);
        $I->fillField($Toprow->paddingfieldmobile, '15');
        $I->wait(2);
    }
}