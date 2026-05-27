import { __ } from "@wordpress/i18n";
import { ToggleControl } from "@wordpress/components";
import Icons from '../icons';
import { Link, useNavigate } from 'react-router-dom';
import { useContext, useState } from "react";
import InstallButton from "../components/InstallButton";

const Dashboard = () => {
    return (
        <>
            <HeroSection />
            <QuickSettings />
            <RPlusFeatures />
            <ExtendAndQuickAccess />
        </>
    )
}

const HeroSection = () => {
    return (
        <div className="xl:mx-14 md:mx-15 mt-8 mb-16 rounded-lg bg-[linear-gradient(93.9deg,#080084_27.66%,#2563EB_96.64%)]">
            <div className="flex flex-col gap-6 py-15 px-6 sm:py-14 sm:px-14 pl-15">
                <p className="text-white font-bold text-5xl sm:text-4xl md:text-5xl leading-tight m-0">{__('Welcome to Responsive Theme', 'responsive')}</p>
                <p className="max-w-175 text-blue-50 font-medium text-sm leading-relaxed m-0">{__('Responsive is a fast, lightweight, and fully customizable WordPress theme designed to help you build stunning websites with ease. Whether you\'re creating a business site, blog, portfolio, or WooCommerce store, Responsive gives you complete control over design and performance.', 'responsive')}</p>
                <p className="m-0">
                    <button onClick={() => window.location.href = localize?.customizerurlReturn} className="flex items-center gap-1 py-2.5 px-3.5 text-blue-500 leading-5 cursor-pointer bg-white rounded-md font-medium border-0"> {Icons.pointerClick} {__('Start Customizing', 'responsive')}
                    </button>
                </p>
            </div>
        </div>
    )
};

const QuickSettings = () => {

    const settingsOptions = [
        {
            key: 1,
            icon: Icons.siteLayout,
            name: __('Change Site Layout', 'responsive'),
            link: 'responsive_layout'
        },
        {
            key: 2,
            icon: Icons.customizeFonts,
            name: __('Customize Fonts/Typography', 'responsive'),
            link: 'responsive_typography'
        },
        {
            key: 3,
            icon: Icons.uploadLogo,
            name: __('Upload logo & site icon', 'responsive'),
            link: 'title_tagline'
        },
        {
            key: 4,
            icon: Icons.editNavigationMenu,
            name: __('Add/edit navigation menu', 'responsive'),
            link: 'nav_menus'
        },
        {
            key: 5,
            icon: Icons.customizeHeader,
            name: __('Customize header options', 'responsive'),
            link: 'responsive_header'
        },
        {
            key: 6,
            icon: Icons.customizeFooter,
            name: __('Customize footer options', 'responsive'),
            link: 'responsive_footer'
        },
        {
            key: 7,
            icon: Icons.updateBlogLayout,
            name: __('Update blog layout', 'responsive'),
            link: 'responsive_blog_layout'
        },
        {
            key: 8,
            icon: Icons.updatePageLayout,
            name: __('Update page layout', 'responsive'),
            link: 'responsive_page'
        },
    ];

    return (
        <div className="xl:flex lg:block justify-between xl:mx-14 md:mx-15 mt-8 mb-16 gap-12">
            <div className="flex flex-col gap-6 xl:w-2/3 lg:w-full">
                <div className="flex justify-between">
                    <p className="font-medium text-2xl m-0">{__('Quick Settings', 'responsive')}</p>
                    <button onClick={() => window.location.href = localize?.customizerurlReturn} className="cursor-pointer text-blue-600 bg-white border border-blue-600 py-2.5 px-3.5 rounded-md">{__('Go to Customizer', 'responsive')}</button>
                </div>
                <div className="grid grid-cols-2 gap-3 p-3 bg-slate-100 rounded-lg border border-slate-200">
                    {settingsOptions.map((option, index) => (
                        <QuickSettingCard index={option.key} icon={option.icon} title={option.name} link={option.link} />
                    ))}
                </div>
            </div>
            <div className="xl:w-1/3 lg-w-full max-xl:mt-8">
                <div className="p-3 mt-15 bg-slate-100 rounded-lg border border-slate-200">
                    <div className="flex flex-col gap-7 p-4.5 bg-white">
                        <span className="text-gray-800 font-medium text-lg leading-7">Upgrade to Pro?</span>
                        <div>
                            <span className="text-[#4B5563] text-base leading-6 font-normal">Why start from scratch when you can launch faster with ready-made designs?<br /></span>
                            <span className="text-[#4B5563] text-base leading-6 font-normal">Upgrade to unlock premium starter templates and build stunning websites in minutes.</span>
                        </div>
                        <button onClick={() => window.open('https://cyberchimps.com/pricing/?utm_source=wpdash&utm_medium=rtheme&utm_campaign=theme-home-tab&utm_content=upgrade', '_blank')} className="self-start py-2.5 px-3.5 text-blue-500 leading-5 cursor-pointer bg-white rounded-md font-medium border border-blue-500">Upgrade Now</button>
                    </div>

                </div>
            </div>
        </div>
    )
}

