<?php
namespace Page\Customizer;

class Samplepage
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

    
    public $url                             = '/sample-page';
    public $editPage                        = '#wp-admin-bar-edit > a';
    public $popUpCloseButton                = 'body > div:nth-child(10) > div > div > div > div > div > div > div > div.components-modal__header > button > svg';
    public $pageSidebarPosition             = '#responsive_page_meta_sidebar_position';
    public $pageLayoutStyle                 = '#responsive_page_meta_layout_style';
    public $pageContentWidth                = '#responsive_page_meta_content_width';
    public $publishButton                   = '#editor > div > div > div.components-navigate-regions > div > div.block-editor-editor-skeleton__header > div > div.edit-post-header__settings > button.components-button.editor-post-publish-button.editor-post-publish-button__button.is-primary';

    public static function route($param)
    {
        return static::$URL.$param;
    }

    /**
     * @var \CustomizerTester;
     */
    protected $customizerTester;

    public function __construct(\CustomizerTester $I)
    {
        $this->customizerTester = $I;
    }

}
