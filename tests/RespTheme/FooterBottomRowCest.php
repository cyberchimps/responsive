<?php
use \page\RespTheme\LogInAndLogOut;
use \page\RespTheme\FooterBottomRowComponents;

class FooterBottomRowCest
{
    public function _before(RespThemeTester $I, LogInAndLogOut $loginAndLogout, FooterBottomRowComponents $FooterBottomRowComponents)
    {
        $I->amGoingTo('Login as Admin');
        $loginAndLogout->userLogin($I);
        $I->click($FooterBottomRowComponents->customizebutton);
        $I->wait(1);
        $I->scrollTo($FooterBottomRowComponents->footerButton);
        $I->wait(1);
        $I->click($FooterBottomRowComponents->footerButton);
        $I->wait(1);
        $I->click($FooterBottomRowComponents->BottomRowSettings);
        $I->wait(1);
    }

    // tests
    public function ContainerWidth(RespThemeTester $I, FooterBottomRowComponents $FooterBottomRowComponents)
    {
        $I->fillField($FooterBottomRowComponents->numberOfColumns, '3');
        $I->click($FooterBottomRowComponents->publishButton);
        $I->wait(2);
        $I->amGoingTo('Check on the front end');
        $I->amOnPage('/');
        $I->seeElement($FooterBottomRowComponents->bottomRowColumns);
        $I->expectTo('See in the Class'.$FooterBottomRowComponents->columns3);

        $I->amGoingTo('Check Container Width');
        $I->click($FooterBottomRowComponents->customizebutton);
        $I->wait(1);
        $I->scrollTo($FooterBottomRowComponents->footerButton);
        $I->wait(1);
        $I->click($FooterBottomRowComponents->footerButton);
        $I->wait(1);
        $I->click($FooterBottomRowComponents->BottomRowSettings);
        $I->wait(1);

        $I->selectOption($FooterBottomRowComponents->containerWidthDesk, 'standard');
        $I->selectOption($FooterBottomRowComponents->rowDirectionDesk, 'row');
        $I->selectOption($FooterBottomRowComponents->containerWidthTab, 'standard');
        $I->selectOption($FooterBottomRowComponents->rowDirectionTab, 'row');
        $I->selectOption($FooterBottomRowComponents->containerWidthMob, 'standard');
        $I->selectOption($FooterBottomRowComponents->rowDirectionMob, 'row'); 
        $I->click($FooterBottomRowComponents->publishButton);
        $I->wait(2);
        $I->amGoingTo('Check on the front end');
        $I->amOnPage('/');
        $I->seeElement($FooterBottomRowComponents->bottomRowWidthDesk);
        $I->expectTo('See in the Class'.$FooterBottomRowComponents->standardLayout);
        $I->amGoingTo('Check on the front end for Tablet view');
        $I->resizeWindow(768, 1024);
        $I->wait(1);
        $I->seeElement($FooterBottomRowComponents->bottomRowWidthDesk);
        $I->expectTo('See in the Class'.$FooterBottomRowComponents->standardLayout);
        $I->amGoingTo('Check on the front end for Mobile view');
        $I->resizeWindow(375, 812);
        $I->wait(1);
        $I->seeElement($FooterBottomRowComponents->bottomRowWidthDesk);
        $I->expectTo('See in the Class'.$FooterBottomRowComponents->standardLayout);

        $I->click($FooterBottomRowComponents->customizebutton);
        $I->wait(1);
        $I->scrollTo($FooterBottomRowComponents->footerButton);
        $I->wait(1);
        $I->click($FooterBottomRowComponents->footerButton);
        $I->wait(1);
        $I->click($FooterBottomRowComponents->BottomRowSettings);
        $I->wait(1);

        $I->selectOption($FooterBottomRowComponents->containerWidthDesk, 'fullwidth');
        $I->selectOption($FooterBottomRowComponents->rowDirectionDesk, 'column');
        $I->selectOption($FooterBottomRowComponents->containerWidthTab, 'fullwidth');
        $I->selectOption($FooterBottomRowComponents->rowDirectionTab, 'column');
        $I->selectOption($FooterBottomRowComponents->containerWidthMob, 'fullwidth');
        $I->selectOption($FooterBottomRowComponents->rowDirectionMob, 'column');
        $I->click($FooterBottomRowComponents->publishButton);
        $I->wait(2);
        $I->amGoingTo('Check on the front end'); 
        $I->amOnPage('/');
        $I->seeElement($FooterBottomRowComponents->bottomRowWidthDesk);
        $I->expectTo('See in the Class'.$FooterBottomRowComponents->fullwidthLayout);
        $I->amGoingTo('Check on the front end for Tablet view');
        $I->resizeWindow(768, 1024);
        $I->wait(1);
        $I->seeElement($FooterBottomRowComponents->bottomRowWidthDesk);
        $I->expectTo('See in the Class'.$FooterBottomRowComponents->fullwidthLayout);
        $I->amGoingTo('Check on the front end for Mobile view');
        $I->resizeWindow(375, 812);
        $I->wait(1);
        $I->seeElement($FooterBottomRowComponents->bottomRowWidthDesk);
        $I->expectTo('See in the Class'.$FooterBottomRowComponents->fullwidthLayout);
    }

