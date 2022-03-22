<?php
namespace Page\RespTheme;

class PrimaryNavigationComp
{
    // include url of current page
    public static $URL = '';

    /**
     *General settings
     */
    public $deskrow = '//*[@id="main-header"]/div/div/div/div/div';
    public $strechPMenu = '//*[@id="responsive_stretch_primary_navigation"]';
    public $primaryNavButton = '//*[@id="accordion-section-responsive_customizer_primary_navigation"]/h3';
    public $publishButton = '//*[@id="save"]';
    public $desktop = '//*[@id="customize-footer-actions"]/div/div/button[1]';
    public $tablet = '//*[@id="customize-footer-actions"]/div/div/button[2]';
    public $mobile = '//*[@id="customize-footer-actions"]/div/div/button[3]';
    public $mobrow ='//*[@id="mobile-header"]/div/div/div/div';
    public $samplepage = '//*[@id="menu-item-19"]/a';
    public $home = '//*[@id="menu-item-18"]/a';
    public $aboutUs = '//*[@id="menu-item-17"]/a';
    
    public $primaryNavigationStyle = '//*[@id="customize-control-responsive_primary_navigation_style"]/select';
    public $itemSpacing = '//*[@id="customize-control-responsive_primary_navigation_item_spacing"]/label/div/input[2]';
    public $itemVerticalSpacing = '//*[@id="customize-control-responsive_primary_navigation_item_top_bottom_spacing"]/label/div/input[2]';
    public $selectItemColor = '//*[@id="customize-control-responsive_primary_navigation_color"]/label/div/div/button/span';
    public $itemColor = '//*[@id="customize-control-responsive_primary_navigation_color"]/label/div/div/div/div[2]/div/div/div[4]/button';
    public $selectHoverItem = '//*[@id="customize-control-responsive_primary_navigation_hover_color"]/label/div/div/button/span';
    public $hoverItemColor = '//*[@id="customize-control-responsive_primary_navigation_hover_color"]/label/div/div/div/div[2]/div/div/div[8]/button';
    public $selectActiveItemColor = '//*[@id="customize-control-responsive_primary_navigation_active_color"]/label/div/div/button/span';
    public $activeItemColor = '//*[@id="customize-control-responsive_primary_navigation_active_color"]/label/div/div/div/div[2]/div/div/div[6]/button';
    public $selectBackgroundColor = '//*[@id="customize-control-responsive_primary_background_color"]/label/div/div/button/span';
    public $backgroundColor = '//*[@id="customize-control-responsive_primary_background_color"]/label/div/div/div/div[2]/div/div/div[7]/button';
    public $selectBgHoverColor = '//*[@id="customize-control-responsive_primary_background_hover_color"]/label/div/div/button/span';
    public $bgHoverColor = '//*[@id="customize-control-responsive_primary_background_hover_color"]/label/div/div/div/div[2]/div/div/div[1]/button';
    public $selectActiveBgColor = '//*[@id="customize-control-responsive_primary_background_active_color"]/label/div/div/button/span';
    public $activeBgColor = '//*[@id="customize-control-responsive_primary_background_active_color"]/label/div/div/div/div[2]/div/div/div[5]/button';

