<?php
use \page\RespTheme\LogInAndLogOut;
use \page\RespTheme\FooterNavigationComponents;

class FooterNavigationCest
{
    public function _before(RespThemeTester $I, FooterNavigationComponents $FooterNavigationComponents, LogInAndLogOut $LogInAndLogOut)
    {
        $I->amGoingTo('Login as Admin');
        $LogInAndLogOut->userLogin($I);
        $I->click($FooterNavigationComponents->customizeButton);
        $I->wait(1);
        $I->scrollTo($FooterNavigationComponents->footerButton);
        $I->wait(1);
        $I->click($FooterNavigationComponents->footerButton);
        $I->click($FooterNavigationComponents->footerNavigation);
    }


    // tests
    public function AlignmentSettings(RespThemeTester $I, FooterNavigationComponents $FooterNavigationComponents)
    {
        $I->selectOption($FooterNavigationComponents->contentAlignDesk, 'left');
        $I->selectOption($FooterNavigationComponents->contentAlignTab, 'right');
        $I->selectOption($FooterNavigationComponents->contentAlignMob, 'center');
        $I->selectOption($FooterNavigationComponents->verticalAlignDesk, 'top');
        $I->selectOption($FooterNavigationComponents->verticalAlignTab, 'middle');
        $I->selectOption($FooterNavigationComponents->verticalAlignMob, 'bottom');
        $I->click($FooterNavigationComponents->stretchMenu);
        $I->click($FooterNavigationComponents->publishButton);
        $I->wait(3);
       
        $I->amGoingTo('Ckeck on the front end for Desktop view');
        $I->amOnPage('/');
        $I->seeElement($FooterNavigationComponents->alignment);
        $I->seeElement($FooterNavigationComponents->stretchlayout);
        $FooterNavigationComponents->_checkstyle($I, $FooterNavigationComponents->alignment, 'text-align', 'xpath', 'left');
        $FooterNavigationComponents->_checkstyle($I, $FooterNavigationComponents->alignment, 'align-items', 'xpath', 'flex-start');

        $I->amGoingTo('Check on frontend for tablet view');
        $I->resizeWindow(766, 1024);
        $I->amOnPage('/');
        $FooterNavigationComponents->_checkstyle($I, $FooterNavigationComponents->alignment, 'text-align', 'xpath', 'right');
        $FooterNavigationComponents->_checkstyle($I, $FooterNavigationComponents->alignment, 'align-items', 'xpath', 'center');

        $I->amGoingTo('Check the default settings on frontend for Mobile view');
        $I->resizeWindow(375, 812);
        $I->amOnPage('/');
        $FooterNavigationComponents->_checkstyle($I, $FooterNavigationComponents->alignment, 'text-align', 'xpath', 'center');
        $FooterNavigationComponents->_checkstyle($I, $FooterNavigationComponents->alignment, 'align-items', 'xpath', 'flex-end');
        $I->resizeWindow(1280, 950);

        $I->click($FooterNavigationComponents->customizeButton);
        $I->wait(1);
        $I->scrollTo($FooterNavigationComponents->footerButton);
        $I->wait(1);
        $I->click($FooterNavigationComponents->footerButton);
        $I->click($FooterNavigationComponents->footerNavigation);
        $I->amGoingTo('change the alignment settings');

        $I->selectOption($FooterNavigationComponents->contentAlignDesk, 'right');
        $I->selectOption($FooterNavigationComponents->contentAlignTab, 'center');
        $I->selectOption($FooterNavigationComponents->contentAlignMob, 'left');
        $I->selectOption($FooterNavigationComponents->verticalAlignDesk, 'bottom');
        $I->selectOption($FooterNavigationComponents->verticalAlignTab, 'top');
        $I->selectOption($FooterNavigationComponents->verticalAlignMob, 'middle');
        $I->click($FooterNavigationComponents->stretchMenu);
        $I->click($FooterNavigationComponents->publishButton);
        $I->wait(3);

        $I->amGoingTo('Ckeck on the front end for Desktop view');
        $I->amOnPage('/');
        $I->seeElement($FooterNavigationComponents->alignment);
        $I->seeElement($FooterNavigationComponents->stretchlayout);
        $FooterNavigationComponents->_checkstyle($I, $FooterNavigationComponents->alignment, 'text-align', 'xpath', 'right');
        $FooterNavigationComponents->_checkstyle($I, $FooterNavigationComponents->alignment, 'align-items', 'xpath', 'flex-end');

        $I->amGoingTo('Check on frontend for tablet view');
        $I->resizeWindow(766, 1024);
        $I->amOnPage('/');
        $FooterNavigationComponents->_checkstyle($I, $FooterNavigationComponents->alignment, 'text-align', 'xpath', 'center');
        $FooterNavigationComponents->_checkstyle($I, $FooterNavigationComponents->alignment, 'align-items', 'xpath', 'flex-start');

        $I->amGoingTo('Check the default settings on frontend for Mobile view');
        $I->resizeWindow(375, 812);
        $I->amOnPage('/');
        $FooterNavigationComponents->_checkstyle($I, $FooterNavigationComponents->alignment, 'text-align', 'xpath', 'left');
        $FooterNavigationComponents->_checkstyle($I, $FooterNavigationComponents->alignment, 'align-items', 'xpath', 'center');
        $I->resizeWindow(1280, 950);
    }


