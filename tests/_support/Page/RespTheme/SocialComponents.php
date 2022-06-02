<?php
namespace Page\RespTheme;

class SocialComponents
{
    // include url of current page
    public static $URL = '';

    /**
     * General settings
     */
    public $social = '//button[contains(@class, "components-button") and text()="Social"]';
    public $socialSettingBtn = '//button[@aria-label="Setting settings for Social"]';
    public $removeSocialSettings = '//button[@aria-label="Remove Social"]';

    /**
     * Desktop settings
     */
    public $openSocialLinksInNewTabSelect       = '//li[@id="customize-control-responsive_header_social_link_new_tab"]//select';
    public $openSocialLinksInNewTab             = 'option[value="_blank"]';
    public $defaultOpenSocialLinksInNewTab      = 'option[value="_self"]';
    public $twitterInput                        = '//input[@id="_customize-input-res_header_twitter"]';
    public $facebookInput                       = '//input[@id="_customize-input-res_header_facebook"]';
    public $linkedInInput                       = '//input[@id="_customize-input-res_header_linkedin"]';
    public $youtubeInput                        = '//input[@id="_customize-input-res_header_youtube"]';
    public $rssFeedInput                        = '//input[@id="_customize-input-res_header_rss"]';
    public $instragramInput                     = '//input[@id="_customize-input-res_header_instagram"]';
    public $pinterestInput                      = '//input[@id="_customize-input-res_header_pinterest"]';
    public $stubleUponInput                     = '//input[@id="_customize-input-res_header_stumble"]';
    public $vimeoInput                          = '//input[@id="_customize-input-res_header_vimeo"]';
    public $yelpInput                           = '//input[@id="_customize-input-res_header_yelp"]';
    public $fourSquareInput                     = '//input[@id="_customize-input-res_header_foursquare"]';
    public $emailAddress                        = '//input[@id="_customize-input-email_header_uid"]';
    public $fSocialIcon                         = '//div[@class="_header-layouts social-icon"]';
    public $fTwitterLink                        = '//a[@title="twitter"]';
    public $fFacebookLink                       = '//a[@title="facebook"]';
    public $fLinkedInLink                       = '//a[@title="linkedin"]';
    public $fYoutubeLink                        = '//a[@title="youtube"]';
    public $fRssFeedLink                        = '//a[@title="rss"]';
    public $fInstagramLink                      = '//a[@title="instagram"]';
    public $fPinterestLink                      = '//a[@title="pinterest"]';
    public $fStubleUponLink                     = '//a[@title="stumbleupon"]';
    public $fVimeoLink                          = '//a[@title="vimeo"]';
    public $fYelpLink                           = '//a[@title="yelp"]';
    public $fFourSquareLink                     = '//a[@title="foursquare"]';
    public $fEmailLink                          = '//a[@title="email"]';

    /**
     * Tablet Mobile settings
     */
    public $openSocialLinksInNewTabMobileSelect     = '//li[@id="customize-control-responsive_mobile_social_link_new_tab"]//select';
    public $openSocialLinksInNewTabMobile           = 'option[value="_blank"]';
    public $mobileTwitterInput                      = '//input[@id="_customize-input-res_mobile_twitter"]';
    public $mobileFacebookInput                     = '//input[@id="_customize-input-res_mobile_facebook"]';
    public $mobileLinkedInInput                     = '//input[@id="_customize-input-res_mobile_linkedin"]';
    public $mobileYoutubeInput                      = '//input[@id="_customize-input-res_mobile_youtube"]';
    public $mobileInstragramInput                   = '//input[@id="_customize-input-res_mobile_instagram"]';
    public $mobilePinterestInput                    = '//input[@id="_customize-input-res_mobile_pinterest"]';
    public $mobileStubleUponInput                   = '//input[@id="_customize-input-res_mobile_stumble"]';
    public $mobileVimeoInput                        = '//input[@id="_customize-input-res_mobile_vimeo"]';
    public $mobileYelpInput                         = '//input[@id="_customize-input-res_mobile_yelp"]';
    public $mobileFourSquareInput                   = '//input[@id="_customize-input-res_mobile_foursquare"]';
    public $mobileEmailAddress                      = '//input[@id="_customize-input-email_mobile_uid"]';
    public $mobileSocialIcons                       = '//div[@class="_mobile-layouts social-icon"]';

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
