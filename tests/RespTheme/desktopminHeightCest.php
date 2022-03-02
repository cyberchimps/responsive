<?php
use \page\RespTheme\Customizer;
use \page\RespTheme\LogInAndLogOut;

class desktopminHeightCest
{
    public function _before(RespThemeTester $I)
    {
    }

    // tests
    public function DesktopMinHeightSettings(RespThemeTester $I,LogInAndLogOut $loginAndLogout, Customizer $customizer)
    {
        $I->amGoingTo('Login as Admin');
        $loginAndLogout->userLogin($I);
        $I->click('/html/body/div[1]/div/ul[1]/li[3]/a');
        $I->wait(2);
        $I->scrollTo('html/body/div[1]/form/div[3]/div[2]/div[2]/ul[1]/li[37]/h3/');
        $I->wait(2);
        $I->click('/html/body/div[1]/form/div[3]/div[2]/div[2]/ul[1]/li[37]/h3');
        $I->wait(2);
        $I->click('/html/body/div[1]/form/div[3]/div[2]/div[2]/ul[6]/li[6]/h3');
        $I->wait(3);
        $I->fillField('/html/body/div[1]/form/div[3]/div[2]/div[2]/ul[55]/li[5]/label/div/input[2]','1');
        $I->wait(2);
        
    }
}
