<?php
use \page\RespTheme\LogInAndLogOut;
use \page\RespTheme\FooterHtmlComponents;

class FooterHtmlCest
{
    public function _before(RespThemeTester $I, LogInAndLogOut $loginAndLogout, FooterHtmlComponents $FooterHtmlComponents)
    {
        $I->amGoingTo('Login as Admin');
        $loginAndLogout->userLogin($I);
        $I->click($FooterHtmlComponents->customizebutton);
        $I->wait(1);
        $I->scrollTo($FooterHtmlComponents->footerButton);
        $I->wait(1);
        $I->click($FooterHtmlComponents->footerButton);
        $I->wait(1);
        $I->click($FooterHtmlComponents->footerHtmlSettings);
        $I->wait(1);
    }

    // tests
    public function HtmlAndText(RespThemeTester $I, FooterHtmlComponents $FooterHtmlComponents)
    {
        $I->click($FooterHtmlComponents->addImage);
        $I->click($FooterHtmlComponents->mediaLibrary);
        $I->wait(2);
        $I->click($FooterHtmlComponents->image);
        $I->click($FooterHtmlComponents->insertIntoPost);
        $I->wait(2);
        $I->click($FooterHtmlComponents->publishButton);
        $I->wait(2);
        $I->amGoingTo('Check on frontend for Desktop view');
        $I->amOnPage('/');
        $I->seeElement($FooterHtmlComponents->footerImg);

        $I->amGoingTo('Check on frontend for Tablet view');
        $I->resizeWindow(768, 1024);
        $I->amOnPage('/');
        $I->seeElement($FooterHtmlComponents->footerImg);

        $I->amGoingTo('Check on frontend for Tablet view');
        $I->resizeWindow(375, 812);
        $I->amOnPage('/');
        $I->seeElement($FooterHtmlComponents->footerImg);
    }


    public function StyleAndColor(RespThemeTester $I, FooterHtmlComponents $FooterHtmlComponents)
    {
        $I->selectOption($FooterHtmlComponents->linkStyle, 'normal');
        $I->click($FooterHtmlComponents->textColor);
        $I->click($FooterHtmlComponents->textColor1);
        $I->click($FooterHtmlComponents->linkColor);
        $I->click($FooterHtmlComponents->linkColor8);
        $I->click($FooterHtmlComponents->linkHoverColor);
        $I->click($FooterHtmlComponents->linkHoverColor1);
        $I->click($FooterHtmlComponents->publishButton);
        $I->wait(2);
        $I->amGoingTo('Check on frontend for Desktop view');
        $I->amOnPage('/');
        $FooterHtmlComponents->_checkstyle($I, $FooterHtmlComponents->link, 'text-decoration', 'xpath', 'underline solid rgb(130, 36, 227)');
        $I->moveMouseOver($FooterHtmlComponents->link);
        $FooterHtmlComponents->_checkstyle($I, $FooterHtmlComponents->link, 'text-decoration', 'xpath', 'underline solid rgb(0, 0, 0)');

        $I->amGoingTo('Check on frontend for Tablet view');
        $I->resizeWindow(768, 1024);
        $I->amOnPage('/');
        $FooterHtmlComponents->_checkstyle($I, $FooterHtmlComponents->link, 'text-decoration', 'xpath', 'underline solid rgb(130, 36, 227)');

        $I->amGoingTo('Check on frontend for Tablet view');
        $I->resizeWindow(375, 812);
        $I->amOnPage('/');
        $FooterHtmlComponents->_checkstyle($I, $FooterHtmlComponents->link, 'text-decoration', 'xpath', 'underline solid rgb(130, 36, 227)');
    }

