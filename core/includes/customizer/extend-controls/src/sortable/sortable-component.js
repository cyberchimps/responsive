import PropTypes from 'prop-types';
import ResponsiveSliderComponent from '../slider/slider-component.js';
import PaymentSubControl from './payment-subcontrol.js';
const { ToggleControl } = wp.components;

const SubControls = ({ choiceID, subControlIds, taxonomyChoices, controlId }) => {
	if (choiceID === 'payment' || choiceID === 'payments') {
		return <PaymentSubControl />;
	}

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

		const handleAvatarToggle = (val) => {
			const checked = typeof val === 'boolean' ? val : !authorAvatar;
			setAuthorAvatar(checked);
			if (wp.customize(avatarSettingId)) {
				wp.customize(avatarSettingId).set(checked);
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
				<div className="customize-control customize-control-responsive-toggle" style={{ marginBottom: '12px' }}>
					<div className="responsive-toggle-control-wrapper" style={{ paddingBottom: 0 }}>
						<ToggleControl
							label="Author Avatar"
							checked={ authorAvatar }
							onChange={ handleAvatarToggle }
							className="responsive-toggle-control"
						/>
					</div>
				</div>
				{authorAvatar && (
					<div className="customize-control customize-control-responsive-range" style={{ marginBottom: '12px' }}>
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
				<div className="customize-control customize-control-responsive-selectbtn" style={{ marginBottom: '12px' }}>
					<span className="customize-control-title" style={{ display: 'block', marginBottom: '8px' }}>Style</span>
					<div className="responsive-selectbtn-control-wrapper">
						{['default', 'badge', 'underline'].map((opt) => (
							<button
								key={opt}
								type="button"
								className={`customize-control-responsive-selectbtn__button${style === opt ? ' active' : ''}`}
								onClick={() => handleStyleChange(opt)}
							>
								<span className="responsive-selectbtn-text" style={{ textTransform: 'capitalize' }}>{opt}</span>
							</button>
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

	const isTax = choiceID === 'taxonomy' || choiceID.startsWith('taxonomy_') || choiceID === 'taxonomies';
	if (isTax && ((subControlIds && subControlIds.length >= 2) || controlId === 'responsive_single_product_title_meta')) {
		const isMetaControl = controlId === 'responsive_single_product_title_meta';
		const metaTaxSetting = isMetaControl ? wp.customize('responsive_single_product_meta_taxonomies') : null;

		const getMetaTaxData = () => {
			if (isMetaControl) {
				if (metaTaxSetting) {
					let allData = metaTaxSetting.get();
					if (typeof allData === 'string') {
						try { allData = JSON.parse(allData); } catch (e) { allData = {}; }
					}
					if (allData && typeof allData === 'object' && allData[choiceID]) {
						return {
							taxonomy: allData[choiceID].taxonomy || 'product_cat',
							style: allData[choiceID].style || 'default',
						};
					}
				}
				return {
					taxonomy: 'product_cat',
					style: 'default',
				};
			}
			const taxSettingId = subControlIds && subControlIds[0];
			const stSettingId = subControlIds && subControlIds[1];
			return {
				taxonomy: (taxSettingId && wp.customize(taxSettingId) && wp.customize(taxSettingId).get()) || 'product_cat',
				style: (stSettingId && wp.customize(stSettingId) && wp.customize(stSettingId).get()) || 'default',
			};
		};

		const initialData = getMetaTaxData();
		const [taxonomy, setTaxonomy] = React.useState(initialData.taxonomy);
		const [style, setStyle] = React.useState(initialData.style);

		React.useEffect(() => {
			if (isMetaControl && metaTaxSetting) {
				const onMetaTaxChange = (newVal) => {
					let allData = newVal;
					if (typeof allData === 'string') {
						try { allData = JSON.parse(allData); } catch (e) { allData = {}; }
					}
					if (allData && allData[choiceID]) {
						if (allData[choiceID].taxonomy && allData[choiceID].taxonomy !== taxonomy) {
							setTaxonomy(allData[choiceID].taxonomy);
						}
						if (allData[choiceID].style && allData[choiceID].style !== style) {
							setStyle(allData[choiceID].style);
						}
					}
				};
				metaTaxSetting.bind(onMetaTaxChange);
				return () => metaTaxSetting.unbind(onMetaTaxChange);
			} else if (!isMetaControl && subControlIds && subControlIds.length >= 2) {
				const taxSetting = wp.customize(subControlIds[0]);
				const stSetting = wp.customize(subControlIds[1]);
				if (taxSetting) taxSetting.bind(setTaxonomy);
				if (stSetting) stSetting.bind(setStyle);
				return () => {
					if (taxSetting) taxSetting.unbind(setTaxonomy);
					if (stSetting) stSetting.unbind(setStyle);
				};
			}
		}, [choiceID, isMetaControl, subControlIds, taxonomy, style]);

		const handleTaxonomyChange = (e) => {
			const val = e.target.value;
			setTaxonomy(val);
			if (isMetaControl) {
				if (metaTaxSetting) {
					let allData = metaTaxSetting.get();
					if (typeof allData === 'string') {
						try { allData = JSON.parse(allData); } catch (err) { allData = {}; }
					}
					allData = {
						...(allData || {}),
						[choiceID]: {
							...((allData && allData[choiceID]) || {}),
							taxonomy: val,
							style: style,
						}
					};
					metaTaxSetting.set(JSON.stringify(allData));
				}
			} else if (subControlIds && subControlIds[0] && wp.customize(subControlIds[0])) {
				wp.customize(subControlIds[0]).set(val);
			}
		};

		const handleStyleChange = (val) => {
			setStyle(val);
			if (isMetaControl) {
				if (metaTaxSetting) {
					let allData = metaTaxSetting.get();
					if (typeof allData === 'string') {
						try { allData = JSON.parse(allData); } catch (err) { allData = {}; }
					}
					allData = {
						...(allData || {}),
						[choiceID]: {
							...((allData && allData[choiceID]) || {}),
							taxonomy: taxonomy,
							style: val,
						}
					};
					metaTaxSetting.set(JSON.stringify(allData));
				}
			} else if (subControlIds && subControlIds[1] && wp.customize(subControlIds[1])) {
				wp.customize(subControlIds[1]).set(val);
			}
		};

		const availableTaxonomies = taxonomyChoices && Object.keys(taxonomyChoices).length > 0 ? taxonomyChoices : {
			'product_cat': 'Product category',
			'product_tag': 'Product tag'
		};

		return (
			<div className="responsive-sortable-dropdown" style={{ display: 'none', padding: '10px', background: '#fff', border: '1px solid #ddd', marginTop: '5px' }}>
				<div className="customize-control customize-control-select" style={{ marginBottom: '12px' }}>
					<label>
						<span className="customize-control-title" style={{ display: 'block', marginBottom: '6px' }}>Taxonomy</span>
						<select value={taxonomy} onChange={handleTaxonomyChange} style={{ width: '100%', padding: '3px 5px' }}>
							{Object.entries(availableTaxonomies).map(([slug, name]) => (
								<option key={slug} value={slug}>{name}</option>
							))}
						</select>
					</label>
				</div>
				<div className="customize-control customize-control-responsive-selectbtn" style={{ marginBottom: '12px' }}>
					<span className="customize-control-title" style={{ display: 'block', marginBottom: '8px' }}>Style</span>
					<div className="responsive-selectbtn-control-wrapper">
						{['default', 'badge', 'underline'].map((opt) => (
							<button
								key={opt}
								type="button"
								className={`customize-control-responsive-selectbtn__button${style === opt ? ' active' : ''}`}
								onClick={() => handleStyleChange(opt)}
							>
								<span className="responsive-selectbtn-text" style={{ textTransform: 'capitalize' }}>{opt}</span>
							</button>
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

	const control = props.control;
	const {
		label,
		description,
		choices = {},
		inputAttrs,
		sub_controls,
		taxonomy_choices,
		cloneable_choices = []
	} = control.params;

	const getInitialValues = () => {
		if (control.setting) {
			const val = control.setting.get();
			if (Array.isArray(val)) return val;
		}
		if (Array.isArray(control.params.value)) {
			return control.params.value;
		}
		return [];
	};

	const [values, setValues] = React.useState(getInitialValues);
	const [, forceUpdate] = React.useReducer(x => x + 1, 0);

	React.useEffect(() => {
		if (!control.setting) return;
		const handleSettingChange = (newVal) => {
			setValues(Array.isArray(newVal) ? [...newVal] : []);
		};
		control.setting.bind(handleSettingChange);
		return () => control.setting.unbind(handleSettingChange);
	}, [control.setting]);

	React.useEffect(() => {
		if (control.sortableContainer && control.sortableContainer.data('ui-sortable')) {
			control.sortableContainer.sortable('refresh');
		}
	}, [values]);

	const isCloneable = (id) => cloneable_choices.includes(id);
	const isClone = (id) => cloneable_choices.some(base => id.startsWith(base + '_'));
	const isTaxonomyChoice = (id) => id === 'taxonomy' || id.startsWith('taxonomy_');

	const getChoiceLabel = (id) => {
		if (choices[id]) return choices[id];
		if (isClone(id)) {
			const base = cloneable_choices.find(b => id.startsWith(b + '_'));
			return (base && choices[base]) || 'Taxonomies';
		}
		return id;
	};

	const handleClone = (e, baseId) => {
		e.stopPropagation();
		const currentValues = control.setting ? (control.setting.get() || []) : values;
		const metaTaxSetting = wp.customize('responsive_single_product_meta_taxonomies');
		let allMetaTax = {};
		if (metaTaxSetting) {
			const raw = metaTaxSetting.get();
			if (typeof raw === 'string') {
				try { allMetaTax = JSON.parse(raw); } catch (err) { allMetaTax = {}; }
			} else if (typeof raw === 'object' && raw !== null) {
				allMetaTax = raw;
			}
		}

		let nextNum = 1;
		while (
			currentValues.includes(`${baseId}_${nextNum}`) ||
			(allMetaTax && allMetaTax[`${baseId}_${nextNum}`])
		) {
			nextNum++;
		}
		const newId = `${baseId}_${nextNum}`;

		const sourceConfig = (allMetaTax && allMetaTax[baseId]) || {
			taxonomy: 'product_cat',
			style: 'default',
		};

		if (metaTaxSetting) {
			const updatedMeta = { ...allMetaTax, [newId]: { ...sourceConfig } };
			metaTaxSetting.set(JSON.stringify(updatedMeta));
		}

		const newValues = Array.isArray(currentValues) ? [...currentValues] : [];
		let insertIndex = newValues.indexOf(baseId);
		if (insertIndex !== -1) {
			while (insertIndex + 1 < newValues.length && isClone(newValues[insertIndex + 1])) {
				insertIndex++;
			}
			newValues.splice(insertIndex + 1, 0, newId);
		} else {
			newValues.push(newId);
		}

		if (control.setting) {
			control.setting.set(newValues);
		}
		setValues(newValues);
		forceUpdate();
	};

	const handleDelete = (e, deleteId) => {
		e.stopPropagation();
		const currentValues = control.setting ? (control.setting.get() || []) : values;
		const newValues = Array.isArray(currentValues) ? currentValues.filter(id => id !== deleteId) : [];

		if (control.setting) {
			control.setting.set(newValues);
		}

		const metaTaxSetting = wp.customize('responsive_single_product_meta_taxonomies');
		if (metaTaxSetting) {
			let allMetaTax = {};
			const raw = metaTaxSetting.get();
			if (typeof raw === 'string') {
				try { allMetaTax = JSON.parse(raw); } catch (err) { allMetaTax = {}; }
			} else if (typeof raw === 'object' && raw !== null) {
				allMetaTax = raw;
			}
			if (allMetaTax && allMetaTax[deleteId]) {
				const updatedMeta = { ...allMetaTax };
				delete updatedMeta[deleteId];
				metaTaxSetting.set(JSON.stringify(updatedMeta));
			}
		}

		setValues(newValues);
		forceUpdate();
	};

	if (label) {
		labelHtml = <span className="customize-control-title">{label}</span>;
	}

	if (description) {
		descriptionHtml = <span className="description customize-control-description">{description}</span>;
	}

	const metaTaxSetting = wp.customize('responsive_single_product_meta_taxonomies');
	const allClones = [];
	if (metaTaxSetting) {
		let raw = metaTaxSetting.get();
		if (typeof raw === 'string') {
			try { raw = JSON.parse(raw); } catch (err) { raw = {}; }
		}
		if (raw && typeof raw === 'object') {
			Object.keys(raw).forEach(k => {
				if (isClone(k) && !allClones.includes(k)) {
					allClones.push(k);
				}
			});
		}
	}
	values.forEach(k => {
		if (isClone(k) && !allClones.includes(k)) {
			allClones.push(k);
		}
	});

	const renderItem = (choiceID, isInvisible) => {
		const hasSubControls = (sub_controls && sub_controls[choiceID] && sub_controls[choiceID].length > 0) ||
			(isTaxonomyChoice(choiceID) && sub_controls && (sub_controls['taxonomy'] || sub_controls['taxonomies'])) ||
			choiceID === 'payment' || choiceID === 'payments';
		const labelText = getChoiceLabel(choiceID);
		const canClone = isCloneable(choiceID);
		const canDelete = isClone(choiceID);

		return (
			<li
				{...inputAttrs}
				key={choiceID}
				className={`responsive-sortable-item${isInvisible ? ' invisible' : ''}${hasSubControls ? ' has-sub-controls' : ''}`}
				data-value={choiceID}
			>
				<div className="responsive-sortable-item-header">
					<div className="responsive-sortable-items-menu-choice-wrap">
						<span className="responsive-sortable-item-menu">
							<svg xmlns="http://www.w3.org/2000/svg" width="13px" height="13px" viewBox="0 0 48 48"><path fill="#007CBA" fillRule="#007CBA" d="M19 10a4 4 0 1 1-8 0a4 4 0 0 1 8 0m-4 18a4 4 0 1 0 0-8a4 4 0 0 0 0 8m0 14a4 4 0 1 0 0-8a4 4 0 0 0 0 8m22-32a4 4 0 1 1-8 0a4 4 0 0 1 8 0m-4 18a4 4 0 1 0 0-8a4 4 0 0 0 0 8m0 14a4 4 0 1 0 0-8a4 4 0 0 0 0 8" clipRule="evenodd"/></svg>
						</span>
						<span className="responsive-sortable-item-choice">{labelText}</span>
						{canClone && (
							<span
								className="responsive-sortable-action-icon responsive-sortable-clone-icon"
								title="Duplicate"
								onClick={(e) => handleClone(e, choiceID)}
							>
								<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
									<rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
									<path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
								</svg>
							</span>
						)}
						{canDelete && (
							<span
								className="responsive-sortable-action-icon responsive-sortable-delete-icon"
								title="Delete"
								onClick={(e) => handleDelete(e, choiceID)}
							>
								<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
									<circle cx="12" cy="12" r="10"></circle>
									<line x1="8" y1="12" x2="16" y2="12"></line>
								</svg>
							</span>
						)}
					</div>
					<div className="responsive-sortable-item-actions">
						{hasSubControls && (
							<span
								className="responsive-sortable-chevron"
								onClick={(e) => {
									e.stopPropagation();
									const target = e.currentTarget;
									target.classList.toggle('expanded');
									const dropdown = target.closest('li').querySelector('.responsive-sortable-dropdown');
									if (dropdown) {
										dropdown.style.display = dropdown.style.display === 'none' ? 'block' : 'none';
									}
								}}
							>
								<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
							</span>
						)}
						<span
							className="visibility"
							onClick={(e) => {
								e.stopPropagation();
								const li = e.currentTarget.closest('li');
								li.classList.toggle('invisible');
								const icons = e.currentTarget.querySelectorAll('.responsive-sortable-eye-icon');
								icons.forEach(ic => ic.classList.toggle('active'));
								control.updateValue();
							}}
						>
							<svg className={`responsive-sortable-eye-icon${!isInvisible ? ' active' : ''}`} xmlns="http://www.w3.org/2000/svg" width="19px" height="19px" viewBox="0 0 28 28"><path fill="#000000" d="M25.257 16h.005h-.01zm-.705-.52c.1.318.387.518.704.52c.07 0 .148-.02.226-.04c.39-.12.61-.55.48-.94C25.932 14.93 22.932 6 14 6S2.067 14.93 2.037 15.02c-.13.39.09.81.48.94c.4.13.82-.09.95-.48l.003-.005c.133-.39 2.737-7.975 10.54-7.975c7.842 0 10.432 7.65 10.542 7.98M9 16a5 5 0 1 1 10 0a5 5 0 0 1-10 0"/></svg>
							<svg className={`responsive-sortable-eye-icon${isInvisible ? ' active' : ''}`} xmlns="http://www.w3.org/2000/svg" width="19px" height="19px" viewBox="0 0 24 24"><path fill="#000" d="M2.22 2.22a.75.75 0 0 0-.073.976l.073.084l4.034 4.035a10 10 0 0 0-3.955 5.75a.75.75 0 0 0 1.455.364a8.5 8.5 0 0 1 3.58-5.034l1.81 1.81A4 4 0 0 0 14.8 15.86l5.919 5.92a.75.75 0 0 0 1.133-.977l-.073-.084l-6.113-6.114l.001-.002l-6.95-6.946l.002-.002l-1.133-1.13L3.28 2.22a.75.75 0 0 0-1.06 0M12 5.5c-1 0-1.97.148-2.889.425l1.237 1.236a8.503 8.503 0 0 1 9.899 6.272a.75.75 0 0 0 1.455-.363A10 10 0 0 0 12 5.5m.195 3.51l3.801 3.8a4.003 4.003 0 0 0-3.801-3.8"/></svg>
						</span>
					</div>
				</div>
				{hasSubControls && (
					<SubControls
						choiceID={choiceID}
						subControlIds={sub_controls ? (sub_controls[choiceID] || (isTaxonomyChoice(choiceID) ? (sub_controls['taxonomy'] || sub_controls['taxonomies']) : null)) : null}
						taxonomyChoices={taxonomy_choices}
						controlId={control.id}
					/>
				)}
			</li>
		);
	};

	const visibleMetaHtml = values
		.filter(choiceID => choices[choiceID] || isClone(choiceID))
		.map(choiceID => renderItem(choiceID, false));

	const invisibleMetaHtml = [
		...Object.keys(choices).filter(choiceID => !values.includes(choiceID)),
		...allClones.filter(choiceID => !values.includes(choiceID))
	].map(choiceID => renderItem(choiceID, true));

	return (
		<div className="responsive-sortable">
			{labelHtml}
			{descriptionHtml}
			<ul className="sortable responsive-sortable-items-wrapper">
				{visibleMetaHtml}
				{invisibleMetaHtml}
			</ul>
		</div>
	);
};

SortableComponent.propTypes = {
	control: PropTypes.object.isRequired
};

export default React.memo( SortableComponent );
