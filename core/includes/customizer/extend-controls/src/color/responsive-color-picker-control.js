import PropTypes from 'prop-types';
import { __ } from '@wordpress/i18n';
import { Component } from '@wordpress/element';
import {Button, ColorPicker, ColorPalette, TabPanel, GradientPicker } from '@wordpress/components';

class ResponsiveColorPickerControl extends Component {

	constructor( props ) {

		super( ...arguments );
		this.onChangeComplete = this.onChangeComplete.bind( this );
		this.onPaletteChangeComplete = this.onPaletteChangeComplete.bind( this );
		this.open = this.open.bind( this );
		this.onColorClearClick = this.onColorClearClick.bind( this );

		this.state = {
			isVisible: false,
			refresh: false,
			// color: this.props.color,
			// Initialize color from props, handling potential object or string
            color: this.determineInitialColor(props.color),
			modalCanClose: true,
			backgroundType: this.props.backgroundType,
			inputattr: this.props.inputattr,
			opacityZero: this.extractOpacity(this.props.color) === 0,
			inputSettings: this.props.inputSettings || {},
			is_gradient_available: this.props.is_gradient_available || false,
			activeTab: props.colorType || 'color',
			gradient: this.props.gradient ? this.props.gradient : 'linear-gradient(135deg, rgba(255,255,255,1) 0%, rgba(0,0,0,1) 100%)',
		};
	}

	// Helper for constructor to ensure color is a string for internal state
    determineInitialColor(colorProp) {
        if (typeof colorProp === 'object' && colorProp?.hex) {
            return colorProp.hex;
        }
        return colorProp || ''; // Ensure it's a string
    }

	extractOpacity(colorStr) {
		if (!colorStr) return 1;

		if (typeof colorStr === 'string') {
			if (colorStr === 'transparent') return 0;

			const rgbaMatch = colorStr.match(/rgba\(\s*\d+,\s*\d+,\s*\d+,\s*(\d*\.?\d+)\s*\)/);
			return rgbaMatch ? parseFloat(rgbaMatch[1]) : 1;
		}

		// If color is an object
		if (typeof colorStr === 'object' && colorStr.rgb && typeof colorStr.rgb.a !== 'undefined') {
			return colorStr.rgb.a;
		}

		return 1;
	}

	static getDerivedStateFromProps(nextProps, prevState) {
		let newState = null;

        // Sync activeTab if prop changes
        if (nextProps.colorType !== prevState.activeTab) {
            newState = { ...newState, activeTab: nextProps.colorType };
        }

        // Sync gradient if prop changes
        if (nextProps.gradient !== prevState.gradient) {
            newState = { ...newState, gradient: nextProps.gradient };
        }

        // Sync isVisible if isOpen prop changes
        if (nextProps.isOpen !== undefined && nextProps.isOpen !== prevState.isVisible) {
            newState = { ...newState, isVisible: nextProps.isOpen };
        }

		const nextColorValue = nextProps.color;
        let derivedColorString = prevState.color; // Keep current color by default

		if (typeof nextColorValue === 'string' && !nextColorValue.startsWith('linear-gradient(') && nextColorValue !== prevState.color) {
			derivedColorString = nextColorValue;
	   	} else if (typeof nextColorValue === 'object' && nextColorValue?.hex && nextColorValue.hex !== prevState.color) {
			   derivedColorString = nextColorValue.hex;
	   	}

	   	if (derivedColorString !== prevState.color) {
			   newState = { ...newState, color: derivedColorString };
	   	}

		const newOpacityZero = ResponsiveColorPickerControl.prototype.extractOpacity(derivedColorString) === 0;
		if (newOpacityZero !== prevState.opacityZero) {
		   newState = { ...newState, opacityZero: newOpacityZero };
		}

		return newState; // Return the new state object or null

	}

