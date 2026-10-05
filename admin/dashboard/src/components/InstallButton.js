import { __ } from "@wordpress/i18n";

const InstallButton = ({ type, status, nonce, redirect, buttonText, setButtonText, slug }) => {
    const handleInstall = (e) => {
        e.preventDefault();
        setButtonText(__('Installing...', 'responsive'));

        const installFunction = type === 'theme' ? wp.updates.installTheme : wp.updates.installPlugin;

        installFunction({
            slug: slug,
            success: function () {
                setButtonText(__('Activating...', 'responsive'));
                activatePlugin(nonce, redirect, setButtonText);
            },
            error: function (error) {
                console.error(`${type} installation failed:`, error);
                setButtonText(__('Install Failed', 'responsive'));
            }
        });
    };

    const handleActivate = () => {
        activatePlugin(nonce, redirect, setButtonText);
    };

    switch (status) {
        case 'install':
            return (
                <button
                    onClick={handleInstall}
                    className="mt-1.125 py-2.5 px-3.5 bg-white border border-blue-600 text-blue-600 rounded-md text-sm leading-5 font-medium capitalize cursor-pointer"
                >
                    {buttonText}
                </button>
            );
        case 'activate':
            return (
                <button
                    onClick={handleActivate}
                    className="mt-1.125 py-2.5 bg-white no-border text-blue-600 rounded-md text-sm leading-5 font-medium capitalize cursor-pointer"
                >
                    {buttonText}
                </button>
            );
        case 'activated':
            return (
                <button className="mt-1.125 py-2.5 no-border text-blue-300 bg-white rounded-md text-sm leading-5 font-medium capitalize cursor-not-allowed" disabled>
                    {__( 'Activated', 'responsive' )}
                </button>
            );
        default:
            return (
                <button className="mt-1.125 py-0.625 px-5 border border-slate-500 hover:bg-slate-300 text-slate-500 bg-white rounded-md text-sm leading-5 font-medium capitalize">
                    {buttonText}
                </button>
            );
    }
};

export const activatePlugin = (url, redirect, setButtonText) => {
    if (typeof url === 'undefined' || !url) {
        return;
    }
    setButtonText(__('Activating...', 'responsive'));
    fetch(url, { method: 'GET' })
        .then((response) => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.text();
        })
        .then((data) => {
            if (typeof redirect !== 'undefined' && redirect !== '') {
                window.location.replace(redirect);
            } else {
                window.location.reload();
            }
        })
        .catch((error) => {
            console.log(error);
        });
};

export default InstallButton;