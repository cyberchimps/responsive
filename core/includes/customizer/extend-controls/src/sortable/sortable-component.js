import PropTypes from 'prop-types';
import ResponsiveSliderComponent from '../slider/slider-component.js';

const SubControls = ({ choiceID, subControlIds }) => {
	if (choiceID === 'author' && subControlIds && subControlIds.length >= 3) {
		const prefixSettingId = subControlIds[0];
		const avatarSettingId = subControlIds[1];
		const sizeSettingId = subControlIds[2];

		const [prefixLabel, setPrefixLabel] = React.useState((wp.customize(prefixSettingId) && wp.customize(prefixSettingId).get()) || 'By');
		const [authorAvatar, setAuthorAvatar] = React.useState((wp.customize(avatarSettingId) && wp.customize(avatarSettingId).get()) || false);

		// Mock control for ResponsiveSliderComponent
		const mockSliderControl = {
			id: sizeSettingId,
			setting: {
				get: () => {
					const val = wp.customize(sizeSettingId) ? wp.customize(sizeSettingId).get() : null;
					return val || 30;
				},
				set: (val) => {
					if (wp.customize(sizeSettingId)) {
						wp.customize(sizeSettingId).set(val);
					}
				}
			},
			params: {
				label: 'Image Size',
				default: 30,
				inputAttrs: 'min="10" max="100" step="1"'
			}
		};

		React.useEffect(() => {
			const prefixSetting = wp.customize(prefixSettingId);
			if (prefixSetting) prefixSetting.bind(setPrefixLabel);
			
			const avatarSetting = wp.customize(avatarSettingId);
			if (avatarSetting) avatarSetting.bind(setAuthorAvatar);
			
			return () => {
				if (prefixSetting) prefixSetting.unbind(setPrefixLabel);
				if (avatarSetting) avatarSetting.unbind(setAuthorAvatar);
			};
		}, [prefixSettingId, avatarSettingId]);

		const handlePrefixChange = (e) => {
			const val = e.target.value;
			setPrefixLabel(val);
			if (wp.customize(prefixSettingId)) {
				wp.customize(prefixSettingId).set(val);
			}
		};

		const handleAvatarChange = (e) => {
			const val = e.target.checked;
			setAuthorAvatar(val);
			if (wp.customize(avatarSettingId)) {
				wp.customize(avatarSettingId).set(val);
			}
		};

		return (
			<div className="responsive-sortable-dropdown" style={{ display: 'none', padding: '10px', background: '#fff', border: '1px solid #ddd', marginTop: '5px' }}>
				<div className="customize-control customize-control-text" style={{ marginBottom: '12px' }}>
					<label>
						<span className="customize-control-title">Prefix Label</span>
						<input type="text" value={prefixLabel} onChange={handlePrefixChange} style={{ width: '100%' }} />
					</label>
				</div>
				<div className="customize-control customize-control-responsive_toggle" style={{ marginBottom: '12px' }}>
					<label style={{ display: 'flex', justifyContent: 'space-between', alignItems: 'center', margin: 0 }}>
						<span className="customize-control-title" style={{ margin: 0 }}>Author Avatar</span>
						<div className="responsive-toggle-wrapper">
							<input type="checkbox" className="responsive-toggle-checkbox" checked={authorAvatar} onChange={handleAvatarChange} />
							<span className="responsive-toggle-slider" onClick={(e) => { e.preventDefault(); handleAvatarChange({ target: { checked: !authorAvatar }}); }}></span>
						</div>
					</label>
				</div>
				{authorAvatar && (
					<div className="customize-control customize-control-responsive_range" style={{ marginBottom: '12px' }}>
						<ResponsiveSliderComponent control={mockSliderControl} />
					</div>
				)}
			</div>
		);
	}

	if ((choiceID === 'date' || choiceID === 'updated') && subControlIds && subControlIds.length >= 1) {
		const formatSettingId = subControlIds[0];
		const [dateFormat, setDateFormat] = React.useState((wp.customize(formatSettingId) && wp.customize(formatSettingId).get()) || 'default');

		React.useEffect(() => {
			const formatSetting = wp.customize(formatSettingId);
			if (formatSetting) formatSetting.bind(setDateFormat);
			return () => {
				if (formatSetting) formatSetting.unbind(setDateFormat);
			};
		}, [formatSettingId]);

		const handleFormatChange = (e) => {
			const val = e.target.value;
			setDateFormat(val);
			if (wp.customize(formatSettingId)) {
				wp.customize(formatSettingId).set(val);
			}
		};

		const labelText = choiceID === 'updated' ? 'Last Updated Format' : 'Date Format';

		return (
			<div className="responsive-sortable-dropdown" style={{ display: 'none', padding: '10px', background: '#fff', border: '1px solid #ddd', marginTop: '5px' }}>
				<div className="customize-control customize-control-select" style={{ marginBottom: '12px' }}>
					<label>
						<span className="customize-control-title">{labelText}</span>
						<select value={dateFormat} onChange={handleFormatChange} style={{ width: '100%', padding: '3px 5px' }}>
							<option value="default">Default</option>
							<option value="F j, Y">November 6, 2010</option>
							<option value="Y-m-d">2010-11-06</option>
							<option value="m/d/Y">11/06/2010</option>
							<option value="d/m/Y">06/11/2010</option>
						</select>
					</label>
				</div>
			</div>
		);
	}


	if ((choiceID === 'categories' || choiceID === 'tag') && subControlIds && subControlIds.length >= 1) {
		const styleSettingId = subControlIds[0];
		const [style, setStyle] = React.useState((wp.customize(styleSettingId) && wp.customize(styleSettingId).get()) || 'default');

		React.useEffect(() => {
			const styleSetting = wp.customize(styleSettingId);
			if (styleSetting) styleSetting.bind(setStyle);
			return () => {
				if (styleSetting) styleSetting.unbind(setStyle);
			};
		}, [styleSettingId]);

		const handleStyleChange = (val) => {
			setStyle(val);
			if (wp.customize(styleSettingId)) {
				wp.customize(styleSettingId).set(val);
			}
		};

		return (
			<div className="responsive-sortable-dropdown" style={{ display: 'none', padding: '10px', background: '#fff', border: '1px solid #ddd', marginTop: '5px' }}>
				<div className="customize-control customize-control-radio" style={{ marginBottom: '12px' }}>
					<span className="customize-control-title" style={{ display: 'block', marginBottom: '8px' }}>Style</span>
					<div style={{ display: 'flex', gap: '5px' }}>
						{['default', 'badge', 'underline'].map((opt) => (
							<label key={opt} style={{ 
								display: 'flex', 
								alignItems: 'center', 
								justifyContent: 'center', 
								cursor: 'pointer', 
								padding: '5px 10px', 
								border: style === opt ? '1px solid #007cba' : '1px solid #ddd', 
								borderRadius: '3px', 
								background: style === opt ? '#f3f5f6' : '#fff',
								flex: 1
							}}>
								<input type="radio" value={opt} checked={style === opt} onChange={() => handleStyleChange(opt)} style={{ display: 'none' }} />
								<span style={{ textTransform: 'capitalize', fontSize: '13px' }}>{opt}</span>
							</label>
						))}
					</div>
				</div>
			</div>
		);
	}
	if (choiceID === 'meta' && subControlIds && subControlIds.length >= 1) {
		const dividerSettingId = subControlIds[0];
		const [divider, setDivider] = React.useState((wp.customize(dividerSettingId) && wp.customize(dividerSettingId).get()) || '•');

		React.useEffect(() => {
			const dividerSetting = wp.customize(dividerSettingId);
			if (dividerSetting) dividerSetting.bind(setDivider);
			return () => {
				if (dividerSetting) dividerSetting.unbind(setDivider);
			};
		}, [dividerSettingId]);

		const handleDividerChange = (val) => {
			setDivider(val);
			if (wp.customize(dividerSettingId)) {
				wp.customize(dividerSettingId).set(val);
			}
		};

		return (
			<div className="responsive-sortable-dropdown" style={{ display: 'none', padding: '10px', background: '#fff', border: '1px solid #ddd', marginTop: '5px' }}>
				<div className="customize-control customize-control-radio" style={{ marginBottom: '12px' }}>
					<span className="customize-control-title" style={{ display: 'block', marginBottom: '8px' }}>Divider Type</span>
					<div style={{ display: 'flex', gap: '5px' }}>
						{['/', '-', '|', '•', 'None'].map((opt) => (
							<label key={opt} style={{ 
								display: 'flex', 
								alignItems: 'center', 
								justifyContent: 'center', 
								cursor: 'pointer', 
								padding: '5px 10px', 
								border: divider === opt ? '1px solid #007cba' : '1px solid #ddd', 
								borderRadius: '3px', 
								background: divider === opt ? '#f3f5f6' : '#fff',
								flex: 1
							}}>
								<input type="radio" value={opt} checked={divider === opt} onChange={() => handleDividerChange(opt)} style={{ display: 'none' }} />
								<span style={{ fontSize: '13px', fontWeight: divider === opt ? '600' : 'normal' }}>{opt}</span>
							</label>
						))}
					</div>
				</div>
			</div>
		);
	}
	
	return <div className="responsive-sortable-dropdown" style={{ display: 'none' }}></div>;
};

