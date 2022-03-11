<?php

use \page\RespTheme\Customizer;
use \page\RespTheme\LogInAndLogOut;
use \Page\RespTheme\Toprow;
use \page\RespTheme\CommonFunctionsPage;
use \Facebook\WebDriver\Remote\RemoteWebDriver;
use \Facebook\WebDriver\WebDriverBy;
use \Facebook\WebDriver\WebDriverKeys;

class BottomrowCest
{
    

    // tests
    public function _before(RespThemeTester $I, LogInAndLogOut $loginAndLogout, Customizer $customizer, Toprow $Toprow, CommonFunctionsPage $commonFunctionsPage)
    {
        $I->amGoingTo('Login as Admin');
        $loginAndLogout->userLogin($I);

        $I->amGoingTo('Bottom row section');
        $I->click($Toprow->customizebutton);
        $I->wait(2);
        $I->scrollTo($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->headerbutton);
        $I->click($Toprow->bottomrowbtn);
        $I->wait(2);
    }

    public function LayoutSettings(RespThemeTester $I,  LogInAndLogOut $loginAndLogout, Customizer $customizer, Toprow $Toprow, CommonFunctionsPage $commonFunctionsPage)
    {
        $I->amGoingTo('Check the bottom row desktop layout');
        $I->selectOption($Toprow->bottomrowdesklayout, 'fullwidth');
        $I->wait(2);
        $I->click($Toprow->publishbutton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->seeElement($Toprow->botdesklayoutelement);
        $I->click($Toprow->customizebutton);
        $I->wait(1);
        $I->scrollTo($Toprow->headerbutton);
        $I->wait(1);
        $I->click($Toprow->headerbutton);
        $I->wait(1);
        $I->click($Toprow->bottomrowbtn);
        $I->wait(1);

        $I->selectOption($Toprow->bottomrowdesklayout, 'standard');
        $I->wait(2);
        $I->click($Toprow->publishbutton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->seeElement($Toprow->botdesklayoutelement);
        $I->click($Toprow->customizebutton);
        $I->wait(1);
        $I->scrollTo($Toprow->headerbutton);
        $I->wait(1);
        $I->click($Toprow->headerbutton);
        $I->wait(1);
        $I->click($Toprow->bottomrowbtn);
        $I->wait(1);


        $I->amGoingTo('check the tablet layout settings for the bottom row');
        $I->click($Toprow->tabletlayout);   
        $I->wait(2);
        $I->selectOption($Toprow->bottomrowtabletlayout, 'fullwidth');
        $I->wait(1);
        $I->click($Toprow->publishbutton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(1);
        $I->resizeWindow(768, 1024);
        $I->wait(2);
        $I->seeElement($Toprow->bottablayoutletelement);
        $I->wait(2);
        $I->resizeWindow(1280,950);
        $I->wait(2);
        $I->click($Toprow->customizebutton);
        $I->wait(2);
        $I->scrollTo($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->bottomrowbtn);

        $I->selectOption($Toprow->bottomrowtabletlayout, 'contained');
        $I->wait(1);
        $I->click($Toprow->publishbutton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(1);
        $I->resizeWindow(768, 1024);
        $I->wait(2);
        $I->seeElement($Toprow->bottablayoutletelement);
        $I->wait(2);
        $I->resizeWindow(1280,950);
        $I->wait(2);
        $I->click($Toprow->customizebutton);
        $I->wait(2);
        $I->scrollTo($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->bottomrowbtn);

        $I->selectOption($Toprow->bottomrowtabletlayout, 'standard');
        $I->wait(1);
        $I->click($Toprow->publishbutton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(1);
        $I->resizeWindow(768, 1024);
        $I->wait(2);
        $I->seeElement($Toprow->bottablayoutletelement);
        $I->wait(2);
        $I->resizeWindow(1280,950);
        $I->wait(2);
        $I->click($Toprow->customizebutton);
        $I->wait(2);
        $I->scrollTo($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->bottomrowbtn);


        $I->amGoingTo('check the mobile layout settings for the bottom row');
        $I->click($Toprow->mobilelayout);
        $I->wait(2);
        $I->selectOption($Toprow->bottomrowmoblayout, 'fullwidth');
        $I->wait(1);
        $I->click($Toprow->publishbutton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(1);
        $I->resizeWindow(390, 844);
        $I->wait(2);
        $I->seeElement($Toprow->botmobilelayoutelement);
        $I->wait(2);
        $I->resizeWindow(1280,950);
        $I->wait(2);
        $I->click($Toprow->customizebutton);
        $I->wait(2);
        $I->scrollTo($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->bottomrowbtn);

        $I->selectOption($Toprow->bottomrowmoblayout, 'contained');
        $I->wait(1);
        $I->click($Toprow->publishbutton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(1);
        $I->resizeWindow(390, 844);
        $I->wait(2);
        $I->seeElement($Toprow->botmobilelayoutelement);
        $I->wait(2);
        $I->resizeWindow(1280,950);
        $I->wait(2);
        $I->click($Toprow->customizebutton);
        $I->wait(2);
        $I->scrollTo($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->bottomrowbtn);
        
        $I->selectOption($Toprow->bottomrowmoblayout, 'standard');
        $I->wait(1);
        $I->click($Toprow->publishbutton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(1);
        $I->resizeWindow(390, 844);
        $I->wait(2);
        $I->seeElement($Toprow->botmobilelayoutelement);
        $I->wait(2);
        $I->resizeWindow(1280,950);
        $I->wait(2);
        $I->click($Toprow->customizebutton);
        $I->wait(2);
        $I->scrollTo($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->bottomrowbtn);
        
    }

    public function HeightSettings(RespThemeTester $I,  LogInAndLogOut $loginAndLogout, Customizer $customizer, Toprow $Toprow, CommonFunctionsPage $commonFunctionsPage)
    {
        $I->amGoingTo('check min height settings for the bottom row');
        $I->click($Toprow->desktoplayout);
        $I->fillField($Toprow->botminheightdesktop, '150');
        $I->wait(2);
        $I->click($Toprow->publishbutton);
        $I->wait(5);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $commonFunctionsPage->_checkStyle($I, $commonFunctionsPage->botminhtdeskelement , 'min-height', 'xpath', '150px');
        $I->wait(1);
        $I->click($Toprow->customizebutton);
        $I->wait(2);
        $I->scrollTo($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->bottomrowbtn);

        $I->amGoingTo('check the min height for tablet settings for the bottom row');
        $I->click($Toprow->tabletlayout);
        $I->fillField($Toprow->botminheighttablet, '50');
        $I->wait(2);
        $I->click($Toprow->publishbutton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(1);
        $I->resizeWindow(768, 1024);
        $I->wait(2);
        $commonFunctionsPage->_checkStyle($I, $commonFunctionsPage->botminhttabelement, 'min-height', 'xpath', '50px');
        $I->wait(2);
        $I->resizeWindow(1280,950);
        $I->wait(2);
        $I->click($Toprow->customizebutton);
        $I->wait(2);
        $I->scrollTo($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->bottomrowbtn);

        $I->amGoingTo('check the min height for mobile settings for the bottom row');
        $I->click($Toprow->mobilelayout);
        $I->fillField($Toprow->botminheightmobile, '40');
        $I->wait(2);
        $I->click($Toprow->publishbutton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(1);
        $I->resizeWindow(390, 844);
        $I->wait(2);
        $commonFunctionsPage->_checkStyle($I, $commonFunctionsPage->botminhtmobelement, 'min-height', 'xpath', '40px');
        $I->wait(2);
        $I->resizeWindow(1280,950);
        $I->wait(2);
        $I->click($Toprow->customizebutton);
        $I->wait(2);
        $I->scrollTo($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->bottomrowbtn);
    }

    public function BackgroundColourSettings(RespThemeTester $I,  LogInAndLogOut $loginAndLogout, Customizer $customizer, Toprow $Toprow, CommonFunctionsPage $commonFunctionsPage)
    {
        $I->amGoingTo('check the desktop background colour for bottom row');
        $I->click($Toprow->desktoplayout);
        $I->scrollTo($Toprow->botbackgrounddesktop);
        $I->click($Toprow->botbackgrounddesktop);
        $I->wait(2);
        $I->click($Toprow->botdeskcolor);
        $I->click($Toprow->publishbutton);
        $I->wait(2);
        $I->amGoingTo('check on front end');
        $I->amOnPage('/');
        $I->wait(3);
        $commonFunctionsPage->_checkStyle($I, $commonFunctionsPage->backgrounddeskbot, 'background', 'xpath', 'rgb(30, 115, 190) none repeat scroll 0% 0% / auto padding-box border-box');
        $I->wait(2);
        $I->click($Toprow->customizebutton);
        $I->wait(1);
        $I->scrollTo($Toprow->headerbutton);
        $I->wait(1);
        $I->click($Toprow->headerbutton);
        $I->wait(1);
        $I->click($Toprow->bottomrowbtn);

        $I->amGoingTo('check the tablet background colour for bottom row');
        $I->click($Toprow->tabletlayout);
        $I->scrollTo($Toprow->botbackgroundtablet);
        $I->click($Toprow->botbackgroundtablet);
        $I->wait(2);
        $I->click($Toprow->bottabletcolor);
        $I->wait(2);
        $I->click($Toprow->publishbutton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(1);
        $I->resizeWindow(768, 1024);
        $I->wait(2);
        $commonFunctionsPage->_checkStyle($I, $commonFunctionsPage->backgroundtabbot, 'background', 'xpath', 'rgb(221, 153, 51) none repeat scroll 0% 0% / auto padding-box border-box');
        $I->wait(2);
        $I->resizeWindow(1280,950);
        $I->wait(2);
        $I->click($Toprow->customizebutton);
        $I->wait(2);
        $I->scrollTo($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->bottomrowbtn);

        $I->amGoingTo('check the mobile background colour for bottom row');
        $I->click($Toprow->mobilelayout);
        $I->scrollTo($Toprow->botbackgroundmobile);
        $I->click($Toprow->botbackgroundmobile);
        $I->wait(2);
        $I->click($Toprow->botmobilecolor);
        $I->wait(2);
        $I->click($Toprow->publishbutton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(1);
        $I->resizeWindow(390, 844);
        $I->wait(2);
        $commonFunctionsPage->_checkStyle($I, $commonFunctionsPage->backgroundmobbot, 'background', 'xpath', 'rgb(238, 238, 34) none repeat scroll 0% 0% / auto padding-box border-box');
        $I->wait(2);
        $I->resizeWindow(1280,950);
        $I->wait(2);
        $I->click($Toprow->customizebutton);
        $I->wait(2);
        $I->scrollTo($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->bottomrowbtn);
    }

public function PaddingSettings(RespThemeTester $I,  LogInAndLogOut $loginAndLogout, Customizer $customizer, Toprow $Toprow, CommonFunctionsPage $commonFunctionsPage)
    {
        $I->amGoingTo('check the padding for desktop for the bottom row ');
        $I->scrollTo($Toprow->botpaddingspan);
        $I->wait(2);
        $I->click($Toprow->botpaddinglayoutdesktop);
        $I->wait(2);
        $I->fillField($Toprow->botpaddingfielddesktop, '30');
        $I->wait(2);
        $I->click($Toprow->publishbutton);
        $I->wait(2);
        $I->amGoingTo('check on front end');
        $I->amOnPage('/');
        $I->wait(3);
        $commonFunctionsPage->_checkStyle($I, $commonFunctionsPage->backgrounddeskbot, 'padding', 'xpath', '30px');
        $I->wait(2);
        $I->click($Toprow->customizebutton);
        $I->wait(1);
        $I->scrollTo($Toprow->headerbutton);
        $I->wait(1);
        $I->click($Toprow->headerbutton);
        $I->wait(1);
        $I->click($Toprow->bottomrowbtn);
       
        $I->amGoingTo('check the padding for tablet for the bottom row');
        $I->scrollTo($Toprow->botpaddingspan);
        $I->wait(2);
        $I->click($Toprow->botpaddinglayoutdesktop);
        $I->click($Toprow->botpaddinglayouttablet);
        $I->wait(2);
        $I->fillField($Toprow->botpaddingfieldtablet, '20');
        $I->wait(2);
        $I->click($Toprow->publishbutton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(1);
        $I->resizeWindow(768, 1024);
        $I->wait(2);
        $commonFunctionsPage->_checkStyle($I, $commonFunctionsPage->backgroundtabbot, 'padding', 'xpath', '20px');
        $I->wait(2);
        $I->resizeWindow(1280,950);
        $I->wait(2);
        $I->click($Toprow->customizebutton);
        $I->wait(2);
        $I->scrollTo($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->bottomrowbtn);

        $I->amGoingTo('check the padding for mobile for the bottom row ');
        $I->scrollTo($Toprow->botpaddingspan);
        $I->wait(2);
        $I->click($Toprow->botpaddinglayoutdesktop);
        $I->click($Toprow->botpaddinglayoutmobile);
        $I->wait(2);
        $I->fillField($Toprow->botpaddingfieldmobile, '10');
        $I->wait(2);
        $I->click($Toprow->publishbutton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(1);
        $I->resizeWindow(390, 844);
        $I->wait(2);
        $commonFunctionsPage->_checkStyle($I, $commonFunctionsPage->backgroundmobbot, 'padding', 'xpath', '10px');
        $I->wait(2);
        $I->resizeWindow(1280,950);
        $I->wait(2);
        $I->click($Toprow->customizebutton);
        $I->wait(2);
        $I->scrollTo($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->bottomrowbtn);
    }
}
