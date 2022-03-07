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
    public function _before(RespThemeTester $I,  LogInAndLogOut $loginAndLogout, Customizer $customizer, Toprow $Toprow, CommonFunctionsPage $commonFunctionsPage)
    {
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
    }

    public function LayoutSettings(RespThemeTester $I,  LogInAndLogOut $loginAndLogout, Customizer $customizer, Toprow $Toprow, CommonFunctionsPage $commonFunctionsPage)
    {
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
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(1);
        $I->resizeWindow(768, 1024);
        $I->wait(2);
        $I->seeElement($Toprow->tablayoutelement);
        $I->wait(2);
        $I->resizeWindow(1280,950);
        $I->wait(2);
        $I->click($Toprow->customizebutton);
        $I->wait(2);
        $I->scrollTo($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->toprowbutton);

        $I->selectOption($Toprow->toprowtabletlayout, 'contained');
        $I->click($Toprow->publishbutton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(1);
        $I->resizeWindow(768, 1024);
        $I->wait(2);
        $I->seeElement($Toprow->tablayoutelement);
        $I->wait(2);
        $I->resizeWindow(1280,950);
        $I->wait(2);
        $I->click($Toprow->customizebutton);
        $I->wait(2);
        $I->scrollTo($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->toprowbutton);

        $I->selectOption($Toprow->toprowtabletlayout, 'standard');
        $I->click($Toprow->publishbutton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(1);
        $I->resizeWindow(768, 1024);
        $I->wait(2);
        $I->seeElement($Toprow->tablayoutelement);
        $I->wait(2);
        $I->resizeWindow(1280,950);
        $I->wait(2);
        $I->click($Toprow->customizebutton);
        $I->wait(2);
        $I->scrollTo($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->toprowbutton);

        $I->amGoingTo('check the mobile layout settings for the top row');
        $I->click($Toprow->mobilelayout);
        $I->wait(2);
        $I->selectOption($Toprow->toprowmoblayout, 'fullwidth');
        $I->wait(2);
        $I->click($Toprow->publishbutton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(1);
        $I->resizeWindow(390, 844);
        $I->wait(2);
        $I->seeElement($Toprow->moblayoutelement);
        $I->wait(2);
        $I->resizeWindow(1280,950);
        $I->wait(2);
        $I->click($Toprow->customizebutton);
        $I->wait(2);
        $I->scrollTo($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->toprowbutton);

        $I->selectOption($Toprow->toprowmoblayout, 'contained');
        $I->wait(1);
        $I->click($Toprow->publishbutton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(1);
        $I->resizeWindow(390, 844);
        $I->wait(2);
        $I->seeElement($Toprow->moblayoutelement);
        $I->wait(2);
        $I->resizeWindow(1280,950);
        $I->wait(2);
        $I->click($Toprow->customizebutton);
        $I->wait(2);
        $I->scrollTo($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->toprowbutton);

        $I->selectOption($Toprow->toprowmoblayout, 'standard');
        $I->wait(1);
        $I->click($Toprow->publishbutton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(1);
        $I->resizeWindow(390, 844);
        $I->wait(2);
        $I->seeElement($Toprow->moblayoutelement);
        $I->wait(2);
        $I->resizeWindow(1280,950);
        $I->wait(2);
        $I->click($Toprow->customizebutton);
        $I->wait(2);
        $I->scrollTo($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->toprowbutton);
    }
        
    public function HeightSettings(RespThemeTester $I,  LogInAndLogOut $loginAndLogout, Customizer $customizer, Toprow $Toprow, CommonFunctionsPage $commonFunctionsPage)
    {
        $I->amGoingTo('check min height settings for desktop for the top row');
        $I->click($Toprow->desktoplayout);
        $I->fillField($Toprow->minheightdesktop, '110');
        $I->wait(2);
        $I->click($Toprow->publishbutton);
        $I->wait(5);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $commonFunctionsPage->_checkStyle($I, $commonFunctionsPage->desktophttop, 'min-height', 'xpath', '110px');
        $I->wait(1);
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
        $I->click($Toprow->publishbutton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(1);
        $I->resizeWindow(768, 1024);
        $I->wait(2);
        $commonFunctionsPage->_checkStyle($I, $commonFunctionsPage->tablethttop, 'min-height', 'xpath', '50px');
        $I->wait(2);
        $I->resizeWindow(1280,950);
        $I->wait(2);
        $I->click($Toprow->customizebutton);
        $I->wait(2);
        $I->scrollTo($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->toprowbutton);

        $I->amGoingTo('check the min height for mobile settings for the top row');
        $I->click($Toprow->mobilelayout);
        $I->fillField($Toprow->minheightmobile, '30');
        $I->wait(2);
        $I->click($Toprow->publishbutton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(1);
        $I->resizeWindow(390, 844);
        $I->wait(2);
        $commonFunctionsPage->_checkStyle($I, $commonFunctionsPage->tablethttop, 'min-height', 'xpath', '30px');
        $I->wait(2);
        $I->resizeWindow(1280,950);
        $I->wait(2);
        $I->click($Toprow->customizebutton);
        $I->wait(2);
        $I->scrollTo($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->toprowbutton);
    }
        
    public function BackgroundColourSettings(RespThemeTester $I,  LogInAndLogOut $loginAndLogout, Customizer $customizer, Toprow $Toprow, CommonFunctionsPage $commonFunctionsPage)
    {
        $I->amGoingTo('check the desktop background colour for top row');
        $I->click($Toprow->desktoplayout);
        $I->scrollTo($Toprow->backgrounddesktop);
        $I->click($Toprow->backgrounddesktop);
        $I->wait(2);
        $I->click($Toprow->colordesktop);
        $I->click($Toprow->publishbutton);
        $I->wait(2);
        $I->amGoingTo('check on front end');
        $I->amOnPage('/');
        $I->wait(3);
        $commonFunctionsPage->_checkStyle($I, $commonFunctionsPage->field, 'background', 'xpath', 'rgb(130, 36, 227) none repeat scroll 0% 0% / auto padding-box border-box');
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
        $I->click($Toprow->publishbutton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(1);
        $I->resizeWindow(768, 1024);
        $I->wait(2);
        $commonFunctionsPage->_checkStyle($I, $commonFunctionsPage->backgroundtabtop, 'background', 'xpath', 'rgb(0, 0, 0) none repeat scroll 0% 0% / auto padding-box border-box');
        $I->wait(2);
        $I->resizeWindow(1280,950);
        $I->wait(2);
        $I->click($Toprow->customizebutton);
        $I->wait(2);
        $I->scrollTo($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->toprowbutton);

        $I->amGoingTo('check the mobile background colour for top row');
        $I->click($Toprow->mobilelayout);
        $I->scrollTo($Toprow->backgroundmobile);
        $I->click($Toprow->backgroundmobile);
        $I->wait(2);
        $I->click($Toprow->colormobile);
        $I->wait(2);
        $I->click($Toprow->publishbutton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(1);
        $I->resizeWindow(390, 844);
        $I->wait(2);
        $commonFunctionsPage->_checkStyle($I, $commonFunctionsPage->backgroundmobtop, 'background', 'xpath', 'rgb(221, 51, 51) none repeat scroll 0% 0% / auto padding-box border-box');
        $I->wait(2);
        $I->resizeWindow(1280,950);
        $I->wait(2);
        $I->click($Toprow->customizebutton);
        $I->wait(2);
        $I->scrollTo($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->toprowbutton);
    }

    public function PaddingSettings(RespThemeTester $I,  LogInAndLogOut $loginAndLogout, Customizer $customizer, Toprow $Toprow, CommonFunctionsPage $commonFunctionsPage)
    {
        $I->amGoingTo('check the padding for desktop for the top row ');
        $I->scrollTo($Toprow->paddingspan);
        $I->wait(2);
        $I->click($Toprow->paddinglayoutdesktop);
        $I->wait(2);
        $I->fillField($Toprow->paddingfielddesktop, '50');
        $I->wait(2);
        $I->click($Toprow->publishbutton);
        $I->wait(2);
        $I->amGoingTo('check on front end');
        $I->amOnPage('/');
        $I->wait(3);
        $commonFunctionsPage->_checkStyle($I, $commonFunctionsPage->field, 'padding', 'xpath', '50px');
        $I->wait(2);
        $I->click($Toprow->customizebutton);
        $I->wait(1);
        $I->scrollTo($Toprow->headerbutton);
        $I->wait(1);
        $I->click($Toprow->headerbutton);
        $I->wait(1);
        $I->click($Toprow->toprowbutton);


        $I->amGoingTo('check the padding for tablet for the top row');
        $I->scrollTo($Toprow->paddingspan);
        $I->click($Toprow->paddinglayoutdesktop);
        $I->wait(2);
        $I->click($Toprow->paddinglayouttablet);
        $I->wait(2);
        $I->fillField($Toprow->paddingfieldtablet, '30');
        $I->wait(2);
        $I->click($Toprow->publishbutton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(1);
        $I->resizeWindow(768, 1024);
        $I->wait(2);
        $commonFunctionsPage->_checkStyle($I, $commonFunctionsPage->backgroundtabtop, 'padding', 'xpath', '30px');
        $I->wait(2);
        $I->resizeWindow(1280,950);
        $I->wait(2);
        $I->click($Toprow->customizebutton);
        $I->wait(2);
        $I->scrollTo($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->toprowbutton);

        $I->amGoingTo('check the padding for mobile for the top row ');
        $I->scrollTo($Toprow->paddingspan);
        $I->wait(2);
        $I->click($Toprow->paddinglayoutdesktop);
        $I->click($Toprow->paddinglayoutmobile);
        $I->wait(2);
        $I->fillField($Toprow->paddingfieldmobile, '15');
        $I->wait(2);
        $I->click($Toprow->publishbutton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(1);
        $I->resizeWindow(390, 844);
        $I->wait(2);
        $commonFunctionsPage->_checkStyle($I, $commonFunctionsPage->backgroundmobtop, 'padding', 'xpath', '15px');
        $I->wait(2);
        $I->resizeWindow(1280,950);
        $I->wait(2);
        $I->click($Toprow->customizebutton);
        $I->wait(2);
        $I->scrollTo($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->toprowbutton);
    }
}