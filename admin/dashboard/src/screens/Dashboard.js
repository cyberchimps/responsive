import { __ } from "@wordpress/i18n";
import { ToggleControl } from "@wordpress/components";
import Icons from '../icons';
import { Link, useNavigate } from 'react-router-dom';
import { useContext, useState } from "react";
import InstallButton from "../components/InstallButton";
import { convertTruthyFalsyValue, displayToast } from "../Helper";
import { ResponsiveContext } from "../Context";

const rawName = window.localize?.whiteLabelSettings?.theme_name;
const themeName = (rawName && rawName.trim() !== '') ? rawName : 'Responsive'; 
const Dashboard = () => {
    const planDetails = localize?.plan_details;
    const isConnectedPlan = Boolean(localize?.isConnected && localize.isConnected !== 'no');


    return (
        <div className="xl:flex lg:block xl:mx-14 md:mx-15 mt-8 mb-16 gap-15 items-start">
            <div className="flex flex-col gap-16 xl:w-2/3 lg:w-full">
                <HeroSection />
                <QuickSettings />
                <RPlusFeatures />
                <ExtendAndQuickAccess />
            </div>
            <div className="flex flex-col gap-6 xl:w-96 xl:flex-none lg:w-full max-xl:mt-8">
               {(() => {
                    if (isConnectedPlan) {
                        return <WebsiteConnectedCard />;
                    }
                    if (convertTruthyFalsyValue(localize.isResponsiveXActivated)) {
                        return <ConnectWebsiteCard />;
                    }
                    return <UpgradeToProCard />;
                })()}
                <QuickAccess />
            </div>
        </div>
    )
}

const HeroSection = () => {
    return (
        <div className="flex flex-col gap-6">
            <p className="text-gray-900 font-semi-bold text-3xl leading-tight m-0">{__('Welcome to', 'responsive')} {themeName} {__('Theme', 'responsive')}</p>
            <p className="max-w-500 text-gray1000 font-normal text-lg leading-relaxed m-0">{__('Build fast, beautiful websites with ' + themeName + ' — lightweight and fully customizable WordPress theme.', 'responsive')}</p>
        </div>
    )
};

const CheckIcon = () => (
    <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.599609 8.63318L4.59961 11.6332L13.5996 0.633179" stroke="#15803D" strokeWidth="2" />
    </svg>
);

const InfoIcon = () => (
    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle cx="7" cy="7" r="6.25" stroke="#A3A3A3" strokeWidth="1.5" />
        <path d="M7 6.25V10" stroke="#A3A3A3" strokeWidth="1.5" strokeLinecap="round" />
        <circle cx="7" cy="4.25" r="0.9" fill="#A3A3A3" />
    </svg>
);

