<?php
namespace Page\RespTheme;

class PrimaryNavigationComponents
{
    // include url of current page
    public static $URL = '';

    /**
     * General Settings
     */
    public $navigation = '//button[contains(@class, "components-button") and text()="Primary Navigation"]';
    public $navigationSettingBtn = '//button[@aria-label="Setting settings for Primary Navigation"]';
    public $removeNavigationSettingBtn = '//button[@aria-label="Remove Primary Navigation"]';

    /**
     * Desktop Settings
     */
    public $stretchPrimaryMenu = '//input[@id="responsive_stretch_primary_navigation"]';
    public $fillCenterMenuItem = '//input[@id="responsive_primary_navigation_fill_stretch"]';
    public $navigationStyleSelect = '//li[@id="customize-control-responsive_primary_navigation_style"]//select';
    public $desktopNavigation = 'option[value="underline"]';
    public $defaultNavigation = 'option[value="standard"]';
    public $itemSpacingSlider = '//input[@data-customize-setting-link="responsive_primary_navigation_item_spacing"][1]';
    public $itemSpacingInput = '//input[@data-customize-setting-link="responsive_primary_navigation_item_spacing"][2]';
    public $resetItemSpacingInput = '(//span[@title="Back to default"])[1]';
    public $itemVerticalSpacingSlider = '//input[@data-customize-setting-link="responsive_primary_navigation_item_top_bottom_spacing"][1]';
    public $itemVerticalSpacingInput = '//input[@data-customize-setting-link="responsive_primary_navigation_item_top_bottom_spacing"][2]';
    public $resetItemVerticalSpacing = '(//span[@title="Back to default"])[2]';
    public $itemColorBtn = '//li[@id="customize-control-responsive_primary_navigation_color"]//button';
    public $colorInput = '//input[@class="components-text-control__input"]';
    public $itemHoverColorBtn = '//li[@id="customize-control-responsive_primary_navigation_hover_color"]//button';
    public $itemActiveColorBtn = '//li[@id="customize-control-responsive_primary_navigation_active_color"]//button';
    public $backgroundColorBtn = '//li[@id="customize-control-responsive_primary_background_color"]//button';
    public $backgroundHoverColorBtn = '//li[@id="customize-control-responsive_primary_background_hover_color"]//button';
    public $backgroundActiveColorBtn = '//li[@id="customize-control-responsive_primary_background_active_color"]//button';
    public $defaultColorBtn = '//button[text()="Default"]';
    public $currentMenuItem = '((//li[contains(@class, "current-menu-item")])[1]//a)[1]';
    public $otherMenuItem = '((//ul[@id="primary-menu"]//li)[3]//a)[1]';
    public $fStretchedNavigation = 'div.header-navigation-layout-stretch-true';

    public $dropdownRevealSelect = '//li[@id="customize-control-responsive_primary_dropdown_navigation_reveal"]//select';
    public $defaultDropdownReveal = 'option[value="none"]';
    public $desktopDropdownReveal = 'option[value="fade-down"]';
    public $dropdownWidthSlider = '//input[@data-customize-setting-link="responsive_primary_nav_dropdown_width"][1]';
    public $dropdownWidthInput = '//input[@data-customize-setting-link="responsive_primary_nav_dropdown_width"][2]';
    public $dropdownVerticalSpacingSlider = '//input[@data-customize-setting-link="responsive_primary_nav_dropdown_vertical_spacing"][1]';
    public $dropdownVerticalSpacingInput = '//input[@data-customize-setting-link="responsive_primary_nav_dropdown_vertical_spacing"][2]';
    public $dropdownItemDividerItemStyleSelect = '//li[@id="customize-control-responsive_primary_dropdown_navigation_divider_type"]//select';
    public $defaultDropdownItemDividerItemStyle = 'option[value="solid"]';
    public $desktopDropdownItemDividerItemStyle = 'option[value="dotted"]';
    public $dropdownDividerWidthSlider = '//input[@data-customize-setting-link="responsive_primary_dropdown_navigation_divider_size"][1]';
    public $dropdownDividerWidthInput = '//input[@data-customize-setting-link="responsive_primary_dropdown_navigation_divider_size"][2]';
    public $dropdownItemColorBtn = '(//button[@class="components-button button wp-color-result "])[7]';
    public $dropdownItemHoverColorBtn = '(//button[@class="components-button button wp-color-result "])[8]';
    public $dropdownActiveItemColorBtn = '(//button[@class="components-button button wp-color-result "])[9]';
    public $dropdownBackgroundColorBtn = '(//button[@class="components-button button wp-color-result "])[10]';
    public $dropdownBackgroundHoverColorBtn = '(//button[@class="components-button button wp-color-result "])[11]';
    public $dropdownActiveBackgroundColorBtn = '(//button[@class="components-button button wp-color-result "])[12]';
    public $dropdownDeviderColorBtn = '(//button[@class="components-button button wp-color-result "])[13]';
  
    public $typoFontFamilySelect = '(//select[@class="responsive-typography-select responsive-font-family-select"])[1]';
    public $defaultFontFamily = 'option[value=""]';
    public $typoFontWeightSelect = '//select[@data-customize-setting-link="primary_navigation_typography[font-weight]"]';
    public $defaultFontWeight = 'option[value="inherit"]';
    public $typoFontStyleSelect = '//li[@id="customize-control-primary_navigation_typography-font-style"]//select';
    public $defaultFontStyle = 'option[value="normal"]';
    public $typoTextTranformSelect = '//li[@id="customize-control-primary_navigation_typography-text-transform"]//select';
    public $deafultTextTransform = 'option[value=""]';
    public $typoFontSizeSelect = '//input[@data-customize-setting-link="primary_navigation_typography[font-size]"]';
    public $typoLineHeightSlider = '//input[@data-customize-setting-link="primary_navigation_typography[line-height]"][1]';
    public $typoLineHeightInput = '//input[@data-customize-setting-link="primary_navigation_typography[line-height]"][2]';
    public $typoLetterSpacingSlider = '//input[@data-customize-setting-link="primary_navigation_typography[letter-spacing]"][1]';
    public $typoLetterSpacingInput = '//input[@data-customize-setting-link="primary_navigation_typography[letter-spacing]"][2]';
 
    public $dropDownFontFamilySelect = '(//select[@class="responsive-typography-select responsive-font-family-select"])[2]';
    public $dropDownFontFamily = 'option[value="Times New Roman"]';
    public $dropDownFontWeightSelect = '//select[@data-customize-setting-link="primary_dropdown_navigation_typography[font-weight]"]';
    public $dropDownFontStyleSelect = '//li[@id="customize-control-primary_dropdown_navigation_typography-font-style"]//select';
    public $dropDownTextTransformSelect = '//li[@id="customize-control-primary_dropdown_navigation_typography-text-transform"]//select';
    public $dropDownFontSizeInput = '//input[@data-customize-setting-link="primary_dropdown_navigation_typography[font-size]"]';
    public $dropDownLineHeightSlider = '//input[@data-customize-setting-link="primary_dropdown_navigation_typography[line-height]"][1]';
    public $dropDownLineHeightInput = '//input[@data-customize-setting-link="primary_dropdown_navigation_typography[line-height]"][1]';
    public $dropDownLetterSpacingSlider = '//input[@data-customize-setting-link="primary_dropdown_navigation_typography[letter-spacing]"][1]';
    public $dropDownLetterSpacingInput = '//input[@data-customize-setting-link="primary_dropdown_navigation_typography[letter-spacing]"][2]';
    public $fDefaultMenu = '//nav[@id="site-navigation"]';

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
