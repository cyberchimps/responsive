<?php
namespace Page\RespTheme;

class MainRowComponent
{
    // include url of current page
    public static $URL = '';

    /**
     *general settings
     */
    public $tablet = '//*[@id="customize-footer-actions"]/div/div/button[2]';
    public $mobile = '//*[@id="customize-footer-actions"]/div/div/button[3]';
    public $desktop = '//*[@id="customize-footer-actions"]/div/div/button[1]';
    public $mobrow ='//*[@id="mobile-header"]/div/div/div/div';
    public $deskrow = '//*[@id="main-header"]/div/div/div/div/div';
    public $tabrow = '//*[@id="main-header"]/div/div/div/div/div';
    public $mainRowButton = '//*[@id="accordion-section-responsive_customizer_header_main"]';
    public $desktopLayout = '//*[@id="customize-control-responsive_header_main_layout"]/select';
    public $tabletLayout  = '//*[@id="customize-control-responsive_header_tablet_main_layout"]/select';
    public $mobileLayout = '//*[@id="customize-control-responsive_header_mobile_main_layout"]/select';

    Public $minheightDesktop = '//*[@id="customize-control-responsive_main_row_min_height"]/label/div/input[2]';
    public $minheightTablet = '//*[@id="customize-control-responsive_main_row_min_height_tablet"]/label/div/input[2]';
    public $minheightMobile = '//*[@id="customize-control-responsive_main_row_min_height_mobile"]/label/div/input[2]';

    public $backgroundDesktop = '//*[@id="customize-control-responsive_main_row_background_desktop_color"]/label/div/div/button/span';
    public $colorDesktop = '//*[@id="customize-control-responsive_main_row_background_desktop_color"]/label/div/div/div/div[2]/div/div/div[3]/button';
    public $backgroundTablet = '//*[@id="customize-control-responsive_main_row_background_tablet_color"]/label/div/div/button/span';
    public $colorTablet = '//*[@id="customize-control-responsive_main_row_background_tablet_color"]/label/div/div/div/div[2]/div/div/div[6]/button';
    public $backgroundMobile = '//*[@id="customize-control-responsive_main_row_background_mobile_color"]/label/div/div/button/span';
    public $colorMobile = '//*[@id="customize-control-responsive_main_row_background_mobile_color"]/label/div/div/div/div[2]/div/div/div[7]/button';

    public $paddingSpan = '//*[@id="customize-control-responsive_main_row_padding"]/span/span';
    public $desktopPadding = '//*[@id="customize-control-responsive_main_row_padding"]/span/ul/li[1]/button/i';
    public $tabletPadding = '//*[@id="customize-control-responsive_main_row_padding"]/span/ul/li[2]/button/i';
    public $mobilePadding = '//*[@id="customize-control-responsive_main_row_padding"]/span/ul/li[3]/button/i';
    public $desktopPField = '//*[@id="customize-control-responsive_main_row_padding"]/ul[1]/li[1]/input';
    public $tabletPField = '//*[@id="customize-control-responsive_main_row_padding"]/ul[2]/li[1]/input';
    public $mobilePField = '//*[@id="customize-control-responsive_main_row_padding"]/ul[3]/li[1]/input';
    public $publishButton = '//*[@id="save"]';

    
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
