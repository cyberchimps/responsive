import { __ } from "@wordpress/i18n";
import { useState } from "react";
import InstallButton from "../components/InstallButton";

const Templates = () => {

  const [buttonText, setButtonText] = useState(localize?.rst_status);

  return (
    <div className="xl:mx-14 md:mx-15 m-16">
      <div className="py-10" style={{ backgroundImage: 'url(' + localize?.responsiveurl + "admin/images/rst-template-preview.jpg" + ')' }}>
        <div className="flex justify-center items-center">
          <div className="flex flex-col gap-6 w-3/5 p-12 bg-white border border-gray-200 rounded shadow-2xl">
            <div className="flex justify-center">
              <img className="w-12.5" src={localize.responsiveurl + 'admin/images/rst.svg'} alt="Responsive Plus Logo" />
            </div>
            <div className="flex flex-col items-center gap-2.5">
              <p className="m-0 text-center font-bold text-2xl text-gray-600">{__('Responsive Starter Templates', 'responsive')}</p>
              <p className="m-0 w-125 text-center font-normal text-base text-gray-500">{__('Build stunning sites fast with 250+ ready templates. Install the free Responsive Plus plugin to get started.', 'responsive')}</p>
            </div>
            <div className="flex flex-col items-center gap-4">
              <InstallButton
                type="plugin"
                status={localize?.rst_status}
                nonce={localize.rst_nonce}
                redirect={localize.rst_redirect}
                buttonText={buttonText}
                setButtonText={setButtonText}
                slug="responsive-add-ons"
              />
            </div>
          </div>
        </div>
      </div>
    </div>
  )
}

export default Templates;