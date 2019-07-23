<?php
// require_once '_bootstrap.php';



$I = new AcceptanceTester($scenario);
$I->wantTo('Validate that the HTML getting generated is valid html');
// admin Login

$I->amOnPage('/');
$aLinks = $I->grabMultiple('a', 'href');
print_r($aLinks);
for($i=0; $i<100;$i++)
{
    $url = filter_var($aLinks[$i], FILTER_SANITIZE_URL);
    if (filter_var($url, FILTER_VALIDATE_URL)) {
        $I->amOnPage($url);
        $I->validateMarkup();

    } else {
        echo("$url is not a valid URL");
    }





}
