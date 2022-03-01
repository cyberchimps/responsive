<?php 
use \Page\Customizer\AdminLogin;
use \Page\Customizer\Customizer;
use \Page\Customizer\Home;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class GlobalSettingsColorPalettesSchemeCest
{
    public function _before(CustomizerTester $I)
    {
    }

    // tests
    public function tryToTest(CustomizerTester $I, AdminLogin $AdminLoginPage, Customizer $CustomizerPage, Home $HomePage)
    {
    	$I->amGoingTo('Login as Admin');
    	$AdminLoginPage->adminLogin($I);

    	//Check options for color palettes in customizer
    	$I->amGoingTo('Check options for color palettes in Customizer');
        $I->amGoingTo('Open Customizer');
        $I->amOnPage($CustomizerPage->url);
        $I->click($CustomizerPage->customizer_globalSettings);
        $I->wait(1);
        $I->click($CustomizerPage->customizer_globalSettings_colorPalettesScheme);
        $I->wait(1);
        $I->see('Color Palettes Scheme');
        $I->see('Default');
        $I->see('Frolic');
        $I->see('Coral');
        $I->see('Organic');
        $I->see('Berry');
        $I->see('Apricot');
        $I->see('Emerald');
        $I->see('Brick');
        $I->see('Bronze');
        $I->see('Shade');
        $I->see('Blush');
        $I->see('Indiresponsive');
        $I->see('Pacific');
        $I->see('Plum');
        $I->see('Steel');
        $I->see('Avocado');
        $I->see('Champagne');
        $I->see('Spruce');
        $I->see('Mocha');
        $I->see('Lavender');
    }
}
