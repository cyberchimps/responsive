import PropTypes from 'prop-types';

const FlushFontsComponent = props => {

    const onClick = async () => {
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
            // Optional: Show WP Customizer notification
            if (data && data.success) {
                wp.customize.notifications.add('responsive_flush_fonts_success', new wp.customize.Notification('responsive_flush_fonts_success', {
                    message: responsiveFlushFonts?.i18n?.success || 'Done',
                    type: 'success'
                }));
            } else {
                wp.customize.notifications.add('responsive_flush_fonts_error', new wp.customize.Notification('responsive_flush_fonts_error', {
                    message: data?.data?.message || responsiveFlushFonts?.i18n?.error || 'Error',
                    type: 'error'
                }));
            }
        } catch (e) {
            wp.customize.notifications.add('responsive_flush_fonts_error', new wp.customize.Notification('responsive_flush_fonts_error', {
                message: responsiveFlushFonts?.i18n?.error || 'Error',
                type: 'error'
            }));
        }
    };

    const { label, description, button_text, id } = props.control.params;

    return <>
        {label ? <label htmlFor={id} className="customize-control-title">{label}</label> : null}
        {description ? <span className="customize-control-description">{description}</span> : null}
        <button type="button" className="responsive-flush-button" onClick={onClick}>{button_text || 'Flush Cache'}</button>
    </>;
};

FlushFontsComponent.propTypes = {
    control: PropTypes.object.isRequired
};

export default FlushFontsComponent;


