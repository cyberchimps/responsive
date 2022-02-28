<?php
use \page\RespTheme\Customizer;
use \page\RespTheme\LogInAndLogOut;
use \page\RespTheme\SocialComponents;
use \page\RespTheme\RespThemeHelper;

class SocialComponentSettingsCest
{
    /**
     * This test checks the desktop settings changes in the preview and frontend.
     */
    public function DesktopSocialSettingsTest(RespThemeTester $I, LogInAndLogOut $loginAndLogout, Customizer $customizer, SocialComponents $socialComponent, RespThemeHelper $helper)
    {
        $I->amGoingTo('Login as Admin');
        $loginAndLogout->userLogin($I);

        $I->amGoingTo('Open customizer >> Header >> Social >> Social component settings');
        $customizer->_openDefaultSettings($I, $customizer->desktopTab, $customizer->itemContainer, $customizer->addItemButton, $socialComponent->social, $socialComponent->socialSettingBtn);

        $I->amGoingTo('Check default available settings options in customizer for Social');
        $I->seeElement($socialComponent->openSocialLinksInNewTabSelect);
        $I->seeElement($socialComponent->twitterInput);
        $I->seeElement($socialComponent->facebookInput);
        $I->seeElement($socialComponent->linkedInInput);
        $I->seeElement($socialComponent->youtubeInput);
        $I->seeElement($socialComponent->rssFeedInput);
        $I->seeElement($socialComponent->instragramInput);
        $I->seeElement($socialComponent->pinterestInput);
        $I->seeElement($socialComponent->stubleUponInput);
        $I->seeElement($socialComponent->vimeoInput);
        $I->seeElement($socialComponent->yelpInput);
        $I->seeElement($socialComponent->fourSquareInput);
        $I->seeElement($socialComponent->emailAddress);

        $I->amGoingTo('Publish social component with default setting on desktop');
        $I->click($helper->publishBtn);

        $I->amGoingTo('Check settings in the preview');
        $I->click($customizer->hideControl);
        $I->wait(1);
        $I->switchToIframe($customizer->previewIFrame);
        $I->wait(1);
        $I->cantSeeElement($socialComponent->fSocialIcon);

        $I->amGoingTo('Check settings in the frontend');
        $I->amOnPage('/');
        $I->wait(1);
        $I->switchToIframe();
        $I->wait(1);
        $I->cantSeeElement($socialComponent->fSocialIcon);

        $I->amGoingTo('Open customizer social settings.');
        $I->amOnPage('/');
        $I->wait(1);
        $customizer->_openSettings($I, $customizer->desktopTab, $socialComponent->socialSettingBtn);

        $I->amGoingTo('Change settings of social component for desktop view.');
        $helper->_selectItem($I, $socialComponent->openSocialLinksInNewTabSelect, $socialComponent->openSocialLinksInNewTab);
        $I->fillField($socialComponent->twitterInput, 'https://www.twitter.com');
        $I->fillField($socialComponent->facebookInput, 'https://www.facebook.com');
        $I->fillField($socialComponent->linkedInInput, 'https://www.linkedin.com');
        $I->fillField($socialComponent->youtubeInput, 'https://www.youtube.com');
        $I->fillField($socialComponent->rssFeedInput, 'http://www.rssfeeds.com/');
        $I->fillField($socialComponent->instragramInput, 'https://www.instagram.com/');
        $I->fillField($socialComponent->pinterestInput, 'https://www.pinterest.com/');
        $I->fillField($socialComponent->stubleUponInput, 'https://www.stumbleupon.com/');
        $I->fillField($socialComponent->vimeoInput, 'https://www.vimeo.com');
        $I->fillField($socialComponent->yelpInput, 'https://www.yelp.com');
        $I->fillField($socialComponent->fourSquareInput, 'https://www.foursquare.com');
        $I->fillField($socialComponent->emailAddress, 'abc.xyz@gmail.com');
        $I->wait(1);
        $I->click($helper->publishBtn);
        $I->wait(2);

        $I->amGoingTo('Check social settings for desktop in the preview');
        $I->click($customizer->hideControl);
        $I->wait(1);
        $I->switchToIframe($customizer->previewIFrame);
        $I->wait(1);
        $elements = array(
                        $socialComponent->fTwitterLink,
                        $socialComponent->fFacebookLink,
                        $socialComponent->fLinkedInLink, 
                        $socialComponent->fYoutubeLink, 
                        $socialComponent->fRssFeedLink, 
                        $socialComponent->fInstagramLink,
                        $socialComponent->fPinterestLink, 
                        $socialComponent->fStubleUponLink, 
                        $socialComponent->fVimeoLink,
                        $socialComponent->fYelpLink, 
                        $socialComponent->fFourSquareLink, 
                        $socialComponent->fEmailLink
                    );
        $this->_checkElements($I, $elements, 1);

        $I->amGoingTo('Check social settings for desktop in the frontend.');
        $I->amOnPage('/');
        $I->wait(1);
        $I->switchToIframe();
        $I->wait(1);
        $this->_checkElements($I, $elements, 1);
        $I->click($socialComponent->fTwitterLink,);
        $I->wait(4);
        $I->switchToNextTab();
        $I->wait(1);
        $I->see('Twitter');
        $I->closeTab();
        $I->wait(2);

        $I->amGoingTo('Open customizer desktop social settins');
        $customizer->_openSettings($I, $customizer->desktopTab, $socialComponent->socialSettingBtn);

        $I->amGoingTo('Reset the social settings to default for desktop view');
        $helper->_selectItem($I, $socialComponent->openSocialLinksInNewTabSelect, $socialComponent->defaultOpenSocialLinksInNewTab);
        $I->fillField($socialComponent->twitterInput, '');
        $I->fillField($socialComponent->facebookInput, '');
        $I->fillField($socialComponent->linkedInInput, '');
        $I->fillField($socialComponent->youtubeInput, '');
        $I->fillField($socialComponent->rssFeedInput, '');
        $I->fillField($socialComponent->instragramInput, '');
        $I->fillField($socialComponent->pinterestInput, '');
        $I->fillField($socialComponent->stubleUponInput, '');
        $I->fillField($socialComponent->vimeoInput, '');
        $I->fillField($socialComponent->yelpInput, '');
        $I->fillField($socialComponent->fourSquareInput, '');
        $I->fillField($socialComponent->emailAddress, '');
        $I->wait(1);
        $I->click($helper->publishBtn);
        $I->wait(2);

        $I->amGoingTo('Check whether social settings visible in the preview');
        $I->click($customizer->hideControl);
        $I->wait(1);
        $I->switchToIframe($customizer->previewIFrame);
        $I->wait(1);
        $this->_checkElements($I, $elements, 0);

        $I->amGoingTo('Check whether social settings visible in desktop in the frontend.');
        $I->amOnPage('/');
        $I->wait(1);
        $I->switchToIframe();
        $I->wait(1);
        $this->_checkElements($I, $elements, 0);
        $I->wait(2);

        $I->amGoingTo('Open customizer.');
        $customizer->_openSettings($I, $customizer->desktopTab, $socialComponent->socialSettingBtn);

        $I->amGoingTo('Remove social settings for desktop.');
        $customizer->_removeItem($I, $customizer->desktopTab, $socialComponent->removeSocialSettings);
        $I->wait(1);
        $I->click($helper->publishBtn);
        $I->wait(1); 

        $I->amGoingTo('Check the whether default social settings exists in the preview');
        $I->click($customizer->hideControl);
        $I->wait(1);
        $I->switchToIframe($customizer->previewIFrame);
        $I->wait(1);
        $this->_checkElements($I, $elements, 0);

        $I->amGoingTo('Check whether default social settings exists in desktop in the frontend.');
        $I->amOnPage('/');
        $I->wait(1);
        $I->switchToIframe();
        $I->wait(1);
        $this->_checkElements($I, $elements, 0);
        $I->wait(2);
    }

    /**
     * This function check whether elements are exista or not
     */
    public function _checkElements($I, $elements, $isTrue)
    {
        if($isTrue)
        {
            for($i = 0; $i < sizeof($elements); $i++)
            {
                $I->seeElement($elements[$i]);
            }
        }
        else
        {
            for($i = 0; $i < sizeof($elements); $i++)
            {
                $I->cantSeeElement($elements[$i]);
            }
        }
    }

    /**
     * This test checks the Tablet/Mobile settings changes in the preview and frontend.
     */
    public function TabletAndMobileSocialSettingsTest(RespThemeTester $I, LogInAndLogOut $loginAndLogout, Customizer $customizer, SocialComponents $socialComponent, RespThemeHelper $helper)
    {
        $I->amGoingTo('Login as Admin');
        $loginAndLogout->userLogin($I);

        $I->amGoingTo('Open customizer >> Header >> Social >> >> Tablet/Mobile >> Social component settings');
        $customizer->_openDefaultSettings($I, $customizer->tabletMobileTab, $customizer->mobileItemContainer, $customizer->mobileAddItemButton, $socialComponent->social, $socialComponent->socialSettingBtn);

        $I->amGoingTo('Check default available Social settings options in customizer for Tablet and Mobile');
        $elements = array(
            $socialComponent->openSocialLinksInNewTabMobileSelect,
            $socialComponent->mobileTwitterInput,
            $socialComponent->mobileFacebookInput,
            $socialComponent->mobileLinkedInInput,
            $socialComponent->mobileYoutubeInput,
            $socialComponent->mobileInstragramInput,
            $socialComponent->mobilePinterestInput,
            $socialComponent->mobileStubleUponInput,
            $socialComponent->mobileVimeoInput,
            $socialComponent->mobileYelpInput,
            $socialComponent->mobileFourSquareInput,
            $socialComponent->mobileEmailAddress
        );
        $this->_checkElements($I, $elements, 1);

        $I->amGoingTo('Publish social component with default setting on Tablet and Mobile');
        $I->click($helper->publishBtn);

        $I->amGoingTo('Check settings in the preview');
        $I->click($customizer->hideControl);
        $I->wait(1);
        $I->switchToIframe($customizer->previewIFrame);
        $I->wait(1);
        $I->cantSeeElement($socialComponent->fSocialIcon);

        $I->amGoingTo('Check settings in the frontend');
        $I->amOnPage('/');
        $I->wait(1);
        $I->resizeWindow(768, 1024);
        $I->wait(1);
        $I->switchToIframe();
        $I->wait(1);
        $I->cantSeeElement($socialComponent->fSocialIcon);
        $I->wait(1);
        $I->resizeWindow(375, 812);
        $I->wait(1);
        $I->cantSeeElement($socialComponent->fSocialIcon);
        $I->wait(1);
        $I->resizeWindow(1280, 950);

        $I->amGoingTo('Open customizer social settings.');
        $I->amOnPage('/');
        $I->wait(1);
        $customizer->_openSettings($I, $customizer->tabletMobileTab, $socialComponent->socialSettingBtn);

        $I->amGoingTo('Change settings of social component for tablet and mobile view.');
        $helper->_selectItem($I, $socialComponent->openSocialLinksInNewTabMobileSelect, $socialComponent->openSocialLinksInNewTabMobile);
        $I->fillField($socialComponent->mobileTwitterInput, 'https://www.twitter.com');
        $I->fillField($socialComponent->mobileFacebookInput, 'https://www.facebook.com');
        $I->fillField($socialComponent->mobileLinkedInInput, 'https://www.linkedin.com');
        $I->fillField($socialComponent->mobileYoutubeInput, 'https://www.youtube.com');
        $I->fillField($socialComponent->mobileInstragramInput, 'https://www.instagram.com/');
        $I->fillField($socialComponent->mobilePinterestInput, 'https://www.pinterest.com/');
        $I->fillField($socialComponent->mobileStubleUponInput, 'https://www.stumbleupon.com/');
        $I->fillField($socialComponent->mobileVimeoInput, 'https://www.vimeo.com');
        $I->fillField($socialComponent->mobileYelpInput, 'https://www.yelp.com');
        $I->fillField($socialComponent->mobileFourSquareInput, 'https://www.foursquare.com');
        $I->fillField($socialComponent->mobileEmailAddress, 'abc.xyz@gmail.com');
        $I->wait(1);
        $I->click($helper->publishBtn);
        $I->wait(2);

        $I->amGoingTo('Check settings of social component in preview');
        $I->click($customizer->hideControl);
        $I->wait(1);
        $I->switchToIframe($customizer->previewIFrame);
        $I->wait(1);
        $elements = array(
                        $socialComponent->fTwitterLink,
                        $socialComponent->fFacebookLink,
                        $socialComponent->fLinkedInLink, 
                        $socialComponent->fYoutubeLink,
                        $socialComponent->fInstagramLink,
                        $socialComponent->fPinterestLink, 
                        $socialComponent->fStubleUponLink, 
                        $socialComponent->fVimeoLink,
                        $socialComponent->fYelpLink, 
                        $socialComponent->fFourSquareLink, 
                        $socialComponent->fEmailLink
                    );
        $this->_checkElements($I, $elements, 1);

        $I->amGoingTo('Check social settings for tablet and mobile in the frontend.');
        $I->amOnPage('/');
        $I->wait(1);
        $I->resizeWindow(768, 1024);
        $I->wait(1);
        $I->switchToIframe();
        $I->wait(1);
        $this->_checkElements($I, $elements, 1);
        $I->click($socialComponent->fTwitterLink,);
        $I->wait(4);
        $I->switchToNextTab();
        $I->wait(1);
        $I->see('Twitter');
        $I->closeTab();
        $I->wait(1);
        $I->resizeWindow(375, 812);
        $I->wait(1);
        $I->switchToIframe();
        $I->wait(1);
        $this->_checkElements($I, $elements, 1);
        $I->click($socialComponent->fTwitterLink,);
        $I->wait(4);
        $I->switchToNextTab();
        $I->wait(2);
        $I->see('Twitter');
        $I->closeTab();
        $I->wait(2);

        $I->amGoingTo('Open customizer tablet and mobile social settings');
        $I->resizeWindow(1280, 950);
        $customizer->_openSettings($I, $customizer->tabletMobileTab, $socialComponent->socialSettingBtn);

        $I->amGoingTo('Reset the social settings to default for tablet and mobile view');
        $helper->_selectItem($I, $socialComponent->openSocialLinksInNewTabMobileSelect, $socialComponent->defaultOpenSocialLinksInNewTab);
        $I->fillField($socialComponent->mobileTwitterInput, '');
        $I->fillField($socialComponent->mobileFacebookInput, '');
        $I->fillField($socialComponent->mobileLinkedInInput, '');
        $I->fillField($socialComponent->mobileYoutubeInput, '');
        $I->fillField($socialComponent->mobileInstragramInput, '');
        $I->fillField($socialComponent->mobilePinterestInput, '');
        $I->fillField($socialComponent->mobileStubleUponInput, '');
        $I->fillField($socialComponent->mobileVimeoInput, '');
        $I->fillField($socialComponent->mobileYelpInput, '');
        $I->fillField($socialComponent->mobileFourSquareInput, '');
        $I->fillField($socialComponent->mobileEmailAddress, '');
        $I->wait(1);
        $I->click($helper->publishBtn);
        $I->wait(2);

        $I->amGoingTo('Check whether social settings visible in the preview');
        $I->click($customizer->hideControl);
        $I->wait(1);
        $I->switchToIframe($customizer->previewIFrame);
        $I->wait(1);
        $this->_checkElements($I, $elements, 0);

        $I->amGoingTo('Check whether social settings visible in mobile and tablet in the frontend.');
        $I->amOnPage('/');
        $I->wait(1);
        $I->resizeWindow(375, 812);
        $I->wait(1);
        $I->switchToIframe();
        $I->wait(1);
        $this->_checkElements($I, $elements, 0);
        $I->wait(1);
        $I->resizeWindow(768, 1024);
        $I->wait(1);
        $I->switchToIframe();
        $I->wait(1);
        $this->_checkElements($I, $elements, 0);
        $I->wait(2);
        $I->resizeWindow(1280, 950);
        $I->wait(1);

        $I->amGoingTo('Remove social settings for mobile and table.');
        $customizer->_openSettings($I, $customizer->tabletMobileTab, $socialComponent->socialSettingBtn);
        $customizer->_removeItem($I, $customizer->tabletMobileTab, $socialComponent->removeSocialSettings);
        $I->wait(1);
        $I->click($helper->publishBtn);
        $I->wait(1);

        $I->amGoingTo('Check the whether default social settings exists in the preview');
        $I->click($customizer->hideControl);
        $I->wait(1);
        $I->switchToIframe($customizer->previewIFrame);
        $I->wait(1);
        $this->_checkElements($I, $elements, 0);

        $I->amGoingTo('Check whether default social settings exists in mobile and table in the frontend.');
        $I->amOnPage('/');
        $I->wait(1);
        $I->resizeWindow(375, 812);
        $I->wait(1);
        $I->switchToIframe();
        $I->wait(1);
        $this->_checkElements($I, $elements, 0);
        $I->wait(1);
        $I->resizeWindow(768, 1024);
        $I->wait(1);
        $I->switchToIframe();
        $I->wait(1);
        $this->_checkElements($I, $elements, 0);
        $I->wait(1);
        $I->resizeWindow(1280, 950);
        $I->wait(1);
    }
}
