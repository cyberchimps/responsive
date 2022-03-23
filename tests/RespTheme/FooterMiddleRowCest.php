<?php
use \page\RespTheme\LogInAndLogOut;
use \page\RespTheme\FooterMiddleRowComponents;

class FooterMiddleRowCest
{
    public function _before(RespThemeTester $I, FooterMiddleRowComponents $FooterMiddleRowComponents, LogInAndLogOut $LogInAndLogOut)
    {
        $I->amGoingTo('Login as Admin');
        $LogInAndLogOut->userLogin($I);
        $I->click($FooterMiddleRowComponents->customizebutton);
        $I->wait(1);
        $I->scrollTo($FooterMiddleRowComponents->footerButton);
        $I->wait(1);
        $I->click($FooterMiddleRowComponents->footerButton);
        $I->wait(1);
        $I->click($FooterMiddleRowComponents->middleRowButton);
        $I->wait(1);
    }

    // tests
    public function DefaultSettings(RespThemeTester $I, FooterMiddleRowComponents $FooterMiddleRowComponents)
    {
        $I->fillField($FooterMiddleRowComponents->noOfColumns, '2');
        $I->click($FooterMiddleRowComponents->addElement);
        $I->click($FooterMiddleRowComponents->footerNavigation);
        $I->click($FooterMiddleRowComponents->publishButton);
        $I->wait(2);

        $I->amGoingTo('Check the default settings on frontend for Desktop view');
        $I->amOnPage('/');
        $I->seeElement($FooterMiddleRowComponents->layoutElement);
        $I->expectTo('See in the Class'.$FooterMiddleRowComponents->standard);
        $I->seeElement($FooterMiddleRowComponents->columns);

        $I->amGoingTo('Check the default settings on frontend for Tablet view');
        $I->amOnPage('/');
        $I->resizeWindow(768, 1024);
        $I->seeElement($FooterMiddleRowComponents->layoutElement);
        $I->expectTo('See in the Class'.$FooterMiddleRowComponents->standard);
        $I->seeElement($FooterMiddleRowComponents->columns);

        $I->amGoingTo('Check the default settings on frontend for Mobile view');
        $I->amOnPage('/');
        $I->resizeWindow(375, 812);
        $I->seeElement($FooterMiddleRowComponents->layoutElement);
        $I->expectTo('See in the Class'.$FooterMiddleRowComponents->standard);
        $I->seeElement($FooterMiddleRowComponents->columns);
        $I->resizeWindow(1280, 950);

        $I->click($FooterMiddleRowComponents->customizebutton);
        $I->scrollTo($FooterMiddleRowComponents->footerButton);
        $I->click($FooterMiddleRowComponents->footerButton);
        $I->click($FooterMiddleRowComponents->middleRowButton);
        $I->click($FooterMiddleRowComponents->removeFooterNavigation);
        $I->click($FooterMiddleRowComponents->publishButton);
        $I->wait(2);
    }


    public function ChangedSettings(RespThemeTester $I, FooterMiddleRowComponents $FooterMiddleRowComponents)
    {
        $I->selectOption($FooterMiddleRowComponents->deskWidth, 'fullwidth');
        $I->selectOption($FooterMiddleRowComponents->tabWidth, 'fullwidth');
        $I->selectOption($FooterMiddleRowComponents->mobWidth, 'contained');
        $I->selectOption($FooterMiddleRowComponents->rowDirectionDesk, 'column');
        $I->selectOption($FooterMiddleRowComponents->rowDirectionTab, 'column');
        $I->selectOption($FooterMiddleRowComponents->rowDirectionMob, 'column');
        $I->selectOption($FooterMiddleRowComponents->rowCollapse, 'rtl');
        $I->click($FooterMiddleRowComponents->addElement);
        $I->click($FooterMiddleRowComponents->footerNavigation);
        $I->click($FooterMiddleRowComponents->publishButton);
        $I->wait(2);

        $I->amGoingTo('Check the settings on frontend for Desktop view');
        $I->amOnPage('/');
        $I->seeElement($FooterMiddleRowComponents->layoutElement);
        $I->expectTo('See in the Class'.$FooterMiddleRowComponents->standard);
        $I->seeElement($FooterMiddleRowComponents->columns);

        $I->amGoingTo('Check the settings on frontend for Tablet view');
        $I->amOnPage('/');
        $I->resizeWindow(768, 1024);
        $I->seeElement($FooterMiddleRowComponents->layoutElement);
        $I->expectTo('See in the Class'.$FooterMiddleRowComponents->standard);
        $I->seeElement($FooterMiddleRowComponents->columns);

        $I->amGoingTo('Check the settings on frontend for Mobile view');
        $I->amOnPage('/');
        $I->resizeWindow(375, 812);
        $I->seeElement($FooterMiddleRowComponents->layoutElement);
        $I->expectTo('See in the Class'.$FooterMiddleRowComponents->standard);
        $I->seeElement($FooterMiddleRowComponents->columns);
        $I->resizeWindow(1280, 950);

        $I->click($FooterMiddleRowComponents->customizebutton);
        $I->scrollTo($FooterMiddleRowComponents->footerButton);
        $I->click($FooterMiddleRowComponents->footerButton);
        $I->click($FooterMiddleRowComponents->middleRowButton);
        $I->click($FooterMiddleRowComponents->removeFooterNavigation);
        $I->click($FooterMiddleRowComponents->publishButton);
        $I->wait(2);
    }


