<?php
use \page\RespTheme\Customize;
use \page\RespTheme\LogInAndLogOut;
use \page\RespTheme\MainRowComponent;
use \page\RespTheme\Helper;
use \Facebook\WebDriver\Remote\RemoteWebDriver;
use \Facebook\WebDriver\WebDriverBy;
use \Facebook\WebDriver\WebDriverKeys;

class MainrowTestingCest
{


    public function _before(RespThemeTester $I,LogInAndLogOut $loginAndLogout, Customize $customize, MainRowComponent $mainrowComponent,Helper $helper)
    {
        $I->amGoingTo('Login as Admin');
        $loginAndLogout->userLogin($I);

       
        $I->click($customize->url);
        $I->wait(2);
        $I->scrollTo($customize->header);
        $I->wait(2);
        $I->click($customize->header);
        $I->wait(2);
        $I->click($mainrowComponent->mainRowButton);

    }

    // tests
   public function LayoutSettings(RespThemeTester $I,LogInAndLogOut $loginAndLogout, Customize $customize, MainRowComponent $mainrowComponent, Helper $helper)
    {    
        $I->amGoingTo('check the desktop layout settings for main row');
        $I->selectOption($mainrowComponent->desktopLayout, 'Fullwidth');
        $I->wait(1);
        $I->click($mainrowComponent->publishButton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(2);
        $I->assertEquals($mainrowComponent->desktopLayout,$helper->desktop);
        $I->wait(2);
        $I->seeElement($mainrowComponent->deskrow);
        $I->wait(2);
        $I->click($customize->url);
        $I->wait(1);
        $I->scrollTo($customize->header);
        $I->wait(1);
        $I->click($customize->header);
        $I->wait(1);
        $I->click($mainrowComponent->mainRowButton);
        $I->wait(1);
        
        $I->selectOption($mainrowComponent->desktopLayout, 'Contained');
        $I->wait(1);
        $I->click($mainrowComponent->publishButton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(2);
        $I->assertEquals($mainrowComponent->desktopLayout,$helper->desktop);
        $I->wait(2);
        $I->seeElement($mainrowComponent->deskrow);
        $I->wait(2);
        $I->click($customize->url);
        $I->wait(1);
        $I->scrollTo($customize->header);
        $I->wait(1);
        $I->click($customize->header);
        $I->wait(1);
        $I->click($mainrowComponent->mainRowButton);
        $I->wait(1);

       $I->amGoingTo('check the tablet layout settings for main row');
        $I->click($mainrowComponent->tablet);
        $I->wait(1);
        $I->selectOption($mainrowComponent->tabletLayout, 'Fullwidth');
        $I->wait(1);
        $I->click($mainrowComponent->publishButton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(2);
        $I->resizeWindow(768, 1024);
        $I->wait(2);
        $I->assertEquals($mainrowComponent->desktopLayout,$helper->tablet);
        $I->wait(2);
        $I->resizeWindow(1280, 950);
        $I->wait(2);

        $I->click($customize->url);
        $I->wait(1);
        $I->scrollTo($customize->header);
        $I->wait(1);
        $I->click($customize->header);
        $I->wait(1);
        $I->click($mainrowComponent->mainRowButton);
        $I->wait(1);
        $I->click($mainrowComponent->tablet);
        $I->wait(1);
        $I->selectOption($mainrowComponent->tabletLayout, 'Contained');
        $I->wait(1);
        $I->click($mainrowComponent->publishButton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(2);
        $I->resizeWindow(768, 1024);
        $I->wait(2);
        $I->assertEquals($mainrowComponent->desktopLayout,$helper->tablet);
        $I->wait(2);
        $I->resizeWindow(1280, 950);
        $I->wait(2);
        
        $I->click($customize->url);
        $I->wait(1);
        $I->scrollTo($customize->header);
        $I->wait(1);
        $I->click($customize->header);
        $I->wait(1);
        $I->click($mainrowComponent->mainRowButton);
        $I->wait(1);
        $I->click($mainrowComponent->tablet);
        $I->wait(1);
        $I->selectOption($mainrowComponent->tabletLayout, 'Standard');
        $I->wait(1);
        $I->click($mainrowComponent->publishButton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(2);
        $I->resizeWindow(768, 1024);
        $I->wait(2);
        $I->assertEquals($mainrowComponent->desktopLayout,$helper->tablet);
        $I->wait(2);
        $I->resizeWindow(1280, 950);
        $I->wait(2);

        $I->amGoingTo('Check the mobile layout settings for the main row');
        $I->click($customize->url);
        $I->wait(1);
        $I->scrollTo($customize->header);
        $I->wait(1);
        $I->click($customize->header);
        $I->wait(1);
        $I->click($mainrowComponent->mainRowButton);
        $I->wait(1);
        $I->click($mainrowComponent->mobile);
        $I->wait(1);
        $I->selectOption($mainrowComponent->mobileLayout, 'Standard');
        $I->wait(1);
        $I->click($mainrowComponent->publishButton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(2);
        $I->resizeWindow(390, 844);
        $I->wait(2);
        $I->assertEquals($mainrowComponent->desktopLayout,$helper->mobile);
        $I->wait(2);
        $I->seeElement($mainrowComponent->mobrow);
        $I->resizeWindow(1280, 950);
        $I->wait(2);

        $I->click($customize->url);
        $I->wait(1);
        $I->scrollTo($customize->header);
        $I->wait(1);
        $I->click($customize->header);
        $I->wait(1);
        $I->click($mainrowComponent->mainRowButton);
        $I->wait(1);
        $I->click($mainrowComponent->mobile);
        $I->wait(1);
        $I->selectOption($mainrowComponent->mobileLayout, 'Fullwidth');
        $I->wait(1);
        $I->click($mainrowComponent->publishButton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(2);
        $I->resizeWindow(390, 844);
        $I->wait(2);
        $I->assertEquals($mainrowComponent->desktopLayout,$helper->mobile);
        $I->wait(2);
        $I->seeElement($mainrowComponent->mobrow);
        $I->resizeWindow(1280, 950);
        $I->wait(2);

        $I->click($customize->url);
        $I->wait(1);
        $I->scrollTo($customize->header);
        $I->wait(1);
        $I->click($customize->header);
        $I->wait(1);
        $I->click($mainrowComponent->mainRowButton);
        $I->wait(1);
        $I->click($mainrowComponent->mobile);
        $I->wait(1);
        $I->selectOption($mainrowComponent->mobileLayout, 'Contained');
        $I->wait(1);
        $I->click($mainrowComponent->publishButton);
        $I->wait(3);
        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
        $I->wait(2);
        $I->resizeWindow(390, 844);
        $I->wait(2);
        $I->assertEquals($mainrowComponent->desktopLayout,$helper->mobile);
        $I->wait(2);
        $I->seeElement($mainrowComponent->mobrow);
        $I->resizeWindow(1280, 950);
        $I->wait(2);

       $I->amGoingTo('Logout');
       $loginAndLogout->userLogout($I);
       $I->wait(2);
    }

   public function MinHtSettings(RespThemeTester $I,LogInAndLogOut $loginAndLogout, Customize $customize, MainRowComponent $mainrowComponent, Helper $helper)
         {  
            $I->amGoingTo('Check min height settings for desktop for the main row');
            $I->click($mainrowComponent->desktop);
            $I->fillfield($mainrowComponent->minheightDesktop, '263');
            $I->wait(4);
            $I->click($mainrowComponent->publishButton);
            $I->wait(3);
            $I->amGoingTo('Check on the front end');
            $I->amOnPage('/');
            $I->wait(2);
            $helper->_checkStyle($I,$helper->desktopMinheight,'min-height','xpath','263px');
            $I->wait(2);
        
           
           $I->amGoingTo('Check min height settings for tablet for the main row');
            $I->click($customize->url);
            $I->wait(2);
            $I->scrollTo($customize->header);
            $I->wait(2);
            $I->click($customize->header);
            $I->wait(2);
            $I->click($mainrowComponent->mainRowButton);
            $I->wait(2);
            $I->click($mainrowComponent->tablet);
            $I->wait(1);
            $I->fillfield($mainrowComponent->minheightTablet, '250');
            $I->wait(4);
            $I->click($mainrowComponent->publishButton);
            $I->wait(3);
            $I->amGoingTo('Check on the front end');
            $I->amOnPage('/');
            $I->wait(2);
            $I->resizeWindow(768, 1024);
            $I->wait(2);
            $helper->_checkStyle($I,$helper->tabletMinheight,'min-height','xpath','250px');
            $I->wait(2);
            $I->resizeWindow(1280, 950);
            $I->wait(2);

            $I->amGoingTo('Check min height settings for moblie for the main row');
            $I->click($customize->url);
            $I->wait(2);
            $I->scrollTo($customize->header);
            $I->wait(2);
            $I->click($customize->header);
            $I->wait(2);
            $I->click($mainrowComponent->mainRowButton);
            $I->wait(2);
            $I->click($mainrowComponent->mobile);
            $I->wait(1);
            $I->fillfield($mainrowComponent->minheightMobile, '78');
            $I->wait(4);
            $I->click($mainrowComponent->publishButton);
            $I->wait(3);
            $I->amGoingTo('Check on the front end');
            $I->amOnPage('/');
            $I->wait(2);
            $I->resizeWindow(390, 844);
            $I->wait(2);
            $helper->_checkStyle($I,$helper->mobileMinheight,'min-height','xpath','78px');
            $I->wait(2);
            $I->seeElement($mainrowComponent->mobrow);
            $I->resizeWindow(1280, 950);
            $I->wait(2);

            $I->amGoingTo('Logout');
            $loginAndLogout->userLogout($I);
            $I->wait(2);
         }
        
       public function BackgroundcolorSettings(RespThemeTester $I,LogInAndLogOut $loginAndLogout, Customize $customize, MainRowComponent $mainrowComponent, Helper $helper)
        {
            $I->amGoingTo('Check background color settings for desktop for the main row');
            $I->click($mainrowComponent->desktop);
            $I->wait(1);
            $I->scrollTo($mainrowComponent->backgroundDesktop);
            $I->click($mainrowComponent->backgroundDesktop);
            $I->wait(2);
            $I->click($mainrowComponent->colorDesktop);
            $I->wait(4);
            $I->click($mainrowComponent->publishButton);
            $I->wait(3);
            $I->amGoingTo('Check on the front end');
            $I->amOnPage('/');
            $I->wait(2);
            $helper->_checkStyle($I,$helper->desktopBgColor,'background','xpath','rgb(221, 51, 51) none repeat scroll 0% 0%');
            $I->wait(2);


          $I->amGoingTo('Check background color settings for tablet for the main row');
            $I->click($customize->url);
            $I->wait(2);
            $I->scrollTo($customize->header);
            $I->wait(2);
            $I->click($customize->header);
            $I->wait(2);
            $I->click($mainrowComponent->mainRowButton);
            $I->wait(2);
            $I->click($mainrowComponent->tablet);
            $I->wait(1);
            $I->scrollTo($mainrowComponent->backgroundTablet);
            $I->click($mainrowComponent->backgroundTablet);
            $I->wait(2);
            $I->click($mainrowComponent->colorTablet);
            $I->wait(4);
            $I->click($mainrowComponent->publishButton);
            $I->wait(3);
            $I->amGoingTo('Check on the front end');
            $I->amOnPage('/');
            $I->wait(2);
            $I->resizeWindow(768, 1024);
            $I->wait(2);
            $helper->_checkStyle($I,$helper->tabletBgColor,'background','xpath','rgb(129, 215, 66) none repeat scroll 0% 0%');
            $I->wait(2);
            $I->resizeWindow(1280, 950);
            $I->wait(2);

           $I->amGoingTo('Check background color settings for mobile for the main row');
            $I->click($customize->url);
            $I->wait(2);
            $I->scrollTo($customize->header);
            $I->wait(2);
            $I->click($customize->header);
            $I->wait(2);
            $I->click($mainrowComponent->mainRowButton);
            $I->wait(2);
            $I->click($mainrowComponent->mobile);
            $I->wait(1);
            $I->scrollTo($mainrowComponent->backgroundMobile);
            $I->click($mainrowComponent->backgroundMobile);
            $I->wait(2);
            $I->click($mainrowComponent->colorMobile);
            $I->wait(4);
            $I->click($mainrowComponent->publishButton);
            $I->wait(3);
            $I->amGoingTo('Check on the front end');
            $I->amOnPage('/');
            $I->wait(2);
            $I->resizeWindow(390, 844);
            $I->wait(2);
             $helper->_checkStyle($I,$helper->mobileBgColor,'background','xpath','rgb(30, 115, 190) none repeat scroll 0% 0%');
            $I->wait(2);
            $I->seeElement($mainrowComponent->mobrow);
            $I->resizeWindow(1280, 950);
            $I->wait(2);
            
            $I->amGoingTo('Logout');
            $loginAndLogout->userLogout($I);
            $I->wait(2);
        }
        public function PaddingSettings(RespThemeTester $I,LogInAndLogOut $loginAndLogout, Customize $customize, MainRowComponent $mainrowComponent, Helper $helper)
        {
           $I->amGoingTo('Check padding settings for desktop for the main row');
            $I->click($mainrowComponent->desktop);
            $I->wait(1);
            $I->scrollTo($mainrowComponent->paddingSpan);
            $I->wait(1);
            $I->click($mainrowComponent->desktopPadding);
            $I->wait(2);
            $I->fillField($mainrowComponent->desktopPField,'5');
            $I->wait(4);
            $I->click($mainrowComponent->publishButton);
            $I->wait(3);
            $I->amGoingTo('Check on the front end');
            $I->amOnPage('/');
            $I->wait(2);
            $helper->_checkStyle($I,$helper->desktopPadding,'padding','xpath','5px');
            $I->wait(2);

            $I->amGoingTo('Check padding settings for tablet for the main row');
            $I->click($customize->url);
            $I->wait(2);
            $I->scrollTo($customize->header);
            $I->wait(2);
            $I->click($customize->header);
            $I->wait(2);
            $I->click($mainrowComponent->mainRowButton);
            $I->wait(2);
            $I->click($mainrowComponent->tablet);
            $I->wait(1);
            $I->scrollTo($mainrowComponent->paddingSpan);
            $I->wait(1);
            $I->click($mainrowComponent->tabletPadding);
            $I->wait(2);
            $I->fillField($mainrowComponent->tabletPField,'8');
            $I->wait(4);
            $I->click($mainrowComponent->publishButton);
            $I->wait(3);
            $I->amGoingTo('Check on the front end');
            $I->amOnPage('/');
            $I->wait(2);
            $I->resizeWindow(768, 1024);
            $I->wait(2);
            $helper->_checkStyle($I,$helper->tabletPadding,'padding','xpath','8px');
            $I->wait(2);
            $I->resizeWindow(1280, 950);
            $I->wait(2);

            
            $I->amGoingTo('Check padding settings for mobile for the main row');
            $I->click($customize->url);
            $I->wait(2);
            $I->scrollTo($customize->header);
            $I->wait(2);
            $I->click($customize->header);
            $I->wait(2);
            $I->click($mainrowComponent->mainRowButton);
            $I->wait(2);
            $I->click($mainrowComponent->mobile);
            $I->wait(1);
            $I->scrollTo($mainrowComponent->paddingSpan);
            $I->wait(1);
            $I->click($mainrowComponent->mobilePadding);
            $I->wait(2);
            $I->fillField($mainrowComponent->mobilePField,'3');
            $I->wait(4);
            $I->click($mainrowComponent->publishButton);
            $I->wait(3);
            $I->amGoingTo('Check on the front end');
            $I->amOnPage('/');
            $I->wait(2);
            $I->resizeWindow(390, 844);
            $I->wait(2);
            $helper->_checkStyle($I,$helper->mobilePadding,'padding','xpath','3px');
            $I->wait(2);
            $I->seeElement($mainrowComponent->mobrow);
            $I->resizeWindow(1280, 950);
            $I->wait(2);
            
            $I->amGoingTo('Logout');
            $loginAndLogout->userLogout($I);
            $I->wait(2);
        }
}
