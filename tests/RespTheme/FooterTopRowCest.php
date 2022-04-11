<?php
use \page\RespTheme\LogInAndLogOut;
use \page\RespTheme\FooterTopRowComponents;

class FooterTopRowCest
{
    public function _before(RespThemeTester $I, LogInAndLogOut $loginAndLogout, FooterTopRowComponents $FooterTopRowComponents)
    {
        $I->amGoingTo('Login as Admin');
        $loginAndLogout->userLogin($I);
        $I->click($FooterTopRowComponents->customizebutton);
        $I->wait(1);
        $I->scrollTo($FooterTopRowComponents->footerButton);
        $I->wait(1);
        $I->click($FooterTopRowComponents->footerButton);
        $I->wait(1);
        $I->click($FooterTopRowComponents->TopRowSettings);
        $I->wait(1);
    }

    // tests
    public function ContainerWidth(RespThemeTester $I, FooterTopRowComponents $FooterTopRowComponents)
    {
        $I->fillField($FooterTopRowComponents->numberOfColumns, '3');
        $I->click($FooterTopRowComponents->publishButton);
        $I->wait(2);
        $I->amGoingTo('Check on the front end');
        $I->amOnPage('/');
        $I->seeElement($FooterTopRowComponents->topRowColumns);
        $I->expectTo('See in the Class'.$FooterTopRowComponents->columns3);

        $I->amGoingTo('Check Container Width');
        $I->click($FooterTopRowComponents->customizebutton);
        $I->wait(1);
        $I->scrollTo($FooterTopRowComponents->footerButton);
        $I->wait(1);
        $I->click($FooterTopRowComponents->footerButton);
        $I->wait(1);
        $I->click($FooterTopRowComponents->TopRowSettings);
        $I->wait(1);

        $I->selectOption($FooterTopRowComponents->containerWidthDesk, 'standard');
        $I->selectOption($FooterTopRowComponents->rowDirectionDesk, 'row');
        $I->selectOption($FooterTopRowComponents->containerWidthTab, 'standard');
        $I->selectOption($FooterTopRowComponents->rowDirectionTab, 'row');
        $I->selectOption($FooterTopRowComponents->containerWidthMob, 'standard');
        $I->selectOption($FooterTopRowComponents->rowDirectionMob, 'row');
        $I->click($FooterTopRowComponents->publishButton);
        $I->wait(2);
        $I->amGoingTo('Check on the front end');
        $I->amOnPage('/');
        $I->seeElement($FooterTopRowComponents->topRowWidthDesk);
        $I->expectTo('See in the Class'.$FooterTopRowComponents->standardLayout);
        $I->amGoingTo('Check on the front end for Tablet view');
        $I->resizeWindow(768, 1024);
        $I->wait(1);
        $I->seeElement($FooterTopRowComponents->topRowWidthDesk);
        $I->expectTo('See in the Class'.$FooterTopRowComponents->standardLayout);
        $I->amGoingTo('Check on the front end for Mobile view');
        $I->resizeWindow(375, 812);
        $I->wait(1);
        $I->seeElement($FooterTopRowComponents->topRowWidthDesk);
        $I->expectTo('See in the Class'.$FooterTopRowComponents->standardLayout);

        $I->click($FooterTopRowComponents->customizebutton);
        $I->wait(1);
        $I->scrollTo($FooterTopRowComponents->footerButton);
        $I->wait(1);
        $I->click($FooterTopRowComponents->footerButton);
        $I->wait(1);
        $I->click($FooterTopRowComponents->TopRowSettings);
        $I->wait(1);

        $I->selectOption($FooterTopRowComponents->containerWidthDesk, 'fullwidth');
        $I->selectOption($FooterTopRowComponents->rowDirectionDesk, 'column');
        $I->selectOption($FooterTopRowComponents->containerWidthTab, 'fullwidth');
        $I->selectOption($FooterTopRowComponents->rowDirectionTab, 'column');
        $I->selectOption($FooterTopRowComponents->containerWidthMob, 'fullwidth');
        $I->selectOption($FooterTopRowComponents->rowDirectionMob, 'column');
        $I->click($FooterTopRowComponents->publishButton);
        $I->wait(2);
        $I->amGoingTo('Check on the front end');
        $I->amOnPage('/');
        $I->seeElement($FooterTopRowComponents->topRowWidthDesk);
        $I->expectTo('See in the Class'.$FooterTopRowComponents->fullwidthLayout);
        $I->amGoingTo('Check on the front end for Tablet view');
        $I->resizeWindow(768, 1024);
        $I->wait(1);
        $I->seeElement($FooterTopRowComponents->topRowWidthDesk);
        $I->expectTo('See in the Class'.$FooterTopRowComponents->fullwidthLayout);
        $I->amGoingTo('Check on the front end for Mobile view');
        $I->resizeWindow(375, 812);
        $I->wait(1);
        $I->seeElement($FooterTopRowComponents->topRowWidthDesk);
        $I->expectTo('See in the Class'.$FooterTopRowComponents->fullwidthLayout);
    }

