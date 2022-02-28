<?php
use \page\RespTheme\Customizer;
use \page\RespTheme\LogInAndLogOut;
use \page\RespTheme\SearchComponents;
use \page\RespTheme\RespThemeHelper;

class SearchComponentSettingsCest
{
    /**
     * This test checks the desktop settings changes in the preview and frontend.
     */
    public function DesktopSearchSettingsTest(RespThemeTester $I, LogInAndLogOut $loginAndLogout, Customizer $customizer, SearchComponents $searchComponent, RespThemeHelper $helper)
    {
        $I->amGoingTo('Login as Admin');
        $loginAndLogout->userLogin($I);

        $I->amGoingTo('Open customizer >> Header >> Search >> Search component settings');
        $customizer->_openDefaultSettings($I, $customizer->desktopTab, $customizer->itemContainer, $customizer->addItemButton, $searchComponent->search, $searchComponent->searchSettingBtn);

        $I->amGoingTo('Check default available settings options in customizer for Search');
        $I->seeElement($searchComponent->searchStyleSelect);
        $I->seeElement($searchComponent->labelInput);
        $I->seeElement($searchComponent->desktopLabelVisibilityCheck);
        $I->seeElement($searchComponent->tabletLabelVisibilityCheck);
        $I->seeElement($searchComponent->mobileLabelVisibilityCheck);
        $I->seeElement($searchComponent->searchIconSelect);
        $I->wait(1);
        $I->click($helper->publishBtn);
        $I->wait(1);

        $I->amGoingTo('Check whether default search button exists in the preview');
        $I->click($customizer->hideControl);
        $I->wait(1);
        $I->switchToIframe($customizer->previewIFrame);
        $I->wait(1);
        $I->seeElement($searchComponent->fDefaultButton);

        $I->amGoingTo('Check whether default button exists in the frontend');
        $I->amOnPage('/');
        $I->wait(2);
        $I->switchToIFrame();
        $I->wait(1);
        $I->seeElement($searchComponent->fDefaultButton);

        $I->amGoingTo('Open customizer >> Header >> Search >> Search button component settings');
        $customizer->_openSettings($I, $customizer->desktopTab, $searchComponent->searchSettingBtn);

        $I->amGoingTo('Change search settings for desktop view.');
        $helper->_selectItem($I, $searchComponent->searchStyleSelect, $searchComponent->desktopSearchStyle);
        $I->fillField($searchComponent->labelInput, 'Find');  
        $I->click($searchComponent->desktopLabelVisibilityCheck);
        $helper->_selectItem($I, $searchComponent->searchIconSelect, $searchComponent->desktopSearchIcon);
        $I->wait(1);
        $I->click($helper->publishBtn);
        $I->wait(1);

        $I->amGoingTo('Check search settings in the preview.');
        $I->click($customizer->hideControl);
        $I->wait(1);
        $I->switchToIframe($customizer->previewIFrame);
        $I->wait(1);
        $I->seeElement($searchComponent->fSearchIcon);
        $I->seeElement($searchComponent->fSearchLabel);
        $I->expectTo('See button with Class '.$searchComponent->outlinesSearch);

        $I->amGoingTo('Check search settings in the frontend in desktop view.');
        $I->amOnPage('/');
        $I->wait(1);
        $I->switchToIframe();
        $I->wait(1);
        $I->seeElement($searchComponent->fSearchIcon);
        $I->seeElement($searchComponent->fSearchLabel);
        $I->expectTo('See button with Class '.$searchComponent->outlinesSearch);

        $I->amGoingTo('Open customizer >> Header >> Search >> Search button component settings');
        $customizer->_openSettings($I, $customizer->desktopTab, $searchComponent->searchSettingBtn);

        $I->amGoingTo('Reset the search settings for desktop view.');
        $helper->_selectItem($I, $searchComponent->searchStyleSelect, $searchComponent->defaultSearchStyle);
        $I->fillField($searchComponent->labelInput, 'Search');  
        $I->click($searchComponent->desktopLabelVisibilityCheck);
        $helper->_selectItem($I, $searchComponent->searchIconSelect, $searchComponent->defaultSearchIcon);
        $I->wait(1);
        $I->click($helper->publishBtn);
        $I->wait(1);

        $I->amGoingTo('Check search reset settings in the preview.');
        $I->click($customizer->hideControl);
        $I->wait(1);
        $I->switchToIframe($customizer->previewIFrame);
        $I->wait(1);
        $I->seeElement($searchComponent->fSearchIcon);
        $I->cantSeeElement($searchComponent->fSearchLabel);
        $I->cantSeeElement($searchComponent->outlinesSearch);

        $I->amGoingTo('Check search reset settings in the frontend in desktop view.');
        $I->amOnPage('/');
        $I->wait(1);
        $I->switchToIframe();
        $I->wait(1);
        $I->seeElement($searchComponent->fSearchIcon);
        $I->cantSeeElement($searchComponent->fSearchLabel);
        $I->cantSeeElement($searchComponent->outlinesSearch);

        $I->amGoingTo('Open customizer >> Header >> Search >> Search button component settings');
        $customizer->_openSettings($I, $customizer->desktopTab, $searchComponent->searchSettingBtn);

        $I->amGoingTo('Remove search component from cutomizer desktop view');
        $customizer->_removeItem($I, $customizer->desktopTab, $searchComponent->removeSearchSettings);
        $I->wait(1);
        $I->click($helper->publishBtn);
        $I->wait(1); 

        $I->amGoingTo('Check search button exists in the preview.');
        $I->click($customizer->hideControl);
        $I->wait(1);
        $I->switchToIframe($customizer->previewIFrame);
        $I->wait(1);
        $I->cantSeeElement($searchComponent->fDefaultButton);

        $I->amGoingTo('Check search button exists in the frontend in desktop view.');
        $I->amOnPage('/');
        $I->wait(1);
        $I->switchToIframe();
        $I->wait(1);
        $I->cantSeeElement($searchComponent->fDefaultButton);

        $I->amGoingTo('Logout');
        $loginAndLogout->userLogout($I);
    }

