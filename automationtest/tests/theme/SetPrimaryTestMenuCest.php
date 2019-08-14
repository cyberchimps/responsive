<?php
require_once '_bootstrap.php';


require_once 'Data.php';

class SetPrimaryTestMenuCest {

public function _before( AcceptanceTester $i ) {
}

public function menu_test( AcceptanceTester $i ) {

    $name = Data::uniqueName();
    $i->wantTo( 'Set Primary Test Menu' );

    $i->amOnPage( '/wp-admin/' );
    $i->fillField( '#user_login', 'admin' );
    $i->fillField( '#user_pass', 'rupesh1395' );
    $i->click( '#wp-submit' );
    $i->wait( 5 );
    $i->amOnPage( '/wp-admin/nav-menus.php' );
    $i->wait( 2 );
    $i->click( '#select-menu-to-edit' );
    $i->click( '#select-menu-to-edit > option:nth-child(6)' );
    $i->click( '#wpbody-content > div.wrap > div.manage-menus > form > span.submit-btn > input' );
    $i->wait( 5 );
    $i->scrollTo( [ 'xpath' => '//*[@id="post-body-content"]/div[3]' ] );
    $i->wait( 5 );
    $i->checkOption( '#locations-primary' );
    $i->wait( 5 );
    $i->click( '#save_menu_footer' );
    $i->wait( 2 );

    $i->amOnPage( '/' );
    $i->wait( 5 );

    $i->click( '#menu-item-1727 > a' );
    $i->click( '#menu-item-1728 > a' );
    $i->wait( 2 );

    $i->see( 'CATEGORY: MARKUP' );
    $i->wait( 5 );

    $i->amOnPage( '/wp-admin/nav-menus.php' );
    $i->wait( 2 );
    $i->click( '#select-menu-to-edit' );
    $i->click( '#select-menu-to-edit > option:nth-child(3)' );
    $i->click( '#wpbody-content > div.wrap > div.manage-menus > form > span.submit-btn > input' );
    $i->wait( 5 );
    $i->scrollTo( [ 'xpath' => '//*[@id="post-body-content"]/div[3]' ] );
    $i->wait( 5 );
    $i->checkOption( '#locations-primary' );
    $i->wait( 5 );
    $i->click( '#save_menu_footer' );
    $i->wait( 2 );

    $i->amOnPage( '/' );
    $i->wait( 5 );

    $i->dontSee('#primary-menu');



}


}