    public function RowCollapse(RespThemeTester $I, FooterTopRowComponents $FooterTopRowComponents)
    {
        $I->selectOption($FooterTopRowComponents->collapseRow, 'rtl');
        $I->click($FooterTopRowComponents->publishButton);
        $I->wait(2);
        $I->amGoingTo('Check on the front end');
        $I->amOnPage('/');
        $I->seeElement($FooterTopRowComponents->rowCollapse);
        $I->click($FooterTopRowComponents->customizebutton);
        $I->wait(1);
        $I->scrollTo($FooterTopRowComponents->footerButton);
        $I->wait(1);
        $I->click($FooterTopRowComponents->footerButton);
        $I->wait(1);
        $I->click($FooterTopRowComponents->TopRowSettings);
        $I->wait(1);
        $I->selectOption($FooterTopRowComponents->collapseRow, 'normal');
        $I->click($FooterTopRowComponents->publishButton);
        $I->wait(2);
        $I->amGoingTo('Check on the front end');
        $I->amOnPage('/');
        $I->seeElement($FooterTopRowComponents->rowCollapse);
    }

    public function SpacingAndHeight(RespThemeTester $I, FooterTopRowComponents $FooterTopRowComponents)
    {
        $I->fillField($FooterTopRowComponents->topSpacingDesk, '20');
        $I->fillField($FooterTopRowComponents->topSpacingTab, '15');
        $I->fillField($FooterTopRowComponents->topSpacingMob, '10');
        $I->fillField($FooterTopRowComponents->botSpacingDesk, '20');
        $I->fillField($FooterTopRowComponents->botSpacingTab, '15');
        $I->fillField($FooterTopRowComponents->botSpacingMob, '10');
        $I->fillField($FooterTopRowComponents->minHtDesk, '15');
        $I->fillField($FooterTopRowComponents->minHtTab, '10');
        $I->fillField($FooterTopRowComponents->minHtMob, '10');
        $I->click($FooterTopRowComponents->publishButton);
        $I->wait(2);
        $I->amGoingTo('Check on the front end');
        $I->amOnPage('/');
        $FooterTopRowComponents->_checkstyle($I, $FooterTopRowComponents->topRowColumns, 'padding-top', 'xpath', '20px');
        $FooterTopRowComponents->_checkstyle($I, $FooterTopRowComponents->topRowColumns, 'padding-bottom', 'xpath', '20px');
        $FooterTopRowComponents->_checkstyle($I, $FooterTopRowComponents->topRowColumns, 'min-height', 'xpath', '15px');
        $I->resizeWindow(768, 1024);
        $I->wait(1);
        $FooterTopRowComponents->_checkstyle($I, $FooterTopRowComponents->topRowColumns, 'padding-top', 'xpath', '15px');
        $FooterTopRowComponents->_checkstyle($I, $FooterTopRowComponents->topRowColumns, 'padding-bottom', 'xpath', '15px');
        $FooterTopRowComponents->_checkstyle($I, $FooterTopRowComponents->topRowColumns, 'min-height', 'xpath', '10px');
        $I->resizeWindow(375, 812);
        $I->wait(1);
        $FooterTopRowComponents->_checkstyle($I, $FooterTopRowComponents->topRowColumns, 'padding-top', 'xpath', '10px');
        $FooterTopRowComponents->_checkstyle($I, $FooterTopRowComponents->topRowColumns, 'padding-bottom', 'xpath', '10px');
        $FooterTopRowComponents->_checkstyle($I, $FooterTopRowComponents->topRowColumns, 'min-height', 'xpath', '10px');
    }