    public function Alignment(RespThemeTester $I, FooterHtmlComponents $FooterHtmlComponents)
    {
        $I->selectOption($FooterHtmlComponents->contentAlignDesk, 'center');
        $I->selectOption($FooterHtmlComponents->contentAlignTab, 'center');
        $I->selectOption($FooterHtmlComponents->contentAlignMob, 'center');
        $I->selectOption($FooterHtmlComponents->verticalAlignDesk, 'top');
        $I->selectOption($FooterHtmlComponents->verticalAlignTab, 'top');
        $I->selectOption($FooterHtmlComponents->verticalAlignMob, 'top');
        $I->click($FooterHtmlComponents->publishButton);
        $I->wait(2);
        $I->amGoingTo('Check on frontend for Desktop view');
        $I->amOnPage('/');
        $FooterHtmlComponents->_checkstyle($I, $FooterHtmlComponents->AlignSettings, 'text-align', 'xpath', 'center');
        $FooterHtmlComponents->_checkstyle($I, $FooterHtmlComponents->AlignSettings, 'align-items', 'xpath', 'flex-start');
        $I->amGoingTo('Check on frontend for Tablet view');
        $I->resizeWindow(768, 1024);
        $I->amOnPage('/');
        $FooterHtmlComponents->_checkstyle($I, $FooterHtmlComponents->AlignSettings, 'text-align', 'xpath', 'center');
        $FooterHtmlComponents->_checkstyle($I, $FooterHtmlComponents->AlignSettings, 'align-items', 'xpath', 'flex-start');
        $I->amGoingTo('Check on frontend for Tablet view');
        $I->resizeWindow(375, 812);
        $I->amOnPage('/');
        $FooterHtmlComponents->_checkstyle($I, $FooterHtmlComponents->AlignSettings, 'text-align', 'xpath', 'center');
        $FooterHtmlComponents->_checkstyle($I, $FooterHtmlComponents->AlignSettings, 'align-items', 'xpath', 'flex-start');

        $I->resizeWindow(1280, 950);
        $I->click($FooterHtmlComponents->customizebutton);
        $I->scrollTo($FooterHtmlComponents->footerButton);
        $I->click($FooterHtmlComponents->footerButton);
        $I->click($FooterHtmlComponents->footerHtmlSettings);
        $I->selectOption($FooterHtmlComponents->contentAlignDesk, 'right');
        $I->selectOption($FooterHtmlComponents->contentAlignTab, 'right');
        $I->selectOption($FooterHtmlComponents->contentAlignMob, 'right');
        $I->selectOption($FooterHtmlComponents->verticalAlignDesk, 'bottom');
        $I->selectOption($FooterHtmlComponents->verticalAlignTab, 'bottom');
        $I->selectOption($FooterHtmlComponents->verticalAlignMob, 'bottom');
        $I->click($FooterHtmlComponents->publishButton);
        $I->wait(2);
        $I->amGoingTo('Check on frontend for Desktop view');
        $I->amOnPage('/');
        $FooterHtmlComponents->_checkstyle($I, $FooterHtmlComponents->AlignSettings, 'text-align', 'xpath', 'right');
        $FooterHtmlComponents->_checkstyle($I, $FooterHtmlComponents->AlignSettings, 'align-items', 'xpath', 'flex-end');
        $I->amGoingTo('Check on frontend for Tablet view');
        $I->resizeWindow(768, 1024);
        $I->amOnPage('/');
        $FooterHtmlComponents->_checkstyle($I, $FooterHtmlComponents->AlignSettings, 'text-align', 'xpath', 'right');
        $FooterHtmlComponents->_checkstyle($I, $FooterHtmlComponents->AlignSettings, 'align-items', 'xpath', 'flex-end');
        $I->amGoingTo('Check on frontend for Mobile view');
        $I->resizeWindow(375, 812);
        $I->amOnPage('/');
        $FooterHtmlComponents->_checkstyle($I, $FooterHtmlComponents->AlignSettings, 'text-align', 'xpath', 'right');
        $FooterHtmlComponents->_checkstyle($I, $FooterHtmlComponents->AlignSettings, 'align-items', 'xpath', 'flex-end');
    }


    public function Margin(RespThemeTester $I, FooterHtmlComponents $FooterHtmlComponents)
    {
        $I->fillField($FooterHtmlComponents->marginInputDesk, '20');
        $I->click($FooterHtmlComponents->marginDesk);
        $I->click($FooterHtmlComponents->marginTab);
        $I->fillField($FooterHtmlComponents->marginInputTab, '15');
        $I->click($FooterHtmlComponents->marginMob);
        $I->fillField($FooterHtmlComponents->marginInputMob, '15');
        $I->click($FooterHtmlComponents->publishButton);
        $I->wait(2);
        $I->amGoingTo('Check on frontend for Desktop view');
        $I->amOnPage('/');
        $FooterHtmlComponents->_checkstyle($I, $FooterHtmlComponents->margin, 'margin', 'xpath', '20px');
        $I->amGoingTo('Check on frontend for Tablet view');
        $I->resizeWindow(768, 1024);
        $I->amOnPage('/');
        $FooterHtmlComponents->_checkstyle($I, $FooterHtmlComponents->margin, 'margin', 'xpath', '15px');
        $I->amGoingTo('Check on frontend for Mobile view');
        $I->resizeWindow(375, 812);
        $I->amOnPage('/');
        $FooterHtmlComponents->_checkstyle($I, $FooterHtmlComponents->margin, 'margin', 'xpath', '15px');
    }