    public function SpacingAndPaddingSettings(RespThemeTester $I, FooterNavigationComponents $FooterNavigationComponents)
    {
        $I->fillField($FooterNavigationComponents->itemSpacing, '10');
        $I->fillField($FooterNavigationComponents->itemPadding, '15');
        $I->click($FooterNavigationComponents->publishButton);
        $I->wait(2);

        $I->amGoingTo('Check on frontend for Desktop view');
        $I->amOnPage('/');
        $FooterNavigationComponents->_checkstyle($I, $FooterNavigationComponents->typoSettings, 'padding', 'xpath', '10px 18px');

        $I->amGoingTo('Check on frontend for tablet view');
        $I->resizeWindow(766, 1024);
        $I->amOnPage('/');
        $FooterNavigationComponents->_checkstyle($I, $FooterNavigationComponents->typoSettings, 'padding', 'xpath', '10px 18px');

        $I->amGoingTo('Check on frontend for mobile view');
        $I->resizeWindow(375, 812);
        $I->amOnPage('/');
        $FooterNavigationComponents->_checkstyle($I, $FooterNavigationComponents->typoSettings, 'padding', 'xpath', '10px 18px');
        $I->resizeWindow(1280, 950);
    }


    public function TypographyOptions(RespThemeTester $I, FooterNavigationComponents $FooterNavigationComponents)
    {
        $I->selectOption($FooterNavigationComponents->fontFamily, 'Open Sans');
        $I->selectOption($FooterNavigationComponents->fontWeight, '800');
        $I->selectOption($FooterNavigationComponents->fontStyle, 'italic');
        $I->selectOption($FooterNavigationComponents->textTransform, 'capitalize');
        $I->fillField($FooterNavigationComponents->fontSize , '20 10 10');
        $I->fillField($FooterNavigationComponents->lineHeight , '3');
        $I->fillField($FooterNavigationComponents->letterSpacing , '3');
        $I->click($FooterNavigationComponents->publishButton);
        $I->wait(2);

        $I->amGoingTo('Check on frontend for Desktop view');
        $I->amOnPage('/');
        $FooterNavigationComponents->_checkstyle($I, $FooterNavigationComponents->typoSettings, 'font-family', 'xpath', '"Open Sans"');
        $FooterNavigationComponents->_checkstyle($I, $FooterNavigationComponents->typoSettings, 'font-weight', 'xpath', '800');
        $FooterNavigationComponents->_checkstyle($I, $FooterNavigationComponents->typoSettings, 'font-style', 'xpath', 'italic');
        $FooterNavigationComponents->_checkstyle($I, $FooterNavigationComponents->typoSettings, 'text-transform', 'xpath', 'capitalize');
        $FooterNavigationComponents->_checkstyle($I, $FooterNavigationComponents->typoSettings, 'font-size', 'xpath', '13px');
        $FooterNavigationComponents->_checkstyle($I, $FooterNavigationComponents->typoSettings, 'line-height', 'xpath', '39px');
        $FooterNavigationComponents->_checkstyle($I, $FooterNavigationComponents->typoSettings, 'line-spacing', 'xpath', '');

        $I->amGoingTo('Check on frontend for tablet view');
        $I->resizeWindow(766, 1024);
        $I->amOnPage('/');
        $FooterNavigationComponents->_checkstyle($I, $FooterNavigationComponents->typoSettings, 'font-family', 'xpath', '"Open Sans"');
        $FooterNavigationComponents->_checkstyle($I, $FooterNavigationComponents->typoSettings, 'font-weight', 'xpath', '800');
        $FooterNavigationComponents->_checkstyle($I, $FooterNavigationComponents->typoSettings, 'font-style', 'xpath', 'italic');
        $FooterNavigationComponents->_checkstyle($I, $FooterNavigationComponents->typoSettings, 'text-transform', 'xpath', 'capitalize');
        $FooterNavigationComponents->_checkstyle($I, $FooterNavigationComponents->typoSettings, 'font-size', 'xpath', '13px');
        $FooterNavigationComponents->_checkstyle($I, $FooterNavigationComponents->typoSettings, 'line-height', 'xpath', '39px');
        $FooterNavigationComponents->_checkstyle($I, $FooterNavigationComponents->typoSettings, 'line-spacing', 'xpath', '');

        $I->amGoingTo('Check on frontend for mobile view');
        $I->resizeWindow(375, 812);
        $I->amOnPage('/');
        $FooterNavigationComponents->_checkstyle($I, $FooterNavigationComponents->typoSettings, 'font-family', 'xpath', '"Open Sans"');
        $FooterNavigationComponents->_checkstyle($I, $FooterNavigationComponents->typoSettings, 'font-weight', 'xpath', '800');
        $FooterNavigationComponents->_checkstyle($I, $FooterNavigationComponents->typoSettings, 'font-style', 'xpath', 'italic');
        $FooterNavigationComponents->_checkstyle($I, $FooterNavigationComponents->typoSettings, 'text-transform', 'xpath', 'capitalize');
        $FooterNavigationComponents->_checkstyle($I, $FooterNavigationComponents->typoSettings, 'font-size', 'xpath', '13px');
        $FooterNavigationComponents->_checkstyle($I, $FooterNavigationComponents->typoSettings, 'line-height', 'xpath', '39px');
        $FooterNavigationComponents->_checkstyle($I, $FooterNavigationComponents->typoSettings, 'line-spacing', 'xpath', '');
        $I->resizeWindow(1280, 950);
    }
}
