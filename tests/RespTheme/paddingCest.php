<?php
use \page\RespTheme\Customizer;
use \page\RespTheme\LogInAndLogOut;


class paddingCest
{
    public function _before(RespThemeTester $I)
    {
    }

    // tests
    public function PaddingSettings(RespThemeTester $I,  LogInAndLogOut $loginAndLogout, Customizer $customizer)
    {
        $I->amGoingTo('Login as Admin');
        $loginAndLogout->userLogin($I);
        $I->click('/html/body/div[1]/div/ul[1]/li[3]/a');
        $I->wait(2);
        $I->scrollTo('html/body/div[1]/form/div[3]/div[2]/div[2]/ul[1]/li[37]/h3/');
        $I->wait(2);
        $I->click('html/body/div[1]/form/div[3]/div[2]/div[2]/ul[1]/li[37]/h3/');
        $I->wait(2);
        $I->click('/html/body/div[1]/form/div[3]/div[2]/div[2]/ul[6]/li[6]/h3');
        $I->wait(3);
        $I->click('/html/body/div[1]/form/div[3]/div[2]/div[2]/ul[55]/li[11]/span/ul/li[1]/button/i');
        $I->fillField('/html/body/div[1]/form/div[3]/div[2]/div[2]/ul[55]/li[11]/ul[2]/li[1]/input','5');
        $I->wait(2);
        $I->click('/html/body/div[1]/form/div[3]/div[2]/div[2]/ul[55]/li[11]/span/ul/li[2]/button/i');
        $I->fillField('/html/body/div[1]/form/div[3]/div[2]/div[2]/ul[55]/li[11]/ul[2]/li[1]/input','3');
        $I->wait(2);
        $I->click('/html/body/div[1]/form/div[3]/div[2]/div[2]/ul[55]/li[11]/span/ul/li[3]/button/i');
        $I->fillField('/html/body/div[1]/form/div[3]/div[2]/div[2]/ul[55]/li[11]/ul[2]/li[1]/input','5');
        $I->wait(2);
        
    }
}
