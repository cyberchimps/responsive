<?php
use \page\RespTheme\LogInAndLogOut;
use \page\RespTheme\FooterSocialComponents;

class FooterSocialCest
{
    public function _before(RespThemeTester $I, FooterSocialComponents $FooterSocialComponents, LogInAndLogOut $LogInAndLogOut)
    {
        $I->amGoingTo('Login as Admin');
        $LogInAndLogOut->userLogin($I);
        $I->click($FooterSocialComponents->customizebutton);
        $I->wait(1);
        $I->scrollTo($FooterSocialComponents->footerButton);
        $I->wait(1);
        $I->click($FooterSocialComponents->footerButton);
        $I->wait(1);
        $I->click($FooterSocialComponents->footerSocialSettings);
        $I->wait(1);
    }


    public function Social(RespThemeTester $I, FooterSocialComponents $FooterSocialComponents)
    {
        $I->click($FooterSocialComponents->topRowContentAdd);
        $I->click($FooterSocialComponents->socialButton);
        $I->click($FooterSocialComponents->publishButton);
        $I->wait(3);
    }

    public function SocialSettings(RespThemeTester $I, FooterSocialComponents $FooterSocialComponents)
    {
        $I->selectOption($FooterSocialComponents->openInNewTab, '_self');
        $I->fillFIeld($FooterSocialComponents->facebookInp, 'https://www.facebook.com/');
        $I->fillFIeld($FooterSocialComponents->linkedInInp, 'https://www.linkedin.com/');
        $I->fillFIeld($FooterSocialComponents->youtubeInp, 'https://www.youtube.com/');
        $I->fillFIeld($FooterSocialComponents->iconSize, '25');
        $I->click($FooterSocialComponents->publishButton);
        $I->wait(2);
        $I->amGoingTo('Check on frontend for Desktop view');
        $I->amOnPage('/');
        $I->seeElement($FooterSocialComponents->socialIcons);
        $FooterSocialComponents->_checkstyle($I, $FooterSocialComponents->socialIcons, 'font-size', 'xpath', '25px');
        $I->click($FooterSocialComponents->facebookIcon);
        $I->see('facebook');

        $I->amGoingTo('Check on frontend for Tablet view');
        $I->amOnPage('/');
        $I->resizeWindow(768, 1024);
        $I->seeElement($FooterSocialComponents->socialIcons);
        $FooterSocialComponents->_checkstyle($I, $FooterSocialComponents->socialIcons, 'font-size', 'xpath', '25px');
        $I->click($FooterSocialComponents->youtubeIcon);
        $I->waitForText("YouTube", 2);

        $I->amGoingTo('Check on frontend for Mobile view');
        $I->amOnPage('/');
        $I->resizeWindow(375, 812);
        $I->seeElement($FooterSocialComponents->socialIcons);
        $FooterSocialComponents->_checkstyle($I, $FooterSocialComponents->socialIcons, 'font-size', 'xpath', '25px');
        $I->click($FooterSocialComponents->youtubeIcon);
        $I->see('SIGN IN');

        $I->amOnPage('/');
        $I->resizeWindow(1280, 950);
        $I->click($FooterSocialComponents->customizebutton);
        $I->wait(1);
        $I->scrollTo($FooterSocialComponents->footerButton);
        $I->wait(1);
        $I->click($FooterSocialComponents->footerButton);
        $I->wait(1);
        $I->click($FooterSocialComponents->footerSocialSettings);
        $I->wait(1);
        $I->selectOption($FooterSocialComponents->openInNewTab, '_blank');
        $I->click($FooterSocialComponents->publishButton);
        $I->wait(2);
        $I->amGoingTo('Check on frontend for Desktop view');
        $I->amOnPage('/');
        $I->click($FooterSocialComponents->facebookIcon);
        $I->switchToNextTab();
        $I->waitForText("Facebook", 2);

        $I->amGoingTo('Check on frontend for Tablet view');
        $I->amOnPage('/');
        $I->resizeWindow(768, 1024);
        $I->click($FooterSocialComponents->facebookIcon);
        $I->switchToNextTab();
        $I->waitForText("Facebook", 2);

        $I->amGoingTo('Check on frontend for Mobile view');
        $I->amOnPage('/');
        $I->resizeWindow(375, 812);
        $I->click($FooterSocialComponents->facebookIcon);
        $I->switchToNextTab();
        $I->waitForText("Facebook", 2);
    }