    /**
     * This test checks the mobile and tablet settings changes in the preview and frontend.
     */
    public function MobileAndTabletSearchSettingsTest(RespThemeTester $I, LogInAndLogOut $loginAndLogout, Customizer $customizer, SearchComponents $searchComponent, RespThemeHelper $helper)
    {
        $I->amGoingTo('Login as Admin');
        $loginAndLogout->userLogin($I);

        $I->amGoingTo('Open customizer >> Header >> Search >> Search component settings');
        $customizer->_openDefaultSettings($I, $customizer->tabletMobileTab, $customizer->mobileItemContainer, $customizer->mobileAddItemButton, $searchComponent->search, $searchComponent->searchSettingBtn);

        $I->amGoingTo('Check available settings options in customizer for Search in mobile and tablet view.');
        $I->seeElement($searchComponent->searchStyleSelect);
        $I->seeElement($searchComponent->labelInput);
        $I->seeElement($searchComponent->desktopLabelVisibilityCheck);
        $I->seeElement($searchComponent->tabletLabelVisibilityCheck);
        $I->seeElement($searchComponent->mobileLabelVisibilityCheck);
        $I->seeElement($searchComponent->searchIconSelect);
        $I->wait(1);
        $I->click($helper->publishBtn);

        $I->amGoingTo('Check default search button settings in the preview.');
        $I->click($customizer->hideControl);
        $I->wait(1);
        $I->switchToIframe($customizer->previewIFrame);
        $I->wait(1);
        $I->seeElement($searchComponent->fDefaultButton);

        $I->amGoingTo('Check default search button settings in the frontend');
        $I->amOnPage('/');
        $I->wait(1);
        $I->resizeWindow(768, 1024);
        $I->wait(2);
        $I->switchToIFrame();
        $I->wait(1);
        $I->seeElement($searchComponent->fDefaultButton);
        $I->wait(1);
        $I->resizeWindow(375, 812);
        $I->wait(2);
        $I->switchToIFrame();
        $I->wait(1);
        $I->seeElement($searchComponent->fDefaultButton);
        $I->wait(1);
        $I->resizeWindow(1280, 950);

        $I->amGoingTo('Open customizer >> Header >> Search >> Search button component settings');
        $customizer->_openSettings($I, $customizer->tabletMobileTab, $searchComponent->searchSettingBtn);

        $I->amGoingTo('Change search component settings from cutomizer mobiel and tablet view');
        $helper->_selectItem($I, $searchComponent->searchStyleSelect, $searchComponent->desktopSearchStyle);
        $I->fillField($searchComponent->labelInput, 'Find');  
        $I->click($searchComponent->tabletLabelVisibilityCheck);
        $helper->_selectItem($I, $searchComponent->searchIconSelect, $searchComponent->desktopSearchIcon);
        $I->wait(1);
        $I->click($helper->publishBtn);
        $I->wait(1);

        $I->amGoingTo('Check search settings in the preview.');
        $I->click($customizer->hideControl);
        $I->wait(1);
        $I->switchToIframe($customizer->previewIFrame);
        $I->wait(1);
        $I->seeElement($searchComponent->fSearchIcon);
        $I->seeElement($searchComponent->fSearchLabel);
        $I->expectTo('See button with Class '.$searchComponent->outlinesSearch);

        $I->amGoingTo('Check search settings in the frontend in tablet and mobile view.');
        $I->amOnPage('/');
        $I->wait(1);
        $I->resizeWindow(768, 1024);
        $I->wait(1);
        $I->switchToIframe();
        $I->wait(1);
        $I->seeElement($searchComponent->fSearchIcon);
        $I->seeElement($searchComponent->fSearchLabel);
        $I->expectTo('See button with Class '.$searchComponent->outlinesSearch);
        $I->wait(1);
        $I->resizeWindow(375, 812);
        $I->wait(1);
        $I->switchToIframe();
        $I->wait(1);
        $I->seeElement($searchComponent->fSearchIcon);
        $I->cantSeeElement($searchComponent->fSearchLabel);
        $I->expectTo('See button with Class '.$searchComponent->outlinesSearch);
        $I->wait(1);
        $I->resizeWindow(1280, 950);

        $I->amGoingTo('Open customizer >> Header >> Search >> Search button component settings');
        $customizer->_openSettings($I, $customizer->tabletMobileTab, $searchComponent->searchSettingBtn);

        $I->amGoingTo('Reset the search settings for desktop view.');
        $helper->_selectItem($I, $searchComponent->searchStyleSelect, $searchComponent->defaultSearchStyle);
        $I->fillField($searchComponent->labelInput, 'Search');  
        $I->click($searchComponent->tabletLabelVisibilityCheck);
        $helper->_selectItem($I, $searchComponent->searchIconSelect, $searchComponent->defaultSearchIcon);
        $I->wait(1);
        $I->click($helper->publishBtn);
        $I->wait(1);

        $I->amGoingTo('Check search reset settings in the preview.');
        $I->click($customizer->hideControl);
        $I->wait(1);
        $I->switchToIframe($customizer->previewIFrame);
        $I->wait(1);
        $I->seeElement($searchComponent->fSearchIcon);
        $I->cantSeeElement($searchComponent->fSearchLabel);
        $I->cantSeeElement($searchComponent->outlinesSearch);

        $I->amGoingTo('Check search reset settings in the frontend in desktop view.');
        $I->amOnPage('/');
        $I->wait(1);
        $I->resizeWindow(768, 1024);
        $I->wait(1);
        $I->switchToIframe();
        $I->wait(1);
        $I->seeElement($searchComponent->fSearchIcon);
        $I->cantSeeElement($searchComponent->fSearchLabel);
        $I->cantSeeElement($searchComponent->outlinesSearch);
        $I->wait(1);
        $I->resizeWindow(375, 812);
        $I->wait(1);
        $I->switchToIframe();
        $I->wait(1);
        $I->seeElement($searchComponent->fSearchIcon);
        $I->cantSeeElement($searchComponent->fSearchLabel);
        $I->cantSeeElement($searchComponent->outlinesSearch);
        $I->wait(1);
        $I->resizeWindow(1280, 950);
        $I->wait(1);

        $I->amGoingTo('Open customizer >> Header >> Search >> Search button component settings');
        $customizer->_openSettings($I, $customizer->tabletMobileTab, $searchComponent->searchSettingBtn);

        $I->amGoingTo('Remove search component from cutomizer mobile and tablet  view');
        $customizer->_removeItem($I, $customizer->tabletMobileTab, $searchComponent->removeSearchSettings);
        $I->wait(1);
        $I->click($helper->publishBtn);
        $I->wait(1); 

        $I->amGoingTo('Check search button exists in the preview.');
        $I->click($customizer->hideControl);
        $I->wait(1);
        $I->switchToIframe($customizer->previewIFrame);
        $I->wait(1);
        $I->cantSeeElement($searchComponent->fDefaultButton);
        
        $I->amGoingTo('Check search button exists in the frontend in mobile and tablet view.');
        $I->amOnPage('/');
        $I->wait(1);
        $I->resizeWindow(768, 1024);
        $I->wait(1);
        $I->switchToIframe();
        $I->wait(1);
        $I->cantSeeElement($searchComponent->fDefaultButton);
        $I->wait(1);
        $I->resizeWindow(375, 812);
        $I->wait(1);
        $I->switchToIframe();
        $I->wait(1);
        $I->cantSeeElement($searchComponent->fDefaultButton);
        $I->wait(1);
        $I->resizeWindow(1280, 950);
        $I->wait(1);

        $I->amGoingTo('Logout');
        $loginAndLogout->userLogout($I);
    }
}