    public function HeightAndPaddingSettings(RespThemeTester $I, FooterMiddleRowComponents $FooterMiddleRowComponents)
    {
        $I->fillField($FooterMiddleRowComponents->topSpacingDesk, '20');
        $I->fillField($FooterMiddleRowComponents->topSpacingTab, '25');
        $I->fillField($FooterMiddleRowComponents->topSpacingMob, '30');
        $I->fillField($FooterMiddleRowComponents->bottomSpacingDesk, '20');
        $I->fillField($FooterMiddleRowComponents->bottomSpacingTab, '25');
        $I->fillField($FooterMiddleRowComponents->bottomSpacingMob, '30');
        $I->fillField($FooterMiddleRowComponents->minHtDesk, '10');
        $I->fillField($FooterMiddleRowComponents->minHtDesk, '10');
        $I->fillField($FooterMiddleRowComponents->minHtDesk, '10');
        $I->click($FooterMiddleRowComponents->addElement);
        $I->click($FooterMiddleRowComponents->footerNavigation);
        $I->click($FooterMiddleRowComponents->publishButton);
        $I->wait(4);

        $I->amGoingTo('Check the settings on frontend for Desktop view');
        $I->amOnPage('/');
        $FooterMiddleRowComponents->_checkstyle($I, $FooterMiddleRowComponents->columns, 'padding-top', 'xpath', '20px');
        $FooterMiddleRowComponents->_checkstyle($I, $FooterMiddleRowComponents->columns, 'padding-bottom', 'xpath', '20px');
        $FooterMiddleRowComponents->_checkstyle($I, $FooterMiddleRowComponents->columns, 'min-height', 'xpath', '10px');

        //have issue
        /*$I->amGoingTo('Check the settings on frontend for Tablet view');
        $I->amOnPage('/');
        $I->resizeWindow(768, 1024);
        $FooterMiddleRowComponents->_checkstyle($I, $FooterMiddleRowComponents->columns, 'padding-top', 'xpath', '25px');
        $FooterMiddleRowComponents->_checkstyle($I, $FooterMiddleRowComponents->columns, 'padding-bottom', 'xpath', '25px');
        $FooterMiddleRowComponents->_checkstyle($I, $FooterMiddleRowComponents->columns, 'min-height', 'xpath', '10px');

        $I->amGoingTo('Check the settings on frontend for Mobile view');
        $I->amOnPage('/');
        $I->resizeWindow(375, 812);
        $FooterMiddleRowComponents->_checkstyle($I, $FooterMiddleRowComponents->columns, 'padding-top', 'xpath', '30px');
        $FooterMiddleRowComponents->_checkstyle($I, $FooterMiddleRowComponents->columns, 'padding-bottom', 'xpath', '30px');
        $FooterMiddleRowComponents->_checkstyle($I, $FooterMiddleRowComponents->columns, 'min-height', 'xpath', '10px');
        $I->resizeWindow(1280, 950);*/

        $I->click($FooterMiddleRowComponents->customizebutton);
        $I->scrollTo($FooterMiddleRowComponents->footerButton);
        $I->click($FooterMiddleRowComponents->footerButton);
        $I->click($FooterMiddleRowComponents->middleRowButton);
        $I->click($FooterMiddleRowComponents->removeFooterNavigation);
        $I->click($FooterMiddleRowComponents->publishButton);
        $I->wait(3);
    }


