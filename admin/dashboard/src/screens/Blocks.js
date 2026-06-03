import { __ } from "@wordpress/i18n";
import { useState } from "react";
import InstallButton from "../components/InstallButton";
import PluginTab from "../components/PluginTab";

const Blocks = () => {

  const [buttonText, setButtonText] = useState(localize?.rbea_status);

  return (
    <PluginTab
      bg={localize?.responsiveurl + "admin/images/blocks-template-preview.jpg"}
      logo={localize.responsiveurl + 'admin/images/rbea_logo.svg'}
      heading={__('Responsive Blocks Addons', 'responsive')}
      desc={__('Responsive Blocks plugin offers a library of fully functional blocks that extend the customizability of your WordPress block editor. Click the button below to get started.', 'responsive')}
    >
      <InstallButton
        type="plugin"
        status={localize?.rbea_status}
        nonce={localize.rbea_nonce}
        redirect={localize.rbea_redirect}
        buttonText={buttonText}
        setButtonText={setButtonText}
        slug="responsive-block-editor-addons"
      />
    </PluginTab>
  )
}

export default Blocks