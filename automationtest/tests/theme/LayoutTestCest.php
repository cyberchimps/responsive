<?php

class LayoutTestCest
{
   public function _before(AcceptanceTester $I)
   {
   }

   public function LayoutPost_Test(AcceptanceTester $I){


       $I->wantTo('Test HTML tags in frontend');

       $I->amOnPage('/2013/01/11/markup-html-tags-and-formatting/');

        $I->wait(5);
        $I->see('Markup: HTML Tags and Formatting');

        $I->see('Header one', ['css' => 'h1']);
        $I->see('Header two', ['css' => 'h2']);
        $I->see('Header three', ['css' => 'h3']);
        $I->see('Header four', ['css' => 'h4']);
        $I->see('Header five', ['css' => 'h5']);
        $I->see('Header six', ['css' => 'h6']);

        $I->see('Blockquotes');
        $I->see('Stay hungry. Stay foolish.', ['css' => 'blockquote']);

        $I->see('Tables');
        $I->see('Employee', ['css' => 'th']);
        $I->see('Salary', ['css' => 'th']);
        $I->see('$1', ['css' => 'td']);
        $I->see('Because that’s all Steve Jobs needed for a salary.', ['css' => 'td']);

        $I->see('Definition Lists', ['css' => 'h2']);
        $I->see('Definition List Title', ['css' => 'dt']);
        $I->see('Definition list division.', ['css' => 'dd']);
        $I->see('Startup', ['css' => 'dt']);

        $I->see('Unordered Lists (Nested)', ['css' => 'h2']);
        $I->see('List item one', ['css' => 'li']);
        $I->see('List item two', ['css' => 'li']);
        $I->see('List item three', ['css' => 'li']);
        $I->see('List item four', ['css' => 'li']);

        $I->see('HTML Tags', ['css' => 'h2']);
        $I->see('Address Tag', ['css' => 'strong']);
        $I->see('1 Infinite Loop', ['css' => 'address']);

        $I->see('link', ['css' => 'a']);
        $I->see('srsly', ['css' => 'abbr']);
        $I->see('ftw', ['css' => 'acronym']);

        $I->see('Automattic', ['css' => 'cite']);

        $I->see('word-wrap: break-word;', ['css' => 'code']);
        $I->see('italicize', ['css' => 'em']);
        $I->see('text', ['css' => 'i']);

        $I->see('inserted', ['css' => 'ins']);
        $I->see('keyboard text', ['css' => 'kbd']);

        $I->see('Developers, developers, developers...', ['css' => 'q']);

        $I->see('underlined text', ['css' => 'u']);

        $I->see('variables', ['css' => 'var']);
      }
    }
