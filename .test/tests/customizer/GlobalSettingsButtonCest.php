<?php 
use \Page\Customizer\AdminLogin;
use \Page\Customizer\Customizer;
use \Page\Customizer\Home;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class GlobalSettingsButtonCest
{
    public function _before(CustomizerTester $I)
    {
    }

    // tests
    public function tryToTest(CustomizerTester $I, AdminLogin $AdminLoginPage, Customizer $CustomizerPage, Home $HomaPage)
    {
    	$I->amGoingTo('Login as Admin');
    	$AdminLoginPage->adminLogin($I);

    	//Check options for button in customizer
    	$I->amGoingTo('Check options for button in Customizer');
        $I->amGoingTo('Open Customizer');
        $I->amOnPage($CustomizerPage->url);
        $I->click($CustomizerPage->customizer_globalSettings);
        $I->wait(1);
        $I->click($CustomizerPage->customizer_globalSettings_buttons);
        $I->wait(1);
        $I->seeElement($CustomizerPage->customizer_globalSettings_buttonsPadding);
        $I->seeElement($CustomizerPage->customizer_globalSettings_buttonsWidth);
        $I->see('Buttons Typography');
        $I->seeElement($CustomizerPage->customizer_globalSettings_buttonsFontFamily);
        $I->seeElement($CustomizerPage->customizer_globalSettings_buttonsFontWeight);
        $I->seeElement($CustomizerPage->customizer_globalSettings_buttonsFontStyle);
        $I->seeElement($CustomizerPage->customizer_globalSettings_buttonsTextTransform);
        $I->seeElement($CustomizerPage->customizer_globalSettings_buttonsFontSize);
        $I->seeElement($CustomizerPage->customizer_globalSettings_buttonsLineHeight);
        $I->seeElement($CustomizerPage->customizer_globalSettings_buttonsLetterSpacing);
    }
}
