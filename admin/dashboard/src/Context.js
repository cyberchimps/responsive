import { createContext, useState } from "react";
import { displayToast, convertTruthyFalsyValue } from './Helper';

export const ResponsiveContext = createContext();

export const ResponsiveProvider = ({ children }) => {

    const [formData, setFormData] = useState({
        authorName: localize.whiteLabelSettings.plugin_author ?? '',
        websiteURL: localize.whiteLabelSettings.plugin_website_uri ?? '',
        themeName: localize.whiteLabelSettings.theme_name ?? '',
        themeDesc: localize.whiteLabelSettings.theme_desc ?? '',
        themeScreenshotURL: localize.whiteLabelSettings.theme_screenshot_url ?? '',
        themeIconURL: localize.whiteLabelSettings.theme_icon_url ?? '',
        hideSettings: convertTruthyFalsyValue(localize.whiteLabelSettings.hide_wl_settings) ?? false,
    });

    const [isMegamenuEnabled, setIsMegamenuEnabled] = useState(localize?.isMegamenuEnabled === 'on' ? true : false);
    const [isWooCommerceEnabled, setIsWooCommerceEnabled] = useState(localize?.isWooCommerceEnabled === 'on' ? true : false);
    const [isCustomFontsEnabled, setIsCustomFontsEnabled] = useState(localize?.isCustomFontsEnabled === 'on' ? true : false);
    const [isSiteBuilderEnabled, setIsSiteBuilderEnabled] = useState(localize?.isSiteBuilderEnabled === 'on' ? true : false);
    const [isAISuiteEnabled, setIsAISuiteEnabled] = useState(localize?.isAISuiteEnabled === 'on' ? true : false);

    const [formSaving, setFormSaving] = useState(false);

    return (
        <ResponsiveContext.Provider
            value={{ formData, setFormData, formSaving, setFormSaving, isMegamenuEnabled, setIsMegamenuEnabled, isWooCommerceEnabled, setIsWooCommerceEnabled, isCustomFontsEnabled, setIsCustomFontsEnabled, isSiteBuilderEnabled, setIsSiteBuilderEnabled, isAISuiteEnabled, setIsAISuiteEnabled }}
        >
            {children}
        </ResponsiveContext.Provider>
    );
}