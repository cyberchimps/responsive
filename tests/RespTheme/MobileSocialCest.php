<?php
use \page\RespTheme\LogInAndLogOut;
use \page\RespTheme\MobileSocialComponents;

class MobileSocialCest
{
    public function _before(RespThemeTester $I, LogInAndLogOut $LogInAndLogOut, MobileSocialComponents $MobileSocialComponents)
    {
        $I->amGoingTo('Login as Admin');
        $LogInAndLogOut->userLogin($I);
        $I->click($MobileSocialComponents->customizeButton);
        $I->scrollTo($MobileSocialComponents->headerButton);
        $I->click($MobileSocialComponents->headerButton);
        $I->scrollTo($MobileSocialComponents->mobileSocial);
        $I->click($MobileSocialComponents->mobileSocial);
        $I->wait(1);
    }

    // tests
    public function tryToTest(RespThemeTester $I, MobileSocialComponents $MobileSocialComponents)
    {
        $I->click($MobileSocialComponents->tablet);
        $I->selectOption($MobileSocialComponents->openInNewTab, '_self');
        $I->fillField($MobileSocialComponents->facebook, 'https://www.facebook.com/');
        $I->fillField($MobileSocialComponents->linkedIn, 'https://www.linkedin.com/');
        $I->fillField($MobileSocialComponents->youTube, 'https://www.youtube.com/');
        $I->click($MobileSocialComponents->addElement);
        $I->click($MobileSocialComponents->social);
        $I->wait(1);
        $I->click($MobileSocialComponents->publishButton);
        $I->wait(2);

        $I->amGoingTo('Check on the front end');
        $I->amOnPage('/');
        $I->resizeWindow(766, 1024);
        $I->seeElement($MobileSocialComponents->socialIcons);
        $I->click($MobileSocialComponents->facebookIcon);
        $I->see('facebook');
        $I->resizeWindow(375, 812);
        $I->amOnPage('/');
        $I->click($MobileSocialComponents->facebookIcon);
        $I->see('facebook');
        $I->amOnPage('/');
        $I->resizeWindow(1280, 950);

        $I->amGoingTo('Change the settings to new tab');
        $I->click($MobileSocialComponents->customizeButton);
        $I->scrollTo($MobileSocialComponents->headerButton);
        $I->click($MobileSocialComponents->headerButton);
        $I->scrollTo($MobileSocialComponents->mobileSocial);
        $I->click($MobileSocialComponents->mobileSocial);
        $I->wait(1);
        $I->selectOption($MobileSocialComponents->openInNewTab, '_blank');
        $I->click($MobileSocialComponents->publishButton);
        $I->wait(2);
        
        $I->amGoingTo('Check on the front end');
        $I->amOnPage('/');
        $I->resizeWindow(766, 1024);
        $I->seeElement($MobileSocialComponents->socialIcons);
        $I->click($MobileSocialComponents->facebookIcon);
        $I->switchToNextTab();
        $I->see('facebook');
        $I->switchToPreviousTab();
        $I->resizeWindow(375, 812);
        $I->amOnPage('/');
        $I->click($MobileSocialComponents->facebookIcon);
        $I->switchToNextTab();
        $I->see('facebook');
        $I->switchToPreviousTab();
        $I->amOnPage('/');
        $I->resizeWindow(1280, 950);
    }


