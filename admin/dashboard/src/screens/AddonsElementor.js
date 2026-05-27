import { __ } from "@wordpress/i18n";
import { useState } from "react";
import InstallButton from "../components/InstallButton";

const AddonsElementor = () => {

    const [buttonText, setButtonText] = useState(localize?.rae_status);

    return (
        <div className="xl:mx-14 md:mx-15 m-16">
            <div className="py-10" style={{ backgroundImage: 'url(' + localize?.responsiveurl + "admin/images/blocks-template-preview.jpg" + ')' }}>
                <div className="flex justify-center items-center">
                    <div className="flex flex-col gap-6 w-3/5 p-12 bg-white border border-gray-200 rounded shadow-2xl">
                        <div className="flex justify-center">
                            <img className="w-12.5" src={localize.responsiveurl + 'admin/images/rae.svg'} alt="Responsive Blocks Addons Logo" />
                        </div>
                        <div className="flex flex-col items-center gap-2.5">
                            <p className="m-0 text-center font-bold text-2xl text-gray-600">{__('Responsive Addons for Elementor', 'responsive')}</p>
                            <p className="m-0 w-125 text-center font-normal text-base text-gray-500">{__('Responsive Addons for Elementor plugin offers a collection of 80+ Elementor widgets to level up your designing process with Elementor. Click the button below to get started.', 'responsive')}</p>
                        </div>
                        <div className="flex flex-col items-center gap-4">
                            <InstallButton
                                type="plugin"
                                status={localize?.rae_status}
                                nonce={localize.rae_nonce}
                                redirect={localize.rae_redirect}
                                buttonText={buttonText}
                                setButtonText={setButtonText}
                                slug="responsive-addons-for-elementor"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    )
}

export default AddonsElementor