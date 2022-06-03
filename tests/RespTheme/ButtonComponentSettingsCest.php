<?php
use \page\RespTheme\Customizer;
use \page\RespTheme\LogInAndLogOut;
use \page\RespTheme\ButtonComponents;
use \page\RespTheme\RespThemeHelper;

class ButtonComponentSettingsCest
{
    /**
     * This test check the default options available for button component in the customizer.
     */
    public function DefaultButtonSettingsTest(RespThemeTester $I, LogInAndLogOut $loginAndLogout, Customizer $customizer, ButtonComponents $buttonComponent, RespThemeHelper $helper)
    {
        $I->amGoingTo('Login as Admin');
        $loginAndLogout->userLogin($I);

        $I->amGoingTo('Open customizer >> Header >> Button >> Button component settings');
        $customizer->_openDefaultSettings($I, $customizer->desktopTab, $customizer->itemContainer, $customizer->addItemButton, $buttonComponent->button, $buttonComponent->buttonSettingBtn);

        $I->amGoingTo('Check available settings options in customizer for Button');
        $I->seeElement($buttonComponent->buttonLabelInput);
        $I->wait(1);
        $I->seeElement($buttonComponent->buttonUrlInput);
        $I->seeElement($buttonComponent->buttonSizeSelect);
        $I->seeElement($buttonComponent->buttonStyleSelect);
        $I->seeElement($buttonComponent->buttonVisibilitySelect);
        $I->seeElement($buttonComponent->newTabCheck);
        $I->seeElement($buttonComponent->noFollowCheck);
        $I->seeElement($buttonComponent->linkAtrributeCheck);
        $I->seeElement($buttonComponent->linkDownloadCheck);
        $I->wait(2);
        $I->click($helper->publishBtn);

        $I->amGoingTo('Check whether default button exists in the preview');
        $I->click($customizer->hideControl);
        $I->wait(1);
        $I->switchToIframe($buttonComponent->previewIFrame);
        $I->wait(1);
        $I->seeElement($buttonComponent->fDefaultButton);

        $I->amGoingTo('Check whether default button exists in the frontend');
        $I->amOnPage('/');
        $I->wait(2);
        $I->switchToIFrame();
        $I->wait(1);
        $I->seeElement($buttonComponent->fDefaultButton);

        $I->amGoingTo('Remove button item from the customizer.');
        $customizer->_openSettings($I, $customizer->desktopTab, $buttonComponent->buttonSettingBtn);
        $I->click($buttonComponent->removeButtonBtn);
        $I->wait(1);
        $I->click($helper->publishBtn);
        $I->wait(1); 

        $I->amGoingTo('Logout');
        $I->amOnPage('/');
        $loginAndLogout->userLogout($I);
    }