const QuickSettingCard = ({ index, icon, title, link }) => {
    return (
        <div
            key={index}
            className="rounded-md px-4.5 py-4 bg-white border border-slate-100 hover:shadow-[0px_4px_6px_-2px_rgba(0,0,0,0.05),0px_10px_15px_-3px_rgba(0,0,0,0.1)] cursor-pointer"
            onClick={() => window.location.href = `${localize.customizerurlReturn}&autofocus[section]=${link}`}
        >
            <div className="flex justify-between items-center">
                <div className="flex items-center gap-2">
                    {icon}
                    <span className="capitalize text-slate-800 text-sm leading-5 font-medium">{title}</span>
                </div>
                <span className="dashicons dashicons-arrow-right-alt"></span>
            </div>
        </div>
    )
}

const RPlusFeatures = () => {
    return (
        <div className="xl:flex lg:block justify-between xl:mx-14 md:mx-15 mt-8 mb-16 gap-12">
            <div className="flex flex-col gap-6 xl:w-2/3 lg:w-full">
                <div className="flex flex-col gap-2">
                    <span className="text-[#4B5563] text-2xl leading-8 font-medium">Responsive Plus Features</span>
                    <span className="text-[#4B5563] text-base leading-6">Import Premium WordPress sites with Responsive Plus featuring white label, custom fonts, Woo settings, etc.</span>
                </div>
                <div className="grid grid-cols-3 gap-3 p-3 bg-slate-100 rounded-lg border border-slate-200">
                    <PlusFeatureCard title="Starter Templates" desc="Unlock the library of Premium WordPress Templates.">
                        <Link to='/templates' className="w-fit text-blue-500 underline text-sm leading-5 font-normal cursor-pointer">Explore Templates</Link>
                    </PlusFeatureCard>
                    <PlusFeatureCard title="White Label" desc="Unlock the library of Premium WordPress Templates.">
                        <div className="text-blue-600">
                            <a href="https://cyberchimps.com/docs/responsive-plus/modules-settings/how-to-white-label-cyberchimps-responsive-theme/" target="_blank" className="w-fit text-blue-500 underline text-sm leading-5 font-normal cursor-pointer">Docs</a> | <a className="w-fit text-blue-500 underline text-sm leading-5 font-normal cursor-pointer">Settings</a>
                        </div>
                    </PlusFeatureCard>
                    <PlusFeatureCard title="Mega Menu" desc="Adds options such as mega menus, highlight tags, icons, etc.">
                        <div className="flex justify-between text-blue-600">
                            <span><a href="https://cyberchimps.com/docs/responsive-plus/modules-settings/mega-menu/" className="w-fit text-blue-500 underline text-sm leading-5 font-normal cursor-pointer">Docs</a> | <a href={localize?.siteurl + '/wp-admin/nav-menus.php'} className="w-fit text-blue-500 underline text-sm leading-5 font-normal cursor-pointer">Customize</a></span>
                            <ToggleControl
                                className="resp-setting-toggle"
                                __nextHasNoMarginBottom
                                checked={true}
                                onChange={() => console.log('fefefefefef')}
                            />
                        </div>
                    </PlusFeatureCard>
                    <PlusFeatureCard title="WooCommerce" desc="Adds enhanced settings in the Woo store customizer.">
                        <div className="flex justify-between text-blue-600">
                            <span><a className="w-fit text-blue-500 underline text-sm leading-5 font-normal cursor-pointer">Docs</a> | <a className="w-fit text-blue-500 underline text-sm leading-5 font-normal cursor-pointer">Customize</a></span>
                            <ToggleControl
                                className="resp-setting-toggle"
                                __nextHasNoMarginBottom
                                checked={true}
                                onChange={() => console.log('fefefefefef')}
                            />
                        </div>
                    </PlusFeatureCard>
                    <PlusFeatureCard title="Custom Fonts" desc="Upload custom fonts directly, no additional font plugin required.">
                        <div className="flex justify-between text-blue-600">
                            <span><a className="w-fit text-blue-500 underline text-sm leading-5 font-normal cursor-pointer">Docs</a> | <a className="w-fit text-blue-500 underline text-sm leading-5 font-normal cursor-pointer">Settings</a></span>
                            <ToggleControl
                                className="resp-setting-toggle"
                                __nextHasNoMarginBottom
                                checked={true}
                                onChange={() => console.log('fefefefefef')}
                            />
                        </div>
                    </PlusFeatureCard>
                    <PlusFeatureCard title="Site Builder" desc="Edit your site's header, footer, 404, and archive templates.">
                        <div className="flex justify-between text-blue-600">
                            <span><a className="w-fit text-blue-500 underline text-sm leading-5 font-normal cursor-pointer">Docs</a> | <a className="w-fit text-blue-500 underline text-sm leading-5 font-normal cursor-pointer">Settings</a></span>
                            <ToggleControl
                                className="resp-setting-toggle"
                                __nextHasNoMarginBottom
                                checked={true}
                                onChange={() => console.log('fefefefefef')}
                            />
                        </div>
                    </PlusFeatureCard>
                </div>
            </div>
            <QuickAccess />
        </div>
    )
}

