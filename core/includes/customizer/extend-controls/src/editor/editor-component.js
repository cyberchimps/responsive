import PropTypes from 'prop-types';
import debounce from 'lodash/debounce';

const { __ } = wp.i18n;
const { Component } = wp.element;

class EditorComponent extends Component {
	constructor(props) {
		super( props );
		this.updateValues = this.updateValues.bind( this );
		this.triggerChangeIfDirty = this.triggerChangeIfDirty.bind( this );
		this.onInit = this.onInit.bind( this );
		let value = props.control.setting.get();
		this.state = {
			value,
			editor:{},
			restoreTextMode: false,
		};
		let defaultParams = {
			id: 'header_html',
			toolbar1: 'bold,italic,bullist,numlist,link',
			toolbar2: '',
		};
		this.controlParams = this.props.control.params.input_attrs ? {
			...defaultParams,
			...this.props.control.params.input_attrs,
		} : defaultParams;
		this.defaultValue = props.control.params.default || '';
	}
	componentDidMount() {
		if ( window.tinymce.get( this.controlParams.id ) ) {
			this.setState( { restoreTextMode: window.tinymce.get( this.controlParams.id ).isHidden() } );
			window.wp.oldEditor.remove( this.controlParams.id );
		}
		window.wp.oldEditor.initialize( this.controlParams.id, {
			tinymce: {
				wpautop: true,
				toolbar1: this.controlParams.toolbar1,
				toolbar2: this.controlParams.toolbar2,
			},
			quicktags: true,
			mediaButtons: true,
		} );
		const editor = window.tinymce.get( this.controlParams.id );
		if ( editor.initialized ) {
			this.onInit();
		} else {
			editor.on( 'init', this.onInit );
		}
	}
	onInit() {
		const editor = window.tinymce.get( this.controlParams.id );
		if ( this.state.restoreTextMode ) {
			window.switchEditors.go( this.controlParams.id, 'html' );
		}
		editor.on( 'NodeChange', debounce( this.triggerChangeIfDirty, 250 ) );

		this.setState( { editor: editor } );
	}
	triggerChangeIfDirty() {
		this.updateValues( window.wp.oldEditor.getContent( this.controlParams.id ) );
	}
	render() {
		return (
			<div className="responsive-control-field responsive-editor-control">
				{ this.props.control.params.label && (
					<span className="customize-control-title">{ this.props.control.params.label }</span>
				) }
				<textarea
					className="responsive-control-tinymce-editor wp-editor-area"
					id={ this.controlParams.id }
					value={ this.state.value }
					onChange={ ( { target: { value } } ) => {
						this.updateValues(value);
					} }
				/>
				{ this.props.control.params.description && (
					<span className="customize-control-description">{ this.props.control.params.description }</span>
				) }
			</div>
		);
	}
	updateValues(value) {
		this.setState( { value: value } );
		this.props.control.setting.set( value );
	}
}

EditorComponent.propTypes = {
	// control: PropTypes.object.isRequired,
	// customizer: PropTypes.object.isRequired,
};

export default EditorComponent;