    public function RowCollapse(RespThemeTester $I, FooterBottomRowComponents $FooterBottomRowComponents)
    {
        $I->selectOption($FooterBottomRowComponents->collapseRow, 'rtl');
        $I->click($FooterBottomRowComponents->publishButton);
        $I->wait(2);
        $I->amGoingTo('Check on the front end');
        $I->amOnPage('/');
        $I->seeElement($FooterBottomRowComponents->bottomRowColumns);
        $I->click($FooterBottomRowComponents->customizebutton);
        $I->wait(1);
        $I->scrollTo($FooterBottomRowComponents->footerButton);
        $I->wait(1);
        $I->click($FooterBottomRowComponents->footerButton);
        $I->wait(1);
        $I->click($FooterBottomRowComponents->BottomRowSettings);
        $I->wait(1);
        $I->selectOption($FooterBottomRowComponents->collapseRow, 'normal');
        $I->click($FooterBottomRowComponents->publishButton);
        $I->wait(2);
        $I->amGoingTo('Check on the front end');
        $I->amOnPage('/');
        $I->seeElement($FooterBottomRowComponents->bottomRowColumns);
    }

    public function SpacingAndHeight(RespThemeTester $I, FooterBottomRowComponents $FooterBottomRowComponents)
    {
        $I->fillField($FooterBottomRowComponents->topSpacingDesk, '20');
        $I->fillField($FooterBottomRowComponents->topSpacingTab, '15');
        $I->fillField($FooterBottomRowComponents->topSpacingMob, '10');
        $I->fillField($FooterBottomRowComponents->botSpacingDesk, '20');
        $I->fillField($FooterBottomRowComponents->botSpacingTab, '15');
        $I->fillField($FooterBottomRowComponents->botSpacingMob, '10');
        $I->fillField($FooterBottomRowComponents->minHtDesk, '15');
        $I->fillField($FooterBottomRowComponents->minHtTab, '10');
        $I->fillField($FooterBottomRowComponents->minHtMob, '10');
        $I->click($FooterBottomRowComponents->publishButton);
        $I->wait(2);
        $I->amGoingTo('Check on the front end');
        $I->amOnPage('/');
        $FooterBottomRowComponents->_checkstyle($I, $FooterBottomRowComponents->bottomRowColumns, 'padding-top', 'xpath', '20px');
        $FooterBottomRowComponents->_checkstyle($I, $FooterBottomRowComponents->bottomRowColumns, 'padding-bottom', 'xpath', '20px');
        $FooterBottomRowComponents->_checkstyle($I, $FooterBottomRowComponents->bottomRowColumns, 'min-height', 'xpath', '15px');

        //issue here
        $I->resizeWindow(768, 1024);
        $I->wait(1);
        $FooterBottomRowComponents->_checkstyle($I, $FooterBottomRowComponents->bottomRowColumns, 'padding-top', 'xpath', '15px');
        $FooterBottomRowComponents->_checkstyle($I, $FooterBottomRowComponents->bottomRowColumns, 'padding-bottom', 'xpath', '15px');
        $FooterBottomRowComponents->_checkstyle($I, $FooterBottomRowComponents->bottomRowColumns, 'min-height', 'xpath', '10px');
        $I->resizeWindow(375, 812);
        $I->wait(1);
        $FooterBottomRowComponents->_checkstyle($I, $FooterBottomRowComponents->bottomRowColumns, 'padding-top', 'xpath', '10px');
        $FooterBottomRowComponents->_checkstyle($I, $FooterBottomRowComponents->bottomRowColumns, 'padding-bottom', 'xpath', '10px');
        $FooterBottomRowComponents->_checkstyle($I, $FooterBottomRowComponents->bottomRowColumns, 'min-height', 'xpath', '10px');
    }


