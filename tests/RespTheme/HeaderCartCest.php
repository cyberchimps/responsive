<?php

use \page\RespTheme\LogInAndLogOut;
use \page\RespTheme\HeaderCartComponents;

class HeaderCartCest
{
    public function _before(RespThemeTester $I, LogInAndLogOut $LogInAndLogOut, HeaderCartComponents $HeaderCartComponents)
    {
        $I->amGoingTo('Login as Admin');
        $LogInAndLogOut->userLogin($I);
        $I->click($HeaderCartComponents->customizeButton);
        $I->wait(1);
        $I->scrollTo($HeaderCartComponents->headerButton);
        $I->wait(1);
        $I->click($HeaderCartComponents->headerButton);
        $I->wait(1);
        $I->scrollTo($HeaderCartComponents->headerCart);
        $I->wait(1);
        $I->click($HeaderCartComponents->headerCart);
        $I->wait(1);
    }

    // tests
    public function cartLabelAndIcon(RespThemeTester $I, HeaderCartComponents $HeaderCartComponents)
    {
        $I->amGoingTo('Check the default settings on the front end');
        $I->amOnPage('/');
        $I->see('My Cart');
        //$I->seeElement($HeaderCartComponents->cartButton);
        $I->expectTo('See button with Class '.$HeaderCartComponents->cartTotal);

        $I->click($HeaderCartComponents->customizeButton);
        $I->wait(1);
        $I->scrollTo($HeaderCartComponents->headerButton);
        $I->wait(1);
        $I->click($HeaderCartComponents->headerButton);
        $I->wait(1);
        $I->scrollTo($HeaderCartComponents->headerCart);
        $I->wait(1);
        $I->click($HeaderCartComponents->headerCart);
        $I->wait(1);
        $I->fillField($HeaderCartComponents->cartLabel, 'My Cart');
        $I->click($HeaderCartComponents->showCartTotal);
        $I->selectOption($HeaderCartComponents->cartIcon, 'shopping-bag');
        $I->wait(1);
        $I->click($HeaderCartComponents->publishButton);
        $I->wait(3);

        $I->amGoingTo('Check the default settings on the front end');
        $I->amOnPage('/');
        $I->see('My Cart');
        $I->seeElement($HeaderCartComponents->cartElement);
        $I->expectTo('See button with Version ');
    }

    public function cartClickAction(RespThemeTester $I, HeaderCartComponents $HeaderCartComponents)
    {
        $I->selectOption($HeaderCartComponents->cartClickAction, 'slide');
        $I->click($HeaderCartComponents->publishButton);
        $I->wait(3);
        $I->amGoingTo('Check the settings on the front end');
        $I->amOnPage('/');
        $I->wait(1);
        $I->click($HeaderCartComponents->cartButton);
        $I->wait(3);
        $I->seeElement($HeaderCartComponents->cartDrawer);
        $I->amOnPage('/');

        $I->click($HeaderCartComponents->customizeButton);
        $I->wait(1);
        $I->scrollTo($HeaderCartComponents->headerButton);
        $I->wait(1);
        $I->click($HeaderCartComponents->headerButton);
        $I->wait(1);
        $I->scrollTo($HeaderCartComponents->headerCart);
        $I->wait(1);
        $I->click($HeaderCartComponents->headerCart);
        $I->wait(1);
        $I->selectOption($HeaderCartComponents->cartClickAction, 'dropdown');
        $I->click($HeaderCartComponents->publishButton);
        $I->wait(3);
        $I->amGoingTo('Check the settings on the front end');
        $I->amOnPage('/');
        $I->wait(1);
        $I->seeElement($HeaderCartComponents->cart);
        $I->moveMouseOver($HeaderCartComponents->cart);
        $I->wait(2);
        $I->expectTo('See button with Class '.$HeaderCartComponents->dropDownAnimation);
    }

    public function testForColorAndSize(RespThemeTester $I, HeaderCartComponents $HeaderCartComponents)
    {
        $I->fillField($HeaderCartComponents->iconSize, '25');
        $I->click($HeaderCartComponents->cartColor);
        $I->click($HeaderCartComponents->cartColor1);
        $I->click($HeaderCartComponents->cartHoverColor);
        $I->click($HeaderCartComponents->cartHoverColor2);
        $I->click($HeaderCartComponents->backgroundColor);
        $I->click($HeaderCartComponents->backgroundColor4);
        $I->click($HeaderCartComponents->backgroundHoverColor);
        $I->click($HeaderCartComponents->backgroundHoverColor1);
        $I->click($HeaderCartComponents->cartTotalColor);
        $I->click($HeaderCartComponents->cartTotalColor7);
        $I->click($HeaderCartComponents->cartTotalHoverColor);
        $I->click($HeaderCartComponents->cartTotalHoverColor5);
        $I->click($HeaderCartComponents->cartTotBackColor);
        $I->click($HeaderCartComponents->cartTotBackColor3);
        $I->click($HeaderCartComponents->cartTotBackHoverColor);
        $I->click($HeaderCartComponents->cartTotBackHoverColor2);
        $I->wait(2);
        $I->click($HeaderCartComponents->publishButton);
        $I->wait(3);

        $I->amGoingTo('Check the settings on the front end');
        $I->amOnPage('/');
        $I->wait(2);
        $HeaderCartComponents->_checkStyle($I, $HeaderCartComponents->cartForColor, 'color', 'xpath', 'rgba(0, 0, 0, 1)');
        $HeaderCartComponents->_checkStyle($I, $HeaderCartComponents->cartForColor, 'background-color', 'xpath', 'rgba(221, 153, 51, 1)');
        $HeaderCartComponents->_checkStyle($I, $HeaderCartComponents->cartLabelColor, 'color', 'xpath', 'rgba(0, 0, 0, 1)');
        $HeaderCartComponents->_checkStyle($I, $HeaderCartComponents->cartLabelColor, 'background-color', 'xpath', 'rgba(0, 0, 0, 0)');
        $HeaderCartComponents->_checkStyle($I, $HeaderCartComponents->cartValueColor, 'color', 'xpath', 'rgba(0, 0, 0, 1)');
        $HeaderCartComponents->_checkStyle($I, $HeaderCartComponents->cartValueColor, 'background-color', 'xpath', 'rgba(0, 0, 0, 0)');
        $I->wait(1);
        $I->moveMouseOver($HeaderCartComponents->cartForColor);
        $I->wait(10);
        $HeaderCartComponents->_checkStyle($I, $HeaderCartComponents->cartForColor, 'color', 'xpath', 'rgba(255, 255, 255, 1)');
        $HeaderCartComponents->_checkStyle($I, $HeaderCartComponents->cartForColor, 'background-color', 'xpath', 'rgba(0, 0, 0, 1)');
        $HeaderCartComponents->_checkStyle($I, $HeaderCartComponents->cartLabelColor, 'color', 'xpath', 'rgba(255, 255, 255, 1)');
        $HeaderCartComponents->_checkStyle($I, $HeaderCartComponents->cartLabelColor, 'background-color', 'xpath', 'rgba(0, 0, 0, 0)');
        $HeaderCartComponents->_checkStyle($I, $HeaderCartComponents->cartValueColor, 'color', 'xpath', 'rgba(255, 255, 255, 1)');
        $HeaderCartComponents->_checkStyle($I, $HeaderCartComponents->cartValueColor, 'background-color', 'xpath', 'rgba(0, 0, 0, 0)');
    }
}