const CrownIcon = () => (
    <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M2.7725 13.3333C2.65472 13.3333 2.55583 13.2933 2.47583 13.2133C2.39583 13.1333 2.35583 13.0342 2.35583 12.9158C2.35583 12.7975 2.39583 12.6986 2.47583 12.6192C2.55583 12.5397 2.65472 12.5 2.7725 12.5H12.2275C12.3458 12.5 12.4447 12.54 12.5242 12.62C12.6036 12.7 12.6436 12.7992 12.6442 12.9175C12.6447 13.0358 12.6047 13.1347 12.5242 13.2142C12.4436 13.2936 12.3447 13.3333 12.2275 13.3333H2.7725ZM3.42 10.93C3.09222 10.93 2.80667 10.8272 2.56333 10.6217C2.32 10.4161 2.16389 10.155 2.095 9.83833L1.1 4.5625C1.07222 4.57361 1.04111 4.57972 1.00667 4.58083C0.971667 4.5825 0.940278 4.58333 0.9125 4.58333C0.650833 4.58333 0.433333 4.49444 0.26 4.31667C0.0866667 4.13889 0 3.92333 0 3.67C0 3.40722 0.0869444 3.18389 0.260833 3C0.434167 2.81667 0.651945 2.725 0.914167 2.725C1.17639 2.725 1.39944 2.81667 1.58333 3C1.76667 3.18389 1.85833 3.40722 1.85833 3.67C1.85833 3.72778 1.85611 3.78139 1.85167 3.83083C1.84722 3.88028 1.83083 3.92917 1.8025 3.9775L4.1025 4.90333C4.20917 4.94611 4.31611 4.95167 4.42333 4.92C4.53 4.88778 4.62056 4.82361 4.695 4.7275L6.94667 1.6775C6.82611 1.59861 6.73056 1.49417 6.66 1.36417C6.58944 1.23472 6.55417 1.095 6.55417 0.945C6.55417 0.682778 6.64611 0.459722 6.83 0.275833C7.01333 0.0919445 7.23639 0 7.49917 0C7.76139 0 7.98472 0.0916666 8.16917 0.275C8.35361 0.458333 8.44583 0.680556 8.44583 0.941667C8.44583 1.09944 8.41056 1.24167 8.34 1.36833C8.26944 1.49611 8.17389 1.59917 8.05333 1.6775L10.305 4.7275C10.3794 4.82361 10.47 4.8875 10.5767 4.91917C10.6839 4.95194 10.7908 4.94694 10.8975 4.90417L13.1975 3.9775C13.1825 3.93306 13.1694 3.88444 13.1583 3.83167C13.1472 3.77833 13.1417 3.72444 13.1417 3.67C13.1417 3.40722 13.2283 3.18389 13.4017 3C13.575 2.81667 13.7928 2.725 14.055 2.725C14.3172 2.725 14.5403 2.81667 14.7242 3C14.9081 3.18389 15 3.40722 15 3.67C15 3.92222 14.9078 4.1375 14.7233 4.31583C14.5389 4.49417 14.315 4.58333 14.0517 4.58333C14.0306 4.58333 14.0067 4.58 13.98 4.57333C13.9533 4.56667 13.9239 4.56306 13.8917 4.5625L12.905 9.8375C12.8356 10.1553 12.6794 10.4167 12.4367 10.6217C12.1939 10.8267 11.9083 10.9294 11.58 10.93H3.42Z" fill="#FACC15" />
    </svg>
);
const ConnectionIcon = () => (
    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle cx="10" cy="10" r="7.5" stroke="#4338CA" strokeWidth="1.5" />
        <path d="M2.5 10H17.5" stroke="#4338CA" strokeWidth="1.5" strokeLinecap="round" />
        <path
            d="M10 2.5C12.0833 4.58333 13.3333 7.16667 13.3333 10C13.3333 12.8333 12.0833 15.4167 10 17.5C7.91667 15.4167 6.66667 12.8333 6.66667 10C6.66667 7.16667 7.91667 4.58333 10 2.5Z"
            stroke="#4338CA"
            strokeWidth="1.5"
        />
    </svg>
);
const FeatureListItem = ({ text, info = false, tooltip = null }) => (
    <div className="flex items-center gap-2.5">
        <span className="flex-shrink-0"><CheckIcon /></span>
        <span className="text-slate-700 text-sm leading-5 font-normal">{text}</span>
        {info && (
            <span className="relative group flex items-center">
                <InfoIcon />
                {tooltip && (
                    <span className="pointer-events-none absolute left-1/2 -translate-x-1/2 bottom-full mb-2 whitespace-nowrap rounded-md bg-slate-900 px-2.5 py-1.5 text-xs font-medium text-white opacity-0 group-hover:opacity-100 transition-opacity z-10">
                        {tooltip}
                    </span>
                )}
            </span>
        )}
    </div>
);

const UpgradeToProCard = () => {

    const features = [
        { text: 'Premium Starter Templates' },
        { text: 'Advanced Customizer Settings' },
        { text: 'WooCommerce Customizer Settings' },
        { text: 'Mega Menu' },
        { text: 'AI Content Creation' },
        { text: 'White Label', info: true, tooltip: 'Available in Business & Agency Plans' },
        { text: 'Site Builder', info: true, tooltip: 'Available in Business & Agency Plans' },
        { text: 'Import/Export Settings', info: true, tooltip: 'Available in Business & Agency Plans' },
        { text: 'VIP Support' },
    ];
    const Tooltip = ({ text }) => (
        <span className="relative inline-flex items-center group">
            <InfoIcon />
            <span className="pointer-events-none absolute left-full top-1/2 -translate-y-1/2 ml-2 z-20 opacity-0 group-hover:opacity-100 transition-opacity duration-150">
                <span className="relative flex items-center rounded-md bg-slate-900 px-2.5 py-1.5 text-xs font-medium text-white whitespace-nowrap">
                    <span className="absolute -left-1 top-1/2 -translate-y-1/2 w-2 h-2 bg-slate-900 rotate-45"></span>
                    {text}
                </span>
            </span>
        </span>
    );

    return (
        <div className="p-3 bg-slate-100 rounded-lg border border-slate-200">
            <div className="flex flex-col gap-6 p-4.5 bg-white rounded-md">
                <span className="text-gray-800 font-medium text-lg leading-7">Upgrade To Responsive Pro</span>
                <div className="flex flex-col gap-3.5">
                    {features.map((feature, index) => (
                        <FeatureListItem
                            key={index}
                            text={feature.text}
                            info={feature.info}
                            tooltip={feature.tooltip}
                        />
                    ))}
                </div>
                <button
                    onClick={() => window.open('https://cyberchimps.com/pricing/?utm_source=wpdash&utm_medium=rtheme&utm_campaign=theme-home-tab&utm_content=upgrade', '_blank')}
                    className="self-start flex items-center gap-2 py-2.5 px-4 text-white leading-5 cursor-pointer upgrade-button rounded-md font-medium border-0"
                >
                    <CrownIcon />
                    Upgrade Now
                </button>
            </div>
        </div>
    )
};

const ConnectWebsiteCard = () => {
    return (
        <div className="p-3 bg-slate-100 rounded-lg border border-slate-200">
            <div className="flex flex-col gap-4 p-4.5 bg-white rounded-md">
                <div className="w-10 h-10 flex items-center justify-center bg-indigo-50 rounded-lg">
                    <ConnectionIcon />
                </div>

                <div className="flex flex-col gap-1.5">
                    <span className="text-gray-800 font-medium text-lg leading-7">
                        {__('Connect Your Website', 'responsive')}
                    </span>
                    <p className="text-gray-500 text-sm leading-5 m-0">
                        {__('Connect your website to the Responsive Pro plugin to unlock access and seamlessly import premium templates directly to your site.', 'responsive')}
                    </p>
                </div>

                <div className="flex flex-col gap-3">
                    <button
                        className="rst-start-auth rst-start-auth-exist w-65 flex items-center justify-center py-2.5 px-4 text-white leading-5 cursor-pointer rounded-md font-medium border connection-border bg-[#1D4ED8]"
                    >
                        {__('Connect with existing account', 'responsive')}
                    </button>
                </div>
            </div>
        </div>
    )
};

const ConnectedCheckIcon = () => (
    <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g clipPath="url(#clip0_985_4313)">
            <path
                fillRule="evenodd"
                clipRule="evenodd"
                d="M0 7.5C0 5.51088 0.790176 3.60322 2.1967 2.1967C3.60322 0.790176 5.51088 0 7.5 0C9.48912 0 11.3968 0.790176 12.8033 2.1967C14.2098 3.60322 15 5.51088 15 7.5C15 9.48912 14.2098 11.3968 12.8033 12.8033C11.3968 14.2098 9.48912 15 7.5 15C5.51088 15 3.60322 14.2098 2.1967 12.8033C0.790176 11.3968 0 9.48912 0 7.5ZM7.072 10.71L11.39 5.312L10.61 4.688L6.928 9.289L4.32 7.116L3.68 7.884L7.072 10.71Z"
                fill="#15803D"
            />
        </g>
        <defs>
            <clipPath id="clip0_985_4313">
                <rect width="15" height="15" fill="white" />
            </clipPath>
        </defs>
    </svg>
);
const WebsiteConnectedCard = () => {
    return (
        <div className="p-3 bg-slate-100 rounded-lg border border-slate-200">
            <div className="flex flex-col gap-4 p-4.5 bg-white rounded-md">
                <span className="w-fit flex items-center gap-1.5 py-1 px-3 bg-green-50 border border-green-200 rounded-full">
                    <span className="flex items-center justify-center w-4 h-4 bg-green-600 rounded-full bg-white">
                        <ConnectedCheckIcon />
                    </span>
                    <span className="text-green-700 text-sm leading-5 font-medium">
                        {__('Connected', 'responsive')}
                    </span>
                </span>

                <div className="flex flex-col gap-1.5">
                    <span className="text-gray-800 font-medium text-lg leading-7">
                        {__('Your Website Is Connected!', 'responsive')}
                    </span>
                    <p className="text-gray-500 text-sm leading-5 m-0">
                        {__('You are using', 'responsive')}{' '}
                        <span className="font-semibold text-gray-700">{themeName} + {__('Responsive Pro plugin', 'responsive')}</span>
                    </p>
                </div>

                <p className="font-semibold text-gray-700 text-sm leading-5 m-0">
                    {__('Email:', 'responsive')}{' '}
                    <span className="font-normal text-gray-700">{localize?.userEmail}</span>
                </p>

                <button
                    
                    className="rst-delete-auth w-fit text-red-500 text-sm leading-5 font-medium bg-transparent border-0 p-0 cursor-pointer hover:text-red-600"
                >
                    {__('Disconnect', 'responsive')}
                </button>
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
            link: 'responsive_layout',
            type: 'section'
        },
        {
            key: 2,
            icon: Icons.customizeFonts,
            name: __('Customize Fonts/Typography', 'responsive'),
            link: 'responsive_typography',
            type: 'section'
        },
        {
            key: 3,
            icon: Icons.uploadLogo,
            name: __('Upload logo & site icon', 'responsive'),
            link: 'title_tagline',
            type: 'section'
        },
        {
            key: 4,
            icon: Icons.editNavigationMenu,
            name: __('Add/edit navigation menu', 'responsive'),
            link: 'nav_menus',
            type: 'panel'
        },
        {
            key: 5,
            icon: Icons.customizeHeader,
            name: __('Customize header options', 'responsive'),
            link: 'responsive_header',
            type: 'panel'
        },
        {
            key: 6,
            icon: Icons.customizeFooter,
            name: __('Customize footer options', 'responsive'),
            link: 'responsive_footer',
            type: 'panel'
        },
        {
            key: 7,
            icon: Icons.updateBlogLayout,
            name: __('Update blog layout', 'responsive'),
            link: 'responsive_blog_layout',
            type: 'section'
        },
        {
            key: 8,
            icon: Icons.updatePageLayout,
            name: __('Update page layout', 'responsive'),
            link: 'responsive_page',
            type: 'section'
        },
    ];

    return (
        <div className="flex flex-col gap-6">
            <div className="flex justify-between">
                <p className="font-medium text-2xl m-0">{__('Customize Your Site', 'responsive')}</p>
                <button onClick={() => window.location.href = localize?.customizerurlReturn} className="cursor-pointer text-blue-600 bg-white border border-blue-600 py-2.5 px-3.5 rounded-md">{__('Go to Customizer', 'responsive')}</button>
            </div>
            <div className="grid grid-cols-2 gap-3 p-3 bg-slate-100 rounded-lg border border-slate-200">
                {settingsOptions.map((option, index) => (
                    <QuickSettingCard index={option.key} icon={option.icon} title={option.name} link={option.link}  type={option.type} />
                ))}
            </div>
        </div>
    )
}

const QuickSettingCard = ({ index, icon, title, link, type = 'section' }) => {
    return (
        <div
            key={index}
            className="rounded-md px-4.5 py-4 bg-white border border-slate-100 hover:shadow-[0px_4px_6px_-2px_rgba(0,0,0,0.05),0px_10px_15px_-3px_rgba(0,0,0,0.1)] cursor-pointer"
            onClick={() => window.location.href = `${localize.customizerurlReturn}&autofocus[${type}]=${link}`}
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

const DynamicPlusFeatureCard = ({ feature }) => {
    const [isEnabled, setIsEnabled] = useState(feature.isEnabled || false);

    const handleToggle = async (value) => {
        setIsEnabled(value);
        try {
            const formData = new FormData();
            formData.append('action', feature.action);
            formData.append('_nonce', feature.nonce);
            formData.append('value', value ? 'on' : 'off');

            const response = await fetch(localize.ajaxurl, { method: 'POST', body: formData });
            const result = await response.json();

            if (!result.success) throw new Error();

            displayToast(value ? `${feature.title} Enabled` : `${feature.title} Disabled`, 'success');
            if (feature.reload) window.location.reload();
        } catch (error) {
            setIsEnabled(!value);
            displayToast(`Failed to update ${feature.title} setting.`, 'error');
        }
    };

    return (
        <PlusFeatureCard title={feature.title} desc={feature.desc} locked={feature.locked}>
            {!feature.locked && (
                feature.isWhiteLabel ? (
                    <div className="text-blue-600">
                        <a href={feature.docsLink} target="_blank" className="w-fit text-blue-500 underline text-sm leading-5 font-normal cursor-pointer">Docs</a>
                        {!convertTruthyFalsyValue(localize.whiteLabelSettings?.hide_wl_settings) && <> | <Link to="/settings" state={{ tab: 'whitelabel' }} className="w-fit text-blue-500 underline text-sm leading-5 font-normal cursor-pointer">Settings</Link></>}
                    </div>
                ) : feature.hasToggle ? (
                    <div className="flex justify-between text-blue-600">
                        <span>
                            <a target="_blank" href={feature.docsLink} className="w-fit text-blue-500 underline text-sm leading-5 font-normal cursor-pointer">Docs</a>
                            {feature.settingsText && (
                                <> | <a href={feature.settingsLink} className={`w-fit underline text-sm leading-5 font-normal ${isEnabled ? ' text-blue-500 cursor-pointer' : 'text-gray-400 pointer-events-none'}`}>{feature.settingsText}</a></>
                            )}
                        </span>
                        <ToggleControl checked={isEnabled} onChange={handleToggle} />
                    </div>
                ) : null
            )}
        </PlusFeatureCard>
    );
};

const RPlusFeatures = () => {
    return (
        <div className="flex flex-col gap-6">
            <div className="flex flex-col gap-2">
                <span className="text-[#4B5563] text-2xl leading-8 font-medium">Responsive Pro Features</span>
                <span className="text-[#4B5563] text-base leading-6">Supercharge your free {themeName} with Responsive Pro Plugin features and get full access to our premium starter templates.</span>
            </div>
            <div className="grid grid-cols-3 gap-3 p-3 bg-slate-100 rounded-lg border border-slate-200">
                <PlusFeatureCard title="Starter Templates" desc="Unlock the library of Premium WordPress Templates.">
                    <a href={localize?.rst_redirect} className="w-fit text-blue-500 underline text-sm leading-5 font-normal cursor-pointer">Explore Templates</a>
                </PlusFeatureCard>

                {localize?.proFeatures && Object.values(localize.proFeatures).map((feature, index) => (
                    <DynamicPlusFeatureCard key={index} feature={feature} />
                ))}
            </div>
        </div>
    )
}

const LockIcon = () => (
     <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M12.75 6.75V5.25C12.75 3.15 11.1 1.5 9 1.5C6.9 1.5 5.25 3.15 5.25 5.25V6.75C3.975 6.75 3 7.725 3 9V14.25C3 15.525 3.975 16.5 5.25 16.5H12.75C14.025 16.5 15 15.525 15 14.25V9C15 7.725 14.025 6.75 12.75 6.75ZM6.75 5.25C6.75 3.975 7.725 3 9 3C10.275 3 11.25 3.975 11.25 5.25V6.75H6.75V5.25ZM9.75 12.75C9.75 13.2 9.45 13.5 9 13.5C8.55 13.5 8.25 13.2 8.25 12.75V10.5C8.25 10.05 8.55 9.75 9 9.75C9.45 9.75 9.75 10.05 9.75 10.5V12.75Z" fill="#D4D4D4" />
    </svg>
);

const PlusFeatureCard = ({ title, desc, children, locked = false }) => {

    return (
        <div className="rounded-md px-4.5 py-6 bg-white border border-slate-100">
            <div className="flex flex-col gap-4.5">
                <div className="flex flex-col gap-2">
                    <div className="flex items-center justify-between">
                        <span className="text-gray-800 text-lg leading-7 font-medium">{title}</span>
                        {locked && <LockIcon />}
                    </div>
                    <span className="text-[#4B5563] text-sm leading-5 font-normal">{desc}</span>
                </div>
                {localize?.rst_status === 'activated' && children}
            </div>
        </div>
    )
}

const QuickAccess = () => {
    return (
        <div className="flex flex-col gap-6">
            <div className="flex flex-col gap-2">
                <span className="text-[#4B5563] text-2xl leading-8 font-medium">{__('Quick Access', 'responsive')}</span>
                <span className="text-[#4B5563] text-base leading-6">{__('Helpful resources & links', 'responsive')}</span>
            </div>
            <div className="flex flex-col gap-3 p-3 bg-slate-100 rounded-md border border-slate-200">
                <div className="flex gap-5 p-3.5 bg-white rounded-md">
                    <span className="flex items-center self-start p-2.5 rounded-md border border-yellow-500 bg-[#FEFCE8]">{Icons.community}</span>
                    <div>
                        <a href="https://cyberchimps.com/blog/#mautic-api-form" target="_blank" className="text-lg leading-7 font-medium text-desc text-[#4B5563] no-underline">{__('Join our Newsletter', 'responsive')}</a>
                        <p className="text-sm leading-5 font-normal text-desc m-0">{__('Get the latest updates from us', 'responsive')}</p>
                    </div>
                </div>
            
                
                    <div className="flex gap-5 p-3.5 bg-white rounded-md ">
                        <span className="flex items-center self-start p-2.5 rounded-md border border-blue-200 bg-[#E9F1F7]">{Icons.help}</span>
                        <div>
                            <a href="https://wordpress.org/support/theme/responsive/" target="_blank" className="text-lg leading-7 font-medium text-[#4B5563] no-underline">{__('Support', 'responsive')}</a>
                            <p className="text-sm leading-5 font-normal text-desc m-0">{__('Get help from our support team', 'responsive')}</p>
                        </div>
                    </div>
                
            
                <div className="flex gap-5 i p-3.5 bg-white rounded-md">
                    <span className="flex items-center self-start p-2.5 rounded-md border border-green-500 bg-[#F0FDF4]">{Icons.star}</span>
                    <div>
                        <a href={localize.review_link} target="_blank" className="text-lg leading-7 font-medium text-desc text-[#4B5563] no-underline">{__('Rate Us', 'responsive')}</a>
                        <p className="text-sm leading-5 font-normal text-desc m-0">{__('Share your experience', 'responsive')}</p>
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
        <div>
            <p className="font-medium text-2xl m-0">{__('Extend Your Website', 'responsive')}</p>
            <p className="font-normal text-base text-desc mt-2 mb-6">{__("Powerful tools to enhance your site's functionality", 'responsive')}</p>
            <div className="grid md:grid-cols-3 gap-6 p-3 bg-slate-100 border border-slate-200 rounded-md">
                <PluginCard title={__('Responsive Starter Templates', 'responsive')} description={__('Ready to Import Professionally Designed Website Starter Templates.', 'responsive')} image="rst_sm_logo">
                    {/* <button onClick={() => convertTruthyFalsyValue(localize?.isRSTActivated) ? window.location.href = localize.rst_redirect : navigate('/templates')} className="mt-1.125 py-2.5 px-3.5 border-0 bg-white text-[#1D4ED8] rounded-md text-sm leading-5 font-medium cursor-pointer">{__('Explore Templates', 'responsive')}</button> */}
                    <a                                                         
                    onClick={(e) => {
                        e.preventDefault();
                        convertTruthyFalsyValue(localize?.isRSTActivated)
                            ? window.location.href = localize.rst_redirect
                            : navigate('/templates');
                    }}
                    href={convertTruthyFalsyValue(localize?.isRSTActivated) ? localize.rst_redirect : '/templates'}
                    className="mt-1.125 py-2.5 border-0 bg-white text-[#1D4ED8] rounded-md text-sm leading-5 font-medium cursor-pointer inline-block no-underline"
                >                                                           
                    {__('Explore Templates', 'responsive')}
                </a>                                                          
                </PluginCard>

                <PluginCard title={__('Responsive Addons for Elementor', 'responsive')} description={__('A free Elementor Addons plugin with more than 80+ premium quality Elementor widgets.', 'responsive')} image="rae">
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
