/**
 * Responsive Settings sidebar for the block editor (pages and posts).
 */
( function ( wp ) {
	const { registerPlugin } = wp.plugins;
	const { createElement: el, useState } = wp.element;
	const { useSelect, useDispatch } = wp.data;
	const { PanelBody, SelectControl, RangeControl, ToggleControl, Modal, Button } = wp.components;
	const { __ } = wp.i18n;
	const PluginSidebar = ( wp.editor && wp.editor.PluginSidebar ) || ( wp.editPost && wp.editPost.PluginSidebar );
	const PluginSidebarMoreMenuItem = ( wp.editor && wp.editor.PluginSidebarMoreMenuItem ) || ( wp.editPost && wp.editPost.PluginSidebarMoreMenuItem );

	if ( ! PluginSidebar ) {
		return;
	}

	const allowedPostTypes = [ 'page', 'post' ];
	const icon = el(
		'svg',
		{ width: 24, height: 24, viewBox: '0 0 24 24', xmlns: 'http://www.w3.org/2000/svg' },
		el( 'rect', { className: 'responsive-icon-bg', width: 24, height: 24, rx: 2, fill: '#000' } ),
		el( 'path', {
			className: 'responsive-icon-r',
			d: 'M13.6462 13.2403C14.5998 12.9828 15.3195 12.5139 15.8024 11.8323C16.2853 11.1506 16.5267 10.3873 16.5267 9.54059C16.5267 8.80496 16.3551 8.13873 16.0104 7.54344C15.6657 6.94815 15.1495 6.47623 14.4616 6.12615C13.7722 5.77607 12.9385 5.60181 11.9606 5.60181H7.60408H7.38086V18.4499H9.83019V7.73775H11.8695C12.5589 7.73775 13.0722 7.90123 13.4093 8.22509C13.7479 8.55049 13.9164 9.00698 13.9164 9.59611C13.9164 10.1852 13.7464 10.6664 13.4093 11.0041C13.0706 11.3419 12.5574 11.51 11.8695 11.51H10.9888V13.5225L13.7357 18.4499H16.6725L13.6462 13.2403Z',
			fill: '#fff',
		} )
	);

	const META_KEY = 'responsive_page_meta_container_layout';
	const STYLE_KEY = 'responsive_page_meta_container_style';
	const SIDEBAR_KEY = 'responsive_page_meta_sidebar_position';
	const SIDEBAR_STYLE_KEY = 'responsive_page_meta_sidebar_style';
	const SIDEBAR_WIDTH_KEY = 'responsive_page_meta_sidebar_width';

	// Same images as the customizer Container Layout control.
	const imagesUrl = ( window.responsivePageSettings && window.responsivePageSettings.imagesUrl ) || '';

	const layoutOptions = [
		{ value: '', image: 'default_container', label: __( 'Default', 'responsive' ) },
		{ value: 'normal', image: 'normal', label: __( 'Normal', 'responsive' ) },
		{ value: 'narrow', image: 'narrow', label: __( 'Narrow', 'responsive' ) },
		{ value: 'full-width', image: 'full-width', label: __( 'Full Width', 'responsive' ) },
	];

	/**
	 * Live preview: apply the resolved container width to the editor canvas.
	 * Post meta > post type setting > global setting.
	 */
	const settings = window.responsivePageSettings || {};
	const STYLE_ID = 'responsive-container-layout-preview';

	const buildStyleCss = ( postType, metaStyle ) => {
		const type = ( settings.postTypes || {} )[ postType ];
		const style = metaStyle || ( type && type.style ) || settings.globalStyle || 'boxed';
		return style === 'flat'
			? ':root .editor-styles-wrapper{background-color:transparent;background-image:none;}'
			: ':root .editor-styles-wrapper{background-color:' + ( settings.boxBackground || '#fff' ) + ';}';
	};

	const buildCss = ( postType, metaLayout, metaSidebar, metaSidebarWidth ) => {
		const type = ( settings.postTypes || {} )[ postType ];
		if ( ! type ) {
			return '';
		}
		const layout = metaLayout || type.layout || settings.globalLayout || 'normal';
		let rule;
		if ( layout === 'full-width' ) {
			rule = 'max-width:none;';
		} else {
			const base = layout === 'narrow' ? settings.narrowWidth : settings.containerWidth;
			let factor = type.narrowFactor;
			if ( layout !== 'narrow' ) {
				// This entry's own sidebar choice overrides the post type / global one.
				const sidebar = metaSidebar || type.sidebar;
				if ( sidebar === 'no' ) {
					factor = type.contentPct / 100;
				} else {
					const isOwn = metaSidebar === 'left' || metaSidebar === 'right';
					const width = isOwn ? metaSidebarWidth || type.typeSidebarWidth : type.sidebarWidth;
					factor = ( 100 - width ) / 100;
				}
			}
			rule = 'max-width:' + base * factor + 'px;';
		}
		const cls = '.editor-styles-wrapper.post-type-' + postType;
		return '@media screen and (min-width: 992px){:root ' + cls + ' .edit-post-visual-editor__post-title-wrapper h1.editor-post-title__input,:root ' + cls + ' .edit-post-visual-editor__post-title-wrapper,:root ' + cls + ' .block-editor-block-list__layout.is-root-container > :where(:not(.alignleft):not(.alignright):not(.alignfull):not([data-align="full"])){' + rule + 'margin-left:auto;margin-right:auto;}}';
	};

	const applyCss = ( doc, css ) => {
		if ( ! doc || ! doc.head ) {
			return;
		}
		let style = doc.getElementById( STYLE_ID );
		if ( ! style ) {
			style = doc.createElement( 'style' );
			style.id = STYLE_ID;
			doc.head.appendChild( style );
		}
		if ( style.textContent !== css ) {
			style.textContent = css;
		}
	};

	wp.data.subscribe( () => {
		const editor = wp.data.select( 'core/editor' );
		if ( ! editor || ! editor.getCurrentPostType ) {
			return;
		}
		const postType = editor.getCurrentPostType();
		if ( ! allowedPostTypes.includes( postType ) ) {
			return;
		}
		const meta = editor.getEditedPostAttribute( 'meta' ) || {};
		const css = buildCss( postType, meta[ META_KEY ] || '', meta[ SIDEBAR_KEY ] || '', meta[ SIDEBAR_WIDTH_KEY ] || 0 ) + buildStyleCss( postType, meta[ STYLE_KEY ] || '' );
		applyCss( document, css );
		const canvas = document.querySelector( 'iframe[name="editor-canvas"]' );
		if ( canvas && canvas.contentDocument ) {
			applyCss( canvas.contentDocument, css );
		}
	} );

	const ContainerLayoutControl = () => {
		const { current, currentStyle } = useSelect( ( select ) => {
			const meta = select( 'core/editor' ).getEditedPostAttribute( 'meta' ) || {};
			return { current: meta[ META_KEY ] || '', currentStyle: meta[ STYLE_KEY ] || '' };
		}, [] );
		const { editPost } = useDispatch( 'core/editor' );

		return el(
			PanelBody,
			{ title: __( 'Container', 'responsive' ), initialOpen: true },
			el( 'p', { className: 'responsive-ps-label' }, __( 'Container Layout', 'responsive' ) ),
			el(
				'div',
				{ className: 'responsive-ps-layout-grid', role: 'radiogroup', 'aria-label': __( 'Container Layout', 'responsive' ) },
				layoutOptions.map( ( opt ) =>
					el(
						'button',
						{
							key: opt.image,
							type: 'button',
							role: 'radio',
							'aria-checked': current === opt.value,
							'aria-label': opt.label,
							className: 'responsive-ps-layout-option' + ( current === opt.value ? ' active' : '' ),
							onClick: () => editPost( { meta: { [ META_KEY ]: opt.value } } ),
						},
						el( 'span', { className: 'responsive-ps-tooltip' }, opt.label ),
						el( 'img', { src: imagesUrl + opt.image + '.svg', alt: '' } )
					)
				)
			),
			el( SelectControl, {
				label: __( 'Container Style', 'responsive' ),
				value: currentStyle,
				options: [
					{ value: '', label: __( 'Default', 'responsive' ) },
					{ value: 'boxed', label: __( 'Boxed', 'responsive' ) },
					{ value: 'content-boxed', label: __( 'Content Boxed', 'responsive' ) },
					{ value: 'flat', label: __( 'Flat', 'responsive' ) },
				],
				onChange: ( value ) => editPost( { meta: { [ STYLE_KEY ]: value } } ),
				__nextHasNoMarginTop: true,
				__next40pxDefaultSize: true,
			} )
		);
	};

	const isRtl = !! ( window.responsivePageSettings && window.responsivePageSettings.isRtl );

	const sidebarOptions = [
		{ value: '', image: 'global', label: __( 'Default', 'responsive' ) },
		{ value: 'no', image: 'no', label: __( 'No Sidebar', 'responsive' ) },
		{ value: 'left', image: 'left', label: isRtl ? __( 'Right', 'responsive' ) : __( 'Left', 'responsive' ) },
		{ value: 'right', image: 'right', label: isRtl ? __( 'Left', 'responsive' ) : __( 'Right', 'responsive' ) },
	];

	const SidebarControl = () => {
		const { current, style, width, typeWidth } = useSelect( ( select ) => {
			const editor = select( 'core/editor' );
			const meta = editor.getEditedPostAttribute( 'meta' ) || {};
			const type = ( settings.postTypes || {} )[ editor.getCurrentPostType() ] || {};
			return {
				current: meta[ SIDEBAR_KEY ] || '',
				style: meta[ SIDEBAR_STYLE_KEY ] || '',
				width: meta[ SIDEBAR_WIDTH_KEY ] || 0,
				typeWidth: type.typeSidebarWidth || 30,
			};
		}, [] );
		const hasSidebar = current === 'left' || current === 'right';
		const { editPost } = useDispatch( 'core/editor' );

		return el(
			PanelBody,
			{ title: __( 'Sidebar', 'responsive' ), initialOpen: false },
			el( 'p', { className: 'responsive-ps-label' }, __( 'Sidebar Position', 'responsive' ) ),
			el(
				'div',
				{ className: 'responsive-ps-layout-grid', role: 'radiogroup', 'aria-label': __( 'Sidebar Position', 'responsive' ) },
				sidebarOptions.map( ( opt ) =>
					el(
						'button',
						{
							key: opt.value || 'default',
							type: 'button',
							role: 'radio',
							'aria-checked': current === opt.value,
							'aria-label': opt.label,
							className: 'responsive-ps-layout-option' + ( current === opt.value ? ' active' : '' ),
							onClick: () => editPost( { meta: { [ SIDEBAR_KEY ]: opt.value } } ),
						},
						el( 'span', { className: 'responsive-ps-tooltip' }, opt.label ),
						el( 'img', { src: imagesUrl + opt.image + '.svg', alt: '' } )
					)
				)
			),
			// Style and width only make sense when this entry has its own left / right sidebar.
			hasSidebar && el(
				'div',
				{ className: 'responsive-ps-sidebar-extra' },
				el( 'p', { className: 'responsive-ps-label' }, __( 'Sidebar Style', 'responsive' ) ),
				el(
					'div',
					{ className: 'responsive-ps-btn-group', role: 'radiogroup', 'aria-label': __( 'Sidebar Style', 'responsive' ) },
					[
						{ value: '', label: __( 'Default', 'responsive' ) },
						{ value: 'unboxed', label: __( 'Unboxed', 'responsive' ) },
						{ value: 'boxed', label: __( 'Boxed', 'responsive' ) },
					].map( ( opt ) =>
						el(
							'button',
							{
								key: opt.value || 'default',
								type: 'button',
								role: 'radio',
								'aria-checked': style === opt.value,
								className: 'responsive-ps-btn' + ( style === opt.value ? ' active' : '' ),
								onClick: () => editPost( { meta: { [ SIDEBAR_STYLE_KEY ]: opt.value } } ),
							},
							opt.label
						)
					)
				),
				el( RangeControl, {
					label: __( 'Sidebar Width (%)', 'responsive' ),
					value: width || typeWidth,
					min: 20,
					max: 50,
					allowReset: true,
					resetFallbackValue: 0,
					onChange: ( value ) => editPost( { meta: { [ SIDEBAR_WIDTH_KEY ]: value || 0 } } ),
					__nextHasNoMarginTop: true,
					__next40pxDefaultSize: true,
				} )
			)
		);
	};

	const DisableElementsControl = () => {
		const { meta, postType } = useSelect( ( select ) => {
			const editor = select( 'core/editor' );
			return { meta: editor.getEditedPostAttribute( 'meta' ) || {}, postType: editor.getCurrentPostType() };
		}, [] );
		const { editPost } = useDispatch( 'core/editor' );
		const toggles = [
			{ key: 'responsive_page_meta_disable_header', label: __( 'Disable Header', 'responsive' ) },
			{ key: 'responsive_page_meta_disable_footer', label: __( 'Disable Footer', 'responsive' ) },
			{ key: 'responsive_page_meta_disable_banner', label: __( 'Disable Banner Area', 'responsive' ) },
		];
		// Related posts only exist on single posts.
		if ( postType === 'post' ) {
			toggles.push( { key: 'responsive_page_meta_disable_related_posts', label: __( 'Disable Related Posts', 'responsive' ) } );
		}

		return el(
			PanelBody,
			{ title: __( 'Disable Elements', 'responsive' ), initialOpen: false },
			el(
				'div',
				{ className: 'responsive-ps-toggle-list' },
				toggles.map( ( t ) =>
					el( ToggleControl, {
						key: t.key,
						className: 'responsive-ps-toggle',
						label: t.label,
						checked: !! meta[ t.key ],
						onChange: ( value ) => editPost( { meta: { [ t.key ]: !! value } } ),
						__nextHasNoMarginBottom: true,
					} )
				)
			)
		);
	};

	const TRANSPARENT_KEY = 'responsive_page_meta_transparent_header';
	const DISABLE_HEADER_KEY = 'responsive_page_meta_disable_header';

	const headerRowToggles = [
		{ key: 'responsive_page_meta_disable_above_header', label: __( 'Disable Above Header', 'responsive' ) },
		{ key: 'responsive_page_meta_disable_primary_header', label: __( 'Disable Primary Header', 'responsive' ) },
		{ key: 'responsive_page_meta_disable_below_header', label: __( 'Disable Below Header', 'responsive' ) },
		{ key: 'responsive_page_meta_disable_mobile_header', label: __( 'Disable Mobile Header', 'responsive' ) },
	];

	const transparentOptions = [
		{ value: '', label: __( 'Inherit', 'responsive' ) },
		{ value: '1', label: __( 'Enabled', 'responsive' ) },
		{ value: 'disabled', label: __( 'Disabled', 'responsive' ) },
	];

	const AdvancedSettingsModal = ( { onClose } ) => {
		const meta = useSelect( ( select ) => select( 'core/editor' ).getEditedPostAttribute( 'meta' ) || {}, [] );
		const { editPost } = useDispatch( 'core/editor' );
		const transparent = meta[ TRANSPARENT_KEY ] || '';

		return el(
			Modal,
			{ title: __( 'Advanced Settings', 'responsive' ), onRequestClose: onClose, className: 'responsive-ps-modal' },
			el(
				'table',
				{ className: 'responsive-ps-table' },
				el(
					'tbody',
					null,
					el(
						'tr',
						null,
						el( 'th', { scope: 'row' }, __( 'Header Rows', 'responsive' ) ),
						el(
							'td',
							null,
							headerRowToggles.map( ( t ) =>
								el( ToggleControl, {
									key: t.key,
									className: 'responsive-ps-toggle',
									label: t.label,
									checked: !! meta[ t.key ],
									onChange: ( value ) => editPost( { meta: { [ t.key ]: !! value } } ),
									__nextHasNoMarginBottom: true,
								} )
							)
						)
					),
					el(
						'tr',
						null,
						el( 'th', { scope: 'row' }, __( 'Transparent Header', 'responsive' ) ),
						el(
							'td',
							null,
							el(
								'div',
								{ className: 'responsive-ps-btn-group', role: 'radiogroup', 'aria-label': __( 'Transparent Header', 'responsive' ) },
								transparentOptions.map( ( opt ) =>
									el(
										'button',
										{
											key: opt.value || 'inherit',
											type: 'button',
											role: 'radio',
											'aria-checked': transparent === opt.value,
											className: 'responsive-ps-btn' + ( transparent === opt.value ? ' active' : '' ),
											onClick: () => editPost( { meta: { [ TRANSPARENT_KEY ]: opt.value } } ),
										},
										opt.label
									)
								)
							)
						)
					)
				)
			)
		);
	};

	// Only offered while the whole header is not disabled for this entry.
	const AdvancedSettingsControl = () => {
		const [ isOpen, setOpen ] = useState( false );
		const headerDisabled = useSelect( ( select ) => !! ( select( 'core/editor' ).getEditedPostAttribute( 'meta' ) || {} )[ DISABLE_HEADER_KEY ], [] );
		if ( headerDisabled ) {
			return null;
		}
		return el(
			wp.element.Fragment,
			null,
			el(
				Button,
				{ className: 'responsive-ps-advanced-btn', onClick: () => setOpen( true ), 'aria-haspopup': 'dialog' },
				el( 'span', null, __( 'Advanced Settings', 'responsive' ) ),
				el( 'svg', { width: 20, height: 20, viewBox: '0 0 24 24', 'aria-hidden': true }, el( 'path', { d: 'M10 17l5-5-5-5v10z', fill: 'currentColor' } ) )
			),
			isOpen && el( AdvancedSettingsModal, { onClose: () => setOpen( false ) } )
		);
	};

	const ResponsiveSidebar = () => {
		const postType = useSelect( ( select ) => select( 'core/editor' ).getCurrentPostType(), [] );
		if ( ! allowedPostTypes.includes( postType ) ) {
			return null;
		}
		const title = __( 'Responsive Settings', 'responsive' );
		return el(
			wp.element.Fragment,
			null,
			PluginSidebarMoreMenuItem && el( PluginSidebarMoreMenuItem, { target: 'responsive-page-settings', icon }, title ),
			el(
				PluginSidebar,
				{ name: 'responsive-page-settings', title, icon, className: 'responsive-page-settings-sidebar' },
				el( ContainerLayoutControl ),
				el( SidebarControl ),
				el( DisableElementsControl ),
				el( AdvancedSettingsControl )
			)
		);
	};

	registerPlugin( 'responsive-page-settings', { render: ResponsiveSidebar } );
}( window.wp ) );
