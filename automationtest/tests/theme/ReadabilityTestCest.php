<?php
use \Codeception\Util\Locator;

require_once('Data.php');



class ReadabilityTestCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function DraftPost_Test(AcceptanceTester $I){
        $name=Data::uniqueName();


        $I->wantTo('Create post With Long Title test');

$I->amOnPage('/2010/10/05/post-format-standard/');

$I->wait(5);
$I->see('Post Format: Standard');
$I->see('5th October, 2010');
$I->see('Classic, Post Formats');
$I->see('Tags: Post Formats, readability, standard');

$bar = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver)
{
    echo $webdriver->findElement(WebDriverBy::cssSelector('h2.entry-title'))->getCSSValue('line-height');
    echo $webdriver->findElement(WebDriverBy::cssSelector('h2.entry-title'))->getCSSValue('font-size');
    echo $webdriver->findElement(WebDriverBy::cssSelector('h2.entry-title'))->getCSSValue('font-weight');

});


// $I->fillField(_LoginPage::$user_loginField, _LoginPage::$Adminusername);
// $I->fillField(_LoginPage::$user_PasswordField, _LoginPage::$Adminpassword);
// $I->click('#wp-submit');
// $I->wait(5);
// $I->amOnPage('/wp-admin/edit.php');
// $I->wait(5);
// $I->click('Add New');
// $I->wait(5);
// $I->fillField('#post-title-0', 'Long Post Title with long non-breaking string: If you say it loud enough, you’ll always sound precocious; Supercalifragilisticexpialidocious!');
// $I->click('Publish');
//
// $I->wait(16);
//





}


}
