<?php
use \page\RespTheme\LogInAndLogOut;
use \page\RespTheme\MobileCartComponents;

class MobileCartCest
{
    public function _before(RespThemeTester $I, LogInAndLogOut $loginAndLogout, MobileCartComponents $MobileCartComponents)
    {
        $I->amGoingTo('Login as Admin');
        $loginAndLogout->userLogin($I);
        $I->click($MobileCartComponents->customizebutton);
        $I->wait(1);
        $I->scrollTo($MobileCartComponents->headerbutton);
        $I->wait(1);
        $I->click($MobileCartComponents->headerbutton);
        $I->wait(1);
        $I->click($MobileCartComponents->mobileCart);
        $I->wait(1);
    }

    // tests
    public function LabelAndIconSettings(RespThemeTester $I, MobileCartComponents $MobileCartComponents)
    {
        $I->click($MobileCartComponents->tablet);
        $I->fillField($MobileCartComponents->cartLabel, 'My Cart');
        $I->selectOption($MobileCartComponents->cartIcon, 'shopping-bag');
        $I->click($MobileCartComponents->publishButton);
        $I->wait(2);

        $I->amGoingTo('Check on the front end on tablet view');
        $I->resizeWindow(766, 1024);
        $I->amOnPage('/');
        $I->wait(2);
        $I->see('My Cart');
        $I->seeElement($MobileCartComponents->cart);

        $I->amGoingTo('Check on the front end on mobile view');
        $I->resizeWindow(375, 812);
        $I->amOnPage('/');
        $I->see('My Cart');
        //$I->seeElement($MobileCartComponents->cart);
    }

    
    public function CartClickActionSettings(RespThemeTester $I, MobileCartComponents $MobileCartComponents)
    {
        $I->selectOption($MobileCartComponents->cartClickAction, 'slide');
        $I->click($MobileCartComponents->publishButton);
        $I->wait(2);

        $I->amGoingTo('Check on the front end on tablet view');
        $I->resizeWindow(766, 1024);
        $I->amOnPage('/');
        $I->click($MobileCartComponents->cartButton);
        $I->seeElement($MobileCartComponents->slide);
        $I->expectTo('See in the Class' .$MobileCartComponents->popupDrawerforSlide);

        $I->amGoingTo('Check on the front end on mobile view');
        $I->resizeWindow(375, 812);
        $I->amOnPage('/');
        $I->click($MobileCartComponents->cartButton);
        $I->seeElement($MobileCartComponents->slide);
        $I->expectTo('See in the Class' .$MobileCartComponents->popupDrawerforSlide);
    }

    
    public function IconSizeSettings(RespThemeTester $I, MobileCartComponents $MobileCartComponents)
    {
        $I->fillField($MobileCartComponents->iconSize, '30');
        $I->click($MobileCartComponents->publishButton);
        $I->wait(2);
        $I->amGoingTo('Check on the front end on tablet view');
        $I->amOnPage('/');
        $I->resizeWindow(766, 1024);
        $I->wait(2);
        $MobileCartComponents->_checkstyle($I, $MobileCartComponents->icon, 'font-size', 'xpath', '30px');

        $I->amGoingTo('Check on the front end on mobile view');
        $I->amOnPage('/');
        $I->resizeWindow(375, 812);
        $I->wait(2);
        $MobileCartComponents->_checkstyle($I, $MobileCartComponents->icon, 'font-size', 'xpath', '30px');
    }


