<?php
use \page\RespTheme\Customize;
use \page\RespTheme\LogInAndLogOut;
use \page\RespTheme\MainRowComponent;
use \page\RespTheme\RespThemeHelper;



class desktopLayoutCest
{
   

    // tests
    public function DesktopLayoutSettings(RespThemeTester $I,LogInAndLogOut $loginAndLogout, Customize $customize, MainRowComponent $mainrowComponent, RespThemeHelper $helper)
    {
        $I->amGoingTo('Login as Admin');
        $loginAndLogout->userLogin($I);

        $I->amGoingTo('Open customize >> Header >> Main Row >> Main Row settings');
       // $customize->_openDefaultSettings($I, $customize->url, $customize->header);
        //$customizer->_openLayout($I, $mainRowComponent->topRow, $mainRowComponent->desktopLayout);
        $I->click($customize->url);
        $I->wait(2);
        $I->click($customize->header);
        $I->wait(2);
        $I->click($mainrowComponent->mainRowButton);
        
        $I->amGoingTo('check the  layout settings for top row');
        $I->selectOption($mainrowComponent->desktopLayout, 'Fullwidth');
        $I->wait(2);
        $I->selectOption($mainrowComponent->tabletLayout, 'Fullwidth');
        $I->wait(2);
        $I->selectOption($mainrowComponent->mobileLayout, 'Contained');
        $I->wait(2);

        
        $I->amGoingTo('check the min settings for main row');
        $I->fillField($mainrowComponent->minheightDesktop, '0');
        $I->wait(2);
        $I->fillField($mainrowComponent->minheightTablet, '0');
        $I->wait(2);
        $I->fillField($mainrowComponent->minheightMobile, '0');
        $I->wait(2);

        $I->amGoingTo('check the background color settings');
        $I->click($mainrowComponent->backgroundDesktop);
        $I->wait(2);
        $I->click($mainrowComponent->colorDesktop);
        $I->wait(2);
        $I->click($mainrowComponent->backgroundTablet);
         $I->wait(2);
         $I->click($mainrowComponent->colorTablet);
         $I->wait(2);
         $I->click($mainrowComponent->backgroundMobile);
         $I->wait(2);
         $I->click($mainrowComponent->colorMobile);
         $I->wait(2);

         $I->amGoingTo('check the padding settings');
         $I->click($mainrowComponent->desktopPadding);
         $I->fillfield($mainrowComponent->desktopPField);
         $I->wait(2);
         $I->click($mainrowComponent->tabletPadding);
         $I->fillfield($mainrowComponent->tabletPField);
         $I->wait(2);
         $I->click($mainrowComponent->mobilePadding);
         $I->fillfield($mainrowComponent->mobilePField);
         $I->wait(2);

        
        $I->click($mainrowComponent->publishButton);
        $I->wait(3);

        $I->amGoingTo('check on the front end');
        $I->amOnPage('/');
       // $I->seeElement('$mianrowComponent->');
        $I->click($customize->url);
        $I->wait(2);
        $I->scrollTo($customize->header);
        $I->wait(2);
        $I->click($customize->header);
        $I->wait(2);
        $I->click($mainrowComponent->mainRowButton);

    }
}

