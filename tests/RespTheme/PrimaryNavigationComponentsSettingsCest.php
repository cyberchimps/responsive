<?php
use \page\RespTheme\Customizer;
use \page\RespTheme\LogInAndLogOut;
use \page\RespTheme\PrimaryNavigationComponents;
use \page\RespTheme\RespThemeHelper;

class PrimaryNavigationComponentsSettingsCest
{
    /**
     * This test checks the default settings of Primary Navigation in the preview and frontend.
     */
    public function PrimaryNavigationDefaultSettingsTest(RespThemeTester $I, LogInAndLogOut $loginAndLogout, Customizer $customizer, PrimaryNavigationComponents $primaryNavigationComponents, RespThemeHelper $helper)
    {
        $I->amGoingTo('Login as Admin');
        $loginAndLogout->userLogin($I);

        $I->amGoingTo('Open customizer >> Header >> Primary Navigation >> Primary Navigation component settings');
        $customizer->_openDefaultSettings($I, $customizer->desktopTab, $customizer->itemContainer, $customizer->addItemButton, $primaryNavigationComponents->navigation, $primaryNavigationComponents->navigationSettingBtn);

        $I->amGoingTo('Check available settings options in customizer for Primary Navigation.');
        $I->wait(1);
        $I->seeElement($primaryNavigationComponents->stretchPrimaryMenu);
        $I->seeElement($primaryNavigationComponents->fillCenterMenuItem);
        $I->seeElement($primaryNavigationComponents->navigationStyleSelect);
        $I->seeElement($primaryNavigationComponents->itemSpacingSlider);
        $I->seeElement($primaryNavigationComponents->itemSpacingInput);
        $I->seeElement($primaryNavigationComponents->itemVerticalSpacingSlider);
        $I->seeElement($primaryNavigationComponents->itemVerticalSpacingInput);
        $I->seeElement($primaryNavigationComponents->itemColorBtn);
        $I->seeElement($primaryNavigationComponents->itemHoverColorBtn);
        $I->seeElement($primaryNavigationComponents->itemActiveColorBtn); 
        $I->seeElement($primaryNavigationComponents->backgroundColorBtn);
        $I->seeElement($primaryNavigationComponents->backgroundHoverColorBtn);
        $I->seeElement($primaryNavigationComponents->backgroundActiveColorBtn);
        $I->seeElement($primaryNavigationComponents->dropdownRevealSelect);
        $I->seeElement($primaryNavigationComponents->dropdownWidthSlider);
        $I->seeElement($primaryNavigationComponents->dropdownWidthInput);
        $I->seeElement($primaryNavigationComponents->dropdownVerticalSpacingSlider);
        $I->seeElement($primaryNavigationComponents->dropdownVerticalSpacingInput);
        $I->seeElement($primaryNavigationComponents->dropdownItemDividerItemStyleSelect);
        $I->seeElement($primaryNavigationComponents->dropdownDividerWidthSlider);
        $I->seeElement($primaryNavigationComponents->dropdownDividerWidthInput);   
        $I->seeElement($primaryNavigationComponents->dropdownItemColorBtn);
        $I->seeElement($primaryNavigationComponents->dropdownItemHoverColorBtn);
        $I->seeElement($primaryNavigationComponents->dropdownActiveItemColorBtn);
        $I->seeElement($primaryNavigationComponents->dropdownBackgroundColorBtn);   
        $I->seeElement($primaryNavigationComponents->dropdownBackgroundHoverColorBtn);
        $I->seeElement($primaryNavigationComponents->dropdownActiveBackgroundColorBtn);
        $I->seeElement($primaryNavigationComponents->dropdownDeviderColorBtn);
        $I->seeElement($primaryNavigationComponents->typoFontFamilySelect);
        $I->seeElement($primaryNavigationComponents->typoFontWeightSelect);
        $I->seeElement($primaryNavigationComponents->typoFontStyleSelect);
        $I->seeElement($primaryNavigationComponents->typoTextTranformSelect);        
        $I->seeElement($primaryNavigationComponents->typoFontSizeSelect);
        $I->seeElement($primaryNavigationComponents->typoLineHeightSlider);
        $I->seeElement($primaryNavigationComponents->typoLineHeightInput);
        $I->seeElement($primaryNavigationComponents->typoLetterSpacingSlider);
        $I->seeElement($primaryNavigationComponents->typoLetterSpacingInput);
        $I->seeElement($primaryNavigationComponents->dropDownFontFamilySelect);
        $I->seeElement($primaryNavigationComponents->dropDownFontWeightSelect);
        $I->seeElement($primaryNavigationComponents->dropDownFontStyleSelect);
        $I->seeElement($primaryNavigationComponents->dropDownTextTransformSelect);
        $I->seeElement($primaryNavigationComponents->dropDownFontSizeInput);
        $I->seeElement($primaryNavigationComponents->dropDownLineHeightSlider);
        $I->seeElement($primaryNavigationComponents->dropDownLineHeightInput);
        $I->seeElement($primaryNavigationComponents->dropDownLetterSpacingSlider);
        $I->seeElement($primaryNavigationComponents->dropDownLetterSpacingInput);
        $I->wait(1);
        $I->click($helper->publishBtn);
        $I->wait(2);

        $I->amGoingTo('Check whether default primary navigation menu exists in the preview');
        $I->click($customizer->hideControl);
        $I->wait(1);
        $I->switchToIframe($customizer->previewIFrame);
        $I->wait(1);
        $I->seeElement($primaryNavigationComponents->fDefaultMenu);

        $I->amGoingTo('Check whether default primary navigation menu exists in the frontend');
        $I->amOnPage('/');
        $I->wait(2);
        $I->switchToIFrame();
        $I->wait(1);
        $I->seeElement($primaryNavigationComponents->fDefaultMenu);

        $I->amGoingTo('Open customizer settings.');
        $customizer->_openSettings($I, $customizer->desktopTab, $primaryNavigationComponents->navigationSettingBtn);

        $I->amGoingTo('Remove default primary navigation menu');
        $customizer->_removeItem($I, $customizer->desktopTab, $primaryNavigationComponents->removeNavigationSettingBtn);
        $I->wait(1);
        $I->click($helper->publishBtn);
        $I->wait(1); 

        $I->amGoingTo('Logout');
        $I->wait(1);
        $I->amOnPage('/');
        $I->wait(2);
        $loginAndLogout->userLogout($I);
    }

