import { __ } from "@wordpress/i18n";
import { useLocation } from 'react-router-dom';

/**
 * The Settings screen (Connect, White Label, Elementor Widgets and Extensions) is rendered by the
 * Responsive Pro plugin. This screen only prints the element Pro mounts its app into, and tells it
 * which tab to open. Pro flags that it does this with `localize.proSettingsPanel`.
 */
const Settings = () => {

    const location = useLocation();
    const initialTab = location.state?.tab || 'connect';

    if (!localize?.proSettingsPanel) {
        return (
            <div className="flex xl:mx-14 md:mx-15 my-16">
                <div className="w-full rounded-3xl p-10 bg-white">
                    <p className="m-0 text-slate-900 text-2xl leading-8 font-medium">{__('Settings are provided by Responsive Pro', 'responsive')}</p>
                    <p className="mt-3 mb-0 text-slate-600 text-base leading-6 font-normal">{__('Install and activate the latest version of the Responsive Pro plugin to manage your account connection, White Label and widget settings here.', 'responsive')}</p>
                </div>
            </div>
        );
    }

    return <div id="rpro-settings-root" data-initial-tab={initialTab}></div>;
};

export default Settings;
