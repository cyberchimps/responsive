<?php
use \page\RespTheme\LogInAndLogOut;
use \page\RespTheme\MobileHtmlComponents;

class MobileHtmlCest
{
    public function _before(RespThemeTester $I, MobileHtmlComponents $MobileHtmlComponents, LogInAndLogOut $LogInAndLogOut)
    {
        $I->amGoingTo('Login as Admin');
        $LogInAndLogOut->userLogin($I);
        $I->click($MobileHtmlComponents->customizeButton);
        $I->wait(1);
        $I->scrollTo($MobileHtmlComponents->headerButton);
        $I->wait(1);
        $I->click($MobileHtmlComponents->headerButton);
        $I->click($MobileHtmlComponents->mobileHtmlAndText);
    }

    

    // tests
    public function MobileHtmlContent(RespThemeTester $I, MobileHtmlComponents $MobileHtmlComponents)
    {
        $I->click($MobileHtmlComponents->tablet);
        $I->wait(1);
        $I->switchToIFrame($MobileHtmlComponents->iFrame);
        $I->wait(1);
        $I->fillField($MobileHtmlComponents->htmlText, 'Hello World');
        $I->wait(1);
        $I->switchToIFrame();
        $I->click($MobileHtmlComponents->publishButton);
        $I->wait(2);

        $I->amGoingTo('Ckeck on the front end for tablet view');
        $I->resizeWindow(766, 1024);
        $I->amOnPage('/');
        $I->see('Hello World');
        $I->seeElement($MobileHtmlComponents->htmlelement);

        $I->amGoingTo('Check the default settings on frontend for Mobile view');
        $I->resizeWindow(375, 812);
        $I->amOnPage('/');
        $I->see('Hello World');
        $I->seeElement($MobileHtmlComponents->htmlelement);
    }


    public function TypographyOptions(RespThemeTester $I, MobileHtmlComponents $MobileHtmlComponents)
    {
        $I->click($MobileHtmlComponents->tablet);
        $I->selectOption($MobileHtmlComponents->fontFamily, 'Open Sans');
        $I->selectOption($MobileHtmlComponents->fontWeight, '800');
        $I->selectOption($MobileHtmlComponents->fontStyle, 'italic');
        $I->selectOption($MobileHtmlComponents->textTransform, 'capitalize');
        $I->fillField($MobileHtmlComponents->fontSize , '20 10 10');
        $I->fillField($MobileHtmlComponents->lineHeight , '3');
        $I->fillField($MobileHtmlComponents->letterSpacing , '3');
        $I->click($MobileHtmlComponents->publishButton);
        $I->wait(2);
        $I->amGoingTo('Check on frontend for tablet view');
        $I->resizeWindow(766, 1024);
        $I->amOnPage('/');
        $MobileHtmlComponents->_checkstyle($I, $MobileHtmlComponents->TypoSettings, 'font-family', 'xpath', '"Open Sans"');
        $MobileHtmlComponents->_checkstyle($I, $MobileHtmlComponents->TypoSettings, 'font-weight', 'xpath', '800');
        $MobileHtmlComponents->_checkstyle($I, $MobileHtmlComponents->TypoSettings, 'font-style', 'xpath', 'italic');
        $MobileHtmlComponents->_checkstyle($I, $MobileHtmlComponents->TypoSettings, 'text-transform', 'xpath', 'capitalize');
        $MobileHtmlComponents->_checkstyle($I, $MobileHtmlComponents->TypoSettings, 'font-size', 'xpath', '16px');
        $MobileHtmlComponents->_checkstyle($I, $MobileHtmlComponents->TypoSettings, 'line-height', 'xpath', '48px');
        $MobileHtmlComponents->_checkstyle($I, $MobileHtmlComponents->TypoSettings, 'line-spacing', 'xpath', '');

        $I->amGoingTo('Check the default settings on frontend for Mobile view');
        $I->resizeWindow(375, 812);
        $I->amOnPage('/');
        $MobileHtmlComponents->_checkstyle($I, $MobileHtmlComponents->TypoSettings, 'font-family', 'xpath', '"Open Sans"');
        $MobileHtmlComponents->_checkstyle($I, $MobileHtmlComponents->TypoSettings, 'font-weight', 'xpath', '800');
        $MobileHtmlComponents->_checkstyle($I, $MobileHtmlComponents->TypoSettings, 'font-style', 'xpath', 'italic');
        $MobileHtmlComponents->_checkstyle($I, $MobileHtmlComponents->TypoSettings, 'text-transform', 'xpath', 'capitalize');
        $MobileHtmlComponents->_checkstyle($I, $MobileHtmlComponents->TypoSettings, 'font-size', 'xpath', '16px');
        $MobileHtmlComponents->_checkstyle($I, $MobileHtmlComponents->TypoSettings, 'line-height', 'xpath', '48px');
        $MobileHtmlComponents->_checkstyle($I, $MobileHtmlComponents->TypoSettings, 'line-spacing', 'xpath', '');
    }
}
