<?php
use \page\RespTheme\Customizer;
use \page\RespTheme\LogInAndLogOut;
use \page\RespTheme\TopRowComponents;
use \page\RespTheme\RespThemeHelper;

class TopRowComponentSettingsCest
{
    /**
     * This test checks the desktop settings changes in the preview and frontend.
     */
    public function DesktopHTMLSettingsTest(RespThemeTester $I, LogInAndLogOut $loginAndLogout, Customizer $customizer, TopRowComponents $topRowComponent, RespThemeHelper $helper)
    {
        $I->amGoingTo('Login as Admin');
        $loginAndLogout->userLogin($I);

        $I->amGoingTo('Open customizer >> Header >> Top Row >> Top Row component settings');
        $customizer->_openLayout($I, $topRowComponent->topRow, $topRowComponent->desktopLayout);

        $I->wait(4);
    }
}