    public function TypographyOptions(RespThemeTester $I, FooterHtmlComponents $FooterHtmlComponents)
    {
        $I->selectOption($FooterHtmlComponents->fontFamily, 'Georgia');
        $I->selectOption($FooterHtmlComponents->fontWeight, '700');
        $I->selectOption($FooterHtmlComponents->fontStyle, 'italic');
        $I->selectOption($FooterHtmlComponents->textTransform, 'capitalize');
        $I->fillField($FooterHtmlComponents->fontSize , '20 10 10');
        $I->fillField($FooterHtmlComponents->lineHeight , '3');
        $I->fillField($FooterHtmlComponents->letterSpacing , '3');
        $I->click($FooterHtmlComponents->publishButton);
        $I->wait(2);
        $I->amGoingTo('Check on frontend for Desktop view');
        $I->amOnPage('/');
        $FooterHtmlComponents->_checkstyle($I, $FooterHtmlComponents->TypoSettings, 'font-family', 'xpath', 'Georgia');
        $FooterHtmlComponents->_checkstyle($I, $FooterHtmlComponents->TypoSettings, 'font-weight', 'xpath', '700');
        $FooterHtmlComponents->_checkstyle($I, $FooterHtmlComponents->TypoSettings, 'font-style', 'xpath', 'italic');
        $FooterHtmlComponents->_checkstyle($I, $FooterHtmlComponents->TypoSettings, 'text-transform', 'xpath', 'capitalize');
        $FooterHtmlComponents->_checkstyle($I, $FooterHtmlComponents->TypoSettings, 'font-size', 'xpath', '13px');
        $FooterHtmlComponents->_checkstyle($I, $FooterHtmlComponents->TypoSettings, 'line-height', 'xpath', '39px');
        $FooterHtmlComponents->_checkstyle($I, $FooterHtmlComponents->TypoSettings, 'line-spacing', 'xpath', '');

        $I->amGoingTo('Check on frontend for Tablet view');
        $I->resizeWindow(768, 1024);
        $I->amOnPage('/');
        $FooterHtmlComponents->_checkstyle($I, $FooterHtmlComponents->TypoSettings, 'font-family', 'xpath', 'Georgia');
        $FooterHtmlComponents->_checkstyle($I, $FooterHtmlComponents->TypoSettings, 'font-weight', 'xpath', '700');
        $FooterHtmlComponents->_checkstyle($I, $FooterHtmlComponents->TypoSettings, 'font-style', 'xpath', 'italic');
        $FooterHtmlComponents->_checkstyle($I, $FooterHtmlComponents->TypoSettings, 'text-transform', 'xpath', 'capitalize');
        $FooterHtmlComponents->_checkstyle($I, $FooterHtmlComponents->TypoSettings, 'font-size', 'xpath', '13px');
        $FooterHtmlComponents->_checkstyle($I, $FooterHtmlComponents->TypoSettings, 'line-height', 'xpath', '39px');
        $FooterHtmlComponents->_checkstyle($I, $FooterHtmlComponents->TypoSettings, 'line-spacing', 'xpath', '');

        $I->amGoingTo('Check on frontend for Mobile view');
        $I->resizeWindow(375, 812);
        $I->amOnPage('/');
        $FooterHtmlComponents->_checkstyle($I, $FooterHtmlComponents->TypoSettings, 'font-family', 'xpath', 'Georgia');
        $FooterHtmlComponents->_checkstyle($I, $FooterHtmlComponents->TypoSettings, 'font-weight', 'xpath', '700');
        $FooterHtmlComponents->_checkstyle($I, $FooterHtmlComponents->TypoSettings, 'font-style', 'xpath', 'italic');
        $FooterHtmlComponents->_checkstyle($I, $FooterHtmlComponents->TypoSettings, 'text-transform', 'xpath', 'capitalize');
        $FooterHtmlComponents->_checkstyle($I, $FooterHtmlComponents->TypoSettings, 'font-size', 'xpath', '13px');
        $FooterHtmlComponents->_checkstyle($I, $FooterHtmlComponents->TypoSettings, 'line-height', 'xpath', '39px');
        $FooterHtmlComponents->_checkstyle($I, $FooterHtmlComponents->TypoSettings, 'line-spacing', 'xpath', '');
    }
}
