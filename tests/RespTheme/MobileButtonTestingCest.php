<?php
use \page\RespTheme\LogInAndLogOut;
use \page\RespTheme\MobileButtonComponent;
use \page\RespTheme\MCommonPage;
use \Facebook\WebDriver\Remote\RemoteWebDriver;
use \Facebook\WebDriver\WebDriverBy;
use \Facebook\WebDriver\WebDriverKeys;

class MobileButtonTestingCest
{
    public function _before(RespThemeTester $I, LogInAndLogOut $loginAndLogout, MobileButtonComponent $mobileButtonComponent, MCommonPage $mCommonPage)
    {
        $I->amGoingTo('Login as Admin');
        $loginAndLogout->userLogin($I);
        $I->click($mobileButtonComponent->url);
        $I->scrollTo($mobileButtonComponent->header);
        $I->click($mobileButtonComponent->header);
        $I->click($mobileButtonComponent->mobileButton);
    }
    // tests
    public function mobileButtonSettings(RespThemeTester $I, LogInAndLogOut $loginAndLogout, MobileButtonComponent $mobileButtonComponent, MCommonPage $mCommonPage)
    { 
        $I->click($mobileButtonComponent->mobileView);
        $I->fillField($mobileButtonComponent->buttonLabel, 'Click');
        $I->fillField($mobileButtonComponent->buttonUrl, 'https://cyberchimps.com/');
        $I->click($mobileButtonComponent->newTab);
        $I->click($mobileButtonComponent->publishButton);
        $I->amGoingTo('check on the front end for mobile view');
        $I->amOnPage('/');
        $I->resizeWindow(390, 844);
        $I->wait(2);
        $I->seeElement($mobileButtonComponent->mobilerow);
        $I->moveMouseOver($mobileButtonComponent->button);
        $I->click($mobileButtonComponent->button);
        $I->wait(2);
        $I->resizeWindow(1280, 950);
        $I->wait(2);

        $I->amGoingTo('Check for the checkbox link not to follow');
        $I->switchToPreviousTab();
        $I->amOnPage('/');
        $I->click($mobileButtonComponent->url);
        $I->scrollTo($mobileButtonComponent->header);
        $I->click($mobileButtonComponent->header);
        $I->click($mobileButtonComponent->mobileButton);
        $I->click($mobileButtonComponent->newTab);
        $I->click($mobileButtonComponent->linkNotToFollow);
        $I->click($mobileButtonComponent->publishButton);
        $I->amGoingTo('check on the front end for mobile view');
        $I->amOnPage('/');
        $I->resizeWindow(390, 844);
        $I->wait(2);
        $I->seeElement($mobileButtonComponent->mobilerow);
        $I->moveMouseOver($mobileButtonComponent->button);
        $I->click($mobileButtonComponent->button);
        $I->wait(2);
        $I->resizeWindow(1280, 950);
        $I->wait(2);

        $I->amGoingTo('Check for the checkbox set link attribute sponsered');
        $I->amOnPage('/');
        $I->click($mobileButtonComponent->url);
        $I->scrollTo($mobileButtonComponent->header);
        $I->click($mobileButtonComponent->header);
        $I->click($mobileButtonComponent->mobileButton);
        $I->click($mobileButtonComponent->linkNotToFollow);
        $I->click($mobileButtonComponent->attributeSponsored);
        $I->click($mobileButtonComponent->publishButton);
        $I->amGoingTo('check on the front end for mobile view');
        $I->amOnPage('/');
        $I->resizeWindow(390, 844);
        $I->wait(2);
        $I->seeElement($mobileButtonComponent->mobilerow);
        $I->moveMouseOver($mobileButtonComponent->button);
        $I->click($mobileButtonComponent->button);
        $I->wait(2);
        $I->resizeWindow(1280, 950);
        $I->wait(2);

        $I->amGoingTo('Check for the checkbox set link to download');
        $I->amOnPage('/');
        $I->click($mobileButtonComponent->url);
        $I->scrollTo($mobileButtonComponent->header);
        $I->click($mobileButtonComponent->header);
        $I->click($mobileButtonComponent->mobileButton);
        $I->click($mobileButtonComponent->attributeSponsored);
        $I->click($mobileButtonComponent->linktoDownload);
        $I->click($mobileButtonComponent->publishButton);
        $I->amGoingTo('check on the front end for mobile view');
        $I->amOnPage('/');
        $I->resizeWindow(390, 844);
        $I->wait(2);
        $I->seeElement($mobileButtonComponent->mobilerow);
        $I->moveMouseOver($mobileButtonComponent->button);
        $I->click($mobileButtonComponent->button);
        $I->wait(2);
        $I->resizeWindow(1280, 950);
        $I->wait(2);

        $I->amGoingTo('Logout');
        $loginAndLogout->userLogout($I);
        $I->wait(2);
    }
    public function sizeStyleVisibilitySettings(RespThemeTester $I, LogInAndLogOut $loginAndLogout, MobileButtonComponent $mobileButtonComponent, MCommonPage $mCommonPage)
    { 
        $I->amGoingTo('Check the button size,style and visibility for mobile header button');
        $I->click($mobileButtonComponent->mobileView);
        $I->selectOption($mobileButtonComponent->buttonSize, 'Small');
        $I->selectOption($mobileButtonComponent->buttonStyle, 'Outline');
        $I->selectOption($mobileButtonComponent->buttonVisibility, 'Logged In Only');
        $I->click($mobileButtonComponent->publishButton);
        $I->amGoingTo('check on the front end for mobile view');
        $I->amOnPage('/');

        $I->resizeWindow(390, 844);
        $I->wait(2);
        $I->seeElement($mobileButtonComponent->mobilerow);
        $I->resizeWindow(1280, 950);
        $I->wait(2);

        $I->amGoingTo('check on the front end for tablet view');
        $I->amOnPage('/');
        $I->resizeWindow(768, 1024);
        $I->wait(2);
        $I->seeElement($mobileButtonComponent->tabletrow);
        $I->resizeWindow(1280, 950);
        $I->wait(2);

        $I->click($mobileButtonComponent->url);
        $I->scrollTo($mobileButtonComponent->header);
        $I->click($mobileButtonComponent->header);
        $I->click($mobileButtonComponent->mobileButton);
        $I->selectOption($mobileButtonComponent->buttonSize, 'Large');
        $I->selectOption($mobileButtonComponent->buttonStyle, 'Filled');
        $I->selectOption($mobileButtonComponent->buttonVisibility, 'Everyone');
        $I->click($mobileButtonComponent->publishButton);
        $I->amGoingTo('check on the front end for mobile view');
        $I->amOnPage('/');
        $I->resizeWindow(390, 844);
        $I->wait(2);
        $I->seeElement($mobileButtonComponent->mobilerow);
        $I->resizeWindow(1280, 950);
        $I->wait(2);

        $I->amGoingTo('check on the front end for tablet view');
        $I->amOnPage('/');
        $I->resizeWindow(768, 1024);
        $I->wait(2);
        $I->seeElement($mobileButtonComponent->tabletrow);
        $I->resizeWindow(1280, 950);
        $I->wait(2);

        $I->amGoingTo('Logout');
        $loginAndLogout->userLogout($I);
        $I->wait(2);
    }
    public function buttonBorderSettings(RespThemeTester $I, LogInAndLogOut $loginAndLogout, MobileButtonComponent $mobileButtonComponent, MCommonPage $mCommonPage)
    {
        $I->amGoingTo('Check border style,width and radius for mobile header button');
        $I->selectOption($mobileButtonComponent->borderStyle, 'Dotted');
        $I->fillField($mobileButtonComponent->borderWidth,'10');
        $I->fillField($mobileButtonComponent->borderRadius,'4');
        $I->click($mobileButtonComponent->publishButton);
        $I->amGoingTo('check on the front end for mobile view');
        $I->amOnPage('/');
        $I->resizeWindow(390, 844);
        $I->wait(2);
        $mCommonPage->_checkStyle($I,$mCommonPage->border,'border','xpath','10px dotted rgb(130, 36, 227)');
        $mCommonPage->_checkStyle($I,$mCommonPage->border,'border-radius','xpath','4px');
        $I->wait(2);
        $I->resizeWindow(1280, 950);
        $I->wait(2);

        $I->amGoingTo('check on the front end for tablet view');
        $I->amOnPage('/');
        $I->resizeWindow(768, 1024);
        $I->wait(2);
        $mCommonPage->_checkStyle($I,$mCommonPage->border,'border','xpath','10px dotted rgb(130, 36, 227)');
        $mCommonPage->_checkStyle($I,$mCommonPage->border,'border-radius','xpath','4px');
        $I->resizeWindow(1280, 950);
        $I->wait(2);

        $I->amGoingTo('Logout');
        $loginAndLogout->userLogout($I);
        $I->wait(2);
    } 
    public function colorSettings(RespThemeTester $I, LogInAndLogOut $loginAndLogout, MobileButtonComponent $mobileButtonComponent, MCommonPage $mCommonPage)
    {
        $I->amGoingTo('Check button color for mobile header component');
        $I->click($mobileButtonComponent->selectButtonColor);
        $I->click($mobileButtonComponent->buttonColor);
        $I->click($mobileButtonComponent->selectButtonFocusColor);
        $I->click($mobileButtonComponent->buttonFocusColor);
        $I->click($mobileButtonComponent->selectButtonBgColor);
        $I->click($mobileButtonComponent->buttonBgColor);
        $I->click($mobileButtonComponent->selectButtonBgFocusColor);
        $I->click($mobileButtonComponent->buttonBgFocusColor);
        $I->click($mobileButtonComponent->selectButtonBorderColor);
        $I->click($mobileButtonComponent->buttonBorderColor);
        $I->click($mobileButtonComponent->selectButtonBorderFocusColor);
        $I->click($mobileButtonComponent->buttonBorderFocusColor);

        $I->amGoingTo('check on the front end for mobile view');
        $I->amOnPage('/');
        $I->resizeWindow(390, 844);
        $I->wait(2);
        $mCommonPage->_checkStyle($I,$mCommonPage->border,'color','xpath','rgb(221, 51, 51)');
        $mCommonPage->_checkStyle($I,$mCommonPage->border,'background','xpath','rgb(238, 238, 34) none repeat scroll 0% 0%');
        $mCommonPage->_checkStyle($I,$mCommonPage->border,'border','xpath','10px dotted rgb(130, 36, 227)');
        $I->moveMouseOver($mobileButtonComponent->button);
        $I->wait(2);
        $mCommonPage->_checkStyle($I,$mCommonPage->border,'color','xpath','rgb(129, 215, 66)');
        $mCommonPage->_checkStyle($I,$mCommonPage->border,'background','xpath','rgb(255, 255, 255) none repeat scroll 0% 0%');
        $mCommonPage->_checkStyle($I,$mCommonPage->border,'border-color','xpath','rgb(0, 0, 0)');
        $I->wait(2);
        $I->resizeWindow(1280, 950);
        $I->wait(2);

        $I->amGoingTo('check on the front end for tablet view');
        $I->amOnPage('/');
        $I->resizeWindow(768, 1024);
        $I->wait(2);
        $mCommonPage->_checkStyle($I,$mCommonPage->border,'color','xpath','rgb(221, 51, 51)');
        $mCommonPage->_checkStyle($I,$mCommonPage->border,'background','xpath','rgb(238, 238, 34) none repeat scroll 0% 0%');
        $mCommonPage->_checkStyle($I,$mCommonPage->border,'border','xpath','10px dotted rgb(130, 36, 227)');
        $I->moveMouseOver($mobileButtonComponent->button);
        $I->wait(2);
        $mCommonPage->_checkStyle($I,$mCommonPage->border,'color','xpath','rgb(129, 215, 66)');
        $mCommonPage->_checkStyle($I,$mCommonPage->border,'background','xpath','rgb(255, 255, 255) none repeat scroll 0% 0%');
        $mCommonPage->_checkStyle($I,$mCommonPage->border,'border-color','xpath','rgb(0, 0, 0)');
        $I->wait(2);
        $I->resizeWindow(1280, 950);
        $I->wait(2);

        $I->amGoingTo('Logout');
        $loginAndLogout->userLogout($I);
        $I->wait(2);
    }
    public function typographySettings(RespThemeTester $I, LogInAndLogOut $loginAndLogout, MobileButtonComponent $mobileButtonComponent, MCommonPage $mCommonPage)
    {
       $I->amGoingTo('check the typography settings for mobile header component');
       $I->scrollTo($mobileButtonComponent->fontFamily);
       $I->wait(2);
       $I->selectOption($mobileButtonComponent->fontFamily, 'Times New Roman');
       $I->selectOption($mobileButtonComponent->fontWeight, 'Normal: 400');
       $I->selectOption($mobileButtonComponent->fontStyle, 'Italic');
       $I->selectOption($mobileButtonComponent->textTransform, 'Lowercase');
       $I->click($mobileButtonComponent->mobile);
       $I->fillField($mobileButtonComponent->fontSize,'10px');
       $I->fillField($mobileButtonComponent->lineHeight, '3');
       $I->fillField($mobileButtonComponent->letterSpacing, '2');
       $I->click($mobileButtonComponent->publishButton);
       $I->wait(4);

       $I->amGoingTo('Check for mobile view');
       $I->amOnPage('/');
       $I->resizeWindow(390, 844);
       $I->wait(2);
       $mCommonPage->_checkStyle($I,$mCommonPage->typography,'font-family','xpath','Times New Roman');
       $mCommonPage->_checkStyle($I,$mCommonPage->border,'font-weight','xpath','400');
       $mCommonPage->_checkStyle($I,$mCommonPage->border,'font-style','xpath','italic');
       $mCommonPage->_checkStyle($I,$mCommonPage->border,'text-transform','xpath','lowercase');
       $mCommonPage->_checkStyle($I,$mCommonPage->border,'font-size','xpath','10px');
       $mCommonPage->_checkStyle($I,$mCommonPage->border,'line-height','xpath','60px');
       $mCommonPage->_checkStyle($I,$mCommonPage->border,'letter-spacing','xpath','2px');
       $I->resizeWindow(1280, 950);
       $I->wait(2);

       $I->amGoingTo('Check for mobile view');
       $I->amOnPage('/');
       $I->resizeWindow(768, 1024);
       $I->wait(2);
       $mCommonPage->_checkStyle($I,$mCommonPage->border,'font-family','xpath','Times New Roman');
       $mCommonPage->_checkStyle($I,$mCommonPage->border,'font-weight','xpath','400');
       $mCommonPage->_checkStyle($I,$mCommonPage->border,'font-style','xpath','italic');
       $mCommonPage->_checkStyle($I,$mCommonPage->border,'text-transform','xpath','lowercase');
       $mCommonPage->_checkStyle($I,$mCommonPage->border,'font-size','xpath','10px');
       $mCommonPage->_checkStyle($I,$mCommonPage->border,'line-height','xpath','52.8px');
       $mCommonPage->_checkStyle($I,$mCommonPage->border,'letter-spacing','xpath','2px');
       $I->resizeWindow(1280, 950);
       $I->wait(2);

       $I->amGoingTo('Logout');
       $loginAndLogout->userLogout($I);
       $I->wait(2);
    }
}
