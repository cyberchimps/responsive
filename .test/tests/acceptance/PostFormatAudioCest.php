<?php 
use \Page\Acceptance\KnownErrors;
use \Page\Acceptance\PostFormatAudio;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class PostFormatAudioCest
{
    public function _before(AcceptanceTester $I )
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I,PostFormatAudio $PostFormatAudioPage,KnownErrors $KnownErrorsPage)
    {
    	$I->amOnPage($PostFormatAudioPage->url);
    	$I->seeElement($PostFormatAudioPage->audioplayer);
    	$I->seeElement($PostFormatAudioPage->playbutton);
    	$I->click($PostFormatAudioPage->playbutton);
    	$I->wait(3);
        $I->seeElement($PostFormatAudioPage->pausebutton);
    	$I->click($PostFormatAudioPage->pausebutton);
    	$I->seeElement($PostFormatAudioPage->playbutton);
        $I->wait(3);
		$I->click($PostFormatAudioPage->mutebutton);
    	$I->seeElement($PostFormatAudioPage->unmutebutton);
        $I->wait(3);
    	$I->click($PostFormatAudioPage->unmutebutton);
    	$I->seeElement($PostFormatAudioPage->mutebutton);

        $I->amGoingTo('See if any known errors are present');
        $KnownErrorsPage->dontSeeErrors($I);
    }
}