const PlusFeatureCard = ({ title, desc, children }) => {

    return (
        <div className="rounded-md px-4.5 py-6 bg-white border border-slate-100">
            <div className="flex flex-col gap-4.5">
                <div className="flex flex-col gap-2">
                    <span className="text-gray-800 text-lg leading-7 font-medium">{title}</span>
                    <span className="text-[#4B5563] text-sm leading-5 font-normal">{desc}</span>
                </div>
                {localize?.rst_status === 'activated' && children}
            </div>
        </div>
    )
}

const QuickAccess = () => {
    return (
        <div className="flex flex-col gap-6 xl:w-1/3 lg-w-full max-xl:mt-8">
            <div className="flex flex-col gap-2">
                <span className="text-[#4B5563] text-2xl leading-8 font-medium">{__('Quick Access', 'responsive')}</span>
                <span className="text-[#4B5563] text-base leading-6">{__('Helpful resources & links', 'responsive')}</span>
            </div>
            <div className="flex flex-col gap-3 p-3 bg-slate-100 rounded-md border border-slate-200">
                <div className="flex gap-5 i p-3.5 bg-white rounded-md">
                    <span className="flex items-center self-start p-2.5 rounded-md border border-green-500">{Icons.star}</span>
                    <div>
                        <a href={localize.review_link} target="_blank" className="text-lg leading-7 font-medium text-desc text-[#4B5563] no-underline">{__('Rate Us', 'responsive')}</a>
                        <p className="text-sm leading-5 font-normal text-desc m-0">{__('Share your experience', 'responsive')}</p>
                    </div>
                </div>
                <div className="flex gap-5 p-3.5 bg-white rounded-md">
                    <span className="flex items-center self-start p-2.5 rounded-md border border-yellow-500">{Icons.community}</span>
                    <div>
                        <a href="https://www.facebook.com/groups/responsive.theme" target="_blank" className="text-lg leading-7 font-medium text-desc text-[#4B5563] no-underline">{__('Join the Community', 'responsive')}</a>
                        <p className="text-sm leading-5 font-normal text-desc m-0">{__('Connect with other users', 'responsive')}</p>
                    </div>
                </div>
                <div className="flex gap-5 p-3.5 bg-white rounded-md">
                    <span className="flex items-center self-start p-2.5 rounded-md border border-blue-200">{Icons.help}</span>
                    <div>
                        <a href="https://wordpress.org/support/theme/responsive/" target="_blank" className="text-lg leading-7 font-medium text-blue-500 no-underline">{__('Support', 'responsive')}</a>
                        <p className="text-sm leading-5 font-normal text-desc m-0">{__('Get help from our support team', 'responsive')}</p>
                    </div>
                </div>
            </div>
        </div>
    )
}

