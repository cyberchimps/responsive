<?php
use \Codeception\Util\Locator;

require_once('Data.php');



class PostWithLongTitleCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function DraftPost_Test(AcceptanceTester $I){
        $name=Data::uniqueName();


        $I->wantTo('Create post With Long Title test');

$I->amOnPage('/2009/10/05/title-should-not-overflow-the-content-area/');

$I->wait(5);
$I->see('Taumatawhakatangihangakoauauotamateaturipukakapikimaungahoronukupokaiwhenuakitanatahu');
$I->see('Title should not overflow the content area');
$I->see('Tags: content, css, edge case, html, layout, title');
$I->see('Classic, Edge Case');

$bar = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver)
{
    return $webdriver->findElement(WebDriverBy::cssSelector('h2.entry-title'))->getCSSValue('line-height');

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
