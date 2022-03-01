<?php 
use \Page\Customizer\AdminLogin;
use \Page\Customizer\Customizer;
use \Page\Customizer\Home;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class GlobalSettingsFormFieldsCest
{
    public function _before(CustomizerTester $I)
    {
    }

    // tests
    public function tryToTest(CustomizerTester $I, AdminLogin $AdminLoginPage, Customizer $CustomizerPage, Home $HomaPage)
    {
    	$I->amGoingTo('Login as Admin');
    	$AdminLoginPage->adminLogin($I);

    	//Check options for form field in customizer
    	$I->amGoingTo('Check options for form field in Customizer');
        $I->amGoingTo('Open Customizer');
        $I->amOnPage($CustomizerPage->url);
        $I->click($CustomizerPage->customizer_globalSettings);
        $I->wait(1);
        $I->click($CustomizerPage->customizer_globalSettings_formFields);
        $I->wait(1);
        $I->seeElement($CustomizerPage->customizer_globalSettings_formFieldsPaddingTop);
        $I->seeElement($CustomizerPage->customizer_globalSettings_formFieldsRadius);
        $I->seeElement($CustomizerPage->customizer_globalSettings_formFieldsBorderWidth);
        $I->see('FORM FIELDS TYPOGRAPHY');
        $I->seeElement($CustomizerPage->customizer_globalSettings_formFieldsFontFamily);
        $I->seeElement($CustomizerPage->customizer_globalSettings_formFieldsFontWeight);
        $I->seeElement($CustomizerPage->customizer_globalSettings_formFieldsFontStyle);
        $I->seeElement($CustomizerPage->customizer_globalSettings_formFieldsTextTransform);
        $I->seeElement($CustomizerPage->customizer_globalSettings_formFieldsFontSize);
        $I->seeElement($CustomizerPage->customizer_globalSettings_formFieldsLineHeight);
        $I->seeElement($CustomizerPage->customizer_globalSettings_formFieldsLetterSpacing);
    }
}
