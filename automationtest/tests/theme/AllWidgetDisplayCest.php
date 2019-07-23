<?php



require_once('Data.php');

class AllWidgetDisplayCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function Category_Test(AcceptanceTester $I){


        $I->wantTo('All widgets display correctly.');

$I->amOnPage('/level-1/');
$I->wait(10);
$I->see('META');
$I->see('Entries RSS');
$I->see('Comments RSS');
$I->see('WordPress.org');
$I->see('CATEGORIES');

$I->see('RECENT POSTS');
$I->see('ARCHIVES');
$I->see('RECENT COMMENTS');


}


}
