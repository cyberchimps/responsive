<?php
use \page\RespTheme\Customizer;
use \page\RespTheme\LogInAndLogOut;

class mobileminHeightCest
{
    public function _before(RespThemeTester $I)
    {
    }

    // tests
    public function tryToTest(RespThemeTester $I, LogInAndLogOut $loginAndLogout, Customizer $customizer)
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
        $I->fillField('//*[@id="customize-control-responsive_main_row_min_height_mobile"]/label/div/input[2]','0');
        $I->wait(2);
    }
}
