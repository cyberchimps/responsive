<?php

use \page\RespTheme\Customizer;
use \page\RespTheme\LogInAndLogOut;
use \Page\RespTheme\HeaderHTMLComponents;
use \Facebook\WebDriver\Remote\RemoteWebDriver;
use \Facebook\WebDriver\WebDriverBy;
use \Facebook\WebDriver\WebDriverKeys;
use \page\RespTheme\CommonFunctionsPage;

class HeaderHTMLCest
{
    public function _before(RespThemeTester $I, LogInAndLogOut $loginAndLogout, Customizer $customizer, HeaderHTMLComponents $HeaderHTMLComponents)
    {
        $I->amGoingTo('Login as Admin');
        $loginAndLogout->userLogin($I);
        
        $I->click($HeaderHTMLComponents->customizeButton);
        $I->wait(1);
        $I->scrollTo($HeaderHTMLComponents->headerButton);
        $I->wait(1);
        $I->click($HeaderHTMLComponents->headerButton);
        $I->wait(1);
        $I->scrollTo($HeaderHTMLComponents->headerHtmlsection);
        $I->wait(1);
        $I->click($HeaderHTMLComponents->headerHtmlsection);
        $I->wait(1);
    }

    // tests
    public function HtmlContentandTypographyTest_Desktop(RespThemeTester $I, LogInAndLogOut $loginAndLogout, Customizer $customizer, HeaderHTMLComponents $HeaderHTMLComponents, CommonFunctionsPage $commonFunctionsPage)
    {
        $I->click($HeaderHTMLComponents->addMedia);
        $I->click($HeaderHTMLComponents->mediaLibrary);
        $I->wait(2);
        $I->switchToIFrame($HeaderHTMLComponents->iFrame);
        $I->fillField($HeaderHTMLComponents->fillText, 'Some Text');
        $I->wait(2);
        $I->switchToIFrame();
        $I->click($HeaderHTMLComponents->imageThumbnail);
        $I->fillField($HeaderHTMLComponents->altText, 'Image');
        $I->click($HeaderHTMLComponents->insertIntoPost);
        $I->wait(2);

        $I->selectOption($HeaderHTMLComponents->fontFamily, 'Alegreya');
        $I->selectOption($HeaderHTMLComponents->fontWeight, '800');
        $I->selectOption($HeaderHTMLComponents->fontStyle, 'italic');
        $I->selectOption($HeaderHTMLComponents->textTransform, 'uppercase');
        $I->fillField($HeaderHTMLComponents->fontSize, '2-3-4');
        $I->fillField($HeaderHTMLComponents->lineHeight, '4');
        $I->fillField($HeaderHTMLComponents->letterSpacing, '1.1');
        $I->click($HeaderHTMLComponents->publishButton);
        $I->wait(2);

        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(2);
        $I->see('Some Text');
        $I->seeElement($HeaderHTMLComponents->image);
        $commonFunctionsPage->_checkStyle($I, $HeaderHTMLComponents->Text, 'font-family', 'xpath', 'Alegreya, serif');
        $commonFunctionsPage->_checkStyle($I, $HeaderHTMLComponents->Text, 'font-weight', 'xpath', '800');
        $commonFunctionsPage->_checkStyle($I, $HeaderHTMLComponents->Text, 'font-style', 'xpath', 'italic');
        $commonFunctionsPage->_checkStyle($I, $HeaderHTMLComponents->Text, 'text-transform', 'xpath', 'uppercase');
        $commonFunctionsPage->_checkStyle($I, $HeaderHTMLComponents->Text, 'line-height', 'xpath', '64px');
        $commonFunctionsPage->_checkStyle($I, $HeaderHTMLComponents->Text, 'font-size', 'xpath', '16px');
    }
}