    // tests
    public function ContentAlignmentSettings(RespThemeTester $I, FooterSocialComponents $FooterSocialComponents)
    {
        $I->selectOption($FooterSocialComponents->contentAlignDesk, 'left');
        $I->selectOption($FooterSocialComponents->contentVertAlignDesk, 'top');
        $I->click($FooterSocialComponents->publishButton);
        $I->wait(2);
        $I->amGoingTo('Check on frontend for Desktop view');
        $I->amOnPage('/');
        $FooterSocialComponents->_checkstyle($I, $FooterSocialComponents->alignment, 'text-align', 'xpath', 'left');
        $FooterSocialComponents->_checkstyle($I, $FooterSocialComponents->alignment, 'align-items', 'xpath', 'flex-start');
        $I->click($FooterSocialComponents->customizebutton);
        $I->wait(1);
        $I->scrollTo($FooterSocialComponents->footerButton);
        $I->wait(1);
        $I->click($FooterSocialComponents->footerButton);
        $I->wait(1);
        $I->click($FooterSocialComponents->footerSocialSettings);
        $I->wait(1);
        $I->selectOption($FooterSocialComponents->contentAlignTab, 'center');
        $I->selectOption($FooterSocialComponents->contentVertAlignTab, 'Middle');
        $I->click($FooterSocialComponents->publishButton);
        $I->wait(2);
        $I->amGoingTo('Check on frontend for Tablet view');
        $I->amOnPage('/');
        $I->resizeWindow(768, 1024);
        $FooterSocialComponents->_checkstyle($I, $FooterSocialComponents->alignment, 'text-align', 'xpath', 'center');
        $FooterSocialComponents->_checkstyle($I, $FooterSocialComponents->alignment, 'align-items', 'xpath', 'center');
        $I->click($FooterSocialComponents->customizebutton);
        $I->wait(1);
        $I->scrollTo($FooterSocialComponents->footerButton);
        $I->wait(1);
        $I->click($FooterSocialComponents->footerButton);
        $I->wait(1);
        $I->click($FooterSocialComponents->footerSocialSettings);
        $I->wait(1);
        $I->selectOption($FooterSocialComponents->contentAlignMob, 'right');
        $I->selectOption($FooterSocialComponents->contentVertAlignMob, 'bottom');
        $I->click($FooterSocialComponents->publishButton);
        $I->wait(2);
        $I->amGoingTo('Check on frontend for Mobile view');
        $I->amOnPage('/');
        $I->resizeWindow(375, 812);
        $FooterSocialComponents->_checkstyle($I, $FooterSocialComponents->alignment, 'text-align', 'xpath', 'right');
        $FooterSocialComponents->_checkstyle($I, $FooterSocialComponents->alignment, 'align-items', 'xpath', 'flex-end');

    }


