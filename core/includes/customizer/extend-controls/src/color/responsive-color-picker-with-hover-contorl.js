import PropTypes from 'prop-types';
import { __ } from '@wordpress/i18n';
import { Component } from '@wordpress/element';
import { Button, ColorPicker, ColorPalette} from '@wordpress/components';

class ResponsiveColorPickerWithHoverControl extends Component {

	constructor(props) {
		super(...arguments);
		this.onChangeComplete = this.onChangeComplete.bind(this);
		this.onPaletteChangeComplete = this.onPaletteChangeComplete.bind(this);
		this.open = this.open.bind(this);
		this.onColorClearClick = this.onColorClearClick.bind(this);

		this.state = {
			isNormalVisible: false,
			isHoverVisible: false,
			refresh: false,
			color: this.props.color,
			hover_color: this.props.hover_color,
			modalCanClose: true,
			backgroundType: this.props.backgroundType,
			inputattr: this.props.inputattr,
			normalOpacityZero: this.extractOpacity(this.props.color) === 0,
			hoverOpacityZero: this.extractOpacity(this.props.hover_color) === 0,
		};
	}

	onResetRefresh() {
		if (this.state.refresh === true) {
			this.setState({ refresh: false });
		} else {
			this.setState({ refresh: true });
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

    toggleNormalVisible() {		
		this.setState(prevState => ({
			isNormalVisible: !prevState.isNormalVisible,
			isHoverVisible: false,
		}));
		const currentElementID = this.state.inputattr.content.match(/id="([^"]*)"/)[1];
		if( ! this.state.isNormalVisible ) {
			document.getElementById(currentElementID).style.paddingBottom ='480px';
		} else {
			document.getElementById(currentElementID).style.paddingBottom ='0';
		}
	}

	toggleHoverVisible() {
		this.setState(prevState => ({
			isHoverVisible: !prevState.isHoverVisible,
			isNormalVisible: false,
		}));
		const currentElementID = this.state.inputattr.content.match(/id="([^"]*)"/)[1];
		if( ! this.state.isHoverVisible ) {
			document.getElementById(currentElementID).style.paddingBottom ='480px';
		} else {
			document.getElementById(currentElementID).style.paddingBottom ='0';
		}
	}

	render() {

		const {
			refresh,
			modalCanClose,
			isNormalVisible,
			isHoverVisible,
		} = this.state

		let finalpaletteColors = [];
		let count = 0;
		let defaultpalette = this.state.inputattr.colorPalettes;
		const defaultColorPalette = [...defaultpalette];

		defaultColorPalette.forEach(singleColor => {
			let paletteColors = {};
			Object.assign(paletteColors, { name: count + '_' + singleColor });
			Object.assign(paletteColors, { color: singleColor });
			finalpaletteColors.push(paletteColors);
			count++;
		});
		let defaultValue = this.state.inputattr.default;
		const { inputattr } = this.state;

		return (
			<>
				<div className="wp-picker-container">

                    <div className="tooltip-container">
						<Button className={isNormalVisible ? 'button wp-color-result normal-state wp-picker-open' : 'button wp-color-result normal-state'} onClick={() => { this.toggleNormalVisible() }}
							aria-expanded='false' style={{ backgroundColor: this.props.color }}
						>
						</Button>
                        <span className="tooltip-text">{__('Normal', 'responsive')}</span>
                    </div>
					<div className="wp-picker-holder">
						{isNormalVisible && (
							<>
								{refresh ? (
									<ColorPicker
										color={this.props.color}
										onChangeComplete={(color) => this.onChangeComplete(color, 'normal')}
									/>
								) : (
									<ColorPicker
										color={this.props.color}
										onChangeComplete={(color) => this.onChangeComplete(color, 'normal')}
									/>
								)}
								{ this.state.normalOpacityZero && 
									<div className='responsive-color-picker-zero-opac'><strong>{ __( 'Note: ', 'responsive' ) }</strong>{ __( 'Opacity is set to zero. Increase the opacity to see the color changes.', 'responsive' ) }</div>
								}
								<button type="button" onClick={() => { this.onColorClearClick(defaultValue.normal, 'normal') }} className="responsive-clear-btn-inside-picker components-button components-circular-option-picker__clear is-secondary is-small">{__('Default', 'responsive')}</button>
							</>
						)}
					</div>

                    <div className="tooltip-container">
                        <Button className={isHoverVisible ? 'button wp-color-result hover-state wp-picker-open' : 'button wp-color-result hover-state'} onClick={() => { this.toggleHoverVisible() }}
                            aria-expanded='false' style={{ backgroundColor: this.props.hover_color }}
                        >
                        </Button>
                        <span className="tooltip-text">{__('Hover', 'responsive')}</span>
                    </div>
					<div className="wp-picker-holder">
						{isHoverVisible && (
							<>
								{refresh ? (
									<ColorPicker
										color={this.props.hover_color}
										onChangeComplete={(color) => this.onChangeComplete(color, 'hover')}
									/>
								) : (
									<ColorPicker
										color={this.props.hover_color}
										onChangeComplete={(color) => this.onChangeComplete(color, 'hover')}
									/>
								)}
								{ this.state.hoverOpacityZero && 
									<div className='responsive-color-picker-zero-opac'><strong>{ __( 'Note: ', 'responsive' ) }</strong>{ __( 'Opacity is set to zero. Increase it to make the color visible.', 'responsive' ) }</div>
								}
								<button type="button" onClick={() => { this.onColorClearClick(defaultValue.hover, 'hover') }} className="responsive-clear-btn-inside-picker components-button components-circular-option-picker__clear is-secondary is-small">{__('Default', 'responsive')}</button>
							</>
						)}
					</div>
				</div>
			</>
		);
	}

