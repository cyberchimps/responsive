<?php
require_once('Data.php');
require_once '_bootstrap.php';

use \Codeception\Util\Locator;


class CommentCest
{
   public function _before(AcceptanceTester $I)
   {
   }

   public function Comment(AcceptanceTester $I){
     $email = Data::uniqueEmail();

     $name=Data::uniqueName();
     $name2=Data::uniqueName();



$I->amOnPage('/2012/01/03/template-comments/');
$I->wait(5);

//$I->see('Leave a Reply');
$I->scrollTo(['xpath'=> '//*[@id="comment"]']);
$I->fillField('#comment',$name);
$I->fillField('#author','Anonymous');
$I->fillField('#email',$email);
$I->click("input[name='submit']");
$I->wait(5);
$I->amOnPage('/wp-admin/');
$I->fillField(_LoginPage::$user_loginField, _LoginPage::$Adminusername);
$I->fillField(_LoginPage::$user_PasswordField, _LoginPage::$Adminpassword);
$I->click('#wp-submit');
$I->wait(5);
$I->click('#menu-comments > a > div.wp-menu-name');
$I->see($name);
$I->moveMouseOver('td.comment.column-comment.has-row-actions.column-primary > p');
$I->wait(2);
$I->click('td.comment.column-comment.has-row-actions.column-primary > div.row-actions > span.approve');
$I->wait(10);
$I->amOnPage('/2012/01/03/template-comments/');
$I->see($name);
$I->wait(5);

$I->click('#commentform > p.logged-in-as > a:nth-child(2)');
$I->wait(5);

$I->scrollTo(['xpath'=> '//*[@id="div-comment-25"]/div[2]/a']);
$I->click('#div-comment-25 > div.reply > a');
//$I->see('Leave a Reply');
$I->fillField('#comment',$name2);
$I->fillField('#author','Ano');
$I->fillField('#email',$email);
$I->click("input[name='submit']");
$I->wait(5);
$I->amOnPage('/wp-admin/');
$I->fillField(_LoginPage::$user_loginField, _LoginPage::$Adminusername);
$I->fillField(_LoginPage::$user_PasswordField, _LoginPage::$Adminpassword);
$I->click('#wp-submit');
$I->wait(5);
$I->click('#menu-comments > a > div.wp-menu-name');
$I->see($name2);
$I->moveMouseOver('td.comment.column-comment.has-row-actions.column-primary > p');
$I->wait(2);
$I->click('td.comment.column-comment.has-row-actions.column-primary > div.row-actions > span.approve');
$I->wait(10);
$I->amOnPage('/2012/01/03/template-comments/');

// $I->seeElement(Locator::find('img', ['class' => 'avatar avatar-50 photo']));
$I->see('Header one', ['css' => 'h1']);
$I->see('Header two', ['css' => 'h2']);

$I->see('Stay hungry. Stay foolish.', ['css' => 'blockquote']);
$I->wait(2);

$I->see('List item one', ['css' => 'li']);


$I->see($name2);
$I->wait(5);

$I->scrollTo(['xpath'=>'//*[@id="div-comment-67"]/footer/div[2]/span/a']);
$I->click('#div-comment-66 > footer > div.comment-metadata > span > a');
$I->wait(5);
$I->fillField('#name','Changed');
$I->fillField('#content',$name);
$I->wait(5);
$I->click("input[name='save']");
$I->wait(10);
$I->see($name);
$I->wait(5);








}


}