    public $dropdownReveal = '//*[@id="customize-control-responsive_primary_dropdown_navigation_reveal"]/select';
    public $dropdownWidth = '//*[@id="customize-control-responsive_primary_nav_dropdown_width"]/label/div/input[2]';
    public $dropdownVerticalSpacing = '//*[@id="customize-control-responsive_primary_nav_dropdown_vertical_spacing"]/label/div/input[2]';
    public $dropdownDividerStyle = '//*[@id="customize-control-responsive_primary_dropdown_navigation_divider_type"]/select';
    public $dDividerWidth = '//*[@id="customize-control-responsive_primary_dropdown_navigation_divider_size"]/label/div/input[2]';
    public $selectDItemColor = '//*[@id="customize-control-responsive_primary_dropdown_navigation_color"]/label/div/div/button/span';
    public $dItemColor = '//*[@id="customize-control-responsive_primary_dropdown_navigation_color"]/label/div/div/div/div[2]/div/div/div[3]/button';
    public $selectDItemHover = '//*[@id="customize-control-responsive_primary_dropdown_navigation_hover_color"]/label/div/div/button/span';
    public $ditemHoverColor = '//*[@id="customize-control-responsive_primary_dropdown_navigation_hover_color"]/label/div/div/div/div[2]/div/div/div[5]/button';
    public $SelectDActiveItemColor = '//*[@id="customize-control-responsive_primary_dropdown_navigation_active_color"]/label/div/div/button/span';
    public $dActiveItemColor = '//*[@id="customize-control-responsive_primary_dropdown_navigation_active_color"]/label/div/div/div/div[2]/div/div/div[8]/button';
    public $selectDBgColor = '//*[@id="customize-control-responsive_primary_dropdown_background_color"]/label/div/div/button/span';
    public $dBgColor = '//*[@id="customize-control-responsive_primary_dropdown_background_color"]/label/div/div/div/div[2]/div/div/div[5]/button';
    public $selectDActiveBgColor = '//*[@id="customize-control-responsive_primary_dropdown_background_active_color"]/label/div/div/button/span';
    public $DActiveBgColor = '//*[@id="customize-control-responsive_primary_dropdown_background_active_color"]/label/div/div/div/div[2]/div/div/div[6]/button';
    public $selectDDividerColor = '//*[@id="customize-control-responsive_primary_dropdown_navigation_divider_color"]/label/div/div/button/span';
    public $dDividercolor = '//*[@id="customize-control-responsive_primary_dropdown_navigation_divider_color"]/label/div/div/div/div[2]/div/div/div[4]/button';
    public $selectDBgHoverColor = '//*[@id="customize-control-responsive_primary_dropdown_background_hover_color"]/label/div/div/button/span';
    public $dBgHoverColor = '//*[@id="customize-control-responsive_primary_dropdown_background_hover_color"]/label/div/div/div/div[2]/div/div/div[2]/button';
    public $birds = '//*[@id="menu-item-20"]/a'; 

    //typography options

    public $fontFamily = '//*[@id="customize-control-primary_navigation_typography-font-family"]/label/select';
    public $fontWeight = '//*[@id="customize-control-primary_navigation_typography-font-weight"]/label/select';
    public $fontStyle = '//*[@id="customize-control-primary_navigation_typography-font-style"]/select';
    public $textTransform = '//*[@id="customize-control-primary_navigation_typography-text-transform"]/select';
    public $fontSize = '//*[@id="customize-control-primary_navigation_typography-font-size"]/div[1]/input';
    public $lineHeight = '//*[@id="customize-control-primary_navigation_typography-line-height"]/label/div/input[2]';
    public $letterSpacing = '//*[@id="customize-control-primary_navigation_typography-letter-spacing"]/label/div/input[2]';

    //dropdown typography options
    public $dFontFamily = '//*[@id="customize-control-primary_dropdown_navigation_typography-font-family"]/label/select';
    public $dFontWeight = '//*[@id="customize-control-primary_dropdown_navigation_typography-font-weight"]/label/select';
    public $dFontStyle = '//*[@id="customize-control-primary_dropdown_navigation_typography-font-style"]/select';
    public $dTextTransform = '//*[@id="customize-control-primary_dropdown_navigation_typography-text-transform"]/select';
    public $dFontSize = '//*[@id="customize-control-primary_dropdown_navigation_typography-font-size"]/div[2]/input';
    public $dLineHeight = '//*[@id="customize-control-primary_dropdown_navigation_typography-line-height"]/label/div/input[2]';
    public $dLetterSpacing = '//*[@id="customize-control-primary_dropdown_navigation_typography-letter-spacing"]/label/div/input[2]';

    public $sHome = '//*[@id="menu-item-18"]/a/span';
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
