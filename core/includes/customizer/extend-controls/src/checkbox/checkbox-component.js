import PropTypes from 'prop-types';
import { useState } from 'react';

const CheckboxComponent = props => {

    const [props_value, setPropsValue] = useState(props.control.setting.get());

    const updateValues = () => {
        setPropsValue(!props_value);
        props.control.setting.set(!props_value);
    };

    const {
        label,
        id
    } = props.control.params;

    let htmlLabel = null;

    if (label) {
        htmlLabel = <label htmlFor={id}>{label}</label>;
    }

    return <>
        <span className="customize-inside-control-row checkbox-with-react">
            <input id={id} type="checkbox" data-value={props_value} value={props_value} onChange={() => updateValues()} checked={props_value} />
            {htmlLabel}
        </span>
    </>;
};

CheckboxComponent.propTypes = {
    control: PropTypes.object.isRequired
};

export default React.memo(CheckboxComponent);
