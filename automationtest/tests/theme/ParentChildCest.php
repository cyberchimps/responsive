<?php

require_once '_bootstrap.php';

class ParentChildCest
{
   public function _before(AcceptanceTester $I)
   {
   }

   public function ParentChild_Test(AcceptanceTester $I){


     $I->wantTo('Test Parent Child Page in frontend');

     $I->amOnPage('/wp-admin/');
     $I->fillField(_LoginPage::$user_loginField, _LoginPage::$Adminusername);
     $I->fillField(_LoginPage::$user_PasswordField, _LoginPage::$Adminpassword);
     $I->click('#wp-submit');
     $I->wait(5);

     $I->amOnPage('wp-admin/post.php?post=1133&action=edit');
     $I->wait(5);
     $I->see('Page Image Alignment');

     $I->click('#editor > div > div > div > div.edit-post-sidebar > div.components-panel > div:nth-child(5) > h2 > button');
     $I->wait(5);
     $I->see('Parent Page:');
     $I->see('About The Tests');

   }
 }