const SortableComponent = props => {

	let labelHtml = null,
		descriptionHtml = null;

	const {
		label,
		description,
		value,
		choices,
		inputAttrs,
		sub_controls
	} = props.control.params;

	if (label) {
		labelHtml = <span className="customize-control-title">{label}</span>;
	}

	if (description) {
		descriptionHtml = <span className="description customize-control-description">{description}</span>;
	}

	let visibleMetaHtml = Object.values(value).map(choiceID => {
		let html = '';
		if (choices[choiceID]) {
			let hasSubControls = sub_controls && sub_controls[choiceID] && sub_controls[choiceID].length > 0;
			html = <li {...inputAttrs} key={choiceID} className={'responsive-sortable-item' + (hasSubControls ? ' has-sub-controls' : '')} data-value={choiceID}>
				<div class="responsive-sortable-item-header">
					<div class="responsive-sortable-items-menu-choice-wrap">
						<span class="responsive-sortable-item-menu">
							<svg xmlns="http://www.w3.org/2000/svg" width="13px" height="13px" viewBox="0 0 48 48"><path fill="#007CBA" fill-rule="#007CBA" d="M19 10a4 4 0 1 1-8 0a4 4 0 0 1 8 0m-4 18a4 4 0 1 0 0-8a4 4 0 0 0 0 8m0 14a4 4 0 1 0 0-8a4 4 0 0 0 0 8m22-32a4 4 0 1 1-8 0a4 4 0 0 1 8 0m-4 18a4 4 0 1 0 0-8a4 4 0 0 0 0 8m0 14a4 4 0 1 0 0-8a4 4 0 0 0 0 8" clip-rule="evenodd"/></svg>
						</span>
						<span class="responsive-sortable-item-choice">{choices[choiceID]}</span>
					</div>
					<div class="responsive-sortable-item-actions">
						{hasSubControls && (
							<span className="responsive-sortable-chevron" onClick={(e) => {
								e.stopPropagation();
								const target = e.currentTarget;
								target.classList.toggle('expanded');
								const dropdown = target.closest('li').querySelector('.responsive-sortable-dropdown');
								if (dropdown) {
									if (dropdown.style.display === 'none') {
										dropdown.style.display = 'block';
									} else {
										dropdown.style.display = 'none';
									}
								}
							}}>
								<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
							</span>
						)}
						<span className="visibility">
							<svg class="responsive-sortable-eye-icon active" xmlns="http://www.w3.org/2000/svg" width="19px" height="19px" viewBox="0 0 28 28"><path fill="#000000" d="M25.257 16h.005h-.01zm-.705-.52c.1.318.387.518.704.52c.07 0 .148-.02.226-.04c.39-.12.61-.55.48-.94C25.932 14.93 22.932 6 14 6S2.067 14.93 2.037 15.02c-.13.39.09.81.48.94c.4.13.82-.09.95-.48l.003-.005c.133-.39 2.737-7.975 10.54-7.975c7.842 0 10.432 7.65 10.542 7.98M9 16a5 5 0 1 1 10 0a5 5 0 0 1-10 0"/></svg>
							<svg class="responsive-sortable-eye-icon" xmlns="http://www.w3.org/2000/svg" width="19px" height="19px" viewBox="0 0 24 24"><path fill="#000" d="M2.22 2.22a.75.75 0 0 0-.073.976l.073.084l4.034 4.035a10 10 0 0 0-3.955 5.75a.75.75 0 0 0 1.455.364a8.5 8.5 0 0 1 3.58-5.034l1.81 1.81A4 4 0 0 0 14.8 15.86l5.919 5.92a.75.75 0 0 0 1.133-.977l-.073-.084l-6.113-6.114l.001-.002l-6.95-6.946l.002-.002l-1.133-1.13L3.28 2.22a.75.75 0 0 0-1.06 0M12 5.5c-1 0-1.97.148-2.889.425l1.237 1.236a8.503 8.503 0 0 1 9.899 6.272a.75.75 0 0 0 1.455-.363A10 10 0 0 0 12 5.5m.195 3.51l3.801 3.8a4.003 4.003 0 0 0-3.801-3.8"/></svg>
						</span>
					</div>
				</div>
				{hasSubControls && (
					<SubControls choiceID={choiceID} subControlIds={sub_controls[choiceID]} />
				)}
			</li>;
		}
		return html;
	});

	let invisibleMetaHtml = Object.keys(choices).map(choiceID => {
		let html = '';
		if (Array.isArray(value) && -1 === value.indexOf(choiceID)) {
			let hasSubControls = sub_controls && sub_controls[choiceID] && sub_controls[choiceID].length > 0;
			html = <li {...inputAttrs} key={choiceID} className={'responsive-sortable-item invisible' + (hasSubControls ? ' has-sub-controls' : '')} data-value={choiceID}>
				<div class="responsive-sortable-item-header">
					<div class="responsive-sortable-items-menu-choice-wrap">
						<span class="responsive-sortable-item-menu">
							<svg xmlns="http://www.w3.org/2000/svg" width="13px" height="13px" viewBox="0 0 48 48"><path fill="#007CBA" fill-rule="#007CBA" d="M19 10a4 4 0 1 1-8 0a4 4 0 0 1 8 0m-4 18a4 4 0 1 0 0-8a4 4 0 0 0 0 8m0 14a4 4 0 1 0 0-8a4 4 0 0 0 0 8m22-32a4 4 0 1 1-8 0a4 4 0 0 1 8 0m-4 18a4 4 0 1 0 0-8a4 4 0 0 0 0 8m0 14a4 4 0 1 0 0-8a4 4 0 0 0 0 8" clip-rule="evenodd"/></svg>
						</span>
						<span class="responsive-sortable-item-choice">{choices[choiceID]}</span>
					</div>
					<div class="responsive-sortable-item-actions">
						{hasSubControls && (
							<span className="responsive-sortable-chevron">
								<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
							</span>
						)}
						<span className="visibility">
							<svg class="responsive-sortable-eye-icon active" xmlns="http://www.w3.org/2000/svg" width="19px" height="19px" viewBox="0 0 24 24"><path fill="#000" d="M2.22 2.22a.75.75 0 0 0-.073.976l.073.084l4.034 4.035a10 10 0 0 0-3.955 5.75a.75.75 0 0 0 1.455.364a8.5 8.5 0 0 1 3.58-5.034l1.81 1.81A4 4 0 0 0 14.8 15.86l5.919 5.92a.75.75 0 0 0 1.133-.977l-.073-.084l-6.113-6.114l.001-.002l-6.95-6.946l.002-.002l-1.133-1.13L3.28 2.22a.75.75 0 0 0-1.06 0M12 5.5c-1 0-1.97.148-2.889.425l1.237 1.236a8.503 8.503 0 0 1 9.899 6.272a.75.75 0 0 0 1.455-.363A10 10 0 0 0 12 5.5m.195 3.51l3.801 3.8a4.003 4.003 0 0 0-3.801-3.8"/></svg>
							<svg class="responsive-sortable-eye-icon" xmlns="http://www.w3.org/2000/svg" width="19px" height="19px" viewBox="0 0 28 28"><path fill="#000000" d="M25.257 16h.005h-.01zm-.705-.52c.1.318.387.518.704.52c.07 0 .148-.02.226-.04c.39-.12.61-.55.48-.94C25.932 14.93 22.932 6 14 6S2.067 14.93 2.037 15.02c-.13.39.09.81.48.94c.4.13.82-.09.95-.48l.003-.005c.133-.39 2.737-7.975 10.54-7.975c7.842 0 10.432 7.65 10.542 7.98M9 16a5 5 0 1 1 10 0a5 5 0 0 1-10 0"/></svg>
						</span>
					</div>
				</div>
				{hasSubControls && (
					<SubControls choiceID={choiceID} subControlIds={sub_controls[choiceID]} />
				)}
			</li>;
		}
		return html;
	});

	return <label className='responsive-sortable'>
		{labelHtml}
		{descriptionHtml}
		<ul className="sortable responsive-sortable-items-wrapper">
			{visibleMetaHtml}
			{invisibleMetaHtml}
		</ul>
	</label>;

};

SortableComponent.propTypes = {
	control: PropTypes.object.isRequired
};

export default React.memo( SortableComponent );