    public function LinkSettings(RespThemeTester $I, FooterBottomRowComponents $FooterBottomRowComponents)
    {
        $I->selectOption($FooterBottomRowComponents->linkStyle, 'normal');
        $I->click($FooterBottomRowComponents->linkColor);
        $I->click($FooterBottomRowComponents->linkColor8);
        $I->click($FooterBottomRowComponents->linkHoverColor);
        $I->click($FooterBottomRowComponents->linkHoverColor2);
        $I->click($FooterBottomRowComponents->publishButton);
        $I->wait(2);
        $I->amGoingTo('Check on the front end');
        $I->amOnPage('/');
        $I->scrollTo($FooterBottomRowComponents->link);
        $I->seeElement($FooterBottomRowComponents->link);
        $FooterBottomRowComponents->_checkstyle($I, $FooterBottomRowComponents->link, 'color', 'xpath', 'rgba(130, 36, 227, 1)');
        $I->moveMouseOver($FooterBottomRowComponents->link);
        $I->wait(2);
        $FooterBottomRowComponents->_checkstyle($I, $FooterBottomRowComponents->link, 'color', 'xpath', '(255, 255, 255, 1)');
    }


    public function BackgroundColor(RespThemeTester $I, FooterBottomRowComponents $FooterBottomRowComponents)
    {
        $I->click($FooterBottomRowComponents->backgroundDesk);
        $I->click($FooterBottomRowComponents->backgroundDesk3);
        $I->click($FooterBottomRowComponents->backgroundTab);
        $I->click($FooterBottomRowComponents->backgroundTab4);
        $I->click($FooterBottomRowComponents->backgroundMob);
        $I->click($FooterBottomRowComponents->backgroundMob2);
        $I->click($FooterBottomRowComponents->publishButton);
        $I->wait(2);
        $I->amGoingTo('Check on the front end');
        $I->amOnPage('/');
        $FooterBottomRowComponents->_checkstyle($I, $FooterBottomRowComponents->bkgColorBottomRow, 'background', 'xpath', 'rgb(221, 51, 51) none repeat scroll 0% 0% / auto padding-box border-box');
        $I->resizeWindow(768, 1024);
        $I->wait(1);
        $FooterBottomRowComponents->_checkstyle($I, $FooterBottomRowComponents->bkgColorBottomRow, 'background', 'xpath', 'rgb(221, 153, 51) none repeat scroll 0% 0% / auto padding-box border-box');
        $I->resizeWindow(375, 812);
        $I->wait(1);
        $FooterBottomRowComponents->_checkstyle($I, $FooterBottomRowComponents->bkgColorBottomRow, 'background', 'xpath', 'rgb(255, 255, 255) none repeat scroll 0% 0% / auto padding-box border-box');
    }


