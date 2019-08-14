<?php


require_once('Data.php');

class TagTestCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function TagTest_Test(AcceptanceTester $I){

        $I->wantTo('Test Edge Case: Many Tags');
        $I->amOnPage('/2009/06/01/edge-case-many-tags/');
        $I->wait(5);
    $I->see('This post has many tags.');
        $I->see('8BIT, alignment, Articles, captions, categories, chat, Codex, comments, content, css, dowork, edge case, embeds, excerpt, Fail, featured image, FTW, Fun, gallery, html, image, jetpack, layout, link, Love, markup, Mothership, Must Read, Nailed It, Pictures, Post Formats, quote, shortcode, standard, Success, Swagger, Tags, template, title, twitter, Unseen, video, videopress, WordPress, wordpress.tv');


// $I->amOnPage('/wp-admin/');
// $I->fillField(_LoginPage::$user_loginField, _LoginPage::$Adminusername);
// $I->fillField(_LoginPage::$user_PasswordField, _LoginPage::$Adminpassword);
// $I->click('#wp-submit');
// $I->wait(5);
// $I->amOnPage('/wp-admin/edit-tags.php?taxonomy=post_tag');
// $I->wait(5);
// $I->fillField('#tag-name',$name);
// $I->fillField('#tag-description','this is a test tage');
// $I->click('#submit');
// $I->wait(5);
// $I->amOnPage('/wp-admin/post.php?post=1177&action=edit');
// $I->wait(5);
// $I->click('#editor > div > div > div > div.edit-post-sidebar > div.components-panel > div:nth-child(4) > h2 > button');
// $I->wait(5);
//
// $I->fillField('#components-form-token-input-0',$name);
// $I->pressKey('#components-form-token-input-0',WebDriverKeys::ENTER);
// $I->wait(70);
//
// $I->click('button.components-button.editor-post-publish-button.is-button.is-default.is-primary.is-large');
// $I->wait(20);







}


}
