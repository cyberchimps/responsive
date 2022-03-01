<?php
use \Codeception\Util\Locator;


require_once '_bootstrap.php';



$I = new AcceptanceTester($scenario);
// $email = Data::uniqueEmail();
$Data = Data::uniqueName();
$FinalTaglinevalue=_customizeSiteIdentityPage::$taglineValue.$Data;


$I->wantTo('Test all filed inside Layout setting');
// admin Login


$re = '/rgb(a|)\(\s{0,1}(\d+)\s{0,1}\,\s{0,1}(\d+)\s{0,1}\,\s{0,1}(\d+)\)/m';
// $str = 'rgba(51,51,51)';
//
// preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);
//
// $ds= sprintf("#%02x%02x%02x", $matches[0][2], $matches[0][3], $matches[0][4]);

// Print the entire match result
// var_dump($ds);

$I->amOnPage('/wp-admin');
$I->fillField(_LoginPage::$user_loginField, _LoginPage::$Adminusername);
$I->fillField(_LoginPage::$user_PasswordField, _LoginPage::$Adminpassword);
$I->click(_LoginPage::$SubmitButton);
$I->waitForText(_LoginPage::$DashboardText,20);
$I->see(_LoginPage::$DashboardText);
$I->amOnPage(_customizedHomePage::URL);
$I->waitForElementVisible('#accordion-panel-panel-colors-background > h3',20);
$I->click('#accordion-panel-panel-colors-background > h3');
$I->waitForElementVisible('#accordion-section-section-colors-body > h3',20);
$I->click('#accordion-section-section-colors-body > h3');
$I->waitForElementVisible('#customize-control-astra-settings-link-color > div > div > button > span.wp-color-result-text',20);
$I->click('#customize-control-astra-settings-link-color > div > div > button > span.wp-color-result-text');
$I->fillField('#customize-control-astra-settings-link-color > div > div > span > label > input','#dd3333');
$I->click(_customizedHomePage::$PublishButton);
$I->wait(10);

$I->click(_customizeSiteIdentityPage::$SidebarIcon);
$I->wait(10);

$Val = $I->grabAttributeFrom(_customizeSiteIdentityPage::$iframeSelctor,'name');

$I->switchToIFrame($Val);
$linkcolor = $I->executeJS("return jQuery('#menu-item-1768 > a').css('color');");
echo $linkcolor;
preg_match_all($re, $linkcolor, $matches, PREG_SET_ORDER, 0);

$d1= sprintf("#%02x%02x%02x", $matches[0][2], $matches[0][3], $matches[0][4]);

// Print the entire match result
var_dump($d1);
$I->switchToIFrame();


//Sit idenetity Tab
$I->openNewTab();
$I->amOnPage('/');
$I->wait(10);
$I->switchToNextTab();

$color = $I->executeJS("return jQuery('#content').css('color');");
var_dump($color);
//
// $color1 = $I->executeJS("return jQuery('#menu-item-1768 > a').css('color');");
//
// var_dump($color1);
// $color2 = $I->executeJS("return jQuery('#post-701 > div').css('color');");
//
// var_dump($color2);
//
$bar = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver)
{
$dd=$webdriver->findElement(WebDriverBy::cssSelector('#recent-posts-2 > h2'))->getCSSValue('color');
    // echo $webdriver->findElement(WebDriverBy::cssSelector('h2.entry-title'))->getCSSValue('font-size');
    // echo $webdriver->findElement(WebDriverBy::cssSelector('h2.entry-title'))->getCSSValue('font-weight');
echo "dd color $dd";
// assertEquals( $dd, 'rgb(221, 51, 51)' );

});

$color4= $I->executeJS("return jQuery('#recent-posts-2 > h2').css('color');");
echo $color4;
//
$bar = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver) {
    $cc= $webdriver->findElement(WebDriverBy::cssSelector('#content'))->getCSSValue('color');
    echo $cc;
    if($cc=='rgba(51, 51, 51, 1')
    {
        echo "pass";

    }
    else {
        echo "Fail";
    }

});

$I->assertEquals( $color4, 'rgb(221, 51, 51)' );



// $I->waitForText(_customizeSiteIdentityPage::$Titlealue,3);
// $I->see(_customizeSiteIdentityPage::$Titlealue);
// $I->see($FinalTaglinevalue);








?>
