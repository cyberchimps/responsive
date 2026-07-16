import { __ } from "@wordpress/i18n";
import { useState, useEffect, useContext } from '@wordpress/element';
import { useLocation } from 'react-router-dom';
import { ResponsiveContext } from '../Context';
import { displayToast, convertTruthyFalsyValue } from '../Helper';
import Icons from "../icons";

const Settings = () => {

    const location = useLocation();
    const initialTab = location.state?.tab || 'connect';

    const [settingsTab, setSettingsTab] = useState(initialTab);

    useEffect(() => {
        if (location.state?.tab) {
            setSettingsTab(location.state.tab);
        }
        window.scrollTo(0, 0);
    }, [location.state?.tab]);

    return (
        <div className="flex xl:mx-14 md:mx-15 my-16">
            <div className="w-1/4 bg-white rounded-tl-3xl p-5">
                <div className="flex flex-col gap-2">
                    <div onClick={() => setSettingsTab('connect')} className={`flex items-center gap-2 px-3 py-4 cursor-pointer rounded-md ${settingsTab === 'connect' && 'resp-setting-tab-active'}`}>
                        {Icons.user}
                        <p className="m-0 text-base leading-6 font-medium">{__('Connect', 'responsive')}</p>
                    </div>
                </div>
                {!convertTruthyFalsyValue(localize.whiteLabelSettings.hide_wl_settings)  &&
    localize.plan_details !== 'free' &&
    convertTruthyFalsyValue(localize.isResponsiveXActivated) &&
    localize.isPremiumFeatureAccessible && (
                    <div className="flex flex-col gap-2">
                        <div onClick={() => setSettingsTab('whitelabel')} className={`flex items-center gap-2 px-3 py-4 cursor-pointer rounded-md ${settingsTab === 'whitelabel' && 'resp-setting-tab-active'}`}>
                            {Icons.document}
                            <p className="m-0 text-base leading-6 font-medium">{__('White Label', 'responsive')}</p>
                        </div>
                    </div>
                )}
            </div>
            <div className="w-3/4 rounded-tr-3xl p-10 bg-slate-100">
                {settingsTab === 'connect' && <ConnectSettings />}
                {!convertTruthyFalsyValue(localize.whiteLabelSettings.hide_wl_settings) && localize.isPremiumFeatureAccessible && settingsTab === 'whitelabel' && <WhiteLabelSettings />}
            </div>
        </div>
    )
}

const ConnectSettings = () => {
    return (
        <>
            {convertTruthyFalsyValue(localize.isConnected) ? <Connected /> : <NotConnected />}
        </>
    )
}

const WhiteLabelSettings = () => {

    const { formData, setFormData, formSaving, setFormSaving } = useContext(ResponsiveContext);

    useEffect(() => {

        if (wp?.media) {
            wp.media.model.settings.post.id = 0;
        }

    }, []);

    const openMediaUploader = (fieldName) => {

        const mediaUploader = wp.media({
            title: 'Select Image',
            button: {
                text: 'Use this image',
            },
            multiple: false,
            library: {
                type: 'image',
            },
        });

        mediaUploader.on('select', () => {

            const attachment = mediaUploader
                .state()
                .get('selection')
                .first()
                .toJSON();

            setFormData((prev) => ({
                ...prev,
                [fieldName]: attachment.url,
            }));
        });

        mediaUploader.open();
    };

    const handleChange = (e) => {

        const { name, value, type, checked } = e.target;

        setFormData((prev) => ({
            ...prev,
            [name]: type === 'checkbox'
                ? checked
                : value,
        }));
    };

    const saveWLData = async () => {

        if (!localize?.isRSTActivated) {
            return;
        }

        setFormSaving(true);

        const form = new FormData();

        form.append("action", "responsive-pro-white-label-settings");
        form.append("_nonce", localize?.whitelabelNonce);

        Object.entries(formData).forEach(
            ([key, value]) => {
                form.append(key, value);
            }
        );

        const response = await fetch(localize.ajaxurl, {
            method: "POST",
            body: form,
        });

        response.status === 200
            ? displayToast("Settings Saved", "success")
            : displayToast("Error", "error");

        setFormSaving(false);

        window.location.reload();
        return response.json();
    };

    const isValidImageURL = (url) => {
        return /^https?:\/\/.+\.(jpg|jpeg|png|gif|webp|svg)$/i.test(
            url.trim()
        );
    };

    return (
        <div className="flex flex-col gap-5 p-8 bg-white border border-slate-100 rounded-[10px]">
            <span className="text-slate-900 font-medium text-2xl leading-8">White Label Settings</span>
            <div className="flex flex-col gap-3.5">
                <label className="text-gray-500 text-base leading-6 font-normal">Author Name</label>
                <input
                    type="text"
                    className="m-0 h-12.5 bg-white! border! border-slate-300! rounded-lg!"
                    autoComplete="off"
                    onChange={handleChange}
                    name="authorName"
                    value={formData.authorName}
                />
            </div>
            <div className="flex flex-col gap-3.5">
                <label className="text-gray-500 text-base leading-6 font-normal">Website URL</label>
                <input
                    type="text"
                    className="m-0 h-12.5 bg-white! border! border-slate-300! rounded-lg!"
                    autoComplete="off"
                    onChange={handleChange}
                    name="websiteURL"
                    value={formData.websiteURL}
                />
            </div>
            <div className="flex flex-col gap-3.5">
                <label className="text-gray-500 text-base leading-6 font-normal">Theme Name</label>
                <input
                    type="text"
                    className="m-0 h-12.5 bg-white! border! border-slate-300! rounded-lg!"
                    autoComplete="off"
                    onChange={handleChange}
                    name="themeName"
                    value={formData.themeName}
                />
            </div>
            <div className="flex flex-col gap-3.5">
                <label className="text-gray-500 text-base leading-6 font-normal">Theme Description</label>
                <textarea
                    type="text"
                    rows={3}
                    className="m-0 bg-white! border! border-slate-300! rounded-lg!"
                    autoComplete="off"
                    onChange={handleChange}
                    name="themeDesc"
                >
                    {formData.themeDesc}
                </textarea>
            </div>
            <div className="flex flex-col gap-2">
                <div className="flex flex-col gap-3.5">
                    <label className="text-gray-500 text-base leading-6 font-normal">Theme Screenshot</label>
                    {isValidImageURL(
                        formData.themeScreenshotURL
                    ) && (
                            <img
                                src={
                                    formData.themeScreenshotURL
                                }
                                alt="Theme Screenshot Preview"
                                className="w-64 h-auto border rounded-md mt-2 object-cover"
                            />
                        )}
                    <div className="flex">
                        <input
                            type="text"
                            autoComplete="off"
                            onChange={handleChange}
                            name="themeScreenshotURL"
                            placeholder="Enter icon URL..."
                            className="w-full m-0 h-12.5 bg-white! border! border-slate-300! rounded-lg! rounded-tr-none! rounded-br-none! placeholder:text-slate-400"
                            value={formData?.themeScreenshotURL}
                        />
                        <button
                            onClick={() =>
                                openMediaUploader('themeScreenshotURL')
                            }
                            className="py-3.5 px-2.5 text-white bg-slate-500 text-sm leading-5 font-medium border border-slate-500 rounded-tr-md rounded-br-md cursor-pointer">
                            Upload
                        </button>
                    </div>
                </div>
                <span className="text-slate-400 font-normal text-xs leading-4">The recommended image size is 1200px wide and 900px tall.</span>
            </div>
            <div className="flex flex-col gap-2">
                <div className="flex flex-col gap-3.5">
                    <label className="text-gray-500 text-base leading-6 font-normal">Theme Icon</label>
                    {isValidImageURL(
                        formData.themeIconURL
                    ) && (
                            <img
                                src={
                                    formData.themeIconURL
                                }
                                alt="Theme Screenshot Preview"
                                className="w-64 h-auto border rounded-md mt-2 object-cover"
                            />
                        )}
                    <div className="flex">
                        <input
                            type="text"
                            autoComplete="off"
                            className="w-full m-0 h-12.5 bg-white! border! border-slate-300! rounded-lg! rounded-tr-none! rounded-br-none! placeholder:text-slate-400"
                            name="themeIconURL"
                            value={formData.themeIconURL}
                            placeholder="Enter image URL..."
                            onChange={handleChange}
                        />
                        <button
                            className="py-3.5 px-2.5 text-white bg-slate-500 text-sm leading-5 font-medium border border-slate-500 rounded-tr-md rounded-br-md cursor-pointer"
                            onClick={() =>
                                openMediaUploader(
                                    'themeIconURL'
                                )
                            }
                        >
                            Upload
                        </button>
                    </div>
                </div>
                <span className="text-slate-400 font-normal text-xs leading-4">The recommended icon should have some background to get adjusted properly.</span>
            </div>
            <div className="flex gap-2 items-center">
                <input
                    type="checkbox"
                    id="resp-hide-whitelabel-settings"
                    className="m-0! shadow-[0px_1px_2px_0px_rgba(0,0,0,0.05)]! border! border-blue-600! rounded-sm!"
                    name="hideSettings"
                    checked={formData.hideSettings}
                    onChange={handleChange}
                />
                <label htmlFor="resp-hide-whitelabel-settings" className="text-slate-500 font-normal text-sm leading-5">Hide White Label Settings</label>
            </div>
            <div>
                <span className="text-gray-600 font-bold text-sm leading-5">Note: </span>
                <span className="text-gray-600 font-medium text-sm leading-5">Enable this option to hide White Label settings. Re-activate the Responsive Starter Templates to enable this settings tab again.</span>
            </div>
            <button onClick={saveWLData} disabled={formSaving} className={`self-start py-2.5 px-3.5 text-white bg-blue-600 text-sm leading-5 font-medium rounded-md border border-blue-600 ${formSaving ? 'cursor-not-allowed' : 'cursor-pointer'}`}>{formSaving ? 'Saving...' : 'Save Changes'}</button>
        </div>
    )
}

const Connected = () => {

    const [ isSyncing, setIsSyncing ] = useState(false);

    const syncPlan = async () => {

        try {

            setIsSyncing(true);

            const formData = new FormData();

            formData.append(
                'action',
                'cyberchimps_app_sync_user_plan'
            );

            formData.append(
                '_ajax_nonce',
                localize?.connectionNonce
            );

            const response = await fetch(
                localize.ajaxurl,
                {
                    method: 'POST',
                    body: formData,
                }
            );

            const result = await response.json();

            setIsSyncing(false);
            
            displayToast("Your plan details are updated.", "success");

            window.location.reload();

        } catch (error) {
            console.error(error);
        }
    };

    const isButtonDisabled = localize?.lastSync === 'yes' || isSyncing;
    const isUpToDate = localize?.lastSync === 'yes';

    return (
        <div className="flex flex-col gap-8 p-8 bg-white border border-slate-100 rounded-[10px]">
            <div className="flex self-start items-center gap-2.5 py-2 px-4 bg-green-50 border border-green-700 rounded-3xl">
                {Icons.connected}
                <span className="text-green-700 text-sm leading-5 font-medium">Connected</span>
            </div>
            <div className="flex flex-col gap-4">
                <span className="text-slate-900 text-2xl leading-8 font-medium">Your website is connected to Cyberchimps Responsive</span>
                <span className="text-slate-800 text-base leading-6 font-normal">You can access all the plugin settings on the web and unlock new features</span>
                <div className="flex flex-col gap-1.5">
                    <div>
                        <span className="text-slate-800 font-bold text-base leading-6">Email: </span><span className="text-slate-800 font-normal text-base leading-6">{localize?.userEmail}</span>
                    </div>
                    <div>
                        <span className="text-slate-800 font-bold text-base leading-6">Plan: </span><span className="text-slate-800 font-normal text-base leading-6">{localize?.userPlan}</span>
                    </div>
                </div>
            </div>
            <div className="flex gap-6">
                <button
                    onClick={() => window.location.href = localize?.rst_redirect}
                    className="py-2.5 px-3.5 text-white bg-blue-600 text-sm leading-5 font-medium rounded-md border border-blue-600 cursor-pointer"
                >
                    Start Importing Templates
                </button>
                <button
                    className="rst-delete-auth relative py-2.5 px-3.5 text-red-500 bg-white text-sm leading-5 font-medium rounded-md border border-red-500 cursor-pointer"
                >
                    Disconnect <span id="loader"></span>
                </button>
                <button 
                    data-tooltip="Syncs after every 24 hours" 
                    onClick={syncPlan} 
                    disabled={isButtonDisabled} 
                    className={`
                        resp-sync-auth flex items-center relative py-2.5 px-3.5 bg-white leading-5 font-medium rounded-md border cursor-pointer
                        ${isUpToDate ? 'border-neutral-400' : 'border-lime-600'} 
                        ${isSyncing ? 'resp-is-syncing' : ''} 
                        disabled:cursor-not-allowed disabled:opacity-60
                    `}
                >
                    {Icons.sync}
                </button>
            </div>
        </div>
    )
}

const NotConnected = () => {
    return (
        <div className="flex flex-col gap-6 p-8 bg-white border border-slate-100 rounded-[10px]">
            <span className="text-slate-900 text-2xl leading-8 font-medium">Connect Your Account to Activate Responsive Pro</span>
            <span className="text-slate-800 text-base leading-6 font-normal">Connect your website using the email address associated with your CyberChimps account. Connecting validates your purchase and unlocks access to your Pro Features and Starter Templates based on your plan.</span>
            <div className="flex gap-6">
                <button className="rst-start-auth rst-start-auth-exist relative py-2.5 px-3.5 text-white bg-blue-600 text-sm leading-5 font-medium rounded-md border border-blue-600 cursor-pointer">Connect Account & Activate
                    <span id="loader"></span>
                </button>
            </div>
        </div>
    )
}

export default Settings