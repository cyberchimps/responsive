<?php
namespace Page\RespTheme;

class SecondaryNavigationComp
{
    // include url of current page
    public static $URL = '';

    /** 
     * General settings
     */
    public $url = '//*[@id="wp-admin-bar-customize"]/a';
    public $header = '//*[@id="accordion-panel-responsive_header"]/h3';
    public $secondaryNavButton = '//*[@id="accordion-section-responsive_customizer_secondary_navigation"]/h3';
    public $desktop = '//*[@id="customize-footer-actions"]/div/div/button[1]';
    public $publishButton ='//*[@id="save"]';
    public $deskrow = '//*[@id="main-header"]/div/div/div/div/div';
    public $settings = '//*[@id="menu-item-166"]/a';
    public $moreinfo = '//*[@id="menu-item-433"]/a';
    public $editprofile = '//*[@id="menu-item-167"]/a';
    public $logout = '//*[@id="menu-item-168"]/a';
    public $sSettings = '//*[@id="menu-item-166"]/a';

    /**
     *secondary navigation style
     */
    public $strechSMenu = '//*[@id="responsive_stretch_secondary_navigation"]';
    public $secondaryNavStyle = '//*[@id="customize-control-responsive_secondary_navigation_style"]/select';
    
    /**
     * secondary navigation itemsettings
     */
    public $itemSpacing = '//*[@id="customize-control-responsive_secondary_navigation_item_spacing"]/label/div/input[2]';
    public $itemVerticalSpacing = '//*[@id="customize-control-responsive_secondary_navigation_item_top_bottom_spacing"]/label/div/input[2]';
    public $selectItemColor = '//*[@id="customize-control-responsive_secondary_navigation_color"]/label/div/div/button/span';
    public $itemColor = '//*[@id="customize-control-responsive_secondary_navigation_color"]/label/div/div/div/div[2]/div/div/div[1]/button';
    public $selectHoverItem = '//*[@id="customize-control-responsive_secondary_navigation_hover_color"]/label/div/div/button/span';
    public $hoverItemColor = '//*[@id="customize-control-responsive_secondary_navigation_hover_color"]/label/div/div/div/div[2]/div/div/div[8]/button';
    public $selectActiveItemColor = '//*[@id="customize-control-responsive_secondary_navigation_active_color"]/label/div/div/button/span';
    public $activeItemColor = '//*[@id="customize-control-responsive_secondary_navigation_active_color"]/label/div/div/div/div[2]/div/div/div[6]/button';
    public $selectBackgroundColor = '//*[@id="customize-control-responsive_secondary_background_color"]/label/div/div/button/span';
    public $backgroundColor = '//*[@id="customize-control-responsive_secondary_background_color"]/label/div/div/div/div[2]/div/div/div[5]/button';
    public $selectBgHoverColor = '//*[@id="customize-control-responsive_secondary_background_hover_color"]/label/div/div/button/span';
    public $bgHoverColor = '//*[@id="customize-control-responsive_secondary_background_hover_color"]/label/div/div/div/div[2]/div/div/div[7]/button';
    public $selectActiveBgColor = '//*[@id="customize-control-responsive_secondary_background_active_color"]/label/div/div/button/span';
    public $activeBgColor = '//*[@id="customize-control-responsive_secondary_background_active_color"]/label/div/div/div/div[2]/div/div/div[3]/button';

    /**
     * dropdown option settings for secondary navigation
     */
    public $dropdownReveal = '//*[@id="customize-control-responsive_secondary_dropdown_navigation_reveal"]/select'; 
    public $dropdownWidth = '//*[@id="customize-control-responsive_secondary_nav_dropdown_width"]/label/div/input[2]';
    public $dropdownVerticalSpacing = '//*[@id="customize-control-responsive_secondary_nav_dropdown_vertical_spacing"]/label/div/input[2]';
    public $dropdownDividerStyle = '//*[@id="customize-control-responsive_secondary_dropdown_navigation_divider_type"]/select';
    public $dDividerWidth = '//*[@id="customize-control-responsive_secondary_dropdown_navigation_divider_size"]/label/div/input[2]';
    public $selectDItemColor = '//*[@id="customize-control-responsive_secondary_dropdown_navigation_color"]/label/div/div/button/span';
    public $dItemColor = '//*[@id="customize-control-responsive_secondary_dropdown_navigation_color"]/label/div/div/div/div[2]/div/div/div[1]/button';
    public $selectDItemHover = '//*[@id="customize-control-responsive_secondary_dropdown_navigation_hover_color"]/label/div/div/button/span';
    public $ditemHoverColor = '//*[@id="customize-control-responsive_secondary_dropdown_navigation_hover_color"]/label/div/div/div/div[2]/div/div/div[4]/button';
    public $SelectDActiveItemColor = '//*[@id="customize-control-responsive_secondary_dropdown_navigation_active_color"]/label/div/div/button/span';
    public $dActiveItemColor = '//*[@id="customize-control-responsive_secondary_dropdown_navigation_active_color"]/label/div/div/div/div[2]/div/div/div[6]/button';
    public $selectDBgColor = '//*[@id="customize-control-responsive_secondary_dropdown_background_color"]/label/div/div/button/span';
    public $dBgColor = '//*[@id="customize-control-responsive_secondary_dropdown_background_color"]/label/div/div/div/div[2]/div/div/div[5]/button';
    public $selectDBgHoverColor = '//*[@id="customize-control-responsive_secondary_dropdown_background_hover_color"]/label/div/div/button/span';
    public $dBgHoverColor = '//*[@id="customize-control-responsive_secondary_dropdown_background_hover_color"]/label/div/div/div/div[2]/div/div/div[8]/button';
    public $SelectDActiveBgColor = '//*[@id="customize-control-responsive_secondary_dropdown_background_active_color"]/label/div/div/button/span';
    public $dActiveBgColor = '//*[@id="customize-control-responsive_secondary_dropdown_background_active_color"]/label/div/div/div/div[2]/div/div/div[3]/button';
    public $selectDDividerColor = '//*[@id="customize-control-responsive_secondary_dropdown_navigation_divider_color"]/label/div/div/button/span';
    public $dDividercolor = '//*[@id="customize-control-responsive_secondary_dropdown_navigation_divider_color"]/label/div/div/div/div[2]/div/div/div[7]/button';

    /**
     * typogarphy settings for secondary navigation
     */
    public $fontFamily = '//*[@id="customize-control-secondary_navigation_typography-font-family"]/label/select';
    public $fontWeight = '//*[@id="customize-control-secondary_navigation_typography-font-weight"]/label/select';
    public $fontStyle = '//*[@id="customize-control-secondary_navigation_typography-font-style"]/select';
    public $textTransform = '//*[@id="customize-control-secondary_navigation_typography-text-transform"]/select';
    public $fontSize = '//*[@id="customize-control-secondary_navigation_typography-font-size"]/div[1]/input';
    public $lineHeight = '//*[@id="customize-control-secondary_navigation_typography-line-height"]/label/div/input[2]';
    public $letterSpacing = '//*[@id="customize-control-secondary_navigation_typography-letter-spacing"]/label/div/input[2]';

    /**
     * dropdown typogarphy settings for secondary navigation:
     */
    public $dFontFamily = '//*[@id="customize-control-secondary_dropdown_navigation_typography-font-family"]/label/select';
    public $dFontWeight = '//*[@id="customize-control-secondary_dropdown_navigation_typography-font-weight"]/label/select';
    public $dFontStyle = '//*[@id="customize-control-secondary_dropdown_navigation_typography-font-style"]/select';
    public $dTextTransform = '//*[@id="customize-control-secondary_dropdown_navigation_typography-text-transform"]/select';
    public $dFontSize = '//*[@id="customize-control-secondary_dropdown_navigation_typography-font-size"]/div[1]/input';
    public $dLineHeight = '//*[@id="customize-control-secondary_dropdown_navigation_typography-line-height"]/label/div/input[2]';
    public $dLetterSpacing = '//*[@id="customize-control-secondary_dropdown_navigation_typography-letter-spacing"]/label/div/input[2]';

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
