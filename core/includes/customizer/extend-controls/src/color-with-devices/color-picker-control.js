import PropTypes from 'prop-types';
import { __ } from '@wordpress/i18n';
import { Component } from '@wordpress/element';
import {Button, ColorPicker } from '@wordpress/components';

class ColorPickerControlWithDevices extends Component {
	constructor( props ) {

		super( ...arguments );
		this.onChangeComplete = this.onChangeComplete.bind( this );
		this.onPaletteChangeComplete = this.onPaletteChangeComplete.bind( this );
		this.open = this.open.bind( this );
		this.onColorClearClick = this.onColorClearClick.bind( this );

		this.state = {
			isVisible: false,
			refresh: false,
			color: this.props.color,
			modalCanClose: true,
			backgroundType: this.props.backgroundType,
			inputattr: this.props.inputattr,
			defaultValue: this.props.defaultValue,
			opacityZero: this.extractOpacity(this.props.color) === 0,
		};
	}

	onResetRefresh() {
		if ( this.state.refresh === true ) {
			this.setState( { refresh: false } );
		} else {
			this.setState( { refresh: true } );
		}
	}

	extractOpacity(colorStr) {
		if (!colorStr) return 1;

		if (colorStr === 'transparent') {
			return 0;
		}

		// Match rgba(r, g, b, a)
		const rgbaMatch = colorStr.match(/rgba\(\s*\d+,\s*\d+,\s*\d+,\s*(\d*\.?\d+)\s*\)/);
		if (rgbaMatch) {
			return parseFloat(rgbaMatch[1]);
		}

		return 1;
	}

	render() {

		const {
			refresh,
			modalCanClose,
			isVisible,
		} = this.state


		const toggleVisible = () => {
			if ( refresh === true ) {
				this.setState( { refresh: false } );
			} else {
				this.setState( { refresh: true } );
			}
			this.setState( { isVisible: true } );

			const currentElementID = this.state.inputattr.content.match(/id="([^"]*)"/)[1];
			document.getElementById(currentElementID).style.paddingBottom ='480px';
		};
		
		const toggleClose = () => {
			if ( modalCanClose ) {
				if ( isVisible === true ) {
					this.setState( { isVisible: false } );
				}
				const currentElementID = this.state.inputattr.content.match(/id="([^"]*)"/)[1];
				document.getElementById(currentElementID).style.paddingBottom ='0';
			}
		};
		let finalpaletteColors = [];
		let count = 0;
		let defaultpalette = this.state.inputattr.colorPalettes;
		const defaultColorPalette = [...defaultpalette];

		defaultColorPalette.forEach( singleColor => {
			let paletteColors = {};
			Object.assign( paletteColors, { name: count + '_' + singleColor } );
			Object.assign( paletteColors, { color: singleColor } );
			finalpaletteColors.push(paletteColors);
			count ++;
		});
		let defaultValue = this.state.defaultValue;
		let htmlLink = null;
		const {
		    inputattr
		} = this.state;
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
					
					<Button className={ isVisible ? 'button wp-color-result wp-picker-open' : 'button wp-color-result ' } onClick={ () => { isVisible ? toggleClose() : toggleVisible() } }
						aria-expanded='false' style={{backgroundColor:this.props.color}}
					>
					</Button>
					<div className="wp-picker-holder">
						{ isVisible && (
							<>	
									{ refresh && (
										<>
											<ColorPicker
												color={ this.props.color }
												onChangeComplete={ ( color ) => this.onChangeComplete( color ) }
											/>
										</>
									) }
									{ ! refresh &&  (
										<>
											<ColorPicker
												color={ this.props.color }
												onChangeComplete={ ( color ) => this.onChangeComplete( color ) }
											/>

										</>
									) }
								{ this.state.opacityZero && 
									<div className='responsive-color-picker-zero-opac'><strong>{ __( 'Note: ', 'responsive' ) }</strong>{ __( 'Opacity is set to zero. Increase it to make the color visible.', 'responsive' ) }</div>
								}
								<button type="button" onClick = { () => { this.onColorClearClick(defaultValue) } } className="responsive-clear-btn-inside-picker components-button components-circular-option-picker__clear is-secondary is-small">{ __( 'Default', 'responsive' ) }</button>
					
								
							</>
								
						) }
					</div>
				</div>
			</>
		);
	}

	onColorClearClick(color) {
		if( color === 'transparent' ) {
			this.setState({ opacityZero: true });
		}
		if ( this.state.refresh === true ) {
			this.setState( { refresh: false } );
		} else {
			this.setState( { refresh: true } );
		}
		this.props.onChangeComplete( color, 'color' );
		wp.customize.previewer.refresh();
	}

	onChangeComplete( color ) {
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
		this.props.onChangeComplete( newColor, 'color' );
	}

	onPaletteChangeComplete( color ) {
		this.setState( { color: color } );
		if ( this.state.refresh === true ) {
			this.setState( { refresh: false } );
		} else {
			this.setState( { refresh: true } );
		}
		this.props.onChangeComplete( color, 'color' );
	}


	open( open ) {
		this.setState( { modalCanClose: false } );
		open()
	}
}

ColorPickerControlWithDevices.propTypes = {
	color: PropTypes.string,
	usePalette: PropTypes.bool,
	palette: PropTypes.string,
	presetColors: PropTypes.object,
	onChangeComplete: PropTypes.func,
	onPaletteChangeComplete: PropTypes.func,
	onChange: PropTypes.func,
	customizer: PropTypes.object
};

export default ColorPickerControlWithDevices;
