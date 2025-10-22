import PropTypes from 'prop-types';
import { useState } from '@wordpress/element';

const FlushFontsComponent = props => {
    const [buttonState, setButtonState] = useState({
        text: props.control.params.button_text || 'Flush Cache',
        disabled: false
    });

    const onClick = async () => {
        setButtonState({
            text: 'Flushing...',
            disabled: true
        });

        try {
            const params = new URLSearchParams();
            params.append('action', 'responsive_flush_local_fonts_cache');
            params.append('_ajax_nonce', responsiveFlushFonts?.nonce || '');

            const res = await fetch(responsiveFlushFonts.ajaxurl, {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8' },
                body: params.toString()
            });
            const data = await res.json();
            
            if (data && data.success) {
                setButtonState({
                    text: responsiveFlushFonts?.i18n?.success || 'Cache Flushed Successfully',
                    disabled: true
                });
            } else {
                setButtonState({
                    text: (data?.data?.message || responsiveFlushFonts?.i18n?.error || 'Error') + ' - Please refresh and try again',
                    disabled: true
                });
            }
        } catch (e) {
            setButtonState({
                text: (responsiveFlushFonts?.i18n?.error || 'Error') + ' - Please refresh and try again',
                disabled: true
            });
        }
    };

    const { label, description, button_text, id } = props.control.params;

    return <>
        {label ? <label htmlFor={id} className="customize-control-title">{label}</label> : null}
        {description ? <span className="customize-control-description">{description}</span> : null}
        <button type="button" className="responsive-flush-button" onClick={onClick} disabled={buttonState.disabled}>{buttonState.text}</button>
    </>;
};

FlushFontsComponent.propTypes = {
    control: PropTypes.object.isRequired
};

export default FlushFontsComponent;


