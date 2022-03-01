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
        
        /*this checks the tablet layout settings for the top row */
        $I->click('//*[@id="customize-footer-actions"]/div/div/button[2]');
        $I->wait(2);
        $I->selectOption('//*[@id="customize-control-responsive_header_tablet_top_layout"]/select', 'fullwidth');
        $I->wait(2);
        $I->selectOption('//*[@id="customize-control-responsive_header_tablet_top_layout"]/select', 'contained');
        $I->wait(2);
        $I->selectOption('//*[@id="customize-control-responsive_header_tablet_top_layout"]/select', 'standard');
        $I->wait(2);

        /*this checks the mobile layout settings for the top row */
        $I->click('//*[@id="customize-footer-actions"]/div/div/button[3]');
        $I->wait(2);
        $I->selectOption('//*[@id="customize-control-responsive_header_mobile_top_layout"]/select', 'fullwidth');
        $I->wait(2);
        $I->selectOption('//*[@id="customize-control-responsive_header_mobile_top_layout"]/select', 'contained');
        $I->wait(2);
        $I->selectOption('//*[@id="customize-control-responsive_header_mobile_top_layout"]/select', 'standard');
        $I->wait(2);
        
        /*this checks min height settings for the top row */
        $I->click('//*[@id="customize-footer-actions"]/div/div/button[1]');
        $I->fillField('//*[@id="customize-control-responsive_top_row_min_height"]/label/div/input[2]', '110');
        $I->wait(2);

        /*this checks the min height for tablet settings for the top row */
        $I->click('//*[@id="customize-footer-actions"]/div/div/button[2]');
        $I->fillField('//*[@id="customize-control-responsive_top_row_min_height_tablet"]/label/div/input[2]', '50');
        $I->wait(2);

        /*this checks the min height for mobile settings for the top row */
        $I->click('//*[@id="customize-footer-actions"]/div/div/button[3]');
        $I->fillField('//*[@id="customize-control-responsive_top_row_min_height_mobile"]/label/div/input[2]', '30');
        $I->wait(2);
        
        /*this checks the desktop background colour for top row */
        $I->click('//*[@id="customize-footer-actions"]/div/div/button[1]');
        $I->scrollTo('//*[@id="customize-control-responsive_top_row_background_tablet_color"]/label/span');
        $I->click('//*[@id="customize-control-responsive_top_row_background_desktop_color"]/label/div/div/button');
        $I->wait(2);
        /*$I->scrollTo('//*[@id="customize-control-responsive_top_row_background_desktop_color"]/label/div/div/div/button');
        $I->wait(2);
        $I->click('//*[@id="customize-control-responsive_top_row_background_desktop_color"]/label/div/div/div/div[1]/div[2]/div[1]/button');
        $I->wait(4);
        $I->fillField('//*[@id="inspector-input-control-7"]', '#dd3333');
        $I->wait(4);*/
        $I->click('//*[@id="customize-control-responsive_top_row_background_desktop_color"]/label/div/div/div/div[2]/div/div/div[8]/button');
        $I->wait(2);

        /*this checks the tablet background colour for top row */
        $I->click('//*[@id="customize-footer-actions"]/div/div/button[2]');
        $I->scrollTo('//*[@id="customize-control-responsive_top_row_background_tablet_color"]');
        $I->click('//*[@id="customize-control-responsive_top_row_background_tablet_color"]/label/div/div/button');
        $I->wait(2);
        //$I->click('//*[@id="customize-control-responsive_top_row_background_tablet_color"]/label/div/div/div/div[1]/div[2]/div[1]/button');
        //$I->fillField('//*[@id="inspector-input-control-5"]', '#eeee22');
        //$I->wait(4);
        $I->click('//*[@id="customize-control-responsive_top_row_background_tablet_color"]/label/div/div/div/div[2]/div/div/div[1]/button');
        $I->wait(2);

        /*this checks the mobile background colour for top row */
        $I->click('//*[@id="customize-footer-actions"]/div/div/button[3]');
        $I->scrollTo('//*[@id="customize-control-responsive_top_row_background_mobile_color"]');
        $I->click('//*[@id="customize-control-responsive_top_row_background_mobile_color"]/label/div/div/button');
        $I->wait(2);
        //$I->click('//*[@id="customize-control-responsive_top_row_background_tablet_color"]/label/div/div/div/div[1]/div[2]/div[1]/button');
        //$I->fillField('//*[@id="inspector-input-control-5"]', '#eeee22');
        //$I->wait(4);
        $I->click('//*[@id="customize-control-responsive_top_row_background_mobile_color"]/label/div/div/div/div[2]/div/div/div[3]/button');
        $I->wait(2);

        /*this checks the padding for desktop for the top row */
        $I->scrollTo('//*[@id="customize-control-responsive_top_row_padding"]');
        $I->wait(2);
        $I->click('//*[@id="customize-control-responsive_top_row_padding"]/span/ul/li[1]/button');
        $I->wait(2);
        $I->fillField('//*[@id="customize-control-responsive_top_row_padding"]/ul[1]/li[1]/input', '50');
        $I->wait(2);
        $I->click('//*[@id="customize-control-responsive_top_row_padding"]/span/ul/li[1]/button');


        /*this checks the padding for tablet for the top row */
        $I->scrollTo('//*[@id="customize-control-responsive_top_row_padding"]');
        $I->wait(2);
        $I->click('//*[@id="customize-control-responsive_top_row_padding"]/span/ul/li[2]/button');
        $I->wait(2);
        $I->fillField('//*[@id="customize-control-responsive_top_row_padding"]/ul[2]/li[1]/input', '30');
        $I->wait(2);

        /*this checks the padding for mobile for the top row */
        $I->scrollTo('//*[@id="customize-control-responsive_top_row_padding"]');
        $I->wait(2);
        $I->click('//*[@id="customize-control-responsive_top_row_padding"]/span/ul/li[3]/button');
        $I->wait(2);
        $I->fillField('//*[@id="customize-control-responsive_top_row_padding"]/ul[3]/li[1]/input', '15');
        $I->wait(2);
    }
}