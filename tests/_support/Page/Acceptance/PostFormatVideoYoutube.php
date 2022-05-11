<?php
namespace Page\Acceptance;

class PostFormatVideoYoutube
{
    // include url of current page
    public static $URL = '';

    /**
     * Declare UI map for this page here. CSS or XPath allowed.
     * public static $usernameField = '#username';
     * public static $formSubmitButton = "#mainForm input[type=submit]";
     */

    /**
     * Basic route example for your current URL
     * You can append any additional parameter to URL
     * and use it in tests like: Page\Edit::route('/123-post');
     */
    public $url             = '/2010/06/02/post-format-video-youtube/';
    public $content         = '#primary';
    public $sidebar         = '#secondary';
    public $youtubeiframe   = 'iframe[src="https://www.youtube.com/embed/SQEQr7c0-dw?feature=oembed"]';
    public $playbutton      = '.mejs-controls > .mejs-play > button';
    public $pausebutton     = '.mejs-controls > .mejs-pause > button';
    public $mutebutton      = '.mejs-controls > .mejs-mute > button';
    public $unmutebutton    = '.mejs-controls > .mejs-unmute > button';
    public static function route($param)
    {
        return static::$URL.$param;
    }

    /**
     * @var \AcceptanceTester;
     */
    protected $acceptanceTester;

    public function __construct(\AcceptanceTester $I)
    {
        $this->acceptanceTester = $I;
    }

}