    public function CartColorSettings(RespThemeTester $I, MobileCartComponents $MobileCartComponents)
    {
        $I->click($MobileCartComponents->cartColor);
        $I->click($MobileCartComponents->cartColor1);
        $I->click($MobileCartComponents->cartHoverColor);
        $I->click($MobileCartComponents->cartHoverColor3);
        $I->click($MobileCartComponents->bkgdColor);
        $I->click($MobileCartComponents->bkgdColor8);
        $I->click($MobileCartComponents->bkgdHoverColor);
        $I->click($MobileCartComponents->bkgdHoverColor4);
        $I->click($MobileCartComponents->cartTotalColor);
        $I->click($MobileCartComponents->cartTotalColor1);
        $I->click($MobileCartComponents->cartTotalHoverColor);
        $I->click($MobileCartComponents->cartTotalHoverColor2);
        $I->click($MobileCartComponents->cartTotalBkgdColor);
        $I->click($MobileCartComponents->cartTotalBkgdColor3);
        $I->click($MobileCartComponents->cartTotalBkgdHover);
        $I->click($MobileCartComponents->cartTotalBkgdHover1);
        $I->click($MobileCartComponents->publishButton);
        $I->wait(2);

        $I->amGoingTo('Check on the front end on tablet view');
        $I->amOnPage('/');
        $I->resizeWindow(766, 1024);
        $I->wait(2);
        $MobileCartComponents->_checkstyle($I, $MobileCartComponents->cartButton, 'color', 'xpath', 'rgba(0, 0, 0, 1)');
        $MobileCartComponents->_checkstyle($I, $MobileCartComponents->cartButton, 'background-color', 'xpath', 'rgba(130, 36, 227, 1)');
        $MobileCartComponents->_checkstyle($I, $MobileCartComponents->cartValue, 'color', 'xpath', 'rgba(0, 0, 0, 1)');
        $MobileCartComponents->_checkstyle($I, $MobileCartComponents->cartValue, 'background-color', 'xpath', 'rgba(221, 51, 51, 1)');
        $I->moveMouseOver($MobileCartComponents->cartButton);
        $I->wait(2);
        $MobileCartComponents->_checkstyle($I, $MobileCartComponents->cartButton, 'color', 'xpath', 'rgba(221, 51, 51, 1)');
        $MobileCartComponents->_checkstyle($I, $MobileCartComponents->cartButton, 'background-color', 'xpath', 'rgba(221, 153, 51, 1)');
        $I->moveMouseOver($MobileCartComponents->cartValue);
        $I->wait(2);
        $MobileCartComponents->_checkstyle($I, $MobileCartComponents->cartValue, 'color', 'xpath', 'rgba(255, 255, 255, 1)');
        $MobileCartComponents->_checkstyle($I, $MobileCartComponents->cartValue, 'background-color', 'xpath', 'rgba(0, 0, 0, 1)');

        $I->amGoingTo('Check on the front end on tablet view');
        $I->amOnPage('/');
        $I->resizeWindow(375, 812);
        $I->wait(2);
        $MobileCartComponents->_checkstyle($I, $MobileCartComponents->cartButton, 'color', 'xpath', 'rgba(0, 0, 0, 1)');
        $MobileCartComponents->_checkstyle($I, $MobileCartComponents->cartButton, 'background-color', 'xpath', 'rgba(130, 36, 227, 1)');
        $MobileCartComponents->_checkstyle($I, $MobileCartComponents->cartValue, 'color', 'xpath', 'rgba(0, 0, 0, 1)');
        $MobileCartComponents->_checkstyle($I, $MobileCartComponents->cartValue, 'background-color', 'xpath', 'rgba(221, 51, 51, 1)');
        $I->moveMouseOver($MobileCartComponents->cartButton);
        $I->wait(2);
        $MobileCartComponents->_checkstyle($I, $MobileCartComponents->cartButton, 'color', 'xpath', 'rgba(221, 51, 51, 1)');
        $MobileCartComponents->_checkstyle($I, $MobileCartComponents->cartButton, 'background-color', 'xpath', 'rgba(221, 153, 51, 1)');
        $I->moveMouseOver($MobileCartComponents->cartValue);
        $I->wait(2);
        $MobileCartComponents->_checkstyle($I, $MobileCartComponents->cartValue, 'color', 'xpath', 'rgba(255, 255, 255, 1)');
        $MobileCartComponents->_checkstyle($I, $MobileCartComponents->cartValue, 'background-color', 'xpath', 'rgba(0, 0, 0, 1)');
    }
}