	onColorClearClick(color, type) {

		if( color === 'transparent' && type === 'normal' ) {
			this.setState({ opacityZero: true });
		} else if( color !== 'transparent' && type === 'normal' ) {
			this.setState({ opacityZero: false });
		}
		if( color === 'transparent' && type === 'hover' ) {
			this.setState({ opacityZero: true });
		} else if( color !== 'transparent' && type === 'hover' ) {
			this.setState({ opacityZero: false });
		}

		if (this.state.refresh === true) {
			this.setState({ refresh: false });
		} else {
			this.setState({ refresh: true });
		}
		this.props.onChangeComplete(color, type);
		wp.customize.previewer.refresh();
	}

	onChangeComplete(color, type) {
		let newColor;
		if ( color.rgb && color.rgb.a !== undefined ) {
			if ( color.rgb.a === 0 ) {
				// Show a notice when opacity is 0
				'hover' === type ? this.setState({ hoverOpacityZero: true }) : this.setState({ normalOpacityZero: true });
			} else {
				'hover' === type ? this.setState({ hoverOpacityZero: false }) : this.setState({ normalOpacityZero: false });
			}
	
			if ( color.rgb.a !== 1 ) {
				newColor = 'rgba(' +  color.rgb.r + ',' +  color.rgb.g + ',' +  color.rgb.b + ',' + color.rgb.a + ')';
			} else {
				newColor = color.hex;
			}
		} else {
			this.setState({ hoverOpacityZero: false });
			this.setState({ normalOpacityZero: false });
			newColor = color.hex;
		}

		if (type === 'normal') {
			this.setState({ color: newColor });
		} else if (type === 'hover') {
			this.setState({ hover_color: newColor });
		}

		this.setState({ backgroundType: 'color' });
		this.props.onChangeComplete(newColor, type);
	}

	onPaletteChangeComplete(color) {
		this.setState({ color: color });
		if (this.state.refresh === true) {
			this.setState({ refresh: false });
		} else {
			this.setState({ refresh: true });
		}
		this.props.onChangeComplete(color, 'color');
	}

	open(open) {
		this.setState({ modalCanClose: false });
		open()
	}
}

ResponsiveColorPickerWithHoverControl.propTypes = {
	color: PropTypes.string,
	usePalette: PropTypes.bool,
	palette: PropTypes.string,
	presetColors: PropTypes.object,
	onChangeComplete: PropTypes.func,
	onPaletteChangeComplete: PropTypes.func,
	onChange: PropTypes.func,
	customizer: PropTypes.object
};

export default ResponsiveColorPickerWithHoverControl;
