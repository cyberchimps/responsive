<?php
class _customizedHomePage
{
    const URL='/wp-admin/customize.php';
    static $HomepageTab='#accordion-section-static_front_page > h3';

    //sort code
    static $SlidedeckshortcodeText='Slidedeck shortcode';
    static $SlidedeckshortcodeField='#_customize-input-home_slider';
    static $sortcodeName='slisd=34577';

    //Headline
    static $headlineText='Headline';
    static $headlineFieldSelector='#_customize-input-res_home_headline';
    static $headlinName='headlineText';

    //Subheadline
    static $SubheadlineText='Subheadline';
    static $SubheadlineFieldSelector='#_customize-input-res_home_subheadline';
    static $SubheadlinName='SubheadlineText';

    //Content Area
    static $ContentAreaText='Content Area';
    static $ContentAreaFieldSelector='#_customize-input-res_home_content_area';
    static $ContentAreaName='Your title, subtitle and this very content is editable from Theme Option.';

    //Call to Action (URL)
    static $CallToActionURLText='Call to Action (URL)';
    static $CallToActionURLFieldSelector='#_customize-input-res_cta_url';
    static $CallToActionURLName='#logo';

    //Call to Action (Text)
    static $CallToActionText='Call to Action (Text)';
    static $CallToActionTextFieldSelector='#_customize-input-res_cta_text';
    static $CallToActionTextName='Call to Action';

    //Call to Action Button Style
    static $CallToActionButtonText='Call to Action Button Style';
    static $CallToActionButtonFieldSelector='#_customize-input-static_page_layout_default';
    static $CallToActionButonValue1='Gradient';
    static $CallToActionButonValue2='Flat';

    //Featured Content
    static $FeaturedContentText='Featured Content';
    static $FeaturedContentFieldSelector='#_customize-input-res_featured_content';
    static $FeaturedContentName='feature=2435';

    //About Title

    static $AboutTitleText='About Title';
    static $AboutTitleFieldSelector='#_customize-input-about_title';
    static $AboutTitleName='About Box Title';

    //About Text

    static $AboutText='About Text';
    static $AboutTextFieldSelector='#_customize-input-about_text';
    static $AboutTextName='About Box Text';

    //Call to Action (URL) second time
    static $CallToActionURLText1='Call to Action (URL)';
    static $CallToActionURLFieldSelector1='#_customize-input-about_cta_url';
    static $CallToActionURLName1='#logo1';

    //Call to Action (Text) second time
    static $CallToActionText1='Call to Action (Text)';
    static $CallToActionTextFieldSelector1='#_customize-input-about_cta_text';
    static $CallToActionTextName1='Call to Action';

    // Enable Feature Section radio
    static $EnableFeatureCheckbox='Enable Feature Section';

    //Feature Title text
    static $FeatureTitleText='Feature Title';
    static $FeatureTitleFieldSelector='#_customize-input-feature_title';
    static $FeatureTitleName='feature Title';

    // select post feature

    static $PostFeature1='Select post for feature 1';
    static $PostFeature2='Select post for feature 2';
    static $PostFeature3='Select post for feature 3';

    // Enable Testimonial Section
     static $TestimonialSection='Enable Testimonial Section';
     static $TestimonialTitleText='Testimonial Title';
     static $TestimonialTitleFieldSelector='#_customize-input-testimonial_title';
     static $TestimonialTitleName='Testimonial Title name';


     //Enable Team Section
     static $EnableTeamSectionCheckbox='Enable Team Section';
     static $TeamMember1='Select post for team member1';
     static $TeamMember2='Select post for team member2';
     static $TeamMember3='Select post for team member3';
     static $teamTitleText='Team Title';
     static $TeamTitleFieldselector='#_customize-input-team_title';

     static $teamTitleName='Team Title name';


     //Click to disable home page widgets

     static $DisableHomePageWidgetCheckbox='Click to disable home page widgets';

     //  Enable Contact Section
static $EnableContactSectionCheckbox='Contact section Title';
static $ContactsectionTitleText='Contact section Title';
static $ContactsectionTitleFieldSelector='#_customize-input-contact_title';
static $ContactsectionTitleName='Contact Us Title Name';

static $ContactsectionSUBTitleText='Contact section Subtitle';
static $ContactsectionSUBTitleFieldSelector='#_customize-input-contact_subtitle';
static $ContactsectionSUBTitleName='Contact Us  Sub Title Name';

static $AddressText='Address';
static $AddressFieldSelector='#_customize-input-contact_add';
static $AddressFieldName='Address Field';

static $EmailText='Email';
static $EmailFieldSelector='#_customize-input-contact_email';
static $EmailFieldName='Email field';

static $PhoneText='Phone no';
static $PhoneFieldSelector='#_customize-input-contact_ph';
static $PhoneFieldName='Phone field';

// contact form sort code
static $ContactformshortcodeText='Contact form shortcode';
static $ContactSortcodeFieldselector='#_customize-input-contact_content';
static $ContactSortcodeName='formid=234';

//publish button

static $PublishButton='#save';


}
?>
