<?php




class PageWithCommentsCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function Site_Title_Test(AcceptanceTester $I){

$I->wantTo('Test Tags, Categories, and Post date/time stamp should not be displayed.
Comment list and comment reply form are displayed.');

$I->amOnPage('/about/page-with-comments/');
$I->wait(5);
$I->see('Page with comments');
$I->dontSee('Tags:');
$I->see('3 thoughts on “Page with comments”');
$I->see('Contributor comment.');
$I->dontSee('2007/09/04');







}


}
