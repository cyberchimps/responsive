<?php

require_once '_bootstrap.php';


class CommentDisabledCest
{
   public function _before(AcceptanceTester $I)
   {
   }

   public function Comment_Disabled(AcceptanceTester $I){

     $I->amOnPage('/2012/01/02/template-comments-disabled/');
     $I->wait(10);
     $I->see('This post has its comments, pingbacks, and trackbacks disabled.');

$I->amOnPage('/wp-admin/');
$I->fillField(_LoginPage::$user_loginField, _LoginPage::$Adminusername);
$I->fillField(_LoginPage::$user_PasswordField, _LoginPage::$Adminpassword);
$I->click('#wp-submit');
$I->wait(5);

$I->click('#menu-posts > a > div.wp-menu-name');
$I->moveMouseOver('#post-1775 > td.title.column-title.has-row-actions.column-primary.page-title');
$I->click('#post-1775 > td.title.column-title.has-row-actions.column-primary.page-title > div.row-actions > span.edit');
$I->wait(5);

$I->see('Discussion');
$I->click('#editor > div > div > div > div.edit-post-sidebar > div.components-panel > div:nth-child(8) > h2 > button > span > svg');
$I->wait(5);
$I->checkOption('#editor > div > div > div > div.edit-post-sidebar > div.components-panel > div:nth-child(8) > div:nth-child(2) > div > div > label');
$I->wait(5);
$I->click('#editor > div > div > div > div.edit-post-header > div.edit-post-header__settings > button.components-button.editor-post-publish-button.is-button.is-default.is-primary.is-large');

$I->wait(5);
$I->see('Post updated.');


}
}