	componentDidUpdate(prevProps, prevState){
		const { inputattr, is_gradient_available } = this.props;
		const { activeTab } = this.state;
		if ( prevProps.inputattr !== inputattr || prevProps.is_gradient_available !== is_gradient_available ||	prevState.activeTab !== activeTab ) {
			const currentElementID = inputattr.content.match(/id="([^"]*)"/)[1];
			if( ! currentElementID ) return;
			const parentEl     = document.getElementById(currentElementID);
			const pickerHolder = parentEl.querySelector('.wp-picker-holder');
			const pickerHeight = pickerHolder.offsetHeight;
			document.getElementById(currentElementID).style.paddingBottom =`${pickerHeight + 20}px`;
		}
	}

	render() {

		const {
			refresh,
			modalCanClose,
			isVisible,
			inputattr,
			gradient,
			is_gradient_available,
			activeTab,
			color
		} = this.state;

		// Determine the background style based on activeTab
        const buttonBackgroundStyle = activeTab === 'gradient' && is_gradient_available
            ? { background: gradient } // Apply gradient string
            : { backgroundColor: color }; // Apply solid color from state.color

		const toggleVisible = (desiredTab = this.state.activeTab) => {
			if ( refresh === true ) {
				this.setState( { refresh: false } );
			} else {
				this.setState( { refresh: true } );
			}
			this.setState( { isVisible: true } );

			const currentElementID = inputattr.content.match(/id="([^"]*)"/)[1];
			const parentEl = document.getElementById(currentElementID);
			const pickerHolder = parentEl.querySelector('.wp-picker-holder');
			const pickerHeight = pickerHolder.offsetHeight;
			document.getElementById(currentElementID).style.paddingBottom =`${pickerHeight + 20}px`;
		};
		
		const toggleClose = () => {
			if ( modalCanClose ) {
				if ( isVisible === true ) {
					this.setState( { isVisible: false } );
				}
				const currentElementID = inputattr.content.match(/id="([^"]*)"/)[1];
				document.getElementById(currentElementID).style.paddingBottom ='0';
			}
		};
		let finalpaletteColors = [];
		let count = 0;
		let defaultpalette = inputattr.colorPalettes;
		const defaultColorPalette = [...defaultpalette];

		defaultColorPalette.forEach( singleColor => {
			let paletteColors = {};
			Object.assign( paletteColors, { name: count + '_' + singleColor } );
			Object.assign( paletteColors, { color: singleColor } );
			finalpaletteColors.push(paletteColors);
			count ++;
		});
		let defaultValue = inputattr.default;
		let htmlLink = null;
		
		htmlLink = inputattr.link;
		if (undefined !== htmlLink) {
	        let splited_values = htmlLink.split("=");
	        if (undefined !== splited_values[1]) {
	            htmlLink = splited_values[1].replace(/"/g, "");
	        }
	    }
		return (
			<>
				
				<div className="wp-picker-container">
					
					<Button
                        className={isVisible ? 'button wp-color-result wp-picker-open' : 'button wp-color-result '}
                        onClick={() => { isVisible ? toggleClose() : toggleVisible(this.state.activeTab) }}
                        aria-expanded='false'
                        style={buttonBackgroundStyle}
                    >
                    </Button>
					<div className="wp-picker-holder">
						{(isVisible && is_gradient_available) ?
							(
								<>
									<TabPanel
										className="responsive-color-picker-tabs"
										activeClass="is-active"
										initialTabName={activeTab}
										onSelect={(tabName) => {
											this.setState({ activeTab: tabName }, () => {
												toggleVisible(tabName);
											});
										}}
										tabs={[
											{
												name: 'color',
												title: __('Color', 'responsive'),
												className: 'color-tab',
											},
											{
												name: 'gradient',
												title: __('Gradient', 'responsive'),
												className: 'gradient-tab',
											},
										]}
									>
										{(tab) => (
											<div className="responsive-color-picker-tab-content">
												{tab.name === 'color' && (
													<ColorPicker
														color={color}
														onChangeComplete={(currentColor) => {
															this.setState({ color: currentColor })
															this.onChangeComplete(currentColor, 'color')
														}}
													/>
												)}
												{tab.name === 'gradient' && (
													<GradientPicker
														value={gradient}
														onChange={(currentGradient) => {
															if(currentGradient === undefined) {
																this.setState({ gradient: '' });
																this.onChangeComplete('', 'gradient');
															} else {
																this.setState({ gradient: currentGradient });
																this.onChangeComplete(currentGradient, 'gradient');
															}
														}}
														clearable={false}
													/>
												)}
											</div>
										)}
									</TabPanel>

									{this.state.opacityZero && (
										<div className="responsive-color-picker-zero-opac">
											<strong>{__('Note: ', 'responsive')}</strong>
											{__('Opacity is set to zero. Increase it to make the color visible.', 'responsive')}
										</div>
									)}

									<Button
										type="button"
										onClick={() => this.onColorClearClick(defaultValue, activeTab)}
										className="responsive-clear-btn-inside-picker components-button is-secondary is-small"
									>
										{__('Default', 'responsive')}
									</Button>
								</>
							) : (isVisible && !is_gradient_available) ? (
								<>
									<ColorPicker
										color={this.props.color}
										onChangeComplete={(color) => this.onChangeComplete(color, 'color')}
									/>

									{this.state.opacityZero && (
										<div className="responsive-color-picker-zero-opac">
											<strong>{__('Note: ', 'responsive')}</strong>
											{__('Opacity is set to zero. Increase it to make the color visible.', 'responsive')}
										</div>
									)}

									<Button
										type="button"
										onClick={() => this.onColorClearClick(defaultValue)}
										className="responsive-clear-btn-inside-picker components-button is-secondary is-small"
									>
										{__('Default', 'responsive')}
									</Button>
								</>
							) : (
								<></>
							)
						}
					</div>
				</div>
			</>
		);
	}

	onColorClearClick(color, type='color') {

		if( color === 'transparent' ) {
			this.setState({ opacityZero: true });
		}
		this.props.onChangeComplete( color, type );
		wp.customize.previewer.refresh();
	}

	onChangeComplete( color, type='color' ) {

		let newColor;

		if ( color.rgb && color.rgb.a !== undefined ) {
			if ( color.rgb.a === 0 ) {
				// Show a notice when opacity is 0
				this.setState({ opacityZero: true });
			} else {
				this.setState({ opacityZero: false });
			}
	
			if ( color.rgb.a !== 1 ) {
				newColor = 'rgba(' +  color.rgb.r + ',' +  color.rgb.g + ',' +  color.rgb.b + ',' + color.rgb.a + ')';
			} else {
				newColor = color.hex;
			}
		} else {
			this.setState({ opacityZero: false });
			newColor = color.hex;
		}
		this.setState( { backgroundType: 'color' } );
		this.props.onChangeComplete( color, type );
	}

	onPaletteChangeComplete( color ) {
		this.setState( { color: color } );
		this.props.onChangeComplete( color, 'color' );
	}


	open( open ) {
		this.setState( { modalCanClose: false } );
		open()
	}
}

ResponsiveColorPickerControl.propTypes = {
	color: PropTypes.string,
	usePalette: PropTypes.bool,
	palette: PropTypes.string,
	presetColors: PropTypes.object,
	onChangeComplete: PropTypes.func,
	onPaletteChangeComplete: PropTypes.func,
	onChange: PropTypes.func,
	customizer: PropTypes.object,
	colorType: PropTypes.string,
	isOpen: PropTypes.bool,
};

export default ResponsiveColorPickerControl;