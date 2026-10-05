import { __ } from "@wordpress/i18n";
import { useState } from "react";
import InstallButton from "../components/InstallButton";
import PluginTab from "../components/PluginTab";

const AddonsElementor = () => {

    const [buttonText, setButtonText] = useState(localize?.rae_status);

    return (
        <PluginTab
            bg={localize?.responsiveurl + "admin/images/widgets-template-preview.jpg"}
            logo={localize.responsiveurl + 'admin/images/rae.svg'}
            heading={__('Responsive Addons for Elementor', 'responsive')}
            desc={__('Responsive Addons for Elementor plugin offers a collection of 80+ Elementor widgets to level up your designing process with Elementor. Click the button below to get started.', 'responsive')}
        >
            <InstallButton
                type="plugin"
                status={localize?.rae_status}
                nonce={localize.rae_nonce}
                redirect={localize.rae_redirect}
                buttonText={buttonText}
                setButtonText={setButtonText}
                slug="responsive-addons-for-elementor"
            />
        </PluginTab>
    )
}

export default AddonsElementor