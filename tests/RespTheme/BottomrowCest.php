<?php

use \page\RespTheme\Customizer;
use \page\RespTheme\LogInAndLogOut;
use \Page\RespTheme\Toprow;

class BottomrowCest
{
    public function _before(RespThemeTester $I)
    {
    }

    // tests
    public function BottomRowCases(RespThemeTester $I, LogInAndLogOut $loginAndLogout, Customizer $customizer, Toprow $Toprow)
    {
        $I->amGoingTo('Login as Admin');
        $loginAndLogout->userLogin($I);

        $I->amGoingTo('Bottom row section');
        $I->click($Toprow->customizebutton);
        $I->wait(2);
        $I->scrollTo($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->headerbutton);
        $I->click($Toprow->bottomrowbtn);
        $I->wait(2);

        $I->amGoingTo('Check the bottom row desktop layout');
        $I->selectOption($Toprow->bottomrowdesklayout, 'fullwidth');
        $I->wait(2);
        $I->selectOption($Toprow->bottomrowdesklayout, 'standard');
        $I->click($Toprow->publishbutton);
        $I->wait(5);

        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->seeElement($Toprow->botdesklayoutelement);
        $I->click($Toprow->customizebutton);
        $I->wait(2);
        $I->scrollTo($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->bottomrowbtn);

        $I->amGoingTo('check the tablet layout settings for the bottom row');
        $I->click($Toprow->tabletlayout);   
        $I->wait(2);
        $I->selectOption($Toprow->bottomrowtabletlayout, 'fullwidth');
        $I->wait(2);
        $I->selectOption($Toprow->bottomrowtabletlayout, 'contained');
        $I->wait(2);
        $I->selectOption($Toprow->bottomrowtabletlayout, 'standard');
        $I->wait(2);
        $I->click($Toprow->publishbutton);
        $I->wait(5);

        /*$I->amOnPage('/');
        $I->resizeWindow(820, 1180);
        $I->wait(1);
        $I->seeElement($Toprow->botminhttabelement);
        $I->resizeWindow(980, 713.90);
        $I->click($Toprow->customizebutton);
        $I->wait(1);
        $I->scrollTo($Toprow->headerbutton);
        $I->wait(1);
        $I->click($Toprow->headerbutton);
        $I->wait(1);
        $I->click($Toprow->bottomrowbtn);
        */



        $I->amGoingTo('check the mobile layout settings for the bottom row');
        $I->click($Toprow->mobilelayout);
        $I->wait(2);
        $I->selectOption($Toprow->bottomrowmoblayout, 'fullwidth');
        $I->wait(2);
        $I->selectOption($Toprow->bottomrowmoblayout, 'contained');
        $I->wait(2);
        $I->selectOption($Toprow->bottomrowmoblayout, 'standard');
        $I->wait(2);

        /*$I->amOnPage('/');
        $I->resizeWindow(390, 844);*/

        $I->amGoingTo('check min height settings for the bottom row');
        $I->click($Toprow->desktoplayout);
        $I->fillField($Toprow->botminheightdesktop, '150');
        $I->wait(2);
        $I->click($Toprow->publishbutton);
        $I->wait(5);

        $I->amOnPage('/');
        $I->seeElement($Toprow->botminhtdeskelement);
        $I->click($Toprow->customizebutton);
        $I->wait(2);
        $I->scrollTo($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->headerbutton);
        $I->wait(2);
        $I->click($Toprow->bottomrowbtn);

        $I->amGoingTo('check the min height for tablet settings for the bottom row');
        $I->click($Toprow->tabletlayout);
        $I->fillField($Toprow->botminheighttablet, '40');
        $I->wait(2);

        $I->amGoingTo('check the min height for mobile settings for the bottom row');
        $I->click($Toprow->mobilelayout);
        $I->fillField($Toprow->botminheightmobile, '20');
        $I->wait(2);

        $I->amGoingTo('check the desktop background colour for bottom row');
        $I->click($Toprow->desktoplayout);
        $I->scrollTo($Toprow->botbackgrounddesktop);
        $I->click($Toprow->botbackgrounddesktop);
        $I->wait(2);
        $I->click($Toprow->botdeskcolor);
        $I->wait(2);

        $I->amGoingTo('check the tablet background colour for bottom row');
        $I->click($Toprow->tabletlayout);
        $I->scrollTo($Toprow->botbackgroundtablet);
        $I->click($Toprow->botbackgroundtablet);
        $I->wait(2);
        $I->click($Toprow->bottabletcolor);
        $I->wait(2);

        $I->amGoingTo('check the mobile background colour for bottom row');
        $I->click($Toprow->mobilelayout);
        $I->scrollTo($Toprow->botbackgroundmobile);
        $I->click($Toprow->botbackgroundmobile);
        $I->wait(2);
        $I->click($Toprow->botmobilecolor);
        $I->wait(2);

        $I->amGoingTo('check the padding for desktop for the bottom row ');
        $I->scrollTo($Toprow->botpaddingspan);
        $I->wait(2);
        $I->click($Toprow->botpaddinglayoutdesktop);
        $I->wait(2);
        $I->fillField($Toprow->botpaddingfielddesktop, '30');
        $I->wait(2);
        $I->click($Toprow->botpaddinglayoutdesktop);
       
        $I->amGoingTo('check the padding for tablet for the bottom row');
        $I->scrollTo($Toprow->botpaddingspan);
        $I->wait(2);
        $I->click($Toprow->botpaddinglayouttablet);
        $I->wait(2);
        $I->fillField($Toprow->botpaddingfieldtablet, '20');
        $I->wait(2);

        $I->amGoingTo('check the padding for mobile for the bottom row ');
        $I->scrollTo($Toprow->botpaddingspan);
        $I->wait(2);
        $I->click($Toprow->botpaddinglayoutmobile);
        $I->wait(2);
        $I->fillField($Toprow->botpaddingfieldmobile, '10');
        $I->wait(2);
    }
}