    /**
     * This test checks the desktop settings changes in the preview and frontend.
     */
    public function DesktopButtonSettingsTest(RespThemeTester $I, LogInAndLogOut $loginAndLogout, Customizer $customizer, ButtonComponents $buttonComponent, RespThemeHelper $helper)
    {
        $I->amGoingTo('Login as Admin');
        $loginAndLogout->userLogin($I);

        $I->amGoingTo('Open customizer >> Header >> Button >> Button component settings');
        $customizer->_openDefaultSettings($I, $customizer->desktopTab, $customizer->itemContainer, $customizer->addItemButton, $buttonComponent->button, $buttonComponent->buttonSettingBtn);

        $I->amGoingTo('Change button settings for desktop view');
        $I->fillField($buttonComponent->buttonLabelInput, $buttonComponent->desktopButtonLabel);
        $I->wait(1);
        $I->fillField($buttonComponent->buttonUrlInput, $buttonComponent->desktopButtonUrl);
        $I->wait(1);
        $I->click($buttonComponent->newTabCheck);
        $I->click($buttonComponent->noFollowCheck);
        $helper->_selectItem($I, $buttonComponent->buttonSizeSelect, $buttonComponent->desktopButtonSize);
        $I->wait(1);
        $helper->_selectItem($I, $buttonComponent->buttonStyleSelect, $buttonComponent->desktopButtonStyle);
        $I->wait(1);
        $helper->_selectItem($I, $buttonComponent->buttonVisibilitySelect, $buttonComponent->desktopButtonVisibility);
        $I->wait(2);
        $I->click($helper->publishBtn);
        $I->wait(1);

        $I->amGoingTo('Check settings in the preview.');
        $I->click($customizer->hideControl);
        $I->wait(1);
        $I->switchToIframe($buttonComponent->previewIFrame);
        $I->wait(1);
        $I->seeElement($buttonComponent->fButton);
        $I->expectTo('See button with Class '.$buttonComponent->fSmallSizeOutlineStyleButton);
        $I->wait(1);

        $I->amGoingTo('Check the button desktop settings in the frontend.');
        $I->amOnPage('/');
        $I->wait(2);
        $I->switchToIFrame();
        $I->wait(1);
        $I->seeElement($buttonComponent->fButton);
        $I->expectTo('See button with Class '.$buttonComponent->fSmallSizeOutlineStyleButton);
        $I->click($buttonComponent->fButton);
        $I->wait(3);
        $I->switchToNextTab();
        $I->wait(1);
        $I->see('Google');
        $I->closeTab();
        $I->wait(2);

        $I->amGoingTo('Reset the Button settings for desktop.');
        $customizer->_openSettings($I, $customizer->desktopTab, $buttonComponent->buttonSettingBtn);
        $I->fillField($buttonComponent->buttonLabelInput, $buttonComponent->defaultLabel);
        $I->wait(1);
        $I->fillField($buttonComponent->buttonUrlInput, $buttonComponent->defaultUrl);
        $I->wait(1);
        $I->click($buttonComponent->newTabCheck);
        $I->click($buttonComponent->noFollowCheck);
        $helper->_selectItem($I, $buttonComponent->buttonSizeSelect, $buttonComponent->defaultButtonSize);
        $I->wait(1);
        $helper->_selectItem($I, $buttonComponent->buttonStyleSelect, $buttonComponent->defaultButtonStyle);
        $I->wait(1);
        $helper->_selectItem($I, $buttonComponent->buttonVisibilitySelect, $buttonComponent->defaultButtonVisibility);
        $I->wait(2);
        $I->click($helper->publishBtn);
        $I->wait(1);    
        
        $I->amGoingTo('Check the default button settings in the preview');
        $I->click($customizer->hideControl);
        $I->wait(1);
        $I->switchToIframe($buttonComponent->previewIFrame);
        $I->wait(1);
        $I->seeElement($buttonComponent->fDefaultButton);
        $I->expectTo('See button with Class '.$buttonComponent->fMediumSizeFilledStyleButton);

        $I->amGoingTo('Check the default button settings in the frontend');
        $I->amOnPage('/');
        $I->wait(2);
        $I->switchToIFrame();
        $I->wait(1);
        $I->seeElement($buttonComponent->fDefaultButton);
        $I->expectTo('See button with Class '.$buttonComponent->fMediumSizeFilledStyleButton);
        $I->click($buttonComponent->fDefaultButton);

        $I->amGoingTo('Remove button component from desktop settings of customizer.');
        $customizer->_openSettings($I, $customizer->desktopTab, $buttonComponent->buttonSettingBtn);
        $I->click($buttonComponent->removeButtonBtn);
        $I->wait(1);
        $I->click($helper->publishBtn);
        $I->wait(1); 

        $I->amGoingTo('Check the whether default button exists in the preview');
        $I->click($customizer->hideControl);
        $I->wait(1);
        $I->switchToIframe($buttonComponent->previewIFrame);
        $I->wait(1);
        $I->cantSeeElement($buttonComponent->fDefaultButton);

        $I->amGoingTo('Check the whether default button exists in the frontend');
        $I->amOnPage('/');
        $I->wait(2);
        $I->switchToIFrame();
        $I->wait(1);
        $I->cantSeeElement($buttonComponent->fDefaultButton);

        $I->amGoingTo('Logout');
        $loginAndLogout->userLogout($I);
    }

