<?php




class ReadMoreLinkCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function Site_Title_Test(AcceptanceTester $I){

$I->wantTo('Test Read More link in blog ');
$I->amOnPage('/?s=Markup%3A+HTML+Tags+and+Formatting');
$I->wait(5);

$I->see('Markup: HTML Tags and Formatting');


$I->see('Header one');
$I->see('Header three');
$I->see('Header four');
$I->see('Header five');
$I->see('Header six');
$I->see('Blockquotes');
$I->see('Read more');
$I->see('11th January, 2013');
$I->click('Read More…');
$I->wait(5);
$I->see('The HTML <blockquote> Element (or HTML Block Quotation Element) indicates that the enclosed text is an extended quotation. Usually, this is rendered visually by indentation (see Notes for how to change it). A URL for the source of the quotation may be given using the cite attribute, while a text representation of the source can be given using the <cite> element.');









}


}
