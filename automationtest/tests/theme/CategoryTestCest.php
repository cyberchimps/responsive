<?php

require_once '_bootstrap.php';


require_once('Data.php');

class CategoryTestCest
{
   public function _before(AcceptanceTester $I)
   {
   }

   public function Category_Test(AcceptanceTester $I){


       $I->wantTo('Test Draft post in frontend');
       $name=Data::uniqueName();

$I->amOnPage('/wp-admin/');
$I->fillField(_LoginPage::$user_loginField, _LoginPage::$Adminusername);
$I->fillField(_LoginPage::$user_PasswordField, _LoginPage::$Adminpassword);
$I->click('#wp-submit');
$I->wait(5);
// $I->amOnPage('/wp-admin/edit-tags.php?taxonomy=category');
// $I->wait(5);
// $I->fillField('#tag-name',$name);
// $I->fillField('#tag-description','this is a test category');
// $I->click('#submit');
// $I->wait(15);
$I->amOnPage('/wp-admin/edit.php');
$I->wait(5);

// $I->fillField('#post-search-input','Block: Gallery');
$I->fillField('#post-search-input','Post Format: Standard');

$I->pressKey('#post-search-input',WebDriverKeys::ENTER);
$I->wait(10);
$I->moveMouseOver('td.title.column-title.has-row-actions.column-primary.page-title > strong > a');
$I->click('Edit');
$I->wait(10);


$I->click('#editor > div > div > div > div.edit-post-sidebar > div.components-panel > div:nth-child(3) > h2');
$I->wait(5);
$I->fillField('#editor-post-taxonomies__hierarchical-terms-filter-0',"5ca253b54d9c8");
$I->pressKey('#editor-post-taxonomies__hierarchical-terms-filter-0',WebDriverKeys::ENTER);
$I->wait(5);
$I->click('#editor > div > div > div > div.edit-post-sidebar > div.components-panel > div:nth-child(3) > div > div > label');







// $I->amOnPage('/wp-admin/post.php?post=1177&action=edit');
// $I->wait(5);
// $I->click('#editor > div > div > div > div.edit-post-sidebar > div.components-panel > div:nth-child(4) > h2 > button');
// $I->wait(5);
//
// $I->fillField('#components-form-token-input-0','hbwsl1');
// $I->pressKey('#components-form-token-input-0',WebDriverKeys::ENTER);
// $I->wait(30);
//
// $I->click('button.components-button.editor-post-publish-button.is-button.is-default.is-primary.is-large');
// $I->wait(20);







}


}
