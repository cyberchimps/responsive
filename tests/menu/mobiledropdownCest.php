<?php 
use \Page\Customizer\Home;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class mobiledropdownCest
{
    public function _before(MenuTester $I)
    {
    }

    // tests
    public function ExpandParent1Sub1Menu(MenuTester $I, Home $HomePage){
    	$I->resizeWindow(375, 812);
        $I->wait(1);
        //
    	$I->amGoingTo(' ');
    	$I->amOnPage($HomePage->url);
    	$I->see('responsive');
    	$I->dontSee('Parent 1');
    	
    	//Expand Main Menu
    	$I->click('.menu-toggle');
    	$I->wait(1);
    	$I->see('Parent 1');
    	$I->see('Parent 2');
    	
    	//Expand Parent 1  
    	$I->dontSee('Parent 1 Sub 1');
    	$I->dontSee('Parent 1 Sub 2');
    	$I->click('#header-menu > li:nth-child(1) > span > svg');
    	$I->wait(1);
    	$I->see('Parent 1 Sub 1');
    	$I->see('Parent 1 Sub 2');

		//Expand Parent 1 Sub 1
    	$I->dontSee('Parent 1 Sub 1 Sub 1');
    	$I->dontSee('Parent 1 Sub 1 Sub 2');
    	$I->click('#header-menu > li:nth-child(1) > ul > li:nth-child(1) > span > svg');
    	$I->wait(1);
    	$I->see('Parent 1 Sub 1 Sub 1');
    	$I->see('Parent 1 Sub 1 Sub 2');

    	//Hide Parent 1 Sub 1
    	$I->click('#header-menu > li:nth-child(1) > ul > li:nth-child(1) > span > svg');
    	$I->wait(1);
    	$I->dontSee('Parent 1 Sub 1 Sub 1');
    	$I->dontSee('Parent 1 Sub 1 Sub 2');

    	//Hide Parent 1  
    	$I->click('#header-menu > li:nth-child(1) > span > svg');
    	$I->wait(1);
    	$I->dontSee('Parent 1 Sub 1');
    	$I->dontSee('Parent 1 Sub 2');

    }

    public function ExpandParent1Sub2Menu(MenuTester $I, Home $HomePage){
    	$I->resizeWindow(375, 812);
        $I->wait(1);
        //
    	$I->amGoingTo(' ');
    	$I->amOnPage($HomePage->url);
    	$I->see('responsive');
    	$I->dontSee('Parent 1');
    	
    	//Expand Main Menu
    	$I->click('.menu-toggle');
    	$I->wait(1);
    	$I->see('Parent 1');
    	$I->see('Parent 2');
    	
    	//Expand Parent 1  
    	$I->dontSee('Parent 1 Sub 1');
    	$I->dontSee('Parent 1 Sub 2');
    	$I->click('#header-menu > li:nth-child(1) > span > svg');
    	$I->wait(1);
    	$I->see('Parent 1 Sub 1');
    	$I->see('Parent 1 Sub 2');

		//Expand Parent 1 Sub 2
    	$I->dontSee('Parent 1 Sub 1 Sub 1');
    	$I->dontSee('Parent 1 Sub 1 Sub 2');
    	$I->click('#header-menu > li:nth-child(1) > ul > li:nth-child(2) > span > svg');
    	$I->wait(1);
    	$I->see('Parent 1 Sub 2 Sub 1');
    	$I->see('Parent 1 Sub 2 Sub 2');

    	//Hide Parent 1 Sub 2
    	$I->click('#header-menu > li:nth-child(1) > ul > li:nth-child(2) > span > svg');
    	$I->wait(1);
    	$I->dontSee('Parent 1 Sub 2 Sub 1');
    	$I->dontSee('Parent 1 Sub 2 Sub 2');

    	//Hide Parent 1  
    	$I->click('#header-menu > li:nth-child(1) > span > svg');
    	$I->wait(1);
    	$I->dontSee('Parent 1 Sub 1');
    	$I->dontSee('Parent 1 Sub 2');

    }

    public function ExpandParent2Sub1Menu(MenuTester $I, Home $HomePage){
    	$I->resizeWindow(375, 812);
        $I->wait(1);
        //
    	$I->amGoingTo(' ');
    	$I->amOnPage($HomePage->url);
    	$I->see('responsive');
    	$I->dontSee('Parent 2');
    	
    	//Expand Main Menu
    	$I->click('.menu-toggle');
    	$I->wait(1);
    	$I->see('Parent 1');
    	$I->see('Parent 2');
    	
    	//Expand Parent 2  
    	$I->dontSee('Parent 2 Sub 1');
    	$I->dontSee('Parent 2 Sub 2');
    	$I->click('#header-menu > li:nth-child(2) > span > svg');
    	$I->wait(1);
    	$I->see('Parent 2 Sub 1');
    	$I->see('Parent 2 Sub 2');

		//Expand Parent 2 Sub 1
    	$I->dontSee('Parent 2 Sub 1 Sub 1');
    	$I->dontSee('Parent 2 Sub 1 Sub 2');
    	$I->click('#header-menu > li:nth-child(2) > ul > li:nth-child(1) > span > svg');
    	$I->wait(1);
    	$I->see('Parent 2 Sub 1 Sub 1');
    	$I->see('Parent 2 Sub 1 Sub 2');

    	//Hide Parent 2 Sub 1
    	$I->click('#header-menu > li:nth-child(2) > ul > li:nth-child(1) > span > svg');
    	$I->wait(1);
    	$I->dontSee('Parent 2 Sub 1 Sub 1');
    	$I->dontSee('Parent 2 Sub 1 Sub 2');

    	//Hide Parent 2  
    	$I->click('#header-menu > li:nth-child(2) > span > svg');
    	$I->wait(1);
    	$I->dontSee('Parent 2 Sub 1');
    	$I->dontSee('Parent 2 Sub 2');

    }

    public function ExpandParent2Sub2Menu(MenuTester $I, Home $HomePage){
    	$I->resizeWindow(375, 812);
        $I->wait(1);
        //
    	$I->amGoingTo(' ');
    	$I->amOnPage($HomePage->url);
    	$I->see('responsive');
    	$I->dontSee('Parent 1');
    	
    	//Expand Main Menu
    	$I->click('.menu-toggle');
    	$I->wait(1);
    	$I->see('Parent 1');
    	$I->see('Parent 2');
    	
    	//Expand Parent 2  
    	$I->dontSee('Parent 2 Sub 1');
    	$I->dontSee('Parent 2 Sub 2');
    	$I->click('#header-menu > li:nth-child(2) > span > svg');
    	$I->wait(1);
    	$I->see('Parent 2 Sub 1');
    	$I->see('Parent 2 Sub 2');

		//Expand Parent 2 Sub 2
    	$I->dontSee('Parent 2 Sub 1 Sub 1');
    	$I->dontSee('Parent 2 Sub 1 Sub 2');
    	$I->click('#header-menu > li:nth-child(2) > ul > li:nth-child(2) > span > svg');
    	$I->wait(1);
    	$I->see('Parent 2 Sub 2 Sub 1');
    	$I->see('Parent 2 Sub 2 Sub 2');

    	//Hide Parent 2 Sub 2
    	$I->click('#header-menu > li:nth-child(2) > ul > li:nth-child(2) > span > svg');
    	$I->wait(1);
    	$I->dontSee('Parent 2 Sub 2 Sub 1');
    	$I->dontSee('Parent 2 Sub 2 Sub 2');

    	//Hide Parent 2  
    	$I->click('#header-menu > li:nth-child(2) > span > svg');
    	$I->wait(1);
    	$I->dontSee('Parent 2 Sub 1');
    	$I->dontSee('Parent 2 Sub 2');

    }



    public function ClickParent1Menu(MenuTester $I, Home $HomePage){
    	$I->resizeWindow(375, 812);
        $I->wait(1);
        //Visit Parent 1 Link
    	$I->amGoingTo('Visit Parent 1 Link');
    	$I->amOnPage($HomePage->url);
    	$I->see('responsive');
    	$I->dontSee('Parent 1');
    	$I->dontSee('Parent 2');
    	//Expand Main Menu
    	$I->click('.menu-toggle');
    	$I->wait(1);
    	$I->see('Parent 1');
    	$I->see('Parent 2');
    	$I->click('Parent 1');
    	$I->wait(5);
    	
    	$url = $I->executeJS("return location.href");
    	$I->assertContains($HomePage->parent1menu,$url);
    }
    	
    public function ClickParent1Sub1Menu(MenuTester $I, Home $HomePage){	
    	$I->resizeWindow(375, 812);
        $I->wait(1);
    	//Visit Parent 1 Sub 1 Link
    	$I->amGoingTo('Visit Parent 1 Sub 1 Link');
    	$I->amOnPage($HomePage->url);
    	$I->see('responsive');
    	$I->dontSee('Parent 1');
    	$I->dontSee('Parent 2');
    	//Expand Main Menu
    	$I->click('.menu-toggle');
    	$I->wait(1);
    	$I->see('Parent 1');
    	$I->see('Parent 2');
    	//Expand Parent1  
    	$I->dontSee('Parent 1 Sub 1');
    	$I->dontSee('Parent 1 Sub 2');
    	$I->click('#header-menu > li:nth-child(1) > span > svg');
    	$I->wait(1);
    	$I->see('Parent 1 Sub 1');
    	$I->see('Parent 1 Sub 2');
    	$I->click('Parent 1 Sub 1');
    	$url = $I->executeJS("return location.href");
    	$I->assertContains($HomePage->parent1sub1menu,$url);
    }

    public function ClickParent1Sub1Sub1Menu(MenuTester $I, Home $HomePage){
    	$I->resizeWindow(375, 812);
        $I->wait(1);
    	//Visit Parent 1 Sub 1 Sub 1 Link
    	$I->amGoingTo('Visit Parent 1 Sub 1 Sub 1 Link');
    	$I->amOnPage($HomePage->url);
    	$I->see('responsive');
    	$I->dontSee('Parent 1');
    	$I->dontSee('Parent 2');
    	//Expand Main Menu
    	$I->click('.menu-toggle');
    	$I->wait(1);
    	$I->see('Parent 1');
    	$I->see('Parent 2');
    	//Expand Parent 1  
    	$I->dontSee('Parent 1 Sub 1');
    	$I->dontSee('Parent 1 Sub 2');
    	$I->click('#header-menu > li:nth-child(1) > span > svg');
    	$I->wait(1);
    	$I->see('Parent 1 Sub 1');
    	$I->see('Parent 1 Sub 2');
    	//Expand Parent 1 Sub 1
    	$I->dontSee('Parent 1 Sub 1 Sub 1');
    	$I->dontSee('Parent 1 Sub 1 Sub 2');
    	$I->click('#header-menu > li:nth-child(1) > ul > li:nth-child(1) > span > svg');
    	$I->wait(1);
    	$I->see('Parent 1 Sub 1 Sub 1');
    	$I->see('Parent 1 Sub 1 Sub 2');
    	$I->click('Parent 1 Sub 1 Sub 1');
    	$url = $I->executeJS("return location.href");
    	$I->assertContains($HomePage->parent1sub1sub1menu,$url);
    }

    public function ClickParent1Sub1Sub2Menu(MenuTester $I, Home $HomePage){
    	$I->resizeWindow(375, 812);
        $I->wait(1);
        //Visit Parent 1 Sub 1 Sub 2 Link
    	$I->amGoingTo('Visit Parent 1 Sub 1 Sub 2 Link');
    	$I->amOnPage($HomePage->url);
    	$I->see('responsive');
    	$I->dontSee('Parent 1');
    	$I->dontSee('Parent 2');
    	//Expand Main Menu
    	$I->click('.menu-toggle');
    	$I->wait(1);
    	$I->see('Parent 1');
    	$I->see('Parent 2');
    	//Expand Parent 1  
    	$I->dontSee('Parent 1 Sub 1');
    	$I->dontSee('Parent 1 Sub 2');
    	$I->click('#header-menu > li:nth-child(1) > span > svg');
    	$I->wait(1);
    	$I->see('Parent 1 Sub 1');
    	$I->see('Parent 1 Sub 2');
    	//Expand Parent 1 Sub 1
    	$I->dontSee('Parent 1 Sub 1 Sub 1');
    	$I->dontSee('Parent 1 Sub 1 Sub 2');
    	$I->click('#header-menu > li:nth-child(1) > ul > li:nth-child(1) > span > svg');
    	$I->wait(1);
    	$I->see('Parent 1 Sub 1 Sub 1');
    	$I->see('Parent 1 Sub 1 Sub 2');
    	$I->click('Parent 1 Sub 1 Sub 2');
    	$url = $I->executeJS("return location.href");
    	$I->assertContains($HomePage->parent1sub1sub2menu,$url);
    }

    public function ClickParent1Sub2Menu(MenuTester $I, Home $HomePage){
    	$I->resizeWindow(375, 812);
        $I->wait(1);
    	//Visit Parent 1 Sub 2 Link
    	$I->amGoingTo('Visit Parent 1 Sub 2 Link');
    	$I->amOnPage($HomePage->url);
    	$I->see('responsive');
    	$I->dontSee('Parent 1');
    	$I->dontSee('Parent 2');
    	//Expand Main Menu
    	$I->click('.menu-toggle');
    	$I->wait(1);
    	$I->see('Parent 1');
    	$I->see('Parent 2');
    	//Expand Parent 1  
    	$I->dontSee('Parent 1 Sub 1');
    	$I->dontSee('Parent 1 Sub 2');
    	$I->click('#header-menu > li:nth-child(1) > span > svg');
    	$I->wait(1);
    	$I->see('Parent 1 Sub 1');
    	$I->see('Parent 1 Sub 2');
    	$I->click('Parent 1 Sub 2');
    	$url = $I->executeJS("return location.href");
    	$I->assertContains($HomePage->parent1sub2menu,$url);
    }

    public function ClickParent1Sub2Sub1Menu(MenuTester $I, Home $HomePage){
    	$I->resizeWindow(375, 812);
        $I->wait(1);
        //Visit Parent 1 Sub 2 Sub 1 Link
    	$I->amGoingTo('Visit Parent 1 Sub 2 Sub 1 Link');
    	$I->amOnPage($HomePage->url);
    	$I->see('responsive');
    	$I->dontSee('Parent 1');
    	$I->dontSee('Parent 2');
    	//Expand Main Menu
    	$I->click('.menu-toggle');
    	$I->wait(1);
    	$I->see('Parent 1');
    	$I->see('Parent 2');
    	//Expand Parent 1  
    	$I->dontSee('Parent 1 Sub 1');
    	$I->dontSee('Parent 1 Sub 2');
    	$I->click('#header-menu > li:nth-child(1) > span > svg');
    	$I->wait(1);
    	$I->see('Parent 1 Sub 1');
    	$I->see('Parent 1 Sub 2');
    	//Expand Parent 1 Sub 1
    	$I->dontSee('Parent 1 Sub 2 Sub 1');
    	$I->dontSee('Parent 1 Sub 2 Sub 2');
    	$I->click('#header-menu > li:nth-child(1) > ul > li:nth-child(2) > span > svg');
    	$I->wait(1);
    	$I->see('Parent 1 Sub 2 Sub 1');
    	$I->see('Parent 1 Sub 2 Sub 2');
    	$I->click('Parent 1 Sub 2 Sub 1');
    	$url = $I->executeJS("return location.href");
    	$I->assertContains($HomePage->parent1sub2sub1menu,$url);
    }

    public function ClickParent1Sub2Sub2Menu(MenuTester $I, Home $HomePage){
    	$I->resizeWindow(375, 812);
        $I->wait(1);
        //Visit Parent 1 Sub 2 Sub 2 Link
    	$I->amGoingTo('Visit Parent 1 Sub 2 Sub 2 Link');
    	$I->amOnPage($HomePage->url);
    	$I->see('responsive');
    	$I->dontSee('Parent 1');
    	$I->dontSee('Parent 2');
    	//Expand Main Menu
    	$I->click('.menu-toggle');
    	$I->wait(1);
    	$I->see('Parent 1');
    	$I->see('Parent 2');
    	//Expand Parent 1  
    	$I->dontSee('Parent 1 Sub 1');
    	$I->dontSee('Parent 1 Sub 2');
    	$I->click('#header-menu > li:nth-child(1) > span > svg');
    	$I->wait(1);
    	$I->see('Parent 1 Sub 1');
    	$I->see('Parent 1 Sub 2');
    	//Expand Parent 1 Sub 1
    	$I->dontSee('Parent 1 Sub 2 Sub 1');
    	$I->dontSee('Parent 1 Sub 2 Sub 2');
    	$I->click('#header-menu > li:nth-child(1) > ul > li:nth-child(2) > span > svg');
    	$I->wait(1);
    	$I->see('Parent 1 Sub 2 Sub 1');
    	$I->see('Parent 1 Sub 2 Sub 2');
    	$I->click('Parent 1 Sub 2 Sub 2');
    	$url = $I->executeJS("return location.href");
    	$I->assertContains($HomePage->parent1sub2sub2menu,$url);
    }

    public function ClickParent2Menu(MenuTester $I, Home $HomePage){
    	$I->resizeWindow(375, 812);
        $I->wait(1);
        //Visit Parent 2 Link
    	$I->amGoingTo('Visit Parent 2 Link');
    	$I->amOnPage($HomePage->url);
    	$I->see('responsive');
    	$I->dontSee('Parent 1');
    	$I->dontSee('Parent 2');
    	//Expand Main Menu
    	$I->click('.menu-toggle');
    	$I->wait(1);
    	$I->see('Parent 1');
    	$I->see('Parent 2');
    	$I->click('Parent 2');
    	$url = $I->executeJS("return location.href");
    	$I->assertContains($HomePage->parent2menu,$url);
    }

    public function ClickParent2Sub1Menu(MenuTester $I, Home $HomePage){	
    	$I->resizeWindow(375, 812);
        $I->wait(1);
    	//Visit Parent 2 Sub 1 Link
    	$I->amGoingTo('Visit Parent 2 Sub 1 Link');
    	$I->amOnPage($HomePage->url);
    	$I->see('responsive');
    	$I->dontSee('Parent 1');
    	$I->dontSee('Parent 2');
    	//Expand Main Menu
    	$I->click('.menu-toggle');
    	$I->wait(1);
    	$I->see('Parent 1');
    	$I->see('Parent 2');
    	//Expand Parent2  
    	$I->dontSee('Parent 2 Sub 1');
    	$I->dontSee('Parent 2 Sub 2');
    	$I->click('#header-menu > li:nth-child(2) > span > svg');
    	$I->wait(1);
    	$I->see('Parent 2 Sub 1');
    	$I->see('Parent 2 Sub 2');
    	$I->click('Parent 2 Sub 1');
    	$url = $I->executeJS("return location.href");
    	$I->assertContains($HomePage->parent2sub1menu,$url);
    }

    public function ClickParent2Sub1Sub1Menu(MenuTester $I, Home $HomePage){
    	$I->resizeWindow(375, 812);
        $I->wait(1);
    	//Visit Parent 2 Sub 1 Sub 1 Link
    	$I->amGoingTo('Visit Parent 2 Sub 1 Sub 1 Link');
    	$I->amOnPage($HomePage->url);
    	$I->see('responsive');
    	$I->dontSee('Parent 1');
    	$I->dontSee('Parent 2');
    	//Expand Main Menu
    	$I->click('.menu-toggle');
    	$I->wait(1);
    	$I->see('Parent 1');
    	$I->see('Parent 2');
    	//Expand Parent 2  
    	$I->dontSee('Parent 1 Sub 1');
    	$I->dontSee('Parent 1 Sub 2');
    	$I->click('#header-menu > li:nth-child(2) > span > svg');
    	$I->wait(1);
    	$I->see('Parent 2 Sub 1');
    	$I->see('Parent 2 Sub 2');
    	//Expand Parent 2 Sub 1
    	$I->dontSee('Parent 2 Sub 1 Sub 1');
    	$I->dontSee('Parent 2 Sub 1 Sub 2');
    	$I->click('#header-menu > li:nth-child(2) > ul > li:nth-child(1) > span > svg');
    	$I->wait(1);
    	$I->see('Parent 2 Sub 1 Sub 1');
    	$I->see('Parent 2 Sub 1 Sub 2');
    	$I->click('Parent 2 Sub 1 Sub 1');
    	$url = $I->executeJS("return location.href");
    	$I->assertContains($HomePage->parent2sub1sub1menu,$url);
    }

    public function ClickParent2Sub1Sub2Menu(MenuTester $I, Home $HomePage){
    	$I->resizeWindow(375, 812);
        $I->wait(1);
        //Visit Parent 2 Sub 1 Sub 2 Link
    	$I->amGoingTo('Visit Parent 2 Sub 1 Sub 2 Link');
    	$I->amOnPage($HomePage->url);
    	$I->see('responsive');
    	$I->dontSee('Parent 1');
    	$I->dontSee('Parent 2');
    	//Expand Main Menu
    	$I->click('.menu-toggle');
    	$I->wait(1);
    	$I->see('Parent 1');
    	$I->see('Parent 2');
    	//Expand Parent 2  
    	$I->dontSee('Parent 1 Sub 1');
    	$I->dontSee('Parent 1 Sub 2');
    	$I->click('#header-menu > li:nth-child(2) > span > svg');
    	$I->wait(1);
    	$I->see('Parent 2 Sub 1');
    	$I->see('Parent 2 Sub 2');
    	//Expand Parent 2 Sub 1
    	$I->dontSee('Parent 2 Sub 1 Sub 1');
    	$I->dontSee('Parent 2 Sub 1 Sub 2');
    	$I->click('#header-menu > li:nth-child(2) > ul > li:nth-child(1) > span > svg');
    	$I->wait(1);
    	$I->see('Parent 2 Sub 1 Sub 1');
    	$I->see('Parent 2 Sub 1 Sub 2');
    	$I->click('Parent 2 Sub 1 Sub 2');
    	$url = $I->executeJS("return location.href");
    	$I->assertContains($HomePage->parent2sub1sub2menu,$url);
    }

    public function ClickParent2Sub2Menu(MenuTester $I, Home $HomePage){
    	$I->resizeWindow(375, 812);
        $I->wait(1);
    	//Visit Parent 2 Sub 2 Link
    	$I->amGoingTo('Visit Parent 2 Sub 2 Link');
    	$I->amOnPage($HomePage->url);
    	$I->see('responsive');
    	$I->dontSee('Parent 1');
    	$I->dontSee('Parent 2');
    	//Expand Main Menu
    	$I->click('.menu-toggle');
    	$I->wait(1);
    	$I->see('Parent 1');
    	$I->see('Parent 2');
    	//Expand Parent 2  
    	$I->dontSee('Parent 2 Sub 1');
    	$I->dontSee('Parent 2 Sub 2');
    	$I->click('#header-menu > li:nth-child(2) > span > svg');
    	$I->wait(1);
    	$I->see('Parent 2 Sub 1');
    	$I->see('Parent 2 Sub 2');
    	$I->click('Parent 2 Sub 2');
    	$url = $I->executeJS("return location.href");
    	$I->assertContains($HomePage->parent2sub2menu,$url);
    }

    public function ClickParent2Sub2Sub1Menu(MenuTester $I, Home $HomePage){
    	$I->resizeWindow(375, 812);
        $I->wait(1);
        //Visit Parent 2 Sub 2 Sub 1 Link
    	$I->amGoingTo('Visit Parent 2 Sub 2 Sub 1 Link');
    	$I->amOnPage($HomePage->url);
    	$I->see('responsive');
    	$I->dontSee('Parent 1');
    	$I->dontSee('Parent 2');
    	//Expand Main Menu
    	$I->click('.menu-toggle');
    	$I->wait(1);
    	$I->see('Parent 1');
    	$I->see('Parent 2');
    	//Expand Parent 1  
    	$I->dontSee('Parent 1 Sub 1');
    	$I->dontSee('Parent 1 Sub 2');
    	$I->click('#header-menu > li:nth-child(2) > span > svg');
    	$I->wait(1);
    	$I->see('Parent 2 Sub 1');
    	$I->see('Parent 2 Sub 2');
    	//Expand Parent 2 Sub 1
    	$I->dontSee('Parent 2 Sub 2 Sub 1');
    	$I->dontSee('Parent 2 Sub 2 Sub 2');
    	$I->click('#header-menu > li:nth-child(2) > ul > li:nth-child(2) > span > svg');
    	$I->wait(1);
    	$I->see('Parent 2 Sub 2 Sub 1');
    	$I->see('Parent 2 Sub 2 Sub 2');
    	$I->click('Parent 2 Sub 2 Sub 1');
    	$url = $I->executeJS("return location.href");
    	$I->assertContains($HomePage->parent2sub2sub1menu,$url);
    }

    public function ClickParent2Sub2Sub2Menu(MenuTester $I, Home $HomePage){
    	$I->resizeWindow(375, 812);
        $I->wait(1);
        //Visit Parent 2 Sub 2 Sub 2 Link
    	$I->amGoingTo('Visit Parent 2 Sub 2 Sub 2 Link');
    	$I->amOnPage($HomePage->url);
    	$I->see('responsive');
    	$I->dontSee('Parent 1');
    	$I->dontSee('Parent 2');
    	//Expand Main Menu
    	$I->click('.menu-toggle');
    	$I->wait(1);
    	$I->see('Parent 1');
    	$I->see('Parent 2');
    	//Expand Parent 2  
    	$I->dontSee('Parent 2 Sub 1');
    	$I->dontSee('Parent 2 Sub 2');
    	$I->click('#header-menu > li:nth-child(2) > span > svg');
    	$I->wait(1);
    	$I->see('Parent 2 Sub 1');
    	$I->see('Parent 2 Sub 2');
    	//Expand Parent 2 Sub 1
    	$I->dontSee('Parent 2 Sub 2 Sub 1');
    	$I->dontSee('Parent 2 Sub 2 Sub 2');
    	$I->click('#header-menu > li:nth-child(2) > ul > li:nth-child(2) > span > svg');
    	$I->wait(1);
    	$I->see('Parent 2 Sub 2 Sub 1');
    	$I->see('Parent 2 Sub 2 Sub 2');
    	$I->click('Parent 2 Sub 2 Sub 2');
    	$url = $I->executeJS("return location.href");
    	$I->assertContains($HomePage->parent2sub2sub2menu,$url);
    }
}
