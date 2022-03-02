<?php
use \page\RespTheme\Customizer;
use \page\RespTheme\LogInAndLogOut;

class desktopBackgroundCest
{
    public function _before(RespThemeTester $I)
    {
    }

    // tests
    public function tryToTest(RespThemeTester $I,  LogInAndLogOut $loginAndLogout, Customizer $customizer)
    {
        $I->amGoingTo('Login as Admin');
        $loginAndLogout->userLogin($I);
        $I->click('//*[@id="wp-admin-bar-customize"]/a');
        $I->wait(2);
        $I->scrollTo('//*[@id="accordion-panel-responsive_header"]/h3');
        $I->wait(2);
        $I->click('//*[@id="accordion-panel-responsive_header"]/h3');
        $I->wait(2);
        $I->click('//*[@id="accordion-section-responsive_customizer_header_main"]/h3');
        $I->wait(3);
        $I->click('//*[@id="customize-control-responsive_main_row_background_desktop_color"]/label/div/div/button/span');
        $I->wait(2);
        $I->click('//*[@id="customize-control-responsive_main_row_background_desktop_color"]/label/div/div/div/div[1]/div[1]/div[2]/div');
        $I->wait(2);
    }
}
