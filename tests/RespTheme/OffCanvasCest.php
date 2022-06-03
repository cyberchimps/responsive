<?php
use \page\RespTheme\LogInAndLogOut;
use \page\RespTheme\OffCanvasComponents;

class OffCanvasCest
{
    public function _before(RespThemeTester $I, LogInAndLogOut $LogInAndLogOut, OffCanvasComponents $OffCanvasComponents)
    {
        $I->amGoingTo('Login as Admin');
        $LogInAndLogOut->userLogin($I);
        $I->click($OffCanvasComponents->customizebutton);
        $I->wait(2);
        $I->scrollTo($OffCanvasComponents->headerbutton);
        $I->wait(2);
        $I->click($OffCanvasComponents->headerbutton);
        $I->wait(2);
        $I->click($OffCanvasComponents->offCanvas);
        $I->wait(1);
    }

    // tests
    public function Breakpoint(RespThemeTester $I, OffCanvasComponents $OffCanvasComponents)
    {
        $I->click($OffCanvasComponents->tablet);
        $I->fillField($OffCanvasComponents->breakpoint, '800');
        $I->click($OffCanvasComponents->publishbutton);
        $I->wait(2);
        $I->amGoingTo('Check on the front end');
        $I->amOnPage('/');
        $I->wait(2);
       
        $I->resizeWindow(813, 1024);
        $I->wait(1);
        $I->dontSeeElement($OffCanvasComponents->MenuButtonTablet);
        
        $I->resizeWindow(766, 1024);
        $I->wait(1);
        $I->seeElement($OffCanvasComponents->MenuButtonTablet);
        
    }

    public function DrawerLayout(RespThemeTester $I, OffCanvasComponents $OffCanvasComponents)
    {
        $I->click($OffCanvasComponents->tablet);
        $I->selectOption($OffCanvasComponents->drawerLayout, 'sidepanel');
        $I->wait(1);
        $I->selectOption($OffCanvasComponents->sidepanelPopup, 'right');
        $I->click($OffCanvasComponents->publishbutton);
        $I->wait(2);
        $I->amOnPage('/');
        $I->wait(2);
        $I->resizeWindow(766, 1024);
        $I->click($OffCanvasComponents->MenuButtonTablet);
        $I->wait(1);
        $I->seeElement($OffCanvasComponents->sidepanelDrawerPopup);

        $I->amOnPage('/');
        $I->click($OffCanvasComponents->customizebutton);
        $I->wait(2);
        $I->scrollTo($OffCanvasComponents->headerbutton);
        $I->wait(2);
        $I->click($OffCanvasComponents->headerbutton);
        $I->wait(2);
        $I->click($OffCanvasComponents->offCanvas);
        $I->wait(1);
        $I->selectOption($OffCanvasComponents->sidepanelPopup, 'left');
        $I->click($OffCanvasComponents->publishbutton);
        $I->wait(2);
        $I->amOnPage('/');
        $I->wait(2);
        $I->resizeWindow(766, 1024);
        $I->click($OffCanvasComponents->MenuButtonTablet);
        $I->wait(1);
        $I->seeElement($OffCanvasComponents->sidepanelDrawerPopup);
        $I->amOnPage('/');

        $I->click($OffCanvasComponents->customizebutton);
        $I->wait(2);
        $I->scrollTo($OffCanvasComponents->headerbutton);
        $I->wait(2);
        $I->click($OffCanvasComponents->headerbutton);
        $I->wait(2);
        $I->click($OffCanvasComponents->offCanvas);
        $I->wait(1);
        $I->selectOption($OffCanvasComponents->drawerLayout, 'fullwidth');
        $I->wait(1);
        $I->selectOption($OffCanvasComponents->fullwidthAnimation , 'fade');
        $I->click($OffCanvasComponents->publishbutton);
        $I->wait(2);
        $I->amOnPage('/');
        $I->wait(2);
        $I->resizeWindow(766, 1024);
        $I->click($OffCanvasComponents->MenuButtonTablet);
        $I->wait(1);
        $I->seeElement($OffCanvasComponents->sidepanelDrawerPopup);
    }

    public function ContentAlignment(RespThemeTester $I, OffCanvasComponents $OffCanvasComponents)
    {
        $I->click($OffCanvasComponents->tablet);
        $I->selectOption($OffCanvasComponents->contentAlignment, 'left');
        $I->selectOption($OffCanvasComponents->contentVerticalAlignment, 'top');
        $I->click($OffCanvasComponents->publishbutton);
        $I->wait(2);
        $I->amOnPage('/');
        $I->wait(2);
        $I->resizeWindow(766, 1024);
        $I->click($OffCanvasComponents->MenuButtonTablet);
        $I->wait(1);
        $I->seeElement($OffCanvasComponents->alignment);

        $I->amOnPage('/');
        $I->click($OffCanvasComponents->customizebutton);
        $I->wait(2);
        $I->scrollTo($OffCanvasComponents->headerbutton);
        $I->wait(2);
        $I->click($OffCanvasComponents->headerbutton);
        $I->wait(2);
        $I->click($OffCanvasComponents->offCanvas);
        $I->wait(1);
        $I->selectOption($OffCanvasComponents->contentAlignment, 'center');
        $I->selectOption($OffCanvasComponents->contentVerticalAlignment, 'middle');
        $I->click($OffCanvasComponents->publishbutton);
        $I->wait(2);
        $I->amOnPage('/');
        $I->wait(2);
        $I->resizeWindow(766, 1024);
        $I->click($OffCanvasComponents->MenuButtonTablet);
        $I->wait(1);
        $I->seeElement($OffCanvasComponents->alignment);

        $I->amOnPage('/');
        $I->click($OffCanvasComponents->customizebutton);
        $I->wait(2);
        $I->scrollTo($OffCanvasComponents->headerbutton);
        $I->wait(2);
        $I->click($OffCanvasComponents->headerbutton);
        $I->wait(2);
        $I->click($OffCanvasComponents->offCanvas);
        $I->wait(1);
        $I->selectOption($OffCanvasComponents->contentAlignment, 'right');
        $I->selectOption($OffCanvasComponents->contentVerticalAlignment, 'bottom');
        $I->click($OffCanvasComponents->publishbutton);
        $I->wait(2);
        $I->amOnPage('/');
        $I->wait(2);
        $I->resizeWindow(766, 1024);
        $I->click($OffCanvasComponents->MenuButtonTablet);
        $I->wait(1);
        $I->seeElement($OffCanvasComponents->alignment);
    }

    public function iconSize(RespThemeTester $I, OffCanvasComponents $OffCanvasComponents)
    {
        $I->click($OffCanvasComponents->tablet);
        $I->fillField($OffCanvasComponents->iconSize, '35');
        $I->click($OffCanvasComponents->publishbutton);
        $I->wait(2);
        $I->amOnPage('/');
        $I->wait(2);
        $I->resizeWindow(766, 1024);
        $I->click($OffCanvasComponents->MenuButtonTablet);
        $I->wait(1);
        $OffCanvasComponents->_checkStyle($I, $OffCanvasComponents->closeIconButton, 'font-size', 'xpath', '35px');
    }

    public function ColorComponentsAndPadding(RespThemeTester $I, OffCanvasComponents $OffCanvasComponents)
    {
        $I->amGoingTo('Check for Tablet');
        $I->click($OffCanvasComponents->tablet);
        $I->click($OffCanvasComponents->drawerTabletColor);
        $I->click($OffCanvasComponents->drawerTabletColor5);
        $I->click($OffCanvasComponents->closeToggleColor);
        $I->click($OffCanvasComponents->closeToggleColor1);
        $I->click($OffCanvasComponents->closeToggleHover);
        $I->click($OffCanvasComponents->closeToggleHover2);
        $I->click($OffCanvasComponents->closeToggleBkg);
        $I->click($OffCanvasComponents->closeToggleBkg8);
        $I->click($OffCanvasComponents->closeToggleBkgHover);
        $I->click($OffCanvasComponents->closeToggleBkgHover6);
        $I->fillField($OffCanvasComponents->paddingInputTab, '8');
        $I->click($OffCanvasComponents->publishbutton);
        $I->wait(3);

        $I->amGoingTo('Check on the front end');
        $I->amOnPage('/');
        $I->wait(2);
        $I->resizeWindow(766, 1024);
        $I->click($OffCanvasComponents->MenuButtonTablet);
        $I->wait(1);
        $OffCanvasComponents->_checkStyle($I, $OffCanvasComponents->checkDrawerBkgColorTab, 'backgorund-color', 'xpath', '');
        $OffCanvasComponents->_checkStyle($I, $OffCanvasComponents->closeIconButton, 'color', 'xpath', 'rgba(0, 0, 0, 1)');
        $OffCanvasComponents->_checkStyle($I, $OffCanvasComponents->closeIconButton, 'backgorund-color', 'xpath', '');
        $OffCanvasComponents->_checkStyle($I, $OffCanvasComponents->closeIconButton, 'padding', 'xpath', '8px');
        $I->moveMouseOver($OffCanvasComponents->closeIconButton);
        $OffCanvasComponents->_checkStyle($I, $OffCanvasComponents->closeIconButton, 'color', 'xpath', 'rgba(255, 255, 255, 1)');
        $OffCanvasComponents->_checkStyle($I, $OffCanvasComponents->closeIconButton, 'backgorund-color', 'xpath', '');
        $I->resizeWindow(1480,880);

        $I->amGoingTo('Check for mobile');
        $I->amOnPage('/');
        $I->click($OffCanvasComponents->customizebutton);
        $I->wait(2);
        $I->scrollTo($OffCanvasComponents->headerbutton);
        $I->wait(2);
        $I->click($OffCanvasComponents->headerbutton);
        $I->wait(2);
        $I->click($OffCanvasComponents->offCanvas);
        $I->wait(1);
        $I->click($OffCanvasComponents->mobile);
        $I->click($OffCanvasComponents->drawerMobileColor);
        $I->click($OffCanvasComponents->drawerMobileColor3);
        $I->click($OffCanvasComponents->mobileMenuPadding);
        $I->fillField($OffCanvasComponents->paddingInputMobile, '8');
        $I->click($OffCanvasComponents->publishbutton);
        $I->wait(3);
        $I->amGoingTo('Check on the front end');
        $I->amOnPage('/');
        $I->wait(2);
        $I->resizeWindow(390, 1024);
        $I->click($OffCanvasComponents->MenuButtonTablet);
        $I->wait(1);
        $OffCanvasComponents->_checkStyle($I, $OffCanvasComponents->checkDrawerBkgColorTab, 'backgorund-color', 'xpath', '');
        $OffCanvasComponents->_checkStyle($I, $OffCanvasComponents->closeIconButton, 'padding', 'xpath', '8px');
    }
}