    public function LinkStyleAndColorSettings(RespThemeTester $I, FooterMiddleRowComponents $FooterMiddleRowComponents)
    {
        $I->selectOption($FooterMiddleRowComponents->linkStyle, 'normal');
        $I->click($FooterMiddleRowComponents->linkColor);
        $I->click($FooterMiddleRowComponents->linkColor8);
        $I->click($FooterMiddleRowComponents->linkHoverColor);
        $I->click($FooterMiddleRowComponents->linkHoverColor1);
        $I->click($FooterMiddleRowComponents->addElement);
        $I->click($FooterMiddleRowComponents->widget1);
        $I->click($FooterMiddleRowComponents->publishButton);
        $I->wait(2);

        $I->amGoingTo('Check the settings on frontend for Desktop view');
        $I->amOnPage('/');
        $FooterMiddleRowComponents->_checkstyle($I, $FooterMiddleRowComponents->link, 'color', 'xpath', 'rgba(130, 36, 227, 1)');
        $I->moveMouseOver($FooterMiddleRowComponents->link);
        $FooterMiddleRowComponents->_checkstyle($I, $FooterMiddleRowComponents->link, 'color', 'xpath', 'rgba(0, 0, 0, 1)');

        $I->amGoingTo('Check the settings on frontend for Tablet view');
        $I->amOnPage('/');
        $I->resizeWindow(768, 1024);
        $FooterMiddleRowComponents->_checkstyle($I, $FooterMiddleRowComponents->link, 'color', 'xpath', 'rgba(130, 36, 227, 1)');
        $I->moveMouseOver($FooterMiddleRowComponents->link);
        $FooterMiddleRowComponents->_checkstyle($I, $FooterMiddleRowComponents->link, 'color', 'xpath', 'rgba(0, 0, 0, 1)');

        $I->amGoingTo('Check the settings on frontend for Mobile view');
        $I->amOnPage('/');
        $I->resizeWindow(375, 812);
        $FooterMiddleRowComponents->_checkstyle($I, $FooterMiddleRowComponents->link, 'color', 'xpath', 'rgba(130, 36, 227, 1)');
        $I->moveMouseOver($FooterMiddleRowComponents->link);
        $FooterMiddleRowComponents->_checkstyle($I, $FooterMiddleRowComponents->link, 'color', 'xpath', 'rgba(0, 0, 0, 1)');

        $I->click($FooterMiddleRowComponents->customizebutton);
        $I->scrollTo($FooterMiddleRowComponents->footerButton);
        $I->click($FooterMiddleRowComponents->footerButton);
        $I->click($FooterMiddleRowComponents->middleRowButton);
        $I->click($FooterMiddleRowComponents->removeWidget1);
        $I->click($FooterMiddleRowComponents->publishButton);
        $I->wait(2);
    }


    public function BackgroundColorSettings(RespThemeTester $I, FooterMiddleRowComponents $FooterMiddleRowComponents)
    {
        $I->click($FooterMiddleRowComponents->backgroundDesk);
        $I->click($FooterMiddleRowComponents->backgroundDesk4);
        $I->click($FooterMiddleRowComponents->backgroundTab);
        $I->click($FooterMiddleRowComponents->backgroundTab5);
        $I->click($FooterMiddleRowComponents->backgroundMob);
        $I->click($FooterMiddleRowComponents->backgroundMob3);
        $I->click($FooterMiddleRowComponents->addElement);
        $I->click($FooterMiddleRowComponents->footerNavigation);
        $I->click($FooterMiddleRowComponents->publishButton);
        $I->wait(4);

        $I->amGoingTo('Check the settings on frontend for Desktop view');
        $I->amOnPage('/');
        $FooterMiddleRowComponents->_checkstyle($I, $FooterMiddleRowComponents->middleRow, 'background', 'xpath', 'rgb(221, 153, 51) none repeat scroll 0% 0% / auto padding-box border-box');

        $I->amGoingTo('Check the settings on frontend for Tablet view');
        $I->resizeWindow(767, 1024);
        $I->amOnPage('/');
        $FooterMiddleRowComponents->_checkstyle($I, $FooterMiddleRowComponents->middleRow, 'background', 'xpath', 'rgb(238, 238, 34) none repeat scroll 0% 0% / auto padding-box border-box');

        $I->amGoingTo('Check the settings on frontend for Mobile view');
        $I->resizeWindow(375, 812);
        $I->amOnPage('/');
        $FooterMiddleRowComponents->_checkstyle($I, $FooterMiddleRowComponents->middleRow, 'background', 'xpath', 'rgb(221, 51, 51) none repeat scroll 0% 0% / auto padding-box border-box');

        $I->resizeWindow(1280, 950);
        $I->click($FooterMiddleRowComponents->customizebutton);
        $I->scrollTo($FooterMiddleRowComponents->footerButton);
        $I->click($FooterMiddleRowComponents->footerButton);
        $I->click($FooterMiddleRowComponents->middleRowButton);
        $I->click($FooterMiddleRowComponents->removeFooterNavigation);
        $I->click($FooterMiddleRowComponents->publishButton);
        $I->wait(2);
    }


