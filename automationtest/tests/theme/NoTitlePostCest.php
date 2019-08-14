<?php


class NoTitlePostCest
{
   public function _before(AcceptanceTester $I)
   {
   }

   public function NoTitle_Test(AcceptanceTester $I){


     $I->wantTo('Test post if post is displayed properly in frontend');

     $I->amOnPage('/2009/09/05/edge-case-no-title/');
     $I->wait(5);
     $I->see('This post has no title, but it still must link to the single post view somehow.');

     $I->click('#post-1169 > header > div > span.entry-date.visible > a');
     $I->wait(5);
     $I->see('This post has no title, but it still must link to the single post view somehow.');

   }
 }