     /**
     * This test checks the Primary Navigation Style in the preview and frontend.
     */
    public function PrimaryNavigationStyleSettingsTest(RespThemeTester $I, LogInAndLogOut $loginAndLogout, Customizer $customizer, PrimaryNavigationComponents $primaryNavigationComponents, RespThemeHelper $helper)
    {
        $I->amGoingTo('Login as Admin');
        $loginAndLogout->userLogin($I);

        $I->amGoingTo('Open customizer >> Header >> Primary Navigation >> Primary Navigation component settings');
        $customizer->_openDefaultSettings($I, $customizer->desktopTab, $customizer->itemContainer, $customizer->addItemButton, $primaryNavigationComponents->navigation, $primaryNavigationComponents->navigationSettingBtn); 
        
        $I->amGoingTo('Change primary navigation style settings.');
        $I->click($primaryNavigationComponents->stretchPrimaryMenu);
        $I->wait(1);
        $helper->_selectItem($I, $primaryNavigationComponents->navigationStyleSelect, $primaryNavigationComponents->desktopNavigation);
        $I->fillField($primaryNavigationComponents->itemSpacingInput, '40');
        $I->fillField($primaryNavigationComponents->itemVerticalSpacingInput, '30');
        $helper->_setColor($I, $primaryNavigationComponents->itemColorBtn, $primaryNavigationComponents->colorInput, '#395e20');
        $helper->_setColor($I, $primaryNavigationComponents->itemHoverColorBtn, $primaryNavigationComponents->colorInput, '#945059');
        $helper->_setColor($I, $primaryNavigationComponents->itemActiveColorBtn, $primaryNavigationComponents->colorInput, '#736836');
        $helper->_setColor($I, $primaryNavigationComponents->backgroundColorBtn, $primaryNavigationComponents->colorInput, '#d79f9f');
        $helper->_setColor($I, $primaryNavigationComponents->backgroundHoverColorBtn, $primaryNavigationComponents->colorInput, '#81d8da');
        $helper->_setColor($I, $primaryNavigationComponents->backgroundActiveColorBtn, $primaryNavigationComponents->colorInput, '#8493dc');
        $I->click($helper->publishBtn);
        $I->wait(2);

        $I->amGoingTo('Check the primary navigation style settings in the preview.');
        $I->click($customizer->hideControl);
        $I->wait(1);
        $I->switchToIframe($customizer->previewIFrame);
        $I->wait(1);
        $helper->_checkStyle($I, $primaryNavigationComponents->currentMenuItem, 'color', 'xpath', 'rgba(115, 104, 54, 1)');
        $helper->_checkStyle($I, $primaryNavigationComponents->currentMenuItem, 'background-color', 'xpath', 'rgba(132, 147, 220, 1)');
        $helper->_checkStyle($I, $primaryNavigationComponents->otherMenuItem, 'color', 'xpath', 'rgba(57, 94, 32, 1)');
        $helper->_checkStyle($I, $primaryNavigationComponents->otherMenuItem, 'background-color', 'xpath', 'rgba(215, 159, 159, 1)');
        $helper->_checkStyle($I, $primaryNavigationComponents->otherMenuItem, 'padding', 'xpath', '30px 40px');
        $I->expectTo('See div with Class '.$primaryNavigationComponents->fStretchedNavigation);
        $I->moveMouseOver($primaryNavigationComponents->otherMenuItem);
        $I->wait(2);

        $I->amGoingTo('Check the primary navigation style settings in the frontend.');
        $I->amOnPage('/');
        $I->wait(1);
        $I->switchToIFrame();
        $I->wait(2);
        $helper->_checkStyle($I, $primaryNavigationComponents->currentMenuItem, 'color', 'xpath', 'rgba(115, 104, 54, 1)');
        $helper->_checkStyle($I, $primaryNavigationComponents->currentMenuItem, 'background-color', 'xpath', 'rgba(132, 147, 220, 1)');
        $helper->_checkStyle($I, $primaryNavigationComponents->otherMenuItem, 'color', 'xpath', 'rgba(57, 94, 32, 1)');
        $helper->_checkStyle($I, $primaryNavigationComponents->otherMenuItem, 'background-color', 'xpath', 'rgba(215, 159, 159, 1)');
        $I->expectTo('See div with Class '.$primaryNavigationComponents->fStretchedNavigation);
        $I->moveMouseOver($primaryNavigationComponents->otherMenuItem);
        $I->wait(2);

        $I->amGoingTo('Open customizer settings.');
        $customizer->_openSettings($I, $customizer->desktopTab, $primaryNavigationComponents->navigationSettingBtn);

        $I->amGoingTo('Reset the primary navigation style settings');
        $I->click($primaryNavigationComponents->stretchPrimaryMenu);
        $I->wait(1);
        $helper->_selectItem($I, $primaryNavigationComponents->navigationStyleSelect, $primaryNavigationComponents->defaultNavigation);
        $I->click($primaryNavigationComponents->resetItemSpacingInput);
        $I->click($primaryNavigationComponents->resetItemVerticalSpacing);
        $helper->_resetColor($I, $primaryNavigationComponents->defaultColorBtn, $primaryNavigationComponents->itemColorBtn);
        $helper->_resetColor($I, $primaryNavigationComponents->defaultColorBtn, $primaryNavigationComponents->itemHoverColorBtn);
        $helper->_resetColor($I, $primaryNavigationComponents->defaultColorBtn, $primaryNavigationComponents->itemActiveColorBtn);
        $helper->_resetColor($I, $primaryNavigationComponents->defaultColorBtn, $primaryNavigationComponents->backgroundColorBtn);
        $helper->_resetColor($I, $primaryNavigationComponents->defaultColorBtn, $primaryNavigationComponents->backgroundHoverColorBtn);
        $helper->_resetColor($I, $primaryNavigationComponents->defaultColorBtn, $primaryNavigationComponents->backgroundActiveColorBtn);
        $I->click($helper->publishBtn);
        $I->wait(1);

        $I->amGoingTo('Check reset primary navigation style settings in the preview');
        $I->click($customizer->hideControl);
        $I->wait(1);
        $I->switchToIframe($customizer->previewIFrame);
        $I->wait(1);
        $helper->_checkStyle($I, $primaryNavigationComponents->currentMenuItem, 'color', 'xpath', 'rgba(51, 51, 51, 1)');
        $helper->_checkStyle($I, $primaryNavigationComponents->currentMenuItem, 'background-color', 'xpath', 'rgba(255, 255, 255, 1)');
        $helper->_checkStyle($I, $primaryNavigationComponents->otherMenuItem, 'color', 'xpath', 'rgba(51, 51, 51, 1)');
        $helper->_checkStyle($I, $primaryNavigationComponents->otherMenuItem, 'background-color', 'xpath', 'rgba(255, 255, 255, 1)');
        $I->cantSee($primaryNavigationComponents->fStretchedNavigation);
        $I->moveMouseOver($primaryNavigationComponents->otherMenuItem);

        $I->amGoingTo('Check the primary navigation style settings in the frontend.');
        $I->amOnPage('/');
        $I->wait(1);
        $I->switchToIFrame();
        $I->wait(2);
        $helper->_checkStyle($I, $primaryNavigationComponents->currentMenuItem, 'color', 'xpath', 'rgba(51, 51, 51, 1)');
        $helper->_checkStyle($I, $primaryNavigationComponents->currentMenuItem, 'background-color', 'xpath', 'rgba(255, 255, 255, 1)');
        $helper->_checkStyle($I, $primaryNavigationComponents->otherMenuItem, 'color', 'xpath', 'rgba(51, 51, 51, 1)');
        $helper->_checkStyle($I, $primaryNavigationComponents->otherMenuItem, 'background-color', 'xpath', 'rgba(255, 255, 255, 1)');
        $I->cantSee($primaryNavigationComponents->fStretchedNavigation);
        $I->moveMouseOver($primaryNavigationComponents->otherMenuItem);
        $I->wait(2);

        $I->amGoingTo('Open customizer settings.');
        $customizer->_openSettings($I, $customizer->desktopTab, $primaryNavigationComponents->navigationSettingBtn);

        $I->amGoingTo('Remove Primary Navigation style settings from the customizer.');
        $customizer->_removeItem($I, $customizer->desktopTab, $primaryNavigationComponents->removeNavigationSettingBtn);
        $I->wait(1);
        $I->click($helper->publishBtn);

        $I->amGoingTo('Check primary navigation exists in preview or not.');
        $I->click($customizer->hideControl);
        $I->wait(1);
        $I->switchToIframe($customizer->previewIFrame);
        $I->wait(1);
        $I->cantSeeElement($primaryNavigationComponents->fDefaultMenu);

        $I->amGoingTo(' Check primary navigation exists in frontend or not.');
        $I->amOnPage('/');
        $I->wait(2);
        $I->switchToIFrame();
        $I->wait(1);
        $I->cantSeeElement($primaryNavigationComponents->fDefaultMenu);

        $I->amGoingTo('Logout');
        $I->wait(1);
        $I->amOnPage('/');
        $I->wait(2);
        $loginAndLogout->userLogout($I);
    }
}
