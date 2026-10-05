import { __ } from "@wordpress/i18n";
import { useNavigate, useLocation } from "react-router-dom";
import { convertTruthyFalsyValue } from "../Helper";

const Header = () => {
    const navigate = useNavigate();
    const location = useLocation();

    const planDetailsHead = localize?.plan_details; 

    const isProBadge = (planDetailsHead && planDetailsHead !== 'free')  && convertTruthyFalsyValue(localize?.isResponsiveXActivated);


    let tabs = [
        { label: __("Dashboard", "responsive"), path: "/" },
        {
            label: __("Starter Templates", "responsive"),
            path: "/templates",
            conditional: true,
            isActivated: convertTruthyFalsyValue( localize?.isRSTemplatesActivated ),
            redirect: localize?.rst_redirect,
        },
        {
            label: __("Blocks", "responsive"),
            path: "/blocks",
            conditional: true,
            isActivated: convertTruthyFalsyValue( localize?.isRBAActivated ),
            redirect: localize?.rbea_redirect,
        },
        {
            label: __("Addons for Elementor", "responsive"),
            path: "/rae",
            conditional: true,
            isActivated: convertTruthyFalsyValue( localize?.isRAEActivated ),
            redirect: localize?.rae_redirect,
        },
    ];

    const settingsTab = { label: __("Settings", "responsive"), path: "/settings" }

    if ( localize?.isRSTActivated ) tabs.splice(1, 0, settingsTab);

    const handleNavigation = (tab) => {
        if (tab.external) {
            window.location.href = localize?.themebuilderurl;
            return;
        }

        tab.conditional && tab.isActivated ? (window.location.href = tab.redirect) : navigate(tab.path);

        return;
    };

    return (
        <div className="bg-white border-b border-b-blue-100">
            <div className="mx-auto xl:px-14 md:px-8 px-4 margin-right-8">
                <div className="flex justify-between items-center">
                    <div className="flex items-center gap-10">
                        <img
                            className="resp-cyberchimps-logo"
                            src={`${localize?.whiteLabelSettings?.theme_icon_url ? localize?.whiteLabelSettings?.theme_icon_url : localize?.responsiveurl + 'admin/images/responsive_logo.svg' } `}
                            alt="Responsive Logo"
                        />

                        <div className="flex flex-wrap xl:flex-nowrap">
                            {tabs.map((tab) => {
                                const isActive =
                                    tab.path && location.pathname === tab.path;
                                return (
                                    <div
                                        key={tab.label}
                                        onClick={() => handleNavigation(tab)}
                                        className={`hover:bg-sky-100 cursor-pointer ${
                                            isActive ? "resp-active-tab" : ""
                                        }`}
                                    >
                                        <p className="text-gray-600 text-base font-medium my-6 px-3">
                                            {tab.label}
                                        </p>
                                    </div>
                                );
                            })}
                        </div>
                    </div>

                     <div className="flex items-center gap-2.5 flex-shrink-0">
                        <span
                            className={`flex items-center p-2.5 rounded-md no-border text-[#1D4ED8] text-sm font-normal leading-5 ${
                                isProBadge
                                    ? "text-indigo-700 pro-badge-bg"
                                    : "text-gray-600 free-badge-bg"
                            }`}
                        >
                            {isProBadge ? __("PRO", "responsive") : __("FREE", "responsive")}
                        </span>
                        <div className="border border-slate-200 rounded-md p-2.5">
                            <p className="text-gray-400 font-medium text-sm m-0">
                                v{localize?.responsiveVersion}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default Header;