    public function ColorAndSize(RespThemeTester $I, MobileSocialComponents $MobileSocialComponents)
    {
        $I->fillField($MobileSocialComponents->iconSize, '25');
        $I->click($MobileSocialComponents->iconColor);
        $I->click($MobileSocialComponents->iconColor1);
        $I->click($MobileSocialComponents->iconHoverColor);
        $I->click($MobileSocialComponents->iconHoverColor2);
        $I->click($MobileSocialComponents->backgroundColor);
        $I->click($MobileSocialComponents->backgroundColor2);
        $I->click($MobileSocialComponents->backgroundHoverColor);
        $I->click($MobileSocialComponents->backgroundHoverColor1);
        $I->click($MobileSocialComponents->borderColor);
        $I->click($MobileSocialComponents->borderColor3);
        $I->click($MobileSocialComponents->borderHoverColor);
        $I->click($MobileSocialComponents->borderHoverColor1);
        $I->selectOption($MobileSocialComponents->borderStyle, 'solid');
        $I->fillField($MobileSocialComponents->borderWidth, '2');
        $I->fillField($MobileSocialComponents->borderRadius, '8');
        $I->wait(2);
        $I->click($MobileSocialComponents->publishButton);
        $I->wait(2);

        $I->amGoingTo('Check on the front end in tablet view');
        $I->amOnPage('/');
        $I->resizeWindow(766, 1024);
        $MobileSocialComponents->_checkStyle($I, $MobileSocialComponents->facebookIcon, 'color', 'xpath', 'rgba(0, 0, 0, 1)');
        $MobileSocialComponents->_checkStyle($I, $MobileSocialComponents->facebookIcon, 'background-color', 'xpath', 'rgba(255, 255, 255, 1)');
        $MobileSocialComponents->_checkStyle($I, $MobileSocialComponents->facebookIcon, 'border', 'xpath', '2px solid rgb(221, 51, 51)');
        $MobileSocialComponents->_checkStyle($I, $MobileSocialComponents->facebookIcon, 'border-radius', 'xpath', '8px');
        $I->moveMouseOver($MobileSocialComponents->facebookIcon);
        $I->wait(3);
        $MobileSocialComponents->_checkStyle($I, $MobileSocialComponents->facebookIcon, 'color', 'xpath', 'rgba(255, 255, 255, 1)');
        $MobileSocialComponents->_checkStyle($I, $MobileSocialComponents->facebookIcon, 'background-color', 'xpath', 'rgba(0, 0, 0, 1)');
        $MobileSocialComponents->_checkStyle($I, $MobileSocialComponents->facebookIcon, 'border', 'xpath', '2px solid rgb(0, 0, 0)');
        $MobileSocialComponents->_checkStyle($I, $MobileSocialComponents->facebookIcon, 'border-radius', 'xpath', '8px');

        $I->amGoingTo('Check on the front end in mobile view');
        $I->amOnPage('/');
        $I->resizeWindow(375, 812);
        $MobileSocialComponents->_checkStyle($I, $MobileSocialComponents->facebookIcon, 'color', 'xpath', 'rgba(0, 0, 0, 1)');
        $MobileSocialComponents->_checkStyle($I, $MobileSocialComponents->facebookIcon, 'background-color', 'xpath', 'rgba(255, 255, 255, 1)');
        $MobileSocialComponents->_checkStyle($I, $MobileSocialComponents->facebookIcon, 'border', 'xpath', '2px solid rgb(221, 51, 51)');
        $MobileSocialComponents->_checkStyle($I, $MobileSocialComponents->facebookIcon, 'border-radius', 'xpath', '8px');
        $I->moveMouseOver($MobileSocialComponents->facebookIcon);
        $I->wait(3);
        $MobileSocialComponents->_checkStyle($I, $MobileSocialComponents->facebookIcon, 'color', 'xpath', 'rgba(255, 255, 255, 1)');
        $MobileSocialComponents->_checkStyle($I, $MobileSocialComponents->facebookIcon, 'background-color', 'xpath', 'rgba(0, 0, 0, 1)');
        $MobileSocialComponents->_checkStyle($I, $MobileSocialComponents->facebookIcon, 'border', 'xpath', '2px solid rgb(0, 0, 0)');
        $MobileSocialComponents->_checkStyle($I, $MobileSocialComponents->facebookIcon, 'border-radius', 'xpath', '8px');
        $I->resizeWindow(1280, 950);
    }
}
