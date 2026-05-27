import { __ } from "@wordpress/i18n";
import { useNavigate, useLocation } from "react-router-dom";

const Header = () => {
    const navigate = useNavigate();
    const location = useLocation();

    const tabs = [
        { label: __("Dashboard", "responsive"), path: "/" },
        { label: __("Settings", "responsive"), path: "/settings" },
        {
            label: __("Starter Templates", "responsive"),
            path: "/templates",
            conditional: true,
        },
        { label: __("Blocks", "responsive"), path: "/blocks" },
        { label: __("Addons for Elementor", "responsive"), path: "/rae" },
    ];

    const handleNavigation = (tab) => {
        if (tab.external) {
            window.location.href = localize?.themebuilderurl;
            return;
        }

        if (tab.conditional) {
            localize?.isRSTActivated !== "activated"
                ? navigate(tab.path)
                : (window.location.href = localize?.rst_redirect);
            return;
        }

        navigate(tab.path);
    };

    return (
        <div className="bg-white border-b border-b-blue-100">
            <div className="mx-auto xl:px-14 md:px-15">
                <div className="flex justify-between">
                    <div className="flex items-center w-10/12 gap-10">
                        <img
                            className="resp-cyberchimps-logo"
                            src={`${localize?.responsiveurl}admin/images/responsive_logo.svg`}
                            alt="Responsive Logo"
                        />

                        <div className="flex w-full md:flex-wrap xl:flex-nowrap">
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

                    <div className="flex w-auto items-center justify-end">
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
