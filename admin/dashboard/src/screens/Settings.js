import { __ } from "@wordpress/i18n";
import { useState } from "react";
import Icons from "../icons";

const Settings = () => {

    const [settingsTab, setSettingsTab] = useState('whitelabel');

    return (
        <div className="flex xl:mx-14 md:mx-15 my-16">
            <div className="w-1/4 bg-white rounded-tl-3xl p-5">
                <div className="flex flex-col gap-2">
                    <div onClick={() => setSettingsTab('connect')} className={`flex items-center gap-2 px-3 py-4 cursor-pointer rounded-md ${settingsTab === 'connect' && 'resp-setting-tab-active'}`}>
                        {Icons.user}
                        <p className="m-0 text-base leading-6 font-medium">{__('Connect', 'responsive')}</p>
                    </div>
                </div>
                <div className="flex flex-col gap-2">
                    <div onClick={() => setSettingsTab('whitelabel')} className={`flex items-center gap-2 px-3 py-4 cursor-pointer rounded-md ${settingsTab === 'whitelabel' && 'resp-setting-tab-active'}`}>
                        {Icons.document}
                        <p className="m-0 text-base leading-6 font-medium">{__('White Label', 'responsive')}</p>
                    </div>
                </div>
            </div>
            <div className="w-3/4 rounded-tr-3xl p-10 bg-slate-100">
                {settingsTab === 'connect' && <ConnectSettings />}
                {settingsTab === 'whitelabel' && <WhiteLabelSettings />}
            </div>
        </div>
    )
}

const ConnectSettings = () => {
    return (
        <div className="flex flex-col gap-6 p-8 bg-white border border-slate-100 rounded-[10px]">
            <span className="text-slate-900 text-2xl leading-8 font-medium">Connect Your Website to Cyberchimps Responsive</span>
            <span className="text-slate-800 text-base leading-6 font-normal">Create a free account to connect with Cyberchimps Responsive. After connecting, you can get access to all the Starter Templates and additional features for the Cyberchimps Responsive theme like:</span>
            <div>
                <ul className="flex flex-col gap-3 my-0 pl-5 list-disc">
                    <li><span className="text-slate-800 font-bold text-base leading-6">Mega Menu: </span><span className="text-slate-800 font-normal text-base leading-6">Adds menu options such as mega menus, highlight tags, icons, etc.</span></li>
                    <li><span className="text-slate-800 font-bold text-base leading-6">White Label: </span><span className="text-slate-800 font-normal text-base leading-6">White Label the theme name & settings with the Pro Plugin.</span></li>
                    <li><span className="text-slate-800 font-bold text-base leading-6">Woocommerce: </span><span className="text-slate-800 font-normal text-base leading-6">Adds enhanced set of options in the WooCommerce store customizer.</span></li>
                </ul>
            </div>
            <span className="text-slate-700 font-normal text-sm leading-5">You can continue using the plugin without connecting to the web app if you wish so. Please note that the standalone version of the plugin doesn't provide some advanced features.</span>
            <div className="flex gap-6">
                <button className="py-2.5 px-3.5 text-white bg-blue-600 text-sm leading-5 font-medium rounded-md border border-blue-600 cursor-pointer">New? Create a free account</button>
                <button className="py-2.5 px-3.5 text-blue-600 bg-white text-sm leading-5 font-medium rounded-md border border-blue-600 cursor-pointer">Connect your existing account</button>
            </div>
        </div>
    )
}

const WhiteLabelSettings = () => {
    return (
        <div className="flex flex-col gap-5 p-8 bg-white border border-slate-100 rounded-[10px]">
            <span className="text-slate-900 font-medium text-2xl leading-8">White Label Settings</span>
            <div className="flex flex-col gap-3.5">
                <label className="text-gray-500 text-base leading-6 font-normal">Author Name</label>
                <input type="text" className="m-0 h-12.5 bg-white! border! border-slate-300! rounded-lg!" />
            </div>
            <div className="flex flex-col gap-3.5">
                <label className="text-gray-500 text-base leading-6 font-normal">Website URL</label>
                <input type="text" className="m-0 h-12.5 bg-white! border! border-slate-300! rounded-lg!" />
            </div>
            <div className="flex flex-col gap-3.5">
                <label className="text-gray-500 text-base leading-6 font-normal">Theme Name</label>
                <input type="text" className="m-0 h-12.5 bg-white! border! border-slate-300! rounded-lg!" />
            </div>
            <div className="flex flex-col gap-3.5">
                <label className="text-gray-500 text-base leading-6 font-normal">Theme Description</label>
                <input type="text" className="m-0 h-12.5 bg-white! border! border-slate-300! rounded-lg!" />
            </div>
            <div className="flex flex-col gap-2">
                <div className="flex flex-col gap-3.5">
                    <label className="text-gray-500 text-base leading-6 font-normal">Theme Screenshot</label>
                    <div className="flex">
                        <input type="text" placeholder="Enter icon URL..." className="w-full m-0 h-12.5 bg-white! border! border-slate-300! rounded-lg! rounded-tr-none! rounded-br-none! placeholder:text-slate-400" />
                        <button className="py-3.5 px-2.5 text-white bg-slate-500 text-sm leading-5 font-medium border border-slate-500 rounded-tr-md rounded-br-md cursor-pointer">Upload</button>
                    </div>
                </div>
                <span className="text-slate-400 font-normal text-xs leading-4">The recommended image size is 1200px wide and 900px tall.</span>
            </div>
            <div className="flex flex-col gap-2">
                <div className="flex flex-col gap-3.5">
                    <label className="text-gray-500 text-base leading-6 font-normal">Theme Icon</label>
                    <div className="flex">
                        <input type="text" placeholder="Enter image URL..." className="w-full m-0 h-12.5 bg-white! border! border-slate-300! rounded-lg! rounded-tr-none! rounded-br-none! placeholder:text-slate-400" />
                        <button className="py-3.5 px-2.5 text-white bg-slate-500 text-sm leading-5 font-medium border border-slate-500 rounded-tr-md rounded-br-md cursor-pointer">Upload</button>
                    </div>
                </div>
                <span className="text-slate-400 font-normal text-xs leading-4">The recommended icon should have some background to get adjusted properly.</span>
            </div>
            <div className="flex gap-2 items-center">
                <input type="checkbox" name="" id="resp-hide-whitelabel-settings" className="m-0! shadow-[0px_1px_2px_0px_rgba(0,0,0,0.05)]! border! border-blue-600! rounded-sm!" />
                <label htmlFor="resp-hide-whitelabel-settings" className="text-slate-500 font-normal text-sm leading-5">Hide White Label Settings</label>
            </div>
            <div>
                <span className="text-gray-600 font-bold text-sm leading-5">Note: </span>
                <span className="text-gray-600 font-medium text-sm leading-5">Enable this option to hide White Label settings. Re-activate the Responsive Starter Templates to enable this settings tab again.</span>
            </div>
            <button className="self-start py-2.5 px-3.5 text-white bg-blue-600 text-sm leading-5 font-medium rounded-md border border-blue-600 cursor-pointer">Save Changes</button>
        </div>
    )
}

export default Settings