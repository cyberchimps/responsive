<?php
use \page\RespTheme\LogInAndLogOut;
use \page\RespTheme\LogoComp;
use \page\RespTheme\LCommonPage;
use \Facebook\WebDriver\Remote\RemoteWebDriver;
use \Facebook\WebDriver\WebDriverBy;
use \Facebook\WebDriver\WebDriverKeys;


class LogoCest
{
    public function _before(RespThemeTester $I, LogInAndLogOut $loginAndLogout, LogoComp $logocomp , LCommonPage $lCommonPage)
    {
        $I->amGoingTo('Login as Admin');
        $loginAndLogout->userLogin($I);

        $I->click($logocomp->url);
        $I->scrollTo($logocomp->header);
        $I->click($logocomp->header);
        $I->click($logocomp->logoButton);
        $I->wait(1);
    }
    
 // tests
    /*public function LogoLayout(RespThemeTester $I, LogInAndLogOut $loginAndLogout, LogoComp $logocomp , LCommonPage $lCommonPage)
    {
        $I->amGoingTo('check the desktop logo layout settings for logo component');
        $I->selectOption($logocomp->desktopLogoLayout, 'Logo');
        $I->click($logocomp->desktopview);
        $I->click($logocomp->publishButton);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(2);
        $I->seeElement($logocomp->deskrow);
        $I->wait(2);

        $I->click($logocomp->url);
        $I->scrollTo($logocomp->header);
        $I->click($logocomp->header);
        $I->click($logocomp->logoButton);
        $I->wait(1);
        $I->selectOption($logocomp->desktopLogoLayout, 'Logo & Title');
        $I->click($logocomp->desktopview);
        $I->wait(2);
        $I->click($logocomp->publishButton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(2);
        $I->seeElement($logocomp->deskrow);
        $I->wait(2);

        $I->click($logocomp->url);
        $I->scrollTo($logocomp->header);
        $I->click($logocomp->header);
        $I->click($logocomp->logoButton);
        $I->wait(1);
        $I->selectOption($logocomp->desktopLogoLayout, 'Logo, Title & Tagline');
        $I->click($logocomp->desktopview);
        $I->wait(2);
        $I->click($logocomp->publishButton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(2);
        $I->seeElement($logocomp->deskrow);
        $I->wait(2);

        $I->amGoingTo('check the tablet logo layout settings for logo component');
        $I->click($logocomp->url);
        $I->scrollTo($logocomp->header);
        $I->click($logocomp->header);
        $I->click($logocomp->logoButton);
        $I->wait(1);
        $I->selectOption($logocomp->tabletLogoLayout, 'Logo');
        $I->click($logocomp->tabletview);
        $I->wait(2);
        $I->click($logocomp->publishButton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(2);
        $I->resizeWindow(768, 1024);
        $I->wait(2);
        
        $I->resizeWindow(1280, 950);
        $I->wait(2);

        $I->click($logocomp->url);
        $I->scrollTo($logocomp->header);
        $I->click($logocomp->header);
        $I->click($logocomp->logoButton);
        $I->wait(1);
        $I->selectOption($logocomp->tabletLogoLayout, 'Logo & Title');
        $I->click($logocomp->tabletview);
        $I->wait(2);
        $I->click($logocomp->publishButton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(2);
        $I->resizeWindow(768, 1024);
        $I->wait(2);
       
        $I->resizeWindow(1280, 950);
        $I->wait(2);

        $I->click($logocomp->url);
        $I->scrollTo($logocomp->header);
        $I->click($logocomp->header);
        $I->click($logocomp->logoButton);
        $I->wait(1);
        $I->selectOption($logocomp->tabletLogoLayout, 'Logo, Title & Tagline');
        $I->click($logocomp->tabletview);
        $I->click($logocomp->publishButton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(2);
        $I->resizeWindow(768, 1024);
        $I->wait(2);
        
        $I->resizeWindow(1280, 950);
        $I->wait(2);

        $I->amGoingTo('check the mobile logo layout settings for logo component');
        $I->click($logocomp->url);
        $I->scrollTo($logocomp->header);
        $I->click($logocomp->header);
        $I->click($logocomp->logoButton);
        $I->wait(1);
        $I->selectOption($logocomp->mobileLogoLayout, 'Logo');
        $I->click($logocomp->mobileview);
        $I->wait(2);
        $I->click($logocomp->publishButton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(2);
        $I->resizeWindow(390, 844);
        $I->wait(2);
        
        $I->resizeWindow(1280, 950);
        $I->wait(2);
        
        $I->click($logocomp->url);
        $I->scrollTo($logocomp->header);
        $I->click($logocomp->header);
        $I->click($logocomp->logoButton);
        $I->wait(1);
        $I->selectOption($logocomp->mobileLogoLayout, 'Logo & Title');
        $I->wait(1);
        $I->click($logocomp->mobileview);
        $I->wait(2);
        $I->click($logocomp->publishButton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(2);
        $I->resizeWindow(390, 844);
        $I->wait(2);
        
        $I->resizeWindow(1280, 950);
        $I->wait(2);
        
        $I->click($logocomp->url);
        $I->scrollTo($logocomp->header);
        $I->click($logocomp->header);
        $I->click($logocomp->logoButton);
        $I->selectOption($logocomp->mobileLogoLayout, 'Logo, Title & Tagline');
        $I->wait(1);
        $I->click($logocomp->mobileview);
        $I->wait(2);
        $I->click($logocomp->publishButton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(2);
        $I->resizeWindow(390, 844);
        $I->wait(2);
       
        $I->resizeWindow(1280, 950);
        $I->wait(2);
    }*/
    /*public function LogoLayoutStructure(RespThemeTester $I, LogInAndLogOut $loginAndLogout, LogoComp $logocomp , LCommonPage $lCommonPage)
    {
        $I->amGoingTo('check the desktop logo layout structure settings for logo component');
        $I->selectOption($logocomp->desktopLogoLayoutStructure, 'Standard');
        $I->wait(1);
        $I->click($logocomp->desktopview);
        $I->wait(2);
        $I->click($logocomp->publishButton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(2);
        $I->seeElement($logocomp->deskrow);
        $I->wait(2); 
        
        $I->click($logocomp->url);
        $I->scrollTo($logocomp->header);
        $I->click($logocomp->header);
        $I->click($logocomp->logoButton);
        $I->wait(1);
        $I->selectOption($logocomp->desktopLogoLayoutStructure, 'Title - Tagline - Logo');
        $I->wait(1);
        $I->click($logocomp->desktopview);
        $I->wait(2);
        $I->click($logocomp->publishButton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(2);
        $I->seeElement($logocomp->deskrow);
        $I->wait(2); 

        $I->click($logocomp->url);
        $I->scrollTo($logocomp->header);
        $I->click($logocomp->header);
        $I->click($logocomp->logoButton);
        $I->wait(1);
        $I->selectOption($logocomp->desktopLogoLayoutStructure, 'Top Logo - Title - Tagline');
        $I->wait(1);
        $I->click($logocomp->desktopview);
        $I->wait(2);
        $I->click($logocomp->publishButton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(2);
        $I->seeElement($logocomp->deskrow);
        $I->wait(2); 
        
        $I->click($logocomp->url);
        $I->scrollTo($logocomp->header);
        $I->click($logocomp->header);
        $I->click($logocomp->logoButton);
        $I->wait(1);
        $I->selectOption($logocomp->desktopLogoLayoutStructure, 'Top Title - Tagline - Logo');
        $I->wait(1);
        $I->click($logocomp->desktopview);
        $I->wait(2);
        $I->click($logocomp->publishButton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(2);
        $I->seeElement($logocomp->deskrow);
        $I->wait(2);

        $I->click($logocomp->url);
        $I->scrollTo($logocomp->header);
        $I->click($logocomp->header);
        $I->click($logocomp->logoButton);
        $I->wait(1);
        $I->selectOption($logocomp->desktopLogoLayoutStructure, 'Top Title - Logo - Tagline');
        $I->click($logocomp->desktopview);
        $I->wait(2);
        $I->click($logocomp->publishButton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(2);
        $I->seeElement($logocomp->deskrow);
        $I->wait(2);

        $I->amGoingTo('check the tablet logo layout structure settings for logo component');
        $I->click($logocomp->url);
        $I->scrollTo($logocomp->header);
        $I->click($logocomp->header);
        $I->click($logocomp->logoButton);
        $I->wait(1);
        $I->selectOption($logocomp->tabletLogoLayoutStructure, 'Standard');
        $I->wait(1);
        $I->click($logocomp->tabletview);
        $I->wait(2);
        $I->click($logocomp->publishButton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(2);
        $I->resizeWindow(768, 1024);
        $I->wait(2);

        $I->resizeWindow(1280, 950);
        $I->wait(2);

        $I->click($logocomp->url);
        $I->scrollTo($logocomp->header);
        $I->click($logocomp->header);
        $I->click($logocomp->logoButton);
        $I->wait(1);
        $I->selectOption($logocomp->tabletLogoLayoutStructure, 'Title - Tagline - Logo');
        $I->wait(1);
        $I->click($logocomp->tabletview);
        $I->wait(2);
        $I->click($logocomp->publishButton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(2);
        $I->resizeWindow(768, 1024);
        $I->wait(2);
       
        $I->resizeWindow(1280, 950);
        $I->wait(2);

        $I->click($logocomp->url);
        $I->scrollTo($logocomp->header);
        $I->click($logocomp->header);
        $I->click($logocomp->logoButton);
        $I->selectOption($logocomp->tabletLogoLayoutStructure, 'Top Logo - Title - Tagline');
        $I->wait(1);
        $I->click($logocomp->tabletview);
        $I->wait(2);
        $I->click($logocomp->publishButton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(2);
        $I->resizeWindow(768, 1024);
        $I->wait(2);
      
        $I->resizeWindow(1280, 950);
        $I->wait(2);

        $I->click($logocomp->url);
        $I->scrollTo($logocomp->header);
        $I->click($logocomp->header);
        $I->click($logocomp->logoButton);
        $I->wait(1);
        $I->selectOption($logocomp->tabletLogoLayoutStructure, 'Top Title - Tagline - Logo');
        $I->click($logocomp->tabletview);
        $I->wait(2);
        $I->click($logocomp->publishButton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(2);
        $I->resizeWindow(768, 1024);
        $I->wait(2);
        
        $I->resizeWindow(1280, 950);
        $I->wait(2);

        $I->click($logocomp->url);
        $I->scrollTo($logocomp->header);
        $I->click($logocomp->header);
        $I->click($logocomp->logoButton);
        $I->wait(1);
        $I->selectOption($logocomp->tabletLogoLayoutStructure, 'Top Title - Logo - Tagline');
        $I->click($logocomp->tabletview);
        $I->wait(2);
        $I->click($logocomp->publishButton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(2);
        $I->resizeWindow(768, 1024);
        $I->wait(2);
       
        $I->resizeWindow(1280, 950);
        $I->wait(2);

        $I->amGoingTo('check the mobile logo layout structure settings for logo component');
        $I->click($logocomp->url);
        $I->scrollTo($logocomp->header);
        $I->click($logocomp->header);
        $I->click($logocomp->logoButton);
        $I->wait(1);
        $I->selectOption($logocomp->mobileLogoLayoutStructure, 'Standard');
        $I->wait(1);
        $I->click($logocomp->mobileview);
        $I->wait(2);
        $I->click($logocomp->publishButton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(2);
        $I->resizeWindow(390, 844);
        $I->wait(2);
       
        $I->resizeWindow(1280, 950);
        $I->wait(2);

        $I->click($logocomp->url);
        $I->scrollTo($logocomp->header);
        $I->click($logocomp->header);
        $I->click($logocomp->logoButton);
        $I->selectOption($logocomp->mobileLogoLayoutStructure, 'Title - Tagline - Logo');
        $I->wait(1);
        $I->click($logocomp->mobileview);
        $I->wait(2);
        $I->click($logocomp->publishButton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(2);
        $I->resizeWindow(390, 844);
        $I->wait(2);
        
        $I->resizeWindow(1280, 950);
        $I->wait(2);

        $I->click($logocomp->url);
        $I->scrollTo($logocomp->header);
        $I->click($logocomp->header);
        $I->click($logocomp->logoButton);
        $I->wait(1);
        $I->selectOption($logocomp->mobileLogoLayoutStructure, 'Top Logo - Title - Tagline');
        $I->wait(1);
        $I->click($logocomp->mobileview);
        $I->wait(2);
        $I->click($logocomp->publishButton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(2);
        $I->resizeWindow(390, 844);
        $I->wait(2);
        
        $I->resizeWindow(1280, 950);
        $I->wait(2);

        $I->click($logocomp->url);
        $I->scrollTo($logocomp->header);
        $I->click($logocomp->header);
        $I->click($logocomp->logoButton);
        $I->wait(1);
        $I->selectOption($logocomp->mobileLogoLayoutStructure, 'Top Title - Tagline - Logo');
        $I->click($logocomp->mobileview);
        $I->wait(2);
        $I->click($logocomp->publishButton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(2);
        $I->resizeWindow(390, 844);
        $I->wait(2);
        
        $I->resizeWindow(1280, 950);
        $I->wait(2);

        $I->click($logocomp->url);
        $I->scrollTo($logocomp->header);
        $I->click($logocomp->header);
        $I->click($logocomp->logoButton);
        $I->selectOption($logocomp->mobileLogoLayoutStructure, 'Top Title - Logo - Tagline');
        $I->wait(1);
        $I->click($logocomp->mobileview);
        $I->wait(2);
        $I->click($logocomp->publishButton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(2);
        $I->resizeWindow(390, 844);
        $I->wait(2);
       
        $I->resizeWindow(1280, 950);
        $I->wait(2);

        
    }*/
    /*public function PaddingSettings(RespThemeTester $I, LogInAndLogOut $loginAndLogout, LogoComp $logocomp , LCommonPage $lCommonPage)
    {
        $I->amGoingTo('Check padding settings for desktoplayout for the logo component');
        $I->click($logocomp->desktopview);
        $I->wait(1);
        $I->scrollTo($logocomp->paddingSpan);
        $I->wait(1);
        $I->click($logocomp->desktopPadding);
        $I->wait(2);
        $I->fillField($logocomp->desktopPField,'5');
        $I->wait(4);
        $I->click($logocomp->publishButton);
        $I->wait(3);
        $I->amGoingTo('Check on the front end');
        $I->amOnPage('/');
        $I->wait(2);
        $lCommonPage->_checkStyle($I,$lCommonPage->desktopPadding,'padding','xpath','5px');
        $I->wait(2);

        $I->amGoingTo('Check padding settings for tabletlayout for the logo component');
        $I->click($logocomp->url);
        $I->scrollTo($logocomp->header);
        $I->click($logocomp->header);
        $I->click($logocomp->logoButton);
        $I->click($logocomp->tabletview);
        $I->wait(1);
        $I->scrollTo($logocomp->paddingSpan);
        $I->click($logocomp->tabletPadding);
        $I->wait(2);
        $I->fillField($logocomp->tabletPField,'8');
        $I->wait(4);
        $I->click($logocomp->publishButton);
        $I->wait(3);
        $I->amGoingTo('Check on the front end');
        $I->amOnPage('/');
        $I->wait(2);
        $I->resizeWindow(768, 1024);
        $I->wait(2);
        $lCommonPage->_checkStyle($I,$lCommonPage->tabletPadding,'padding','xpath','8px');
        $I->wait(2);
        $I->resizeWindow(1280, 950);
        $I->wait(2);

        $I->amGoingTo('Check padding settings for mobilelayout for the logo component');
        $I->click($logocomp->url);
        $I->scrollTo($logocomp->header);
        $I->click($logocomp->header);
        $I->click($logocomp->logoButton);
        $I->wait(1);
        $I->click($logocomp->mobileview);
        $I->scrollTo($logocomp->mobilePField);
        $I->click($logocomp->mobilePadding);
        $I->wait(2);
        $I->fillField($logocomp->mobilePField,'9');
        $I->wait(4);
        $I->click($logocomp->publishButton);
        $I->wait(3);
        $I->amGoingTo('Check on the front end');
        $I->amOnPage('/');
        $I->wait(2);
        $I->resizeWindow(425, 844);
        $I->wait(2);
        $lCommonPage->_checkStyle($I,$lCommonPage->mobilePadding,'padding','xpath','9px');
        $I->wait(2);
        $I->resizeWindow(1280, 950);
        $I->wait(2);




    }*/
    public function  siteTitleColorSettings(RespThemeTester $I, LogInAndLogOut $loginAndLogout, LogoComp $logocomp , LCommonPage $lCommonPage)
    {
        $I->amGoingTo('Check sitetitle color settings for desktoplayout for the logo component'); 
        $I->click($logocomp->desktopview);
        $I->wait(1);
        $I->scrollTo($logocomp->siteTitleColor);
        $I->click($logocomp->siteTitleColor);
        $I->click($logocomp->selectSiteTitle);
        $I->wait(4);
        $I->click($logocomp->publishButton);
        $I->wait(3);
        $I->amGoingTo('Check on the front end');
        $I->amOnPage('/');
        $I->wait(2);
        $lCommonPage->_checkStyle($I,$lCommonPage->siteTitle,'color','xpath','rgb(130, 36, 227)');
        $I->wait(2);

        $I->amGoingTo('Check sitetitle color settings for tabletlayout for the logo component');
        $I->click($logocomp->url);
        $I->scrollTo($logocomp->header);
        $I->click($logocomp->header);
        $I->click($logocomp->logoButton);
        $I->click($logocomp->tabletview);
        $I->wait(1);
        $I->scrollTo($logocomp->tsiteTitleColor);
        $I->click($logocomp->tsiteTitleColor);
        $I->click($logocomp->selectTsiteTitle);
        $I->wait(4);
        $I->click($logocomp->publishButton);
        $I->wait(3);
        $I->amGoingTo('Check on the front end');
        $I->amOnPage('/');
        $I->wait(2);
        $I->resizeWindow(768, 1024);
        $I->wait(2);
        $lCommonPage->_checkStyle($I,$lCommonPage->tSiteTitle,'color','xpath','rgb(221, 51, 51)');
        $I->wait(2);
        $I->resizeWindow(1280, 950);
        $I->wait(2);

        $I->amGoingTo('Check sitetitle color settings for mobilelayout for the logo component');
        $I->click($logocomp->url);
        $I->scrollTo($logocomp->header);
        $I->click($logocomp->header);
        $I->click($logocomp->logoButton);
        $I->click($logocomp->mobileview);
        $I->wait(1);
        $I->scrollTo($logocomp->msiteTitleColor);
        $I->click($logocomp->msiteTitleColor);
        $I->click($logocomp->selectMsiteTitle);
        $I->wait(4);
        $I->click($logocomp->publishButton);
        $I->wait(3);
        $I->amGoingTo('Check on the front end');
        $I->amOnPage('/');
        $I->wait(2);
        $I->resizeWindow(768, 1024);
        $I->wait(2);
        $lCommonPage->_checkStyle($I,$lCommonPage->mSiteTitle,'color','xpath','rgb(221, 153, 51)');
        $I->wait(2);
        $I->resizeWindow(1280, 950);
        $I->wait(2);

        $I->amGoingTo('Check sitetitle hover color settings for desktoplayout for the logo component'); 
        $I->click($logocomp->url);
        $I->scrollTo($logocomp->header);
        $I->click($logocomp->header);
        $I->click($logocomp->logoButton);
        $I->click($logocomp->mobileview);
        $I->wait(1);
        $I->click($logocomp->desktopview);
        $I->wait(1);
        $I->scrollTo($logocomp->siteTitleHoverColor);
        $I->click($logocomp->siteTitleHoverColor);
        $I->click($logocomp->selectSiteTitleHover);
        $I->wait(4);
        $I->click($logocomp->publishButton);
        $I->wait(3);
        $I->switchToIFrame($lCommonPage->frame);
        $I->wait(1);
        $I->moveMouseOver($lCommonPage->title);
        $I->wait(2);
        $I->switchToIFrame();
        $I->amGoingTo('Check on the front end');
        $I->amOnPage('/');
        $I->wait(2);
        $lCommonPage->_checkStyle($I,$lCommonPage->siteTitleHover,'color','xpath','rgb(130, 36, 227)');
        $I->wait(2);
        $I->moveMouseOver($lCommonPage->title);
        $I->wait(2);

    }
}
