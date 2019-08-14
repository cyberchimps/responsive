<?php




class NotFoundPageCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function Site_Title_Test(AcceptanceTester $I){


$I->amOnPage('/notfound');
$I->wait(5);

// $I->see('404 — Fancy meeting you here!'); //for responsive Pro theme

$I->see('Oops! That page cannot be found.'); // for Parallax pro theme

$I->see('It looks like nothing was found at this location. Maybe try searching for it?'); // for Parallax pro theme







}


}