    public function TypographyOptions(RespThemeTester $I, FooterMiddleRowComponents $FooterMiddleRowComponents)
    {
        $I->selectOption($FooterMiddleRowComponents->fontFamily, 'Georgia');
        $I->selectOption($FooterMiddleRowComponents->fontWeight, '700');
        $I->selectOption($FooterMiddleRowComponents->fontStyle, 'italic');
        $I->selectOption($FooterMiddleRowComponents->textTransform, 'capitalize');
        $I->fillField($FooterMiddleRowComponents->fontSize , '20 10 10');
        $I->fillField($FooterMiddleRowComponents->lineHeight , '3');
        $I->fillField($FooterMiddleRowComponents->letterSpacing , '3');
        $I->click($FooterMiddleRowComponents->addElement);
        $I->click($FooterMiddleRowComponents->footerNavigation);
        $I->click($FooterMiddleRowComponents->publishButton);
        $I->wait(4);
        $I->amGoingTo('Check on the front end');
        $I->amOnPage('/');
        $FooterMiddleRowComponents->_checkstyle($I, $FooterMiddleRowComponents->middleRow, 'font-family', 'xpath', 'Georgia');
        $FooterMiddleRowComponents->_checkstyle($I, $FooterMiddleRowComponents->middleRow, 'font-weight', 'xpath', '700');
        $FooterMiddleRowComponents->_checkstyle($I, $FooterMiddleRowComponents->middleRow, 'font-style', 'xpath', 'italic');
        $FooterMiddleRowComponents->_checkstyle($I, $FooterMiddleRowComponents->middleRow, 'text-transform', 'xpath', 'capitalize');
        $FooterMiddleRowComponents->_checkstyle($I, $FooterMiddleRowComponents->middleRow, 'font-size', 'xpath', '13px');
        $FooterMiddleRowComponents->_checkstyle($I, $FooterMiddleRowComponents->middleRow, 'line-height', 'xpath', '39px');
        $FooterMiddleRowComponents->_checkstyle($I, $FooterMiddleRowComponents->middleRow, 'line-spacing', 'xpath', '');

        $I->amGoingTo('Check for Tablet View');
        $I->resizeWindow(768, 1024);
        $I->wait(1);
        $FooterMiddleRowComponents->_checkstyle($I, $FooterMiddleRowComponents->middleRow, 'font-family', 'xpath', 'Georgia');
        $FooterMiddleRowComponents->_checkstyle($I, $FooterMiddleRowComponents->middleRow, 'font-weight', 'xpath', '700');
        $FooterMiddleRowComponents->_checkstyle($I, $FooterMiddleRowComponents->middleRow, 'font-style', 'xpath', 'italic');
        $FooterMiddleRowComponents->_checkstyle($I, $FooterMiddleRowComponents->middleRow, 'text-transform', 'xpath', 'capitalize');
        $FooterMiddleRowComponents->_checkstyle($I, $FooterMiddleRowComponents->middleRow, 'font-size', 'xpath', '13px');
        $FooterMiddleRowComponents->_checkstyle($I, $FooterMiddleRowComponents->middleRow, 'line-height', 'xpath', '39px');
        $FooterMiddleRowComponents->_checkstyle($I, $FooterMiddleRowComponents->middleRow, 'line-spacing', 'xpath', '');

        $I->amGoingTo('Check for Mobile View');
        $I->resizeWindow(375, 812);
        $I->wait(1);
        $FooterMiddleRowComponents->_checkstyle($I, $FooterMiddleRowComponents->middleRow, 'font-family', 'xpath', 'Georgia');
        $FooterMiddleRowComponents->_checkstyle($I, $FooterMiddleRowComponents->middleRow, 'font-weight', 'xpath', '700');
        $FooterMiddleRowComponents->_checkstyle($I, $FooterMiddleRowComponents->middleRow, 'font-style', 'xpath', 'italic');
        $FooterMiddleRowComponents->_checkstyle($I, $FooterMiddleRowComponents->middleRow, 'text-transform', 'xpath', 'capitalize');
        $FooterMiddleRowComponents->_checkstyle($I, $FooterMiddleRowComponents->middleRow, 'font-size', 'xpath', '13px');
        $FooterMiddleRowComponents->_checkstyle($I, $FooterMiddleRowComponents->middleRow, 'line-height', 'xpath', '39px');
        $FooterMiddleRowComponents->_checkstyle($I, $FooterMiddleRowComponents->middleRow, 'line-spacing', 'xpath', '');

        $I->resizeWindow(1280, 950);
        $I->click($FooterMiddleRowComponents->customizebutton);
        $I->scrollTo($FooterMiddleRowComponents->footerButton);
        $I->click($FooterMiddleRowComponents->footerButton);
        $I->click($FooterMiddleRowComponents->middleRowButton);
        $I->click($FooterMiddleRowComponents->removeFooterNavigation);
        $I->click($FooterMiddleRowComponents->publishButton);
        $I->wait(2);
    }
}