    public function ColorAndSizeSettings(RespThemeTester $I, FooterSocialComponents $FooterSocialComponents)
    {
        $I->click($FooterSocialComponents->iconColor);
        $I->click($FooterSocialComponents->iconColor1); 
        $I->click($FooterSocialComponents->iconHoverColor);
        $I->click($FooterSocialComponents->iconHoverColor2); 
        $I->click($FooterSocialComponents->backgroundColor);
        $I->click($FooterSocialComponents->backgroundColor1); 
        $I->click($FooterSocialComponents->bkgdHoverColor);
        $I->click($FooterSocialComponents->bkgdHoverColor2); 
        $I->click($FooterSocialComponents->borderColor);
        $I->click($FooterSocialComponents->borderColor3); 
        $I->click($FooterSocialComponents->borderHoverColor);
        $I->click($FooterSocialComponents->borderHoverColor5); 
        $I->selectOption($FooterSocialComponents->borderStyle, 'solid');
        $I->fillFIeld($FooterSocialComponents->borderWidth, '4');
        $I->fillFIeld($FooterSocialComponents->borderRadius, '15');

        $I->click($FooterSocialComponents->publishButton);
        $I->wait(2);
        $I->amGoingTo('Check on frontend for Desktop view');
        $I->amOnPage('/');
        $FooterSocialComponents->_checkstyle($I, $FooterSocialComponents->facebookIcon, 'color', 'xpath', 'rgba(130, 36, 227, 1)');
        $FooterSocialComponents->_checkstyle($I, $FooterSocialComponents->facebookIcon, 'background-color', 'xpath', 'rgba(0, 0, 0, 1)');
        $FooterSocialComponents->_checkstyle($I, $FooterSocialComponents->facebookIcon, 'border', 'xpath', '4px solid rgb(221, 51, 51)');
        $FooterSocialComponents->_checkstyle($I, $FooterSocialComponents->facebookIcon, 'border-radius', 'xpath', '15px');
        $I->moveMouseOver($FooterSocialComponents->facebookIcon);
        $I->wait(2);
        $FooterSocialComponents->_checkstyle($I, $FooterSocialComponents->facebookIcon, 'color', 'xpath', 'rgba(255, 255, 255, 1)');
        $FooterSocialComponents->_checkstyle($I, $FooterSocialComponents->facebookIcon, 'background-color', 'xpath', 'rgba(255, 255, 255, 1)');
        $FooterSocialComponents->_checkstyle($I, $FooterSocialComponents->facebookIcon, 'border', 'xpath', '4px solid rgb(238, 238, 34)');

        $I->click($FooterSocialComponents->customizebutton);
        $I->wait(1);
        $I->scrollTo($FooterSocialComponents->footerButton);
        $I->wait(1);
        $I->click($FooterSocialComponents->footerButton);
        $I->wait(1);
        $I->click($FooterSocialComponents->footerSocialSettings);
        $I->wait(1);
        $I->selectOption($FooterSocialComponents->borderStyle, 'dashed');
        $I->click($FooterSocialComponents->publishButton);
        $I->wait(2);
        $I->amGoingTo('Check on frontend for Tablet view');
        $I->amOnPage('/');
        $I->resizeWindow(768, 1024);
        $FooterSocialComponents->_checkstyle($I, $FooterSocialComponents->facebookIcon, 'color', 'xpath', 'rgba(130, 36, 227, 1)');
        $FooterSocialComponents->_checkstyle($I, $FooterSocialComponents->facebookIcon, 'background-color', 'xpath', 'rgba(0, 0, 0, 1)');
        $FooterSocialComponents->_checkstyle($I, $FooterSocialComponents->facebookIcon, 'border', 'xpath', '4px dashed rgb(221, 51, 51)');
        $FooterSocialComponents->_checkstyle($I, $FooterSocialComponents->facebookIcon, 'border-radius', 'xpath', '15px');
        $I->moveMouseOver($FooterSocialComponents->facebookIcon);
        $I->wait(2);
        $FooterSocialComponents->_checkstyle($I, $FooterSocialComponents->facebookIcon, 'color', 'xpath', 'rgba(255, 255, 255, 1)');
        $FooterSocialComponents->_checkstyle($I, $FooterSocialComponents->facebookIcon, 'background-color', 'xpath', 'rgba(255, 255, 255, 1)');
        $FooterSocialComponents->_checkstyle($I, $FooterSocialComponents->facebookIcon, 'border', 'xpath', '4px dashed rgb(238, 238, 34)');

        $I->click($FooterSocialComponents->customizebutton);
        $I->wait(1);
        $I->scrollTo($FooterSocialComponents->footerButton);
        $I->wait(1);
        $I->click($FooterSocialComponents->footerButton);
        $I->wait(1);
        $I->click($FooterSocialComponents->footerSocialSettings);
        $I->wait(1);
        $I->selectOption($FooterSocialComponents->borderStyle, 'dotted');
        $I->click($FooterSocialComponents->publishButton);
        $I->wait(2);
        $I->amGoingTo('Check on frontend for Mobile view');
        $I->amOnPage('/');
        $I->resizeWindow(375, 812);
        $FooterSocialComponents->_checkstyle($I, $FooterSocialComponents->facebookIcon, 'color', 'xpath', 'rgba(130, 36, 227, 1)');
        $FooterSocialComponents->_checkstyle($I, $FooterSocialComponents->facebookIcon, 'background-color', 'xpath', 'rgba(0, 0, 0, 1)');
        $FooterSocialComponents->_checkstyle($I, $FooterSocialComponents->facebookIcon, 'border', 'xpath', '4px dotted rgb(221, 51, 51)');
        $FooterSocialComponents->_checkstyle($I, $FooterSocialComponents->facebookIcon, 'border-radius', 'xpath', '15px');
        $I->moveMouseOver($FooterSocialComponents->facebookIcon);
        $I->wait(2);
        $FooterSocialComponents->_checkstyle($I, $FooterSocialComponents->facebookIcon, 'color', 'xpath', 'rgba(255, 255, 255, 1)');
        $FooterSocialComponents->_checkstyle($I, $FooterSocialComponents->facebookIcon, 'background-color', 'xpath', 'rgba(255, 255, 255, 1)');
        $FooterSocialComponents->_checkstyle($I, $FooterSocialComponents->facebookIcon, 'border', 'xpath', '4px dotted rgb(238, 238, 34)');
    }
}
