<?php




class Page_With_Comments_DisabledCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function Site_Title_Test(AcceptanceTester $I){

$I->wantTo('Comment list and comment reply form are not displayed.
No "Comments Disabled" message should be displayed.
Layout not adversely impacted by minimal page content.');

$I->amOnPage('/about/page-with-comments-disabled/');
$I->wait(5);
$I->see('Page with comments disabled');
$I->dontSee('Tags:');
$I->dontSee('thoughts on “Page with comments”');
$I->dontSee('Contributor comment.');








}


}