const ExtendAndQuickAccess = () => {

    const navigate = useNavigate();

    const [rplusText, setRplusText] = useState(localize?.rst_status);
    const [rbeaText, setRbeaText] = useState(localize?.rbea_status);
    const [raeText, setRaeText] = useState(localize?.rae_status);

    return (
        <div className="xl:flex lg:block justify-between xl:mx-14 md:mx-15 mt-8 mb-16 gap-12">
            <div className="xl:w-2/3 lg:w-full">
                <p className="font-medium text-2xl m-0">{__('Extend Your Website', 'responsive')}</p>
                <p className="font-normal text-base text-desc mt-2 mb-6">{__("Powerful tools to enhance your site's functionality", 'responsive')}</p>
                <div className="grid md:grid-cols-2 gap-6 p-3 bg-slate-100 border border-slate-200 rounded-md">
                    <PluginCard title={__('Starter Templates', 'responsive')} description={__('150+ Ready to Import Designer-Made Website Starter Templates.', 'responsive')} image="rst">
                        <button onClick={() => navigate('/templates')} className="mt-1.125 py-2.5 px-3.5 border-0 bg-blue-600 hover:bg-blue-900 rounded-md text-white text-sm leading-5 font-medium cursor-pointer">{__('Explore Templates', 'responsive')}</button>
                    </PluginCard>

                    <PluginCard title={__('Responsive Plus', 'responsive')} description={__('Get Advanced modules: Site Builder, Fonts, WooCommerce, and more.', 'responsive')} image="rst">
                        <InstallButton
                            type="plugin"
                            status={localize?.rst_status}
                            nonce={localize.rst_nonce}
                            redirect={localize.rst_redirect}
                            buttonText={rplusText}
                            setButtonText={setRplusText}
                            slug="responsive-add-ons"
                        />
                    </PluginCard>

                    <PluginCard title={__('Responsive Addons for Elementor', 'responsive')} description={__('50+ Blocks to Enhance Your WordPress Block Editor Experience.', 'responsive')} image="responsive_logo">
                        <InstallButton
                            type="plugin"
                            status={localize?.rae_status}
                            nonce={localize.rae_nonce}
                            redirect={localize.rae_redirect}
                            buttonText={raeText}
                            setButtonText={setRaeText}
                            slug="responsive-addons-for-elementor"
                        />
                    </PluginCard>

                    <PluginCard title={__('Responsive Blocks', 'responsive')} description={__('50+ Blocks to Enhance Your WordPress Block Editor Experience.', 'responsive')} image="rbea_logo">
                        <InstallButton
                            type="plugin"
                            status={localize?.rbea_status}
                            nonce={localize.rbea_nonce}
                            redirect={localize.rbea_redirect}
                            buttonText={rbeaText}
                            setButtonText={setRbeaText}
                            slug="responsive-block-editor-addons"
                        />
                    </PluginCard>
                </div>
            </div>
            <div className="xl:w-1/3 lg-w-full"></div>
        </div>
    )
}

const PluginCard = ({ title, description, image, children }) => {
    return (
        <div className="p-6 bg-white rounded-md transition-shadow hover:[box-shadow:0px_10px_15px_-3px_rgba(0,0,0,0.1)]">
            <div className="flex justify-between items-start">
                <img className="w-12.5 h-12.5" src={localize.responsiveurl + 'admin/images/' + image + '.svg'} alt="Responsive Logo" />
                <span className="py-1 px-2.5 text-xs leading-4 font-medium text-green-800 bg-green-50 border border-green-300 rounded cap">{__('Free', 'responsive')}</span>
            </div>
            <p className="mt-1.125 mb-2 text-base leading-6 font-medium">{title}</p>
            <p className="text-sm leading-5 font-normal">{description}</p>
            {children}
        </div>
    );
}

export default Dashboard;