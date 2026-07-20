const PluginTab = ({ children, bg, logo, heading, desc }) => {
    return (
        <div className="xl:mx-14 md:mx-15 m-16">
            <div className="py-10" style={{ backgroundImage: 'url(' + bg + ')' }}>
                <div className="flex justify-center items-center">
                    <div className="flex flex-col gap-6 w-3/5 p-12 bg-white border border-gray-200 rounded shadow-2xl">
                        <div className="flex justify-center">
                            <img className="w-12.5" src={logo} alt={heading + " Logo"} />
                        </div>
                        <div className="flex flex-col items-center gap-2.5">
                            <p className="m-0 text-center font-bold text-2xl text-gray-600">{heading}</p>
                            <p className="m-0 w-125 text-center font-normal text-base text-gray-500">{desc}</p>
                        </div>
                        <div className="flex flex-col items-center gap-4">
                            {children}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    )
}

export default PluginTab