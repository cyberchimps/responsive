<?php

use \page\RespTheme\Customizer;
use \page\RespTheme\LogInAndLogOut;
use \Page\RespTheme\HeaderSocialComponents;
use \Facebook\WebDriver\Remote\RemoteWebDriver;
use \Facebook\WebDriver\WebDriverBy;
use \Facebook\WebDriver\WebDriverKeys;
use \page\RespTheme\CommonFunctionsPage;

class HeaderSocialCest
{
    public function _before(RespThemeTester $I, LogInAndLogOut $loginAndLogout, HeaderSocialComponents $HeaderSocialComponents)
    {
        $I->amGoingTo('Login as Admin');
        $loginAndLogout->userLogin($I);
        $I->click($HeaderSocialComponents->customizeButton);
        $I->wait(1);
        $I->scrollTo($HeaderSocialComponents->headerButton);
        $I->wait(1);
        $I->click($HeaderSocialComponents->headerButton);
        $I->wait(1);
        $I->scrollTo($HeaderSocialComponents->headerSocial);
        $I->wait(1);
        $I->click($HeaderSocialComponents->headerSocial);
        $I->wait(1);
    }

    // tests
    public function socialComponentsforDesktop(RespThemeTester $I, HeaderSocialComponents $HeaderSocialComponents)
    {
        $I->selectOption($HeaderSocialComponents->OpenInNewTab, '_self');
        $I->fillField($HeaderSocialComponents->twitter, 'https://twitter.com/');
        $I->fillField($HeaderSocialComponents->facebook, 'https://www.facebook.com/');
        $I->fillField($HeaderSocialComponents->linkedIn, 'https://www.linkedin.com/');
        $I->fillField($HeaderSocialComponents->youTube, 'https://www.youtube.com/');
        $I->fillField($HeaderSocialComponents->iconSize, '25');
        $I->click($HeaderSocialComponents->iconColor);
        $I->click($HeaderSocialComponents->iconColorWhite);
        $I->click($HeaderSocialComponents->iconHoverColor);
        $I->click($HeaderSocialComponents->iconHoverColor1);
        $I->click($HeaderSocialComponents->backgroundColor);
        $I->click($HeaderSocialComponents->backgroundColor1);
        $I->click($HeaderSocialComponents->backgroundHoverColor);
        $I->click($HeaderSocialComponents->backgroundHoverColor2);
        $I->click($HeaderSocialComponents->borderColor);
        $I->click($HeaderSocialComponents->borderColor3);
        $I->click($HeaderSocialComponents->borderHoverColor);
        $I->click($HeaderSocialComponents->borderHoverColor1);
        $I->selectOption($HeaderSocialComponents->borderStyle, 'solid');
        $I->fillField($HeaderSocialComponents->borderWidth, '2');
        $I->fillField($HeaderSocialComponents->borderRadius, '8');
        $I->wait(2);
        $I->click($HeaderSocialComponents->publishButton);
        $I->wait(2);

        $I->amGoingTo('Check on the front end');
        $I->amOnPage('/');
        $I->click($HeaderSocialComponents->twitterIcon);
        $I->wait(1);
        $I->see('Twitter');
        $I->amOnPage('/');
        $HeaderSocialComponents->_checkStyle($I, $HeaderSocialComponents->twitterIcon, 'color', 'xpath', 'rgba(255, 255, 255, 1)');
        $HeaderSocialComponents->_checkStyle($I, $HeaderSocialComponents->twitterIcon, 'background-color', 'xpath', 'rgba(0, 0, 0, 1)');
        $HeaderSocialComponents->_checkStyle($I, $HeaderSocialComponents->twitterIcon, 'border', 'xpath', '2px solid rgb(221, 51, 51)');
        $HeaderSocialComponents->_checkStyle($I, $HeaderSocialComponents->twitterIcon, 'border-radius', 'xpath', '8px');
        $I->moveMouseOver($HeaderSocialComponents->twitterIcon);
        $I->wait(3);
        $HeaderSocialComponents->_checkStyle($I, $HeaderSocialComponents->twitterIcon, 'color', 'xpath', 'rgba(0, 0, 0, 1)');
        $HeaderSocialComponents->_checkStyle($I, $HeaderSocialComponents->twitterIcon, 'background-color', 'xpath', 'rgba(255, 255, 255, 1)');
        $HeaderSocialComponents->_checkStyle($I, $HeaderSocialComponents->twitterIcon, 'border', 'xpath', '2px solid rgb(0, 0, 0)');
        $HeaderSocialComponents->_checkStyle($I, $HeaderSocialComponents->twitterIcon, 'border-radius', 'xpath', '8px');
        

        $I->click($HeaderSocialComponents->facebookIcon);
        $I->wait(1);
        $I->see('facebook');
        $I->amOnPage('/');
        $HeaderSocialComponents->_checkStyle($I, $HeaderSocialComponents->facebookIcon, 'color', 'xpath', 'rgba(255, 255, 255, 1)');
        $HeaderSocialComponents->_checkStyle($I, $HeaderSocialComponents->facebookIcon, 'background-color', 'xpath', 'rgba(0, 0, 0, 1)');
        $HeaderSocialComponents->_checkStyle($I, $HeaderSocialComponents->facebookIcon, 'border', 'xpath', '2px solid rgb(221, 51, 51)');
        $HeaderSocialComponents->_checkStyle($I, $HeaderSocialComponents->facebookIcon, 'border-radius', 'xpath', '8px');
        $I->moveMouseOver($HeaderSocialComponents->facebookIcon);
        $I->wait(3);
        $HeaderSocialComponents->_checkStyle($I, $HeaderSocialComponents->facebookIcon, 'color', 'xpath', 'rgba(0, 0, 0, 1)');
        $HeaderSocialComponents->_checkStyle($I, $HeaderSocialComponents->facebookIcon, 'background-color', 'xpath', 'rgba(255, 255, 255, 1)');
        $HeaderSocialComponents->_checkStyle($I, $HeaderSocialComponents->facebookIcon, 'border', 'xpath', '2px solid rgb(0, 0, 0)');
        $HeaderSocialComponents->_checkStyle($I, $HeaderSocialComponents->facebookIcon, 'border-radius', 'xpath', '8px');

        $I->click($HeaderSocialComponents->linkedInIcon);
        $I->wait(1);
        $I->see('linkedIn');
        $I->amOnPage('/');
        $HeaderSocialComponents->_checkStyle($I, $HeaderSocialComponents->linkedInIcon, 'color', 'xpath', 'rgba(255, 255, 255, 1)');
        $HeaderSocialComponents->_checkStyle($I, $HeaderSocialComponents->linkedInIcon, 'background-color', 'xpath', 'rgba(0, 0, 0, 1)');
        $HeaderSocialComponents->_checkStyle($I, $HeaderSocialComponents->linkedInIcon, 'border', 'xpath', '2px solid rgb(221, 51, 51)');
        $HeaderSocialComponents->_checkStyle($I, $HeaderSocialComponents->linkedInIcon, 'border-radius', 'xpath', '8px');
        $I->moveMouseOver($HeaderSocialComponents->linkedInIcon);
        $I->wait(3);
        $HeaderSocialComponents->_checkStyle($I, $HeaderSocialComponents->linkedInIcon, 'color', 'xpath', 'rgba(0, 0, 0, 1)');
        $HeaderSocialComponents->_checkStyle($I, $HeaderSocialComponents->linkedInIcon, 'background-color', 'xpath', 'rgba(255, 255, 255, 1)');
        $HeaderSocialComponents->_checkStyle($I, $HeaderSocialComponents->linkedInIcon, 'border', 'xpath', '2px solid rgb(0, 0, 0)');
        $HeaderSocialComponents->_checkStyle($I, $HeaderSocialComponents->linkedInIcon, 'border-radius', 'xpath', '8px');

        $I->click($HeaderSocialComponents->youTubeIcon);
        $I->wait(1);
        $I->see('Subscriptions');
        $I->amOnPage('/');
        $HeaderSocialComponents->_checkStyle($I, $HeaderSocialComponents->youTubeIcon, 'color', 'xpath', 'rgba(255, 255, 255, 1)');
        $HeaderSocialComponents->_checkStyle($I, $HeaderSocialComponents->youTubeIcon, 'background-color', 'xpath', 'rgba(0, 0, 0, 1)');
        $HeaderSocialComponents->_checkStyle($I, $HeaderSocialComponents->youTubeIcon, 'border', 'xpath', '2px solid rgb(221, 51, 51)');
        $HeaderSocialComponents->_checkStyle($I, $HeaderSocialComponents->youTubeIcon, 'border-radius', 'xpath', '8px');
        $I->moveMouseOver($HeaderSocialComponents->youTubeIcon);
        $I->wait(3);
        $HeaderSocialComponents->_checkStyle($I, $HeaderSocialComponents->youTubeIcon, 'color', 'xpath', 'rgba(0, 0, 0, 1)');
        $HeaderSocialComponents->_checkStyle($I, $HeaderSocialComponents->youTubeIcon, 'background-color', 'xpath', 'rgba(255, 255, 255, 1)');
        $HeaderSocialComponents->_checkStyle($I, $HeaderSocialComponents->youTubeIcon, 'border', 'xpath', '2px solid rgb(0, 0, 0)');
        $HeaderSocialComponents->_checkStyle($I, $HeaderSocialComponents->youTubeIcon, 'border-radius', 'xpath', '8px');
        
    }
    
    public function socialComponentsforNewTab(RespThemeTester $I, HeaderSocialComponents $HeaderSocialComponents)
    {
        $I->selectOption($HeaderSocialComponents->OpenInNewTab, '_blank');
        $I->fillField($HeaderSocialComponents->twitter, 'https://twitter.com/');
        $I->click($HeaderSocialComponents->publishButton);
        $I->wait(2);
        $I->amGoingTo('Check on the front end');
        $I->amOnPage('/');
        $I->click($HeaderSocialComponents->twitterIcon);
        $I->switchToNextTab();
        $I->waitForText("Join Twitter", 5);
    }
}