    public function TypographyOptions(RespThemeTester $I, FooterBottomRowComponents $FooterBottomRowComponents)
    {
        $I->selectOption($FooterBottomRowComponents->fontFamily, 'Georgia');
        $I->selectOption($FooterBottomRowComponents->fontWeight, '700');
        $I->selectOption($FooterBottomRowComponents->fontStyle, 'italic');
        $I->selectOption($FooterBottomRowComponents->textTransform, 'capitalize');
        $I->fillField($FooterBottomRowComponents->fontSize , '20 10 10');
        $I->fillField($FooterBottomRowComponents->lineHeight , '3');
        $I->fillField($FooterBottomRowComponents->letterSpacing , '3');
        $I->click($FooterBottomRowComponents->publishButton);
        $I->wait(2);
        $I->amGoingTo('Check on the front end');
        $I->amOnPage('/');
        $FooterBottomRowComponents->_checkstyle($I, $FooterBottomRowComponents->typoBottomRow, 'font-family', 'xpath', 'Georgia');
        $FooterBottomRowComponents->_checkstyle($I, $FooterBottomRowComponents->typoBottomRow, 'font-weight', 'xpath', '700');
        $FooterBottomRowComponents->_checkstyle($I, $FooterBottomRowComponents->typoBottomRow, 'font-style', 'xpath', 'italic');
        $FooterBottomRowComponents->_checkstyle($I, $FooterBottomRowComponents->typoBottomRow, 'text-transform', 'xpath', 'capitalize');
        $FooterBottomRowComponents->_checkstyle($I, $FooterBottomRowComponents->typoBottomRow, 'font-size', 'xpath', '13px');
        $FooterBottomRowComponents->_checkstyle($I, $FooterBottomRowComponents->typoBottomRow, 'line-height', 'xpath', '39px');
        $FooterBottomRowComponents->_checkstyle($I, $FooterBottomRowComponents->typoBottomRow, 'line-spacing', 'xpath', '');

        $I->amGoingTo('Check for Tablet View');
        $I->resizeWindow(768, 1024);
        $I->wait(1);
        $FooterBottomRowComponents->_checkstyle($I, $FooterBottomRowComponents->typoBottomRow, 'font-family', 'xpath', 'Georgia');
        $FooterBottomRowComponents->_checkstyle($I, $FooterBottomRowComponents->typoBottomRow, 'font-weight', 'xpath', '700');
        $FooterBottomRowComponents->_checkstyle($I, $FooterBottomRowComponents->typoBottomRow, 'font-style', 'xpath', 'italic');
        $FooterBottomRowComponents->_checkstyle($I, $FooterBottomRowComponents->typoBottomRow, 'text-transform', 'xpath', 'capitalize');
        $FooterBottomRowComponents->_checkstyle($I, $FooterBottomRowComponents->typoBottomRow, 'font-size', 'xpath', '13px');
        $FooterBottomRowComponents->_checkstyle($I, $FooterBottomRowComponents->typoBottomRow, 'line-height', 'xpath', '39px');
        $FooterBottomRowComponents->_checkstyle($I, $FooterBottomRowComponents->typoBottomRow, 'line-spacing', 'xpath', '');

        $I->amGoingTo('Check for Mobile View');
        $I->resizeWindow(375, 812);
        $I->wait(1);
        $FooterBottomRowComponents->_checkstyle($I, $FooterBottomRowComponents->typoBottomRow, 'font-family', 'xpath', 'Georgia');
        $FooterBottomRowComponents->_checkstyle($I, $FooterBottomRowComponents->typoBottomRow, 'font-weight', 'xpath', '700');
        $FooterBottomRowComponents->_checkstyle($I, $FooterBottomRowComponents->typoBottomRow, 'font-style', 'xpath', 'italic');
        $FooterBottomRowComponents->_checkstyle($I, $FooterBottomRowComponents->typoBottomRow, 'text-transform', 'xpath', 'capitalize');
        $FooterBottomRowComponents->_checkstyle($I, $FooterBottomRowComponents->typoBottomRow, 'font-size', 'xpath', '13px');
        $FooterBottomRowComponents->_checkstyle($I, $FooterBottomRowComponents->typoBottomRow, 'line-height', 'xpath', '39px');
        $FooterBottomRowComponents->_checkstyle($I, $FooterBottomRowComponents->typoBottomRow, 'line-spacing', 'xpath', '');
    }
}
