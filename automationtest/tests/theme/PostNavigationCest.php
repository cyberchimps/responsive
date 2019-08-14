<?php


class PostNavigationCest
{
   public function _before(AcceptanceTester $I)
   {
   }

   public function Navigation_Test(AcceptanceTester $I){


       $I->wantTo('Test post navigation in frontend');

        $I->amOnPage('/');
        $I->wait(5);

        $I->see('Block: Columns');
        $I->see('Hello world!');
        $I->click('#post-1178 > header > h2 > a');
        $I->wait(5);
        $I->scrollTo( [ 'xpath' => '//*[@id="primary"]/nav/div' ] );
        $I->click('#primary > nav > div > a:nth-child(2)');
        $I->wait(5);
        $I->see('Block: Gallery');
      }
    }
