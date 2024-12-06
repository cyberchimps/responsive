import PropTypes from "prop-types";
import { useState, useEffect } from "react";
import { Button, ButtonGroup } from '@wordpress/components';
import Icons from '../icons';

const RowLayout = (props) => {
    const [value, setValue] = useState(props.control.setting.get());
    const [columns, setColumns] = useState(1);

    const { label } = props.control.params;

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
    };

    const controlParams = props.control.params.input_attrs
        ? {
              ...defaultParams,
              ...props.control.params.input_attrs,
          }
        : defaultParams;

        useEffect(() => {
            if (controlParams.footer) {

                const columnsKey = props.customizer(`responsive_footer_${controlParams.footer}_columns`);
                const initialColumns = parseInt(columnsKey.get(), 10);
                setColumns(initialColumns);

                // Listen for changes to the columns setting
                columnsKey.bind((newColumns) => {
                    if( newColumns == 1 ) {
                        updateValues('full');
                    } else if( newColumns > 1 ) {
                        updateValues('equal');
                    }
                    setColumns(parseInt(newColumns, 10));
                });
            }
        }, [props.customizer, controlParams.footer]);

    const iconsMap = controlParams.desktop[`column${columns}`] || {};

    const updateValues = (newValue) => {
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
        props.control.setting.set(newValue);
        setValue(newValue);
    };

    return (
        <div className="responsive-row-layout-wrapper">
            <div className="responsive-row-layout-control-label">
                <span className="customize-control-title">{label}</span>
            </div>
            <ButtonGroup className="responsive-radio-container-control">
                {Object.keys(iconsMap).map((item) => (
                    <Button
                        key={item}
                        isTertiary
                        className={`responsive-btn-item-${item} ${
                            item === value ? 'active-radio' : ''
                        }`}
                        onClick={() => updateValues(item)}
                    >
                        {iconsMap[item].icon && (
                            <span className="responsive-radio-icon">
                                {Icons[iconsMap[item].icon]}
                            </span>
                        )}
                    </Button>
                ))}
            </ButtonGroup>
        </div>
    );
};

RowLayout.propTypes = {
    control: PropTypes.object.isRequired,
};

export default React.memo(RowLayout);
