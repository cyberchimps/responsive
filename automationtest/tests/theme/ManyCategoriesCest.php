<?php



require_once('Data.php');

class ManyCategoriesCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function Category_Test(AcceptanceTester $I){


        $I->wantTo('Edge case many categories  Test');
        $name=Data::uniqueName();
$I->amOnPage('/2009/07/02/edge-case-many-categories/');
$I->wait(5);
$I->see('aciform, antiquarianism, arrangement, asmodeus, broder, buying, Cat A, Cat B, Cat C, championship, chastening, Child 1, Child 2, Child Category 01, Child Category 02, Child Category 03, Child Category 04, Child Category 05, Classic, clerkship, disinclination, disinfection, dispatch, echappee, Edge Case, enphagy, equipollent, fatuity, Foo A, Foo A, Foo Parent, gaberlunzie, Grandchild Category, illtempered, insubordination, lender, Markup, Media, monosyllable, packthread, palter, papilionaceous, Parent, Parent Category, personable, Post Formats, propylaeum, pustule, quartern, scholarship, selfconvicted, showshoe, sloyd, sub, sublunary, tamtam, Unpublished, weakhearted, ween, wellhead, wellintentioned, whetstone, years');
$I->see('This post has many categories.');








}


}
