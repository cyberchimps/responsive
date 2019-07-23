<?php


class NoBodyPostCest
{
   public function _before(AcceptanceTester $I)
   {
   }

   public function NoBody_Test(AcceptanceTester $I){


     $I->wantTo('Test no body post in frontend');

     $I->amOnPage('/2009/08/06/edge-case-no-content/');
     $I->wait(5);
     $I->see('Edge Case: No Content');
   }
 }
