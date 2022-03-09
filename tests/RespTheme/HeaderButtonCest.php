<?php

use \page\RespTheme\Customizer;
use \page\RespTheme\LogInAndLogOut;
use \Page\RespTheme\HeaderButtonComponents;
use \Facebook\WebDriver\Remote\RemoteWebDriver;
use \Facebook\WebDriver\WebDriverBy;
use \Facebook\WebDriver\WebDriverKeys;
use \page\RespTheme\CommonFunctionsPage;

class HeaderButtonCest
{
    public function _before(RespThemeTester $I, LogInAndLogOut $loginAndLogout, Customizer $customizer, HeaderButtonComponents $HeaderButtonComponents)
    {
        $I->amGoingTo('Login as Admin');
        $loginAndLogout->userLogin($I);
        
        $I->click($HeaderButtonComponents->customizeButton);
        $I->wait(1);
        $I->scrollTo($HeaderButtonComponents->headerButton);
        $I->wait(1);
        $I->click($HeaderButtonComponents->headerButton);
        $I->wait(1);
        $I->scrollTo($HeaderButtonComponents->headerButtonSection);
        $I->wait(1);
        $I->click($HeaderButtonComponents->headerButtonSection);
        $I->wait(1);
    }

    //moveMouseOver

    // tests
    /*public function buttonSettingsForDesktop(RespThemeTester $I, LogInAndLogOut $loginAndLogout, Customizer $customizer, HeaderButtonComponents $HeaderButtonComponents, CommonFunctionsPage $commonFunctionsPage)
    {
        $I->fillField($HeaderButtonComponents->buttonLabel, 'Button');
        $I->fillField($HeaderButtonComponents->buttonUrl, 'https://www.google.com/');
        $I->selectOption($HeaderButtonComponents->headerButtonSize, 'Medium');
        $I->selectOption($HeaderButtonComponents->headerButtonStyle, 'filled');
        $I->selectOption($HeaderButtonComponents->headerButtonVisibility, 'loggedin');
        $I->selectOption($HeaderButtonComponents->buttonBorderStyle, 'solid');
        $I->fillField($HeaderButtonComponents->buttonBorderWidth, '7');
        $I->fillField($HeaderButtonComponents->buttonBorderRadius, '20');
        $I->click($HeaderButtonComponents-> buttonColor);
        $I->click($HeaderButtonComponents-> buttonColor2);
        $I->wait(1);
        $I->click($HeaderButtonComponents-> buttonHoverColor);
        $I->click($HeaderButtonComponents-> buttonHoverColor1);
        $I->wait(1);
        $I->click($HeaderButtonComponents-> buttonBackgroundColor);
        $I->click($HeaderButtonComponents-> buttonBackgroundColor3);
        $I->wait(1);
        $I->click($HeaderButtonComponents-> backgroundHoverColor);
        $I->click($HeaderButtonComponents-> backgroundHoverColor2);
        $I->wait(1);
        $I->click($HeaderButtonComponents-> buttonBorderColor);
        $I->click($HeaderButtonComponents-> buttonBorderColor1);
        $I->wait(1);
        $I->click($HeaderButtonComponents-> buttonBorderHoverColor);
        $I->click($HeaderButtonComponents-> buttonBorderHoverColor6);
        $I->wait(1);
        $I->click($HeaderButtonComponents->publishButton);
        $I->wait(2);

        $I->amGoingTo('Check on the front end');
        $I->amOnPage('/');
        $I->wait(2);
        $I->seeElement($HeaderButtonComponents->button);
        $commonFunctionsPage->_checkStyle($I, $HeaderButtonComponents->button, 'border', 'xpath', '7px solid rgb(0, 0, 0)');
        $commonFunctionsPage->_checkStyle($I, $HeaderButtonComponents->button, 'border-radius', 'xpath', '20px');
        $commonFunctionsPage->_checkStyle($I, $HeaderButtonComponents->button, 'color', 'xpath', 'rgba(255, 255, 255, 1)');
        $commonFunctionsPage->_checkStyle($I, $HeaderButtonComponents->button, 'background', 'xpath', 'rgb(221, 51, 51) none repeat scroll 0% 0% / auto padding-box border-box');

        $I->moveMouseOver($HeaderButtonComponents->button);
        $I->wait(10);
        $commonFunctionsPage->_checkStyle($I, $HeaderButtonComponents->button, 'border', 'xpath', '7px solid rgb(129, 215, 66)');
        $commonFunctionsPage->_checkStyle($I, $HeaderButtonComponents->button, 'border-radius', 'xpath', '20px');
        $commonFunctionsPage->_checkStyle($I, $HeaderButtonComponents->button, 'color', 'xpath', 'rgba(0, 0, 0, 1)');
        $commonFunctionsPage->_checkStyle($I, $HeaderButtonComponents->button, 'background', 'xpath', 'rgb(255, 255, 255) none repeat scroll 0% 0% / auto padding-box border-box');

        $I->click($HeaderButtonComponents->button);
        $I->wait(2);
        $I->see('Google');
        $I->amOnPage('/');
    }*/

