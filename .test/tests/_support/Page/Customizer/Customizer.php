<?php
namespace Page\Customizer;

class Customizer
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
    public $url                                                 = '/wp-admin/customize.php';
    public $hideCustomizer                                      = '.collapse-sidebar-label';
    public $unHideCustomizer                                    = '.collapse-sidebar-arrow';
    public $publishButton                                       = 'input[value="Publish"]';
    public $publishedButton                                     = 'input[value="Published"]';
    
    
    public $customizer_header                                   = '#accordion-panel-responsive_header';
    //Header Layout
    public $customizer_header_layout                            = '#accordion-section-responsive_header_layout';
    public $customizer_header_layout_ul                         = '#customize-control-responsive_header_elements > label > ul';
    public $customizer_header_layout_sitebranding               = 'li[data-value="site-branding"]';
    public $customizer_header_layout_sitebranding_visibility    = 'li[data-value="site-branding"] > .visibility';
    public $customizer_header_layout_mainnavigation             = 'li[data-value="main-navigation"]';
    public $customizer_header_layout_mainnavigation_visibility  = 'li[data-value="main-navigation"] > .visibility';
    public $customizer_header_layout_dropdown                   = '#_customize-input-responsive_header_layout';
    public $customizer_header_alignement_dropdown               = '#_customize-input-responsive_header_alignment';
    public $customizer_header_layout_Inline_LogoAnd_Site_Title  ='#_customize-input-responsive_inline_logo_site_title';
    public $customizer_header_layout_Full_Width_Header          ='#_customize-input-responsive_header_full_width';

    public $site_branding_wrapper                               = '.site-branding-wrapper';

    public $header_padding_top                                  = '#customize-control-responsive_header_padding > ul.desktop.control-wrap.active > li.dimension-wrap.desktop_top > input';
    public $header_padding_right                                = '#customize-control-responsive_header_padding > ul.desktop.control-wrap.active > li.dimension-wrap.desktop_right > input';
    public $header_padding_bottom                               = '#customize-control-responsive_header_padding > ul.desktop.control-wrap.active > li.dimension-wrap.desktop_bottom > input';
    public $header_padding_left                                 = '#customize-control-responsive_header_padding > ul.desktop.control-wrap.active > li.dimension-wrap.desktop_left > input';
    //Header Colors
    public $customizer_header_colors                            = '#accordion-section-responsive_header_colors';
    
    public $customizer_header_colors_Background_Color           = '#customize-control-responsive_header_background_color > label > div:nth-child(3) > div > button';
    public $customizer_header_colors_Background_Color_Input     = '#customize-control-responsive_header_background_color > label > div:nth-child(3) > div > span > label > input';

    public $customizer_header_colors_Border_Color               = '#customize-control-responsive_header_border_color > label > div:nth-child(3) > div > button';
    public $customizer_header_colors_Border_Color_Input         = '#customize-control-responsive_header_border_color > label > div:nth-child(3) > div > span > label > input';
    
    public $customizer_header_colors_SiteTitle_Color            = '#customize-control-responsive_header_site_title_color > label > div:nth-child(3) > div > button';
    public $customizer_header_colors_SiteTitle_Color_Input      = '#customize-control-responsive_header_site_title_color > label > div:nth-child(3) > div > span > label > input';

    public $customizer_header_colors_SiteTagline_Color          = '#customize-control-responsive_header_text_color > label > div:nth-child(3) > div > button';
    public $customizer_header_colors_SiteTagline_Color_Input    = '#customize-control-responsive_header_text_color > label > div:nth-child(3) > div > span > label > input';
    //Header Typography
    public $customizer_header_typoraphy                             = '#accordion-section-responsive_header_typography';
    public $customizer_header_typography_SiteTitle_FontFamily       ='#customize-control-header_site_title_typography-font-family > label > select';
    public $customizer_header_typography_SiteTitle_FontWeight       ='#customize-control-header_site_title_typography-font-weight > select';
    public $customizer_header_typography_SiteTitle_FontStyle        ='#_customize-input-header_site_title_typography\[font-style\]';
    public $customizer_header_typography_SiteTitle_TextTransform    = '#_customize-input-header_site_title_typography\[text-transform\]';
    public $customizer_header_typography_SiteTitle_FontSize         = '#customize-control-header_site_title_typography-font-size > div.desktop.control-wrap.active > input[type=text]';
    public $customizer_header_typography_SiteTitle_LineHeight       = '#customize-control-header_site_title_typography-line-height > label > div.control-wrap > input[type=range]:nth-child(1)';
    public $customizer_header_typography_SiteTitle_LineHeight_Reset ='#customize-control-header_site_title_typography-line-height > label > div.control-wrap > span';
    public $customizer_header_typography_SiteTitle_LetterSpacing    = '#customize-control-header_site_title_typography-letter-spacing > label > div.control-wrap > input[type=range]:nth-child(1)';
    public $customizer_header_typography_SiteTitle_LetterSpacing_Reset='#customize-control-header_site_title_typography-letter-spacing > label > div.control-wrap > span';

    public $customizer_header_typography_SiteTagline_FontFamily     ='#customize-control-header_site_tagline_typography-font-family > label > select';
    public $customizer_header_typography_SiteTagline_FontWeight     ='#customize-control-header_site_tagline_typography-font-weight > select';
    public $customizer_header_typography_SiteTagline_FontStyle      ='#_customize-input-header_site_tagline_typography\[font-style\]';
    public $customizer_header_typography_SiteTagline_TextTransform  = '#_customize-input-header_site_tagline_typography\[text-transform\]';
    public $customizer_header_typography_SiteTagline_FontSize       = '#customize-control-header_site_tagline_typography-font-size > div.desktop.control-wrap.active > input[type=text]';
    public $customizer_header_typography_SiteTagline_LineHeight     = '#customize-control-header_site_tagline_typography-line-height > label > div.control-wrap > input[type=range]:nth-child(1)';
    public $customizer_header_typography_SiteTagline_LineHeight_Reset='#customize-control-header_site_tagline_typography-line-height > label > div.control-wrap > span';
    public $customizer_header_typography_SiteTagline_LetterSpacing  = '#customize-control-header_site_tagline_typography-letter-spacing > label > div.control-wrap > input[type=range]:nth-child(1)';
    public $customizer_header_typography_SiteTagline_LetterSpacing_Reset='#customize-control-header_site_tagline_typography-letter-spacing > label > div.control-wrap > span';

    //Header Menu
    public $customizer_headermenu                                   = '#accordion-panel-responsive_header_menu';
    
    public $customizer_headermenu_layout                            = '#accordion-section-responsive_header_menu_layout';
    public $customizer_headermenu_layout_EnableDisableMobileMenuLabel= '#customize-control-responsive_disable_mobile_menu > span > label';
    public $customizer_headermenu_layout_MobileMenuBreakpoint       = '#customize-control-responsive_mobile_menu_breakpoint > label > div.control-wrap > input[type=range]:nth-child(1)';
    public $customizer_headermenu_layout_MobileMenuStyle            = '#_customize-input-responsive_mobile_menu_style';
    
    
    

    public $customizer_headermenu_colors                            = '#accordion-section-responsive_header_menu_colors';
    public $customizer_headermenu_colors_LinkColor                  = '#customize-control-responsive_header_menu_link_color > label > div:nth-child(3) > div > button';
    public $customizer_headermenu_colors_LinkColor_Input            = '#customize-control-responsive_header_menu_link_color > label > div:nth-child(3) > div > span > label > input';
    
    public $customizer_headermenu_colors_LinkHoverColor             = '#customize-control-responsive_header_menu_link_hover_color > label > div:nth-child(3) > div > button';
    public $customizer_headermenu_colors_LinkHoverColor_Input        = '#customize-control-responsive_header_menu_link_hover_color > label > div:nth-child(3) > div > span > label > input';

    public $customizer_headermenu_colors_subMenuBackgroundColor     = '#customize-control-responsive_header_sub_menu_background_color > label > div:nth-child(3) > div > button';
    public $customizer_headermenu_colors_subMenuBackgroundColor_Input= '#customize-control-responsive_header_sub_menu_background_color > label > div:nth-child(3) > div > span > label > input';

    public $customizer_headermenu_colors_subMenuLinkColor            = '#customize-control-responsive_header_sub_menu_link_color > label > div:nth-child(3) > div > button';
    public $customizer_headermenu_colors_subMenuLinkColor_Input            = '#customize-control-responsive_header_sub_menu_link_color > label > div:nth-child(3) > div > span > label > input';

    public $customizer_headermenu_colors_MenuToggleBackgroundColor            = '#customize-control-responsive_header_menu_toggle_background_color > label > div:nth-child(3) > div > button';
    public $customizer_headermenu_colors_MenuToggleBackgroundColor_Input            = '#customize-control-responsive_header_menu_toggle_background_color > label > div:nth-child(3) > div > span > label > input';

    public $customizer_headermenu_colors_MenuToggleColor            = '#customize-control-responsive_header_menu_toggle_color > label > div:nth-child(3) > div > button';
    public $customizer_headermenu_colors_MenuToggleColor_Input            = '#customize-control-responsive_header_menu_toggle_color > label > div:nth-child(3) > div > span > label > input';

    public $customizer_headermenu_typography                        = '#accordion-section-responsive_typography_header_menu';
    public $customizer_headermenu_typography_FontFamily   ='#customize-control-header_menu_typography-font-family > label > select';
    public $customizer_headermenu_typography_FontWeight   ='#_customize-input-header_menu_typography\[font-weight\]';
    public $customizer_headermenu_typography_FontStyle    ='#_customize-input-header_menu_typography\[font-style\]';
    public $customizer_headermenu_typography_TextTransform= '#_customize-input-header_menu_typography\[text-transform\]';
    public $customizer_headermenu_typography_FontSize     = '#customize-control-header_menu_typography-font-size > div.desktop.control-wrap.active > input[type=text]';
    public $customizer_headermenu_typography_LineHeight   = '#customize-control-header_menu_typography-line-height > label > div.control-wrap > input[type=range]:nth-child(1)';
    public $customizer_headermenu_typography_LetterSpacing= '#customize-control-header_menu_typography-letter-spacing > label > div.control-wrap > input[type=range]:nth-child(1)';



    //Footer Layout
    public $customizer_footer                                   = '#accordion-panel-responsive_footer';
    public $customizer_footer_layout                            = '#accordion-section-responsive_footer_layout';
    public $customizer_footer_layout_numberofcolumns            = '#customize-control-responsive_footer_widgets_columns';
    public $customizer_footer_layout_padding                    = '#customize-control-responsive_footer_widgets_padding';
    
    public $customizer_footer_layout_numberofcolumnsinput       = '#customize-control-responsive_footer_widgets_columns > label > div.control-wrap > input.responsive-range-input';



    //Global Settings
    public $customizer_globalSettings                          = '#accordion-panel-responsive_site';
    //Theme Options Layout
    public $customizer_globalSettings_layout                     = '#accordion-section-responsive_layout';
    public $customizer_globalSettings_layout_width               = '#_customize-input-responsive_width';
    public $customizer_globalSettings_layout_containerWidth      = '#customize-control-responsive_container_width';
    public $customizer_globalSettings_layout_style               = '#_customize-input-responsive_style';
    public $customizer_globalSettings_layout_boxPadding          = '
    #customize-control-responsive_box_padding';
    public $customizer_globalSettings_layout_boxRadius           = '
    #customize-control-responsive_box_radius';
    public $customizer_globalSettings_layout_boxRadiusinput      = '#_customize-input-responsive_box_radius';
    public $customizer_globalSettings_layout_boxPaddingTop       = '#customize-control-responsive_box_padding > ul.desktop.control-wrap.active > li.dimension-wrap.desktop_top > input';
    public $customizer_globalSettings_layout_boxPaddingRight       = '#customize-control-responsive_box_padding > ul.desktop.control-wrap.active > li.dimension-wrap.desktop_right > input';
    public $customizer_globalSettings_layout_boxPaddingBottom       = '#customize-control-responsive_box_padding > ul.desktop.control-wrap.active > li.dimension-wrap.desktop_bottom > input';
    public $customizer_globalSettings_layout_boxPaddingLeft       = '#customize-control-responsive_box_padding > ul.desktop.control-wrap.active > li.dimension-wrap.desktop_left > input';

    public $customizer_globalSettings_buttons                     = '#accordion-section-responsive_button';
    
    
    public $customizer_globalSettings_buttonsPadding           = '#customize-control-responsive_buttons_padding';
    public $customizer_globalSettings_buttonsPaddingTop        = 'input[data-customize-setting-link="responsive_buttons_top_padding"]';
    public $customizer_globalSettings_buttonsPaddingRight      = 'input[data-customize-setting-link="responsive_buttons_right_padding"]';
    public $customizer_globalSettings_buttonsPaddingBottom     = 'input[data-customize-setting-link="responsive_buttons_bottom_padding"]';
    public $customizer_globalSettings_buttonsPaddingLeft       = 'input[data-customize-setting-link="responsive_buttons_left_padding"]';

    public $customizer_globalSettings_buttonsRadius            = '#_customize-input-responsive_buttons_radius';
    public $customizer_globalSettings_buttonsWidth             = '#_customize-input-responsive_buttons_border_width';
    public $customizer_globalSettings_buttonsFontFamily        = 'select[data-name="button_typography[font-family]"]';
    public $customizer_globalSettings_buttonsFontWeight        = 'select[data-name="button_typography[font-weight]"]';
    public $customizer_globalSettings_buttonsFontStyle         = '#_customize-input-button_typography[font-style]';
    public $customizer_globalSettings_buttonsTextTransform     = '#_customize-input-button_typography[text-transform]';
    public $customizer_globalSettings_buttonsFontSize          = 'input[data-customize-setting-link="button_typography[font-size]"]';
    //public $customizer_globalSettings_buttonsLineHeight        = 'input[data-customize-setting-link="button_typography[line-height]"]';
    public $customizer_globalSettings_buttonsLineHeight        = 'li#customize-control-button_typography-line-height > label > div > input.responsive-range-input';
    public $customizer_globalSettings_buttonsLineHeightReset    = '#customize-control-button_typography-line-height > label > div.control-wrap > span > span';
    //public $customizer_globalSettings_buttonsLetterSpacing     = 'input[data-customize-setting-link="button_typography[letter-spacing]"]';
    public $customizer_globalSettings_buttonsLetterSpacing     = '#customize-control-button_typography-letter-spacing > label > div > input.responsive-range-input';
    public $customizer_globalSettings_buttonsLetterSpacingReset = '#customize-control-button_typography-letter-spacing > label > div.control-wrap > span > span';
    
    
    public $customizer_globalSettings_formFields                = '#accordion-section-responsive_form_fields';
    public $customizer_globalSettings_formFieldsPaddingTop      = '#customize-control-responsive_inputs_padding > ul.desktop.control-wrap.active > li.dimension-wrap.desktop_top > input';
    public $customizer_globalSettings_formFieldsPaddingRight    = '#customize-control-responsive_inputs_padding > ul.desktop.control-wrap.active > li.dimension-wrap.desktop_right > input';
    public $customizer_globalSettings_formFieldsPaddingBottom   = '#customize-control-responsive_inputs_padding > ul.desktop.control-wrap.active > li.dimension-wrap.desktop_bottom > input';
    public $customizer_globalSettings_formFieldsPaddingLeft     = '#customize-control-responsive_inputs_padding > ul.desktop.control-wrap.active > li.dimension-wrap.desktop_left > input';
    public $customizer_globalSettings_formFieldsRadius          = '#_customize-input-responsive_inputs_radius';
    public $customizer_globalSettings_formFieldsBorderWidth     = '#_customize-input-responsive_inputs_border_width';
    public $customizer_globalSettings_formFieldsFontFamily      = 'select[data-name="input_typography[font-family]"]';
    public $customizer_globalSettings_formFieldsFontWeight        = 'select[data-name="input_typography[font-weight]"]';
    public $customizer_globalSettings_formFieldsFontStyle         = '#_customize-input-input_typography[font-style]';
    public $customizer_globalSettings_formFieldsTextTransform     = '#_customize-input-input_typography[text-transform]';
    public $customizer_globalSettings_formFieldsFontSize          = 'input[data-customize-setting-link="input_typography[font-size]"]';
    //public $customizer_globalSettings_formFieldsLineHeight        = 'input[data-customize-setting-link="button_typography[line-height]"]';
    public $customizer_globalSettings_formFieldsLineHeight        = '#customize-control-input_typography-line-height > label > div.control-wrap > input.responsive-range-input';
    public $customizer_globalSettings_formFieldsLineHeightReset    = '#customize-control-input_typography-line-height > label > div.control-wrap > span > span';
    //public $customizer_globalSettings_formFieldsLetterSpacing     = 'input[data-customize-setting-link="button_typography[letter-spacing]"]';
    public $customizer_globalSettings_formFieldsLetterSpacing     = '#customize-control-input_typography-letter-spacing > label > div.control-wrap > input.responsive-range-input';
    public $customizer_globalSettings_formFieldsLetterSpacingReset = '#customize-control-input_typography-letter-spacing > label > div.control-wrap > span > span';


    public $customizer_globalSettings_colorPalettesScheme           = '#accordion-section-responsive_color_palettes_scheme';
    public $customizer_globalSettings_colorPalettesSchemeDefault    = 'label[for="responsive_color_scheme_control-playful-default"]';
    public $customizer_globalSettings_colorPalettesSchemeFrolic    = 'label[for="responsive_color_scheme_control-playful-one"]';




    






    //Theme Options Colors
    public $customizer_themeOptions_colors                     = '#accordion-section-responsive_colors';
    //public $customizer_themeOptions_colors_BackgroundColor       = '#customize-control-responsive_background_color > label > div:nth-child(3) > div > button';
    public $customizer_themeOptions_colors_BackgroundColor       = '#customize-control-background_color > div.customize-control-content > div > button';
    public $customizer_themeOptions_colors_BackgroundColor_Input = '#customize-control-background_color > div.customize-control-content > div > span > label > input';
    public $customizer_themeOptions_colors_BoxBackgroundColor       = '#customize-control-responsive_box_background_color > label > div:nth-child(3) > div > button';
    public $customizer_themeOptions_colors_BoxBackgroundColor_Input = '#customize-control-responsive_box_background_color > label > div:nth-child(3) > div > span > label > input';
    public $customizer_themeOptions_colors_AlternateBackgroundColor = '#customize-control-responsive_alt_background_color > label > div:nth-child(3) > div > button';
    public $customizer_themeOptions_colors_AlternateBackgroundColor_Input = '#customize-control-responsive_alt_background_color > label > div:nth-child(3) > div > span > label > input';
    public $customizer_themeOptions_colors_BodyTextColor         = '#customize-control-responsive_body_text_color > label > div:nth-child(3) > div > button';
    public $customizer_themeOptions_colors_BodyTextColor_Input   = '#customize-control-responsive_body_text_color > label > div:nth-child(3) > div > span > label > input';
    public $customizer_themeOptions_colors_H1Color               = '#customize-control-responsive_h1_text_color > label > div:nth-child(3) > div > button';
    public $customizer_themeOptions_colors_H1Color_Input         = '#customize-control-responsive_h1_text_color > label > div:nth-child(3) > div > span > label > input';
    public $customizer_themeOptions_colors_H2Color               = '#customize-control-responsive_h2_text_color > label > div:nth-child(3) > div > button';
    public $customizer_themeOptions_colors_H2Color_Input         = '#customize-control-responsive_h2_text_color > label > div:nth-child(3) > div > span > label > input';
    public $customizer_themeOptions_colors_H3Color               = '#customize-control-responsive_h3_text_color > label > div:nth-child(3) > div > button';
    public $customizer_themeOptions_colors_H3Color_Input         = '#customize-control-responsive_h3_text_color > label > div:nth-child(3) > div > span > label > input';
    public $customizer_themeOptions_colors_H4Color               = '#customize-control-responsive_h4_text_color > label > div:nth-child(3) > div > button';
    public $customizer_themeOptions_colors_H4Color_Input         = '#customize-control-responsive_h4_text_color > label > div:nth-child(3) > div > span > label > input';
    public $customizer_themeOptions_colors_H5Color               = '#customize-control-responsive_h5_text_color > label > div:nth-child(3) > div > button';
    public $customizer_themeOptions_colors_H5Color_Input         = '#customize-control-responsive_h5_text_color > label > div:nth-child(3) > div > span > label > input';
    public $customizer_themeOptions_colors_H6Color               = '#customize-control-responsive_h6_text_color > label > div:nth-child(3) > div > button';
    public $customizer_themeOptions_colors_H6Color_Input         = '#customize-control-responsive_h6_text_color > label > div:nth-child(3) > div > span > label > input';

    public $customizer_themeOptions_colors_MetaTextColor         = '#customize-control-responsive_meta_text_color > label > div:nth-child(3) > div > button';
    public $customizer_themeOptions_colors_MetaTextColor_Input   = '#customize-control-responsive_meta_text_color > label > div:nth-child(3) > div > span > label > input';

    public $customizer_themeOptions_colors_LinkColor             = '#customize-control-responsive_link_color > label > div:nth-child(3) > div > button';
    public $customizer_themeOptions_colors_LinkColor_Input       = '#customize-control-responsive_link_color > label > div:nth-child(3) > div > span > label > input';

    public $customizer_themeOptions_colors_ButtonColor           = '#customize-control-responsive_button_color > label > div:nth-child(3) > div > button';
    public $customizer_themeOptions_colors_ButtonColor_Input     = '#customize-control-responsive_button_color > label > div:nth-child(3) > div > span > label > input';
    public $customizer_themeOptions_colors_ButtonTextColor       = '#customize-control-responsive_button_text_color > label > div:nth-child(3) > div > button';
    public $customizer_themeOptions_colors_ButtonTextColor_Input = '#customize-control-responsive_button_text_color > label > div:nth-child(3) > div > span > label > input';
    public $customizer_themeOptions_colors_ButtonBorderColor     = '#customize-control-responsive_button_border_color > label > div:nth-child(3) > div > button';
    public $customizer_themeOptions_colors_ButtonBorderColor_Input= '#customize-control-responsive_button_border_color > label > div:nth-child(3) > div > span > label > input';

    public $customizer_themeOptions_colors_InputsColor           = '#customize-control-responsive_inputs_background_color > label > div:nth-child(3) > div > button';
    public $customizer_themeOptions_colors_InputsColor_Input     = '#customize-control-responsive_inputs_background_color > label > div:nth-child(3) > div > span > label > input';
    public $customizer_themeOptions_colors_InputsTextColor       = '#customize-control-responsive_inputs_text_color > label > div:nth-child(3) > div > button';
    public $customizer_themeOptions_colors_InputsTextColor_Input = '#customize-control-responsive_inputs_text_color > label > div:nth-child(3) > div > span > label > input';
    public $customizer_themeOptions_colors_InputsBorderColor     = '#customize-control-responsive_inputs_border_color > label > div:nth-child(3) > div > button';
    public $customizer_themeOptions_colors_InputsBorderColor_Input= '#customize-control-responsive_inputs_border_color > label > div:nth-child(3) > div > span > label > input';






    
    


    
    
    


    
    


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