    public function LinkSettings(RespThemeTester $I, FooterTopRowComponents $FooterTopRowComponents)
    {
        $I->selectOption($FooterTopRowComponents->linkStyle, 'normal');
        $I->click($FooterTopRowComponents->linkColor);
        $I->click($FooterTopRowComponents->linkColor8);
        $I->click($FooterTopRowComponents->linkHoverColor);
        $I->click($FooterTopRowComponents->linkHoverColor2);
        $I->click($FooterTopRowComponents->publishButton);
        $I->wait(2);
        $I->amGoingTo('Check on the front end');
        $I->amOnPage('/');
        $I->scrollTo($FooterTopRowComponents->link);
        $I->seeElement($FooterTopRowComponents->link);
        $FooterTopRowComponents->_checkstyle($I, $FooterTopRowComponents->link, 'color', 'xpath', 'rgba(51, 51, 51, 1)');
        $I->moveMouseOver($FooterTopRowComponents->link);
        $I->wait(2);
        $FooterTopRowComponents->_checkstyle($I, $FooterTopRowComponents->link, 'color', 'xpath', 'rgba(51, 51, 51, 1)');
    }


    public function BackgroundColor(RespThemeTester $I, FooterTopRowComponents $FooterTopRowComponents)
    {
        $I->click($FooterTopRowComponents->backgroundDesk);
        $I->click($FooterTopRowComponents->backgroundDesk3);
        $I->click($FooterTopRowComponents->backgroundTab);
        $I->click($FooterTopRowComponents->backgroundTab4);
        $I->click($FooterTopRowComponents->backgroundMob);
        $I->click($FooterTopRowComponents->backgroundMob2);
        $I->click($FooterTopRowComponents->publishButton);
        $I->wait(2);
        $I->amGoingTo('Check on the front end');
        $I->amOnPage('/');
        $FooterTopRowComponents->_checkstyle($I, $FooterTopRowComponents->bkgColorTopRow, 'background', 'xpath', 'rgb(221, 51, 51) none repeat scroll 0% 0% / auto padding-box border-box');
        $I->resizeWindow(768, 1024);
        $I->wait(1);
        $FooterTopRowComponents->_checkstyle($I, $FooterTopRowComponents->bkgColorTopRow, 'background', 'xpath', 'rgb(221, 153, 51) none repeat scroll 0% 0% / auto padding-box border-box');
        $I->resizeWindow(375, 812);
        $I->wait(1);
        $FooterTopRowComponents->_checkstyle($I, $FooterTopRowComponents->bkgColorTopRow, 'background', 'xpath', 'rgb(255, 255, 255) none repeat scroll 0% 0% / auto padding-box border-box');
    }


