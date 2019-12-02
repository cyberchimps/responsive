<?php 

class firstCest
{
    public function _before(Responsive4Tester $I)
    {
    }

    // tests
    public function tryToTest(Responsive4Tester $I)
    {
    	$I->amOnPage('/');
		$I->validateMarkup();
    }
}