    /*public function buttonSettingsForTablet(RespThemeTester $I, LogInAndLogOut $loginAndLogout, Customizer $customizer, HeaderButtonComponents $HeaderButtonComponents, CommonFunctionsPage $commonFunctionsPage)
    {
        $I->click($HeaderButtonComponents->tabletLayout);
        //$I->click('//*[@id="customize-control-header_mobile_items"]/div/div[2]/div[3]/button[2]');
        $I->wait(1);
        $I->fillField($HeaderButtonComponents->buttonLabel, 'BUTTON');
        $I->fillField($HeaderButtonComponents->buttonUrl, 'https://www.google.com/');
        $I->selectOption($HeaderButtonComponents->headerButtonSize, 'large');
        $I->selectOption($HeaderButtonComponents->headerButtonStyle, 'filled');
        $I->selectOption($HeaderButtonComponents->headerButtonVisibility, 'loggedin');
        $I->selectOption($HeaderButtonComponents->buttonBorderStyle, 'dashed');
        $I->fillField($HeaderButtonComponents->buttonBorderWidth, '7');
        $I->fillField($HeaderButtonComponents->buttonBorderRadius, '20');
        $I->click($HeaderButtonComponents-> buttonColor);
        $I->click($HeaderButtonComponents-> buttonColor2);
        $I->wait(1);
        $I->click($HeaderButtonComponents-> buttonHoverColor);
        $I->click($HeaderButtonComponents-> buttonHoverColor1);
        $I->wait(1);
        $I->click($HeaderButtonComponents-> buttonBackgroundColor);
        $I->click($HeaderButtonComponents-> buttonBackgroundColor3);
        $I->wait(1);
        $I->click($HeaderButtonComponents-> backgroundHoverColor);
        $I->click($HeaderButtonComponents-> backgroundHoverColor2);
        $I->wait(1);
        $I->click($HeaderButtonComponents-> buttonBorderColor);
        $I->click($HeaderButtonComponents-> buttonBorderColor1);
        $I->wait(1);
        $I->click($HeaderButtonComponents-> buttonBorderHoverColor);
        $I->click($HeaderButtonComponents-> buttonBorderHoverColor6);
        $I->wait(1);
        $I->click($HeaderButtonComponents->publishButton);
        $I->wait(2);

        $I->amGoingTo('Check on the front end');
        $I->amOnPage('/');
        $I->resizeWindow(768, 1024);
        $I->wait(5);
        $I->seeElement($HeaderButtonComponents->buttonOnTablet);
        $commonFunctionsPage->_checkStyle($I, $HeaderButtonComponents->buttonOnTablet, 'border', 'xpath', '5px solid rgb(0, 102, 204)');
        $commonFunctionsPage->_checkStyle($I, $HeaderButtonComponents->buttonOnTablet, 'border-radius', 'xpath', '20px');
        $commonFunctionsPage->_checkStyle($I, $HeaderButtonComponents->buttonOnTablet, 'color', 'xpath', 'rgba(255, 255, 255, 1)');
        $commonFunctionsPage->_checkStyle($I, $HeaderButtonComponents->buttonOnTablet, 'background', 'xpath', 'rgb(221, 51, 51) none repeat scroll 0% 0% / auto padding-box border-box');

        $I->moveMouseOver($HeaderButtonComponents->buttonOnTablet->button);
        $I->wait(10);
        $commonFunctionsPage->_checkStyle($I, $HeaderButtonComponents->buttonOnTablet, 'border', 'xpath', '7px dashed rgb(129, 215, 66)');
        $commonFunctionsPage->_checkStyle($I, $HeaderButtonComponents->buttonOnTablet, 'border-radius', 'xpath', '20px');
        $commonFunctionsPage->_checkStyle($I, $HeaderButtonComponents->buttonOnTablet, 'color', 'xpath', 'rgba(0, 0, 0, 1)');
        $commonFunctionsPage->_checkStyle($I, $HeaderButtonComponents->buttonOnTablet, 'background', 'xpath', 'rgb(255, 255, 255) none repeat scroll 0% 0% / auto padding-box border-box');

        $I->click($HeaderButtonComponents->button);
        $I->wait(2);
        $I->see('Google');
        $I->amOnPage('/');
        $I->resizeWindow(1280,950);
    }*/

    public function buttonTypographySettingsForDesktop(RespThemeTester $I, LogInAndLogOut $loginAndLogout, Customizer $customizer, HeaderButtonComponents $HeaderButtonComponents, CommonFunctionsPage $commonFunctionsPage)
    {
        $I->selectOption($HeaderButtonComponents->fontFamily, 'Alegreya');
        $I->selectOption($HeaderButtonComponents->fontWeight, '700');
        $I->selectOption($HeaderButtonComponents->fontStyle, 'italic');
        $I->selectOption($HeaderButtonComponents->textTransform, 'uppercase');
        $I->fillField($HeaderButtonComponents->fontSize, '2-3-4');
        $I->fillField($HeaderButtonComponents->lineHeight, '4');
        $I->fillField($HeaderButtonComponents->lineSpacing, '3.5');
        $I->click($HeaderButtonComponents->publishButton);
        $I->wait(2);

        $I->amGoingTo('Check on the front end');
        $I->amOnPage('/');
        $I->wait(2);
        $commonFunctionsPage->_checkStyle($I, $HeaderButtonComponents->button, 'font-family', 'xpath', 'Alegreya, serif');
        $commonFunctionsPage->_checkStyle($I, $HeaderButtonComponents->button, 'font-weight', 'xpath', '700');
        $commonFunctionsPage->_checkStyle($I, $HeaderButtonComponents->button, 'font-style', 'xpath', 'italic');
        $commonFunctionsPage->_checkStyle($I, $HeaderButtonComponents->button, 'text-transform', 'xpath', 'uppercase');
        $commonFunctionsPage->_checkStyle($I, $HeaderButtonComponents->button, 'line-height', 'xpath', '64px');
        $commonFunctionsPage->_checkStyle($I, $HeaderButtonComponents->button, 'font-size', 'xpath', '16px');

    }
}                                      
