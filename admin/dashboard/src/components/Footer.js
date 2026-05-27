import { __ } from "@wordpress/i18n";
import Icons from "../icons";

const Footer = () => {
    return (
        <div className="lg:mx-7.5 md:mx-3.75 mt-16 mb-16 sm:mx-8 text-center">
            <p className="text-[#64748B] text-base inline-flex items-center flex-wrap justify-center gap-1">{__( 'If you like', 'responsive' )} <span className="text-gray-500 font-medium">{__( 'Responsive Theme', 'responsive' )},</span>{__( 'please leave us a', 'responsive' )} <a href={localize.review_link} target="_blank" rel="noopener noreferrer" className="inline-flex items-center"> {Icons.stars} </a> {__( 'rating. Thank you!', 'responsive' )}</p>
            <div className="mt-0.875 mx-auto w-50 border border-gray-200"></div>
            <img className="w-48 mx-auto mt-0.875" src={localize.responsiveurl + 'admin/images/cyberchimps-logo.png'} />
        </div>
    )
}

export default Footer