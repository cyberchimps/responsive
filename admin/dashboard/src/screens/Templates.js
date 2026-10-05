import { __ } from "@wordpress/i18n";
import { useState } from "react";
import InstallButton from "../components/InstallButton";
import PluginTab from "../components/PluginTab";

const Templates = () => {

  const [buttonText, setButtonText] = useState(localize?.rst_templates_status);

  return (
    <PluginTab
      bg={localize?.responsiveurl + "admin/images/rst-template-preview.jpg"}
      logo={localize.responsiveurl + 'admin/images/rst_sm_logo.svg'}
      heading={__('Responsive Starter Templates', 'responsive')}
      desc={__('Build stunning sites fast with 250+ ready templates. Install the free Responsive Starter Templates plugin to get started.', 'responsive')}
    >
      <InstallButton
        type="plugin"
        status={localize?.rst_templates_status}
        nonce={localize.rst_templates_nonce}
        redirect={localize.rst_templates_redirect}
        buttonText={buttonText}
        setButtonText={setButtonText}
        slug="responsive-add-ons"
      />
    </PluginTab>
  )
}

export default Templates;