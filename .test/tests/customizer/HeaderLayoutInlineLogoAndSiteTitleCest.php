<?php

use \Page\Customizer\AdminLogin;
use \Page\Customizer\Customizer;
use \Page\Customizer\Home;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;
class HeaderLayoutInlineLogoAndSiteTitleCest
{

    public function _before(CustomizerTester $I)
    {
    }

    // tests
    public function tryToTest(CustomizerTester $I, AdminLogin $AdminLoginPage, Customizer $CustomizerPage, Home $HomaPage)
    {
        $I->amGoingTo('Login as Admin');
        $AdminLoginPage->adminLogin($I);

        //Check default class without customizer
        $I->amGoingTo('Check Default body Class without Inline Logo And Site Title Checkbox checked');
        $I->expectTo('See Body with Class '.$HomaPage->bodyWithClass_SiteHeaderSiteBrandingMainNavigation);
        $I->amOnPage($HomaPage->url);
        $I->seeElement($HomaPage->bodyWithClass_SiteHeaderSiteBrandingMainNavigation);
        $I->dontSeeElement($HomaPage->bodyWithClass_InlineLogoAndSiteTitle);
        $I->seeElement($HomaPage->bodyWithClass_siteHeaderLayoutHorizontal);
        $I->seeElement($HomaPage->bodyWithClass_siteHeaderLayoutHorizontal);
        $I->seeElement($HomaPage->bodyWithClass_headerWidgetAlignmentSpread);
        $I->seeElement($HomaPage->bodyWithClass_headerWidgetPositionTop);

        //Open Customizer
        $I->amGoingTo('Open Customizer');
        $I->amOnPage($CustomizerPage->url);
        $I->click($CustomizerPage->customizer_header);
        $I->wait(1);
        $I->click($CustomizerPage->customizer_header_layout);
        $I->wait(1);
        $I->seeElement($CustomizerPage->customizer_header_layout_Inline_LogoAnd_Site_Title);
        $I->click($CustomizerPage->hideCustomizer);

        //Check default customizer values
        $I->amGoingTo('Check Default body Class within customizer');
        $I->expectTo('Dont See Body with Class '.$HomaPage->bodyWithClass_InlineLogoAndSiteTitle);
        $I->executeJS('jQuery("iframe").attr("name", "new_name")');
        $I->switchToIFrame("new_name");
        $I->seeElement($HomaPage->bodyWithClass_SiteHeaderSiteBrandingMainNavigation);
        $I->dontSeeElement($HomaPage->bodyWithClass_InlineLogoAndSiteTitle);
        $I->seeElement($HomaPage->bodyWithClass_siteHeaderLayoutHorizontal);
        $I->seeElement($HomaPage->bodyWithClass_siteHeaderLayoutHorizontal);
        $I->seeElement($HomaPage->bodyWithClass_headerWidgetAlignmentSpread);
        $I->seeElement($HomaPage->bodyWithClass_headerWidgetPositionTop);

        $I->switchToIFrame();
        $I->click($CustomizerPage->unHideCustomizer);

        //Open Customizer
        $I->amGoingTo('Going to enable Inline Logo And Site Title');
        $I->click($CustomizerPage->customizer_header_layout_Inline_LogoAnd_Site_Title);

        //Check updated customizer values
        $I->click($CustomizerPage->hideCustomizer);
        $I->wait(2);
        $I->amGoingTo('Check Updated Body Class within customizer');
        $I->executeJS('jQuery("iframe").attr("name", "new_name")');
        $I->switchToIFrame("new_name");
        $I->seeElement($HomaPage->bodyWithClass_SiteHeaderSiteBrandingMainNavigation);
        $I->seeElement($HomaPage->bodyWithClass_InlineLogoAndSiteTitle);
        $I->seeElement($HomaPage->bodyWithClass_siteHeaderLayoutHorizontal);
        $I->seeElement($HomaPage->bodyWithClass_siteHeaderLayoutHorizontal);
        $I->seeElement($HomaPage->bodyWithClass_headerWidgetAlignmentSpread);
        $I->seeElement($HomaPage->bodyWithClass_headerWidgetPositionTop);

        $I->switchToIFrame();
        $I->wait(1);
        $I->click($CustomizerPage->unHideCustomizer);
        $I->wait(1);
        $I->click($CustomizerPage->publishButton);
        $I->wait(1);

        //Check Updated body class without customizer
        $I->amGoingTo('Check Updated body class without customizer');
        $I->amOnPage($HomaPage->url);
        $I->seeElement($HomaPage->bodyWithClass_SiteHeaderSiteBrandingMainNavigation);
        $I->seeElement($HomaPage->bodyWithClass_InlineLogoAndSiteTitle);
        $I->seeElement($HomaPage->bodyWithClass_siteHeaderLayoutHorizontal);
        $I->seeElement($HomaPage->bodyWithClass_siteHeaderLayoutHorizontal);
        $I->seeElement($HomaPage->bodyWithClass_headerWidgetAlignmentSpread);
        $I->seeElement($HomaPage->bodyWithClass_headerWidgetPositionTop);

        //Revert back customizer value
        //Open Customizer
        $I->amGoingTo('Open Customizer');
        $I->amOnPage($CustomizerPage->url);
        $I->click($CustomizerPage->customizer_header);
        $I->wait(1);
        $I->click($CustomizerPage->customizer_header_layout);
        $I->wait(1);
        $I->click($CustomizerPage->customizer_header_layout_Inline_LogoAnd_Site_Title);
        $I->wait(2);
        $I->click($CustomizerPage->publishButton);
        $I->wait(3);
    }
}