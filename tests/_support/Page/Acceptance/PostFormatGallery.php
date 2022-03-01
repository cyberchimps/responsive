<?php
namespace Page\Acceptance;

class PostFormatGallery
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
    public $url             = '/2010/09/10/post-format-gallery/';
    public $image1          = '#gallery-1 > figure:nth-child(1) > div > a > img';
    public $image2          = '#gallery-1 > figure:nth-child(2) > div > a > img';
    public $image3          = '#gallery-1 > figure:nth-child(3) > div > a > img';
    public $image4          = '#gallery-1 > figure:nth-child(4) > div > a > img';
    public $image5          = '#gallery-1 > figure:nth-child(5) > div > a > img';
    public $image6          = '#gallery-1 > figure:nth-child(6) > div > a > img';
    public $image7          = '#gallery-1 > figure:nth-child(7) > div > a > img';
    public $image8          = '#gallery-1 > figure:nth-child(8) > div > a > img';
    public $image9          = '#gallery-1 > figure:nth-child(9) > div > a > img';
    
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
