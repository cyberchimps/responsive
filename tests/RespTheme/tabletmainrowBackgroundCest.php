<?php
use \page\RespTheme\Customizer;
use \page\RespTheme\LogInAndLogOut;


class tabletmainrowBackgroundCest
{
    public function _before(RespThemeTester $I)
    {
    }

    // tests
    public function TabletMainrowBackgroundSettings(RespThemeTester $I,LogInAndLogOut $loginAndLogout, Customizer $customizer)
    {
        $I->amGoingTo('Login as Admin');
        $loginAndLogout->userLogin($I);
        $I->click('/html/body/div[1]/div/ul[1]/li[3]/a');
        $I->wait(2);
        $I->scrollTo('/html/body/div[1]/form/div[3]/div[2]/div[2]/ul[1]/li[37]/h3');
        $I->wait(2);
        $I->click('/html/body/div[1]/form/div[3]/div[2]/div[2]/ul[1]/li[37]/h3');
        $I->wait(2);
        $I->click('/html/body/div[1]/form/div[3]/div[2]/div[2]/ul[6]/li[6]/h3');
        $I->wait(3);
        $I->click('/html/body/div[1]/form/div[3]/div[2]/div[2]/ul[55]/li[9]/label/div/div/button/span');
        $I->click('/html/body/div[1]/form/div[3]/div[2]/div[2]/ul[55]/li[9]/label/div/div/div/div[1]/div[1]/div[2]/div/div');
        $I->wait(2);
    }
}