    public function TypographyOptions(RespThemeTester $I, FooterTopRowComponents $FooterTopRowComponents)
    {
        $I->selectOption($FooterTopRowComponents->fontFamily, 'Georgia');
        $I->selectOption($FooterTopRowComponents->fontWeight, '700');
        $I->selectOption($FooterTopRowComponents->fontStyle, 'italic');
        $I->selectOption($FooterTopRowComponents->textTransform, 'capitalize');
        $I->fillField($FooterTopRowComponents->fontSize , '20 10 10');
        $I->fillField($FooterTopRowComponents->lineHeight , '3');
        $I->fillField($FooterTopRowComponents->letterSpacing , '3');
        $I->click($FooterTopRowComponents->publishButton);
        $I->wait(2);
        $I->amGoingTo('Check on the front end');
        $I->amOnPage('/');
        $FooterTopRowComponents->_checkstyle($I, $FooterTopRowComponents->typoTopRow, 'font-family', 'xpath', 'Georgia');
        $FooterTopRowComponents->_checkstyle($I, $FooterTopRowComponents->typoTopRow, 'font-weight', 'xpath', '700');
        $FooterTopRowComponents->_checkstyle($I, $FooterTopRowComponents->typoTopRow, 'font-style', 'xpath', 'italic');
        $FooterTopRowComponents->_checkstyle($I, $FooterTopRowComponents->typoTopRow, 'text-transform', 'xpath', 'capitalize');
        $FooterTopRowComponents->_checkstyle($I, $FooterTopRowComponents->typoTopRow, 'font-size', 'xpath', '13px');
        $FooterTopRowComponents->_checkstyle($I, $FooterTopRowComponents->typoTopRow, 'line-height', 'xpath', '39px');
        $FooterTopRowComponents->_checkstyle($I, $FooterTopRowComponents->typoTopRow, 'line-spacing', 'xpath', '');

        $I->amGoingTo('Check for Tablet View');
        $I->resizeWindow(768, 1024);
        $I->wait(1);
        $FooterTopRowComponents->_checkstyle($I, $FooterTopRowComponents->typoTopRow, 'font-family', 'xpath', 'Georgia');
        $FooterTopRowComponents->_checkstyle($I, $FooterTopRowComponents->typoTopRow, 'font-weight', 'xpath', '700');
        $FooterTopRowComponents->_checkstyle($I, $FooterTopRowComponents->typoTopRow, 'font-style', 'xpath', 'italic');
        $FooterTopRowComponents->_checkstyle($I, $FooterTopRowComponents->typoTopRow, 'text-transform', 'xpath', 'capitalize');
        $FooterTopRowComponents->_checkstyle($I, $FooterTopRowComponents->typoTopRow, 'font-size', 'xpath', '13px');
        $FooterTopRowComponents->_checkstyle($I, $FooterTopRowComponents->typoTopRow, 'line-height', 'xpath', '39px');
        $FooterTopRowComponents->_checkstyle($I, $FooterTopRowComponents->typoTopRow, 'line-spacing', 'xpath', '');

        $I->amGoingTo('Check for Mobile View');
        $I->resizeWindow(375, 812);
        $I->wait(1);
        $FooterTopRowComponents->_checkstyle($I, $FooterTopRowComponents->typoTopRow, 'font-family', 'xpath', 'Georgia');
        $FooterTopRowComponents->_checkstyle($I, $FooterTopRowComponents->typoTopRow, 'font-weight', 'xpath', '700');
        $FooterTopRowComponents->_checkstyle($I, $FooterTopRowComponents->typoTopRow, 'font-style', 'xpath', 'italic');
        $FooterTopRowComponents->_checkstyle($I, $FooterTopRowComponents->typoTopRow, 'text-transform', 'xpath', 'capitalize');
        $FooterTopRowComponents->_checkstyle($I, $FooterTopRowComponents->typoTopRow, 'font-size', 'xpath', '13px');
        $FooterTopRowComponents->_checkstyle($I, $FooterTopRowComponents->typoTopRow, 'line-height', 'xpath', '39px');
        $FooterTopRowComponents->_checkstyle($I, $FooterTopRowComponents->typoTopRow, 'line-spacing', 'xpath', '');
    }
}
