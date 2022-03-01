<?php

use \page\RespTheme\Customizer;
use \page\RespTheme\LogInAndLogOut;

class ToprowCest
{
    public function _before(RespThemeTester $I)
    {
    }

    // tests
    public function tryToTest(RespThemeTester $I,  LogInAndLogOut $loginAndLogout, Customizer $customizer)
    {
        //$I->wait(5);
        $I->amGoingTo('Login as Admin');
        $loginAndLogout->userLogin($I);
        //$I->wait(3);
        $I->click('//*[@id="wp-admin-bar-customize"]/a');
        $I->wait(2);
        $I->scrollTo('//*[@id="accordion-panel-responsive_header"]/h3');
        $I->wait(2);
        $I->click('//*[@id="accordion-panel-responsive_header"]/h3');
        $I->wait(2);
        $I->click('//*[@id="accordion-section-responsive_customizer_header_top"]');
        $I->wait(3);
        /*this checks the desktop layout settings for top row */
        $I->selectOption('//*[@id="customize-control-responsive_header_top_layout"]/select', 'fullwidth');
        $I->wait(2);
        $I->selectOption('//*[@id="customize-control-responsive_header_top_layout"]/select', 'standard');
        $I->wait(2);

        //$I->selectOption('//*[@id="customize-control-responsive_header_tablet_top_layout"]/select', 'standard', 'fullwidth', 'contained');
        //$I->selectOption('//*[@id="customize-control-responsive_header_tablet_top_layout"]/select', Locator::combine('standard','fullwidth','contained'));
        $I->wait(2);
    }
}