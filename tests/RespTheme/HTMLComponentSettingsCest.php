<?php
use \page\RespTheme\Customizer;
use \page\RespTheme\LogInAndLogOut;
use \page\RespTheme\HTMLComponents;
use \page\RespTheme\RespThemeHelper;

class HTMLComponentSettingsCest
{
    /**
     * This test checks the desktop settings changes in the preview and frontend.
     */
    public function DesktopHTMLSettingsTest(RespThemeTester $I, LogInAndLogOut $loginAndLogout, Customizer $customizer, HTMLComponents $htmlComponent, RespThemeHelper $helper)
    {
        $I->amGoingTo('Login as Admin');
        $loginAndLogout->userLogin($I);

        $I->amGoingTo('Open customizer >> Header >> HTML >> HTML component settings');
        $customizer->_openDefaultSettings($I, $customizer->desktopTab, $customizer->itemContainer, $customizer->addItemButton, $htmlComponent->html, $htmlComponent->htmlSettingBtn);

        $I->amGoingTo('Check the default settings for the desktop.');
        $I->wait(2);
        $I->seeElement($htmlComponent->htmlContentInput);
        $I->seeElement($htmlComponent->addContentCheckbox);
        $I->click($helper->publishBtn);
        $I->wait(2);
        $I->reloadPage();
        $I->wait(2);

        $I->amGoingTo('Check the default html content in the preview.');
        $I->click($customizer->hideControl);
        $I->wait(1);
        $I->switchToIframe($customizer->previewIFrame);
        $I->wait(1);
        $I->seeElement($htmlComponent->fDefaultHTML);

        $I->amGoingTo('Check the default html content in the frontend.');
        $I->wait(1);
        $I->amOnPage('/');
        $I->wait(1);
        $I->reloadPage();
        $I->wait(2);
        $I->switchToIFrame();
        $I->wait(1);
        $I->seeElement($htmlComponent->fDefaultHTML);

        $I->amGoingTo('Open customizer >> Header >> HTML >> HTML component settings');
        $customizer->_openSettings($I, $customizer->desktopTab, $htmlComponent->htmlSettingBtn);
        
        $I->amGoingTo('Change search settings for desktop view.');
        $I->fillField($htmlComponent->htmlContentInput, '<p><b>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</b></p>');
        $I->click($helper->publishBtn);
        $I->wait(2);
        $I->reloadPage();
        $I->wait(2);

        $I->amGoingTo('Check the updated html content in the preview.');
        $I->click($customizer->hideControl);
        $I->wait(1);
        $I->switchToIframe($customizer->previewIFrame);
        $I->wait(1);
        $I->see('Lorem ipsum dolor sit amet, consectetur adipiscing elit.');
        $I->wait(1);

        $I->amGoingTo('Check the updated html content in the frontend.');
        $I->amOnPage('/');
        $I->wait(1);
        $I->reloadPage();
        $I->wait(2);
        $I->switchToIFrame();
        $I->wait(1);
        $I->see('Lorem ipsum dolor sit amet, consectetur adipiscing elit.');

        $I->amGoingTo('Open customizer >> Header >> HTML >> HTML component settings');
        $customizer->_openSettings($I, $customizer->desktopTab, $htmlComponent->htmlSettingBtn);

        $I->amGoingTo('Reset the html content for deskotp.');
        $I->fillField($htmlComponent->htmlContentInput, $htmlComponent->deafultContent);
        $I->click($helper->publishBtn);
        $I->wait(2);
        $I->reloadPage();
        $I->wait(2);

        $I->amGoingTo('Check the html content after reset in the preview.');
        $I->click($customizer->hideControl);
        $I->wait(1);
        $I->switchToIframe($customizer->previewIFrame);
        $I->wait(2);
        $I->seeElement($htmlComponent->fDefaultHTML);

        $I->amGoingTo('Check the html content after reset in the frontend.');
        $I->amOnPage('/');
        $I->wait(1);
        $I->reloadPage();
        $I->wait(2);
        $I->switchToIFrame();
        $I->wait(1);
        $I->seeElement($htmlComponent->fDefaultHTML);

        $I->amGoingTo('Open customizer >> Header >> HTML >> HTML component settings');
        $customizer->_openSettings($I, $customizer->desktopTab, $htmlComponent->htmlSettingBtn);

        $I->amGoingTo('Remove the html component from customizer for desktop view.');
        $customizer->_removeItem($I, $customizer->desktopTab, $htmlComponent->removeHtmlSettings);
        $I->wait(1);
        $I->click($helper->publishBtn);
        $I->wait(2);
        $I->reloadPage();
        $I->wait(2);

        $I->amGoingTo('Check html content exists in the preview.');
        $I->click($customizer->hideControl);
        $I->wait(1);
        $I->switchToIframe($customizer->previewIFrame);
        $I->wait(1);
        $I->cantSeeElement($htmlComponent->fDefaultHTML);

        $I->amGoingTo('Check the html content exists in the frontend.');
        $I->amOnPage('/');
        $I->wait(1);
        $I->reloadPage();
        $I->wait(2);
        $I->switchToIFrame();
        $I->wait(1);
        $I->cantSeeElement($htmlComponent->fDefaultHTML);

        $I->amGoingTo('Logout');
        $loginAndLogout->userLogout($I);
    }

    /**
     * This test checks the Tablet/Mobile settings changes in the preview and frontend.
     */
    public function TabletAndMobileHTMLSettingsTest(RespThemeTester $I, LogInAndLogOut $loginAndLogout, Customizer $customizer, HTMLComponents $htmlComponent, RespThemeHelper $helper)
    {
        $I->amGoingTo('Login as Admin');
        $loginAndLogout->userLogin($I);

        $I->amGoingTo('Open customizer >> Header >> Tablet/Mobile >> HTML >> HTML component settings');
        $customizer->_openDefaultSettings($I, $customizer->tabletMobileTab, $customizer->mobileItemContainer, $customizer->mobileAddItemButton, $htmlComponent->html, $htmlComponent->htmlSettingBtn);

        $I->amGoingTo('Check the default settings for the Tablet/Mobile.');
        $I->wait(2);
        $I->seeElement($htmlComponent->mobileHtmlContentInput);
        $I->seeElement($htmlComponent->mobileAddContentCheckbox);
        $I->click($helper->publishBtn);
        $I->wait(2);
        $I->reloadPage();
        $I->wait(2);
        $customizer->_openSettings($I, $customizer->tabletMobileTab, $htmlComponent->htmlSettingBtn);

        $I->amGoingTo('Check the default html content in the preview.');
        $I->click($customizer->hideControl);
        $I->wait(1);
        $I->switchToIframe($customizer->previewIFrame);
        $I->wait(1);
        $I->seeElement($htmlComponent->fDefaultMobileHTML);

        $I->amGoingTo('Check the default html content in the frontend.');
        $I->resizeWindow(375, 812);
        $I->wait(1);
        $I->amOnPage('/');
        $I->wait(1);
        $I->reloadPage();
        $I->wait(2);
        $I->switchToIFrame();
        $I->wait(1);
        $I->seeElement($htmlComponent->fDefaultMobileHTML);
        $I->resizeWindow(768, 1024);
        $I->wait(1);
        $I->amOnPage('/');
        $I->wait(1);
        $I->reloadPage();
        $I->wait(2);
        $I->switchToIFrame();
        $I->wait(1);
        $I->seeElement($htmlComponent->fDefaultMobileHTML);
        $I->resizeWindow(1280, 950);

        $I->amGoingTo('Open customizer >> Header >> Tablet/Mobile >> HTML >> HTML component settings');
        $customizer->_openSettings($I, $customizer->tabletMobileTab, $htmlComponent->htmlSettingBtn);
        
        $I->amGoingTo('Change Tablet/Mobile settings');
        $I->fillField($htmlComponent->mobileHtmlContentInput, '<p>Morbi vehicula purus at consequat hendrerit.</p>');
        $I->click($helper->publishBtn);
        $I->wait(2);
        $I->reloadPage();
        $I->wait(2);
        $customizer->_openSettings($I, $customizer->tabletMobileTab, $htmlComponent->htmlSettingBtn);


        $I->amGoingTo('Check the updated html content in the preview.');
        $I->click($customizer->hideControl);
        $I->wait(1);
        $I->switchToIframe($customizer->previewIFrame);
        $I->wait(1);
        $I->see('Morbi vehicula purus at consequat hendrerit.');
        $I->wait(1);

        $I->amGoingTo('Check the updated html content in the frontend.');
        $I->resizeWindow(375, 812);
        $I->wait(1);
        $I->amOnPage('/');
        $I->wait(1);
        $I->reloadPage();
        $I->wait(2);
        $I->switchToIFrame();
        $I->wait(1);
        $I->see('Morbi vehicula purus at consequat hendrerit.');
        $I->resizeWindow(768, 1024);
        $I->wait(1);
        $I->amOnPage('/');
        $I->wait(1);
        $I->reloadPage();
        $I->wait(2);
        $I->switchToIFrame();
        $I->wait(1);
        $I->see('Morbi vehicula purus at consequat hendrerit.');
        $I->resizeWindow(1280, 950);

        $I->amGoingTo('Open customizer >> Header >> Tablet/Mobile >> HTML >> HTML component settings');
        $customizer->_openSettings($I, $customizer->tabletMobileTab, $htmlComponent->htmlSettingBtn);
       
        $I->amGoingTo('Reset the html content for Tablet\Mobile.');
        $I->fillField($htmlComponent->mobileHtmlContentInput, $htmlComponent->defaultMobileContent);
        $I->click($helper->publishBtn);
        $I->wait(2);
        $I->reloadPage();
        $I->wait(2);
        $customizer->_openSettings($I, $customizer->tabletMobileTab, $htmlComponent->htmlSettingBtn);

        $I->amGoingTo('Check the html content after reset in the preview.');
        $I->click($customizer->hideControl);
        $I->wait(1);
        $I->switchToIframe($customizer->previewIFrame);
        $I->wait(2);
        $I->seeElement($htmlComponent->fDefaultMobileHTML);

        $I->amGoingTo('Check the html content after reset in the frontend.');
        $I->resizeWindow(375, 812);
        $I->wait(1);
        $I->amOnPage('/');
        $I->wait(1);
        $I->reloadPage();
        $I->wait(2);
        $I->switchToIFrame();
        $I->wait(1);
        $I->seeElement($htmlComponent->fDefaultMobileHTML);
        $I->resizeWindow(768, 1024);
        $I->wait(1);
        $I->amOnPage('/');
        $I->wait(1);
        $I->reloadPage();
        $I->wait(2);
        $I->switchToIFrame();
        $I->wait(1);
        $I->seeElement($htmlComponent->fDefaultMobileHTML);
        $I->resizeWindow(1280, 950);

        $I->amGoingTo('Open customizer >> Header >> HTML >> HTML component settings');
        $customizer->_openSettings($I, $customizer->tabletMobileTab, $htmlComponent->htmlSettingBtn);

        $I->amGoingTo('Remove the html component from customizer for Mobile and Tablet view.');
        $customizer->_removeItem($I, $customizer->tabletMobileTab, $htmlComponent->removeHtmlSettings);
        $I->wait(1);
        $I->click($helper->publishBtn);
        $I->wait(2);
        $I->reloadPage();
        $I->wait(2);

        $I->amGoingTo('Check html content exists in the preview.');
        $I->click($customizer->hideControl);
        $I->wait(1);
        $I->switchToIframe($customizer->previewIFrame);
        $I->wait(1);
        $I->cantSeeElement($htmlComponent->fDefaultMobileHTML);

        $I->amGoingTo('Check the html content exists in the frontend.');
        $I->resizeWindow(375, 812);
        $I->wait(1);
        $I->amOnPage('/');
        $I->wait(1);
        $I->reloadPage();
        $I->wait(2);
        $I->switchToIFrame();
        $I->wait(1);
        $I->cantSeeElement($htmlComponent->fDefaultMobileHTML);
        $I->resizeWindow(768, 1024);
        $I->wait(1);
        $I->amOnPage('/');
        $I->wait(1);
        $I->reloadPage();
        $I->wait(2);
        $I->switchToIFrame();
        $I->wait(1);
        $I->cantSeeElement($htmlComponent->fDefaultMobileHTML);
        $I->resizeWindow(1280, 950);

        $I->amGoingTo('Logout');
        $loginAndLogout->userLogout($I);
    }
}