    /**
     * This test checks the Mobile and Tablet settings changes in the previews and frontend
     */
    public function TabletAndMobileButtonSettingsTest(RespThemeTester $I, LogInAndLogOut $loginAndLogout, Customizer $customizer, ButtonComponents $buttonComponent, RespThemeHelper $helper)
    {
        $I->amGoingTo('Login as Admin');
        $loginAndLogout->userLogin($I);

        $I->amGoingTo('Open customizer >> Header >> Button >> Button component settings');
        $customizer->_openDefaultSettings($I, $customizer->tabletMobileTab, $customizer->mobileItemContainer, $customizer->mobileAddItemButton, $buttonComponent->button, $buttonComponent->buttonSettingBtn);

        $I->amGoingTo('Change button settings for mobile and tablet view');
        $I->fillField($buttonComponent->mobileBtnLabelInput, $buttonComponent->mobileBtnLabel);
        $I->wait(1);
        $I->fillField($buttonComponent->mobileBtnLinkInput, $buttonComponent->mobileBtnLink);
        $I->wait(1);
        $I->click($buttonComponent->mobileOpenInNewTabCheck);
        $I->wait(1);
        $I->click($buttonComponent->mobileNoFollowCheck);
        $I->click($buttonComponent->mobileLinkAttributeCheck);
        $I->click($buttonComponent->mobileLinkDownloadCheck);
        $helper->_selectItem($I, $buttonComponent->mobileBtnSizeSelect, $buttonComponent->mobileBtnSize);
        $I->wait(1);
        $helper->_selectItem($I, $buttonComponent->mobileBtnStyleSelect, $buttonComponent->mobileBtnStyle);
        $I->wait(1);
        $helper->_selectItem($I, $buttonComponent->mobileBtnVisibilitySelect, $buttonComponent->mobileBtnVisibility);
        $I->wait(1);
        $I->click($helper->publishBtn);
        $I->wait(2);

        $I->amGoingTo('Check button settings for mobile and tablet view in the preview.');
        $I->click($customizer->hideControl);
        $I->wait(1);
        $I->switchToIframe($buttonComponent->previewIFrame);
        $I->wait(1);
        $I->seeElement($buttonComponent->fMobileBtn);
        $I->expectTo('See button with Class '.$buttonComponent->fMobileLargeSizeOutlineStyleButton);

        $I->amGoingTo('Check button settings for tablet view in the frontend.');
        $I->amOnPage('/');
        $I->wait(2);
        $I->resizeWindow(768, 1024);
        $I->wait(2);
        $I->switchToIFrame();
        $I->wait(1);
        $I->seeElement($buttonComponent->fMobileBtn);
        $I->expectTo('See button with Class '.$buttonComponent->fMobileLargeSizeOutlineStyleButton);
        $I->click($buttonComponent->fMobileBtn);
        $I->wait(4);
        $I->switchToNextTab();
        $I->wait(2);
        $I->closeTab();
        $I->wait(1);
        $I->resizeWindow(1280, 950);

        $I->amGoingTo('Check button settings for mobile view in the frontend.');
        $I->amOnPage('/');
        $I->wait(2);
        $I->resizeWindow(375, 812);
        $I->wait(2);
        $I->switchToIFrame();
        $I->wait(1);
        $I->seeElement($buttonComponent->fMobileBtn);
        $I->expectTo('See button with Class '.$buttonComponent->fMobileLargeSizeOutlineStyleButton);
        $I->click($buttonComponent->fMobileBtn);
        $I->wait(4);
        $I->switchToNextTab();
        $I->wait(2);
        $I->closeTab();
        $I->wait(1);
        $I->resizeWindow(1280, 950);

        $I->amGoingTo('Reset the button settings for the mobile and tablet views.');
        $customizer->_openSettings($I, $customizer->tabletMobileTab, $buttonComponent->buttonSettingBtn);
        $I->fillField($buttonComponent->mobileBtnLabelInput, $buttonComponent->defaultMobileBtnLabel);
        $I->wait(1);
        $I->fillField($buttonComponent->mobileBtnLinkInput, $buttonComponent->defaultMobileBtnLink);
        $I->wait(1);
        $I->click($buttonComponent->mobileOpenInNewTabCheck);
        $I->wait(1);
        $I->click($buttonComponent->mobileNoFollowCheck);
        $I->click($buttonComponent->mobileLinkAttributeCheck);
        $I->click($buttonComponent->mobileLinkDownloadCheck);
        $helper->_selectItem($I, $buttonComponent->mobileBtnSizeSelect, $buttonComponent->defaultMobileBtnSize);
        $I->wait(1);
        $helper->_selectItem($I, $buttonComponent->mobileBtnStyleSelect, $buttonComponent->defaultMobileBtnStyle);
        $I->wait(1);
        $helper->_selectItem($I, $buttonComponent->mobileBtnVisibilitySelect, $buttonComponent->defaultMobileBtnVisibility);
        $I->wait(1);
        $I->click($helper->publishBtn);
        $I->wait(2);

        $I->amGoingTo('Check the default button settings in the preview for tablet and mobile view');
        $I->click($customizer->hideControl);
        $I->wait(1);
        $I->switchToIframe($buttonComponent->previewIFrame);
        $I->wait(1);
        $I->seeElement($buttonComponent->fDefaultButton);
        $I->expectTo('See button with Class '.$buttonComponent->fMediumSizeFilledStyleButton);

        $I->amGoingTo('Check the default button settings in the frontend in tablet.');
        $I->amOnPage('/');
        $I->wait(2);
        $I->resizeWindow(768, 1024);
        $I->wait(1);
        $I->switchToIFrame();
        $I->wait(1);
        $I->seeElement($buttonComponent->fDefaultButton);
        $I->expectTo('See button with Class '.$buttonComponent->fMediumSizeFilledStyleButton);
        $I->click($buttonComponent->fDefaultButton);
        $I->wait(4);

        $I->amGoingTo('Check the default button settings in the frontend  in mobile.');
        $I->amOnPage('/');
        $I->wait(2);
        $I->resizeWindow(375, 812);
        $I->wait(2);
        $I->switchToIFrame();
        $I->wait(1);
        $I->seeElement($buttonComponent->fDefaultButton);
        $I->expectTo('See button with Class '.$buttonComponent->fMediumSizeFilledStyleButton);
        $I->click($buttonComponent->fDefaultButton);
        $I->wait(4);
        $I->resizeWindow(1280, 950);

        $I->amGoingTo('Remove button component from tablet and mobile settings of customizer.');
        $customizer->_openSettings($I, $customizer->tabletMobileTab, $buttonComponent->buttonSettingBtn);
        $I->click($buttonComponent->removeButtonBtn);
        $I->wait(1);
        $I->click($helper->publishBtn);
        $I->wait(1);

        $I->amGoingTo('Check the whether default button exists in the preview');
        $I->click($customizer->hideControl);
        $I->wait(1);
        $I->switchToIframe($buttonComponent->previewIFrame);
        $I->wait(1);
        $I->cantSeeElement($buttonComponent->fDefaultButton);

        $I->amGoingTo('Check the whether default button exists in the frontend in tablet.');
        $I->amOnPage('/');
        $I->wait(2);
        $I->resizeWindow(768, 1024);
        $I->wait(1);
        $I->switchToIFrame();
        $I->wait(1);
        $I->cantSeeElement($buttonComponent->fDefaultButton);

        $I->amGoingTo('Check the whether default button exists in the frontend in mobile.');
        $I->wait(2);
        $I->resizeWindow(375, 812);
        $I->wait(1);
        $I->switchToIFrame();
        $I->wait(1);
        $I->cantSeeElement($buttonComponent->fDefaultButton);
        $I->resizeWindow(1280, 950);
        $I->wait(2);

        $I->amGoingTo('Logout');
        $loginAndLogout->userLogout($I);
    }
}
