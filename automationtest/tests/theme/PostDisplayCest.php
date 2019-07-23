<?php

require_once '_bootstrap.php';

class PostDisplayCest
{
   public function _before(AcceptanceTester $I)
   {
   }

   public function PostDisplay_Test(AcceptanceTester $I){


     $I->wantTo('Test post if post is displayed properly in frontend');

     $I->amOnPage('/wp-admin/');
     $I->fillField(_LoginPage::$user_loginField, _LoginPage::$Adminusername);
     $I->fillField(_LoginPage::$user_PasswordField, _LoginPage::$Adminpassword);
     $I->click('#wp-submit');
     $I->wait(5);

     $I->amOnPage('/wp-admin/options-reading.php');
     $I->fillField('#posts_per_page','5');
     $I->click("input[name='submit']");

     $I->amOnPage('/');
     $I->wait(5);
     $I->seeNumberOfElements('header > h2', 6);

      $I->amOnPage('/2018/11/03/block-button/');
      $I->wait(5);

      $I->see('Block: Button', ['css' => 'body h1']);
}
}
