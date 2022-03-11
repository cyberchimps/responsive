<?php

use \page\RespTheme\LogInAndLogOut;
use \Page\RespTheme\triggerComponents;

class triggerCest
{
    public function _before(RespThemeTester $I, LogInAndLogOut $loginAndLogout, triggerComponents $triggerComponents)
    {
        $I->amGoingTo('Login as Admin');
        $loginAndLogout->userLogin($I);
        $I->click($triggerComponents->customizeButton);
        $I->wait(1);
        $I->scrollTo($triggerComponents->headerButton);
        $I->wait(1);
        $I->click($triggerComponents->headerButton);
        $I->wait(1);
        $I->scrollTo($triggerComponents->triggerSection);
        $I->wait(1);
        $I->click($triggerComponents->triggerSection);
        $I->wait(1);
    }

    // tests
    public function triggerSettings_Tablet(RespThemeTester $I, triggerComponents $triggerComponents)
    {
        $I->click($triggerComponents->tablet);
        $I->selectOption($triggerComponents->triggerStyle, 'default');
        $I->wait(1);
        $I->selectOption($triggerComponents->triggerIcon, 'menu3');
        $I->fillField($triggerComponents->triggerLabel, 'Menu');
        $I->wait(1);
        $I->fillField($triggerComponents->iconSize, '20');
        $I->wait(1);
        $I->click($triggerComponents->triggerColor);
        $I->click($triggerComponents->triggerColor2);
        $I->wait(1);
        $I->click($triggerComponents->triggerHoverColor);
        $I->click($triggerComponents->triggerHoverColor1);
        $I->wait(1);
        $I->click($triggerComponents->navigationColor);
        $I->click($triggerComponents->navigationColor1);
        $I->wait(1);
        $I->click($triggerComponents->navigationHoverColor);
        $I->click($triggerComponents->navigationHoverColor2);
        $I->wait(2);
        $I->click($triggerComponents->publishButton);
        $I->wait(2);

        $I->amGoingTo('Check the settings on the front end');
        $I->amOnPage('/');
        $I->resizeWindow(766, 1024);
        $I->wait(2);
        $I->seeElement($triggerComponents->triggerButton);
        $I->expectTo('See button with Class '.$triggerComponents->menuToggleStyleDefault);
        $I->seeElement($triggerComponents->triggerSpan);
        $I->expectTo('See button with Class '.$triggerComponents->menuToggleIcon);
        $I->wait(2);
        $I->see('Menu');
        $triggerComponents->_checkStyle($I, $triggerComponents->triggerSpan, 'font-size', 'xpath', '20px');
        $triggerComponents->_checkStyle($I, $triggerComponents->triggerButton, 'color', 'xpath', 'rgba(255, 255, 255, 1)');
        $triggerComponents->_checkStyle($I, $triggerComponents->triggerButton, 'background-color', 'xpath', 'rgba(0, 0, 0, 1)');
        $I->resizeWindow(1280,950);
    }

    public function triggerSettings_Mobile(RespThemeTester $I, triggerComponents $triggerComponents)
    {
        $I->click($triggerComponents->mobile);
        $I->selectOption($triggerComponents->triggerStyle, 'default');
        $I->wait(1);
        $I->selectOption($triggerComponents->triggerIcon, 'menu3');
        $I->fillField($triggerComponents->triggerLabel, 'Menu');
        $I->wait(1);
        $I->fillField($triggerComponents->iconSize, '15');
        $I->wait(1);
        $I->click($triggerComponents->triggerColor);
        $I->click($triggerComponents->triggerColor2);
        $I->wait(1);
        $I->click($triggerComponents->triggerHoverColor);
        $I->click($triggerComponents->triggerHoverColor1);
        $I->wait(1);
        $I->click($triggerComponents->navigationColor);
        $I->click($triggerComponents->navigationColor1);
        $I->wait(1);
        $I->click($triggerComponents->navigationHoverColor);
        $I->click($triggerComponents->navigationHoverColor2);
        $I->wait(2);
        $I->click($triggerComponents->publishButton);
        $I->wait(2);

        $I->amGoingTo('Check the settings on the front end');
        $I->amOnPage('/');
        $I->resizeWindow(390, 844);
        $I->wait(2);
        $I->seeElement($triggerComponents->triggerButton);
        $I->expectTo('See button with Class '.$triggerComponents->menuToggleStyleDefault);
        $I->seeElement($triggerComponents->triggerSpan);
        $I->expectTo('See button with Class '.$triggerComponents->menuToggleIcon);
        $I->wait(2);
        $I->see('Menu');
        $triggerComponents->_checkStyle($I, $triggerComponents->triggerSpan, 'font-size', 'xpath', '15px');
        $triggerComponents->_checkStyle($I, $triggerComponents->triggerButton, 'color', 'xpath', 'rgba(255, 255, 255, 1)');
        $triggerComponents->_checkStyle($I, $triggerComponents->triggerButton, 'background-color', 'xpath', 'rgba(0, 0, 0, 1)');
        $I->resizeWindow(1280,950);
   }
}
