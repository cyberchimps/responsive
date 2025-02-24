import PropTypes from "prop-types";
import { useState, useEffect, useRef } from "react";
import { Button, ButtonGroup } from '@wordpress/components';
import Icons from '../icons';

const RowLayout = (props) => {

    const currentDeviceRef                  = useRef(currentDevice);
    const [columns, setColumns]             = useState(1);
    const [currentDevice, setCurrentDevice] = useState('desktop');
    const [props_value, setPropsValue]      = useState( props.control.settings );

	const {
		label
	} = props.control.params;

    let labelHtml = null,
        layoutsHtml = null;

    const defaultParams = {
        desktop: {
            column6: {
                equal: { icon: 'sixcol' },
            },
            column5: {
                equal: { icon: 'fivecol' },
            },
            column4: {
                equal: { icon: 'fourcol' },
                'left-forty': { icon: 'lfourforty' },
                'right-forty': { icon: 'rfourforty' },
            },
            column3: {
                equal: { icon: 'threecol' },
                'left-half': { icon: 'lefthalf' },
                'right-half': { icon: 'righthalf' },
                'center-half': { icon: 'centerhalf' },
                'center-wide': { icon: 'widecenter' },
            },
            column2: {
                equal: { icon: 'twocol' },
                'left-heavy': { icon: 'twolheavy' },
                'right-heavy': { icon: 'tworheavy' },
            },
            column1: {
                full: { icon: 'full' },
            },
        },
        tablet: {
            column6: {
                equal: { icon: 'sixcol' },
                row: { icon: 'collapserowsix' },
            },
            column5: {
                equal: { icon: 'fivecol' },
                row: { icon: 'collapserowfive' },
            },
            column4: {
                equal: { icon: 'fourcol' },
                'two-grid': { icon: 'fourgrid' },
                row: { icon: 'collapserowfour' },
            },
            column3: {
                equal: { icon: 'threecol' },
                'left-half': { icon: 'lefthalf' },
                'right-half': { icon: 'righthalf' },
                'center-half': { icon: 'centerhalf' },
                'center-wide': { icon: 'widecenter' },
                'first-row': { icon: 'threefirstrow' },
                'last-row': { icon: 'threelastrow' },
                row: { icon: 'collapserowthree' },
            },
            column2: {
                equal: { icon: 'twocol' },
                'left-heavy': { icon: 'twolheavy' },
                'right-heavy': { icon: 'tworheavy' },
                row: { icon: 'collapserowtwo' },
            },
            column1: {
                full: { icon: 'full' },
            },
        },
        mobile: {
            column6: {
                equal: { icon: 'sixcol' },
                row: { icon: 'collapserowsix' },
            },
            column5: {
                equal: { icon: 'fivecol' },
                row: { icon: 'collapserowfive' },
            },
            column4: {
                equal: { icon: 'fourcol' },
                'two-grid': { icon: 'fourgrid' },
                row: { icon: 'collapserowfour' },
            },
            column3: {
                equal: { icon: 'threecol' },
                'left-half': { icon: 'lefthalf' },
                'right-half': { icon: 'righthalf' },
                'center-half': { icon: 'centerhalf' },
                'center-wide': { icon: 'widecenter' },
                'first-row': { icon: 'threefirstrow' },
                'last-row': { icon: 'threelastrow' },
                row: { icon: 'collapserowthree' },
            },
            column2: {
                equal: { icon: 'twocol' },
                'left-heavy': { icon: 'twolheavy' },
                'right-heavy': { icon: 'tworheavy' },
                row: { icon: 'collapserowtwo' },
            },
            column1: {
                full: { icon: 'full' },
            },
        },
    };

    const controlParams = props.control.params.input_attrs
        ? {
              ...defaultParams,
              ...props.control.params.input_attrs,
          }
        : defaultParams;

    useEffect(() => {
        currentDeviceRef.current = currentDevice;
    }, [currentDevice]);

    useEffect(() => {
        if (! controlParams.footer) return;

        const containerSelector = `#customize-control-responsive_footer_${controlParams.footer}_layout`;
        const buttons           = document.querySelectorAll(`${containerSelector} .responsive-switchers button`);

        if (!buttons.length) return; // Exit if no buttons are found.

        const handleDeviceSwitch = (event) => {
            event.stopPropagation();
            const device = event.currentTarget.getAttribute("data-device");
            if (!device) return;

            setCurrentDevice(device);

            // Get required elements
            const devices       = document.querySelector(`${containerSelector} .responsive-switchers`);
            const control       = event.currentTarget.closest(".customize-control.has-switchers");
            const body          = document.querySelector(".wp-full-overlay");
            const footerDevices = document.querySelector(".wp-full-overlay-footer .devices");

            // Button class
            devices?.querySelectorAll("button").forEach((btn) => btn.classList.remove("active"));
            devices?.querySelector(`button.preview-${device}`)?.classList.add("active");

            // Control class
            control?.querySelectorAll(".control-wrap").forEach((wrap) => wrap.classList.remove("active"));
            control?.querySelector(`.control-wrap.${device}`)?.classList.add("active");
            control?.classList.remove("control-device-desktop", "control-device-tablet", "control-device-mobile");
            control?.classList.add(`control-device-${device}`);

            // Wrapper class
            body?.classList.remove("preview-desktop", "preview-tablet", "preview-mobile");
            body?.classList.add(`preview-${device}`);

            // Panel footer buttons
            footerDevices?.querySelectorAll("button").forEach((btn) => {
                btn.classList.remove("active");
                btn.setAttribute("aria-pressed", false);
            });
            footerDevices?.querySelector(`button.preview-${device}`)?.classList.add("active");
            footerDevices?.querySelector(`button.preview-${device}`)?.setAttribute("aria-pressed", true);

            // Open switchers
            if (event.currentTarget.classList.contains("preview-desktop")) {
                control?.classList.toggle("responsive-switchers-open");
            }
        };

        // Attach event listeners
        buttons.forEach((btn) => btn.addEventListener("click", handleDeviceSwitch));

        const columnsKey     = props.customizer(`responsive_footer_${controlParams.footer}_columns`);
        const initialColumns = parseInt(columnsKey.get(), 10);
        setColumns(initialColumns);

        // Listen for changes to the columns setting
        columnsKey.bind((newColumns) => {

            const layout = Number(newColumns) === 1
                ? 'full' // Use 'full' layout if columns are 1.
                : currentDeviceRef.current === 'mobile'
                    ? 'row'
                    : 'equal';

            if (layout) {
                updateValues(currentDeviceRef.current, layout);
            }
            setColumns(parseInt(newColumns, 10));
        });

        // Cleanup event listeners on unmount.
        return () => {
            buttons.forEach((btn) => btn.removeEventListener("click", handleDeviceSwitch));
        };
    }, [props.customizer, controlParams.footer]);

    const updateValues = (device, newValue) => {
        if ( undefined !== controlParams.footer && controlParams.footer ) {
			let event = new CustomEvent(
				'responsiveUpdateFooterColumns', {
					detail: {
                        trigger: controlParams.rspv_event,
                        item: controlParams.footer,
                    }
				} );
			document.dispatchEvent( event );
		}
		let updateValue = {...props_value};
		updateValue[`${device}`].set(newValue);
		setPropsValue(updateValue);
    };

    if (label) {
		labelHtml = <span className="customize-control-title">
			<span>{label}</span>
			<ul  className="responsive-switchers">
				<li className="desktop">
					<button type="button" className="preview-desktop active" data-device="desktop">
						<i className="dashicons dashicons-desktop"></i>
					</button>
				</li>
				<li className="tablet">
					<button type="button" className="preview-tablet" data-device="tablet">
						<i className="dashicons dashicons-tablet"></i>
					</button>
				</li>
				<li className="mobile">
					<button type="button" className="preview-mobile" data-device="mobile">
						<i className="dashicons dashicons-smartphone"></i>
					</button>
				</li>
			</ul>
		</span>;
	}

    const renderLayoutsHTML = (device, active = '') => {

        const iconsMap = controlParams[device][`column${columns}`] || {};

		return <div className={`${device} control-wrap ${active}`}>
				<ButtonGroup className="responsive-radio-container-control">
                    {Object.keys(iconsMap).map((item) => (
                        <Button
                            key={item}
                            isTertiary
                            className={`responsive-btn-item-${item} ${
                                item === props_value[`${device}`].get() ? 'active-radio' : ''
                            }`}
                            onClick={() => updateValues(device, item)}
                        >
                            {iconsMap[item].icon && (
                                <span className="responsive-radio-icon">
                                    {Icons[iconsMap[item].icon]}
                                </span>
                            )}
                        </Button>
                    ))}
                </ButtonGroup>
		</div>;
	};

    layoutsHtml = <>
        {renderLayoutsHTML('desktop', 'active')}
        {renderLayoutsHTML('tablet')}
        {renderLayoutsHTML('mobile')}
    </>;

    return (
        <div className="responsive-row-layout-wrapper">
            <div className="responsive-row-layout-control-label">
                {labelHtml}
            </div>
            {layoutsHtml}
        </div>
    );
};

RowLayout.propTypes = {
    control: PropTypes.object.isRequired,
    customizer: PropTypes.object.isRequired,
};

export default React.memo(RowLayout);
