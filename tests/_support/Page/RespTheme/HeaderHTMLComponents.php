<?php
namespace Page\RespTheme;

class HeaderHTMLComponents
{
    // include url of current page
    public static $URL = '';

    //general
    public $customizeButton         =   '//*[@id="wp-admin-bar-customize"]/a';
    public $headerButton            =   '//*[@id="accordion-panel-responsive_header"]/h3';
    public $publishButton           =   '//*[@id="save"]';
    public $headerHtmlsection       =   '//*[@id="accordion-section-responsive_customizer_header_html"]/h3';

    //backend
    public $tabletButton            =   '//*[@id="customize-footer-actions"]/div/div/button[2]';
    public $mobileButton            =   '//*[@id="customize-footer-actions"]/div/div/button[3]';

    public $addMedia                =   '//*[@id="wp-responsive_header_html_content-wrap"]/div/div[1]/button';
    public $mediaLibrary            =   '//*[@id="menu-item-browse"]';
    public $imageThumbnail          =   '//*[@id="__attachments-view-170"]/li/div'; 
    public $altText                 =   '//*[@id="attachment-details-alt-text"]';
    public $insertIntoPost          =   '//*[@id="__wp-uploader-id-0"]/div[4]/div/div[2]/button';
    public $fillText                =   '//*[@id="tinymce"]/p[1]';
    public $iFrame                  =   '//*[@id="responsive_header_html_content_ifr"]';

    public $fontFamily              =   '//*[@id="customize-control-header_html_typography-font-family"]/label/select';
    public $fontWeight              =   '//*[@id="customize-control-header_html_typography-font-weight"]/label/select';
    public $fontStyle               =   '//*[@id="customize-control-header_html_typography-font-style"]/select';
    public $fontSize                =   '//*[@id="customize-control-header_html_typography-font-size"]/div[1]/input';
    public $fontSizeTablet          =   '//*[@id="customize-control-header_html_typography-font-size"]/div[2]/input';
    public $textTransform           =   '//*[@id="customize-control-header_html_typography-text-transform"]/select';
    public $lineHeight              =   '//*[@id="customize-control-header_html_typography-line-height"]/label/div/input[2]';
    public $letterSpacing           =   '//*[@id="customize-control-header_html_typography-letter-spacing"]/label/div/input[2]';
    

    //frontend
    public $image                   =   '//*[@id="main-header"]/div/div[1]/div/div[1]/div/div/div/div[1]/div[2]/div/div/p[1]/img';
    public $Text                    =   '//*[@id="main-header"]/div/div[1]/div/div[1]/div/div/div/div[1]/div[2]/div';
    

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
    public static function route($param)
    {
        return static::$URL.$param;
    }

    /**
     * @var \RespThemeTester;
     */
    protected $respThemeTester;

    public function __construct(\RespThemeTester $I)
    {
        $this->respThemeTester = $I;
    }

}
