import React, { useState, useEffect, useMemo, useRef } from 'react';
import { PaymentSVGs, ALL_SVG_ICONS, ALL_ICONS_LIST, ICON_LABELS, ICON_SEARCH_TERMS } from './payment-icons-data';

const { MediaUpload } = wp.blockEditor || (wp.editor && wp.editor.MediaUpload) || {};

const PaymentIconPicker = ({ value, onChange }) => {
	const [isOpen, setIsOpen] = useState(false);
	const [search, setSearch] = useState('');
	const [page, setPage] = useState(0);
	const pickerRef = useRef(null);

	const iconsPerPage = 15;

	const filteredIcons = useMemo(() => {
		if (!search) return ALL_ICONS_LIST;
		const s = search.toLowerCase().trim();
		return ALL_ICONS_LIST.filter((ic) => {
			if (ic.toLowerCase().includes(s)) return true;
			const extra = ICON_SEARCH_TERMS[ic];
			if (extra && extra.toLowerCase().includes(s)) return true;
			const label = ICON_LABELS[ic];
			if (label && label.toLowerCase().includes(s)) return true;
			return false;
		});
	}, [search]);

	const totalPages = Math.max(1, Math.ceil(filteredIcons.length / iconsPerPage));
	const currentPage = Math.min(page, totalPages - 1);
	const currentIcons = filteredIcons.slice(currentPage * iconsPerPage, (currentPage + 1) * iconsPerPage);

	useEffect(() => {
		const handleClickOutside = (e) => {
			if (pickerRef.current && !pickerRef.current.contains(e.target)) {
				setIsOpen(false);
			}
		};
		if (isOpen) {
			document.addEventListener('mousedown', handleClickOutside);
		}
		return () => {
			document.removeEventListener('mousedown', handleClickOutside);
		};
	}, [isOpen]);

	const handleRemove = (e) => {
		e.stopPropagation();
		onChange('');
	};

	const handleSelect = (e, icon) => {
		e.stopPropagation();
		onChange(icon);
		setIsOpen(false);
	};

	const renderIconPreview = (icon) => {
		if (!icon) return null;
		if (ALL_SVG_ICONS[icon]) {
			return ALL_SVG_ICONS[icon];
		}
		return <i className={icon} />;
	};

	return (
		<div className="payment-icon-picker-wrapper" ref={pickerRef}>
			<div
				className={`rfipbtn${isOpen ? ' rfipbtn--open' : ''}`}
				onClick={() => setIsOpen(!isOpen)}
			>
				<div className="rfipbtn__current">
					{value ? (
						<span className="rfipbtn__icon">
							<span className="rfipbtn__elm">
								{renderIconPreview(value)}
							</span>
							<span
								className="rfipbtn__del"
								onClick={handleRemove}
								title="Remove"
								role="button"
							>
								×
							</span>
						</span>
					) : (
						<span className="rfipbtn__icon--empty">Select Icon</span>
					)}
				</div>
			</div>

			{isOpen && (
				<div className="rfipdropdown">
					<div className="rfipdropdown__selector">
						{/* Search Icons */}
						<div className="rfipsearch">
							<input
								type="text"
								placeholder="Search Icons"
								value={search}
								onChange={(e) => {
									setSearch(e.target.value);
									setPage(0);
								}}
								autoFocus
							/>
						</div>

						{/* Pager */}
						<div className="rfipicons__pager">
							<div className="rfipicons__num">
								<input
									type="tel"
									className="rfipicons__cp"
									min={1}
									max={totalPages}
									value={currentPage + 1}
									onChange={(e) => {
										const p = parseInt(e.target.value, 10);
										if (!isNaN(p) && p >= 1 && p <= totalPages) {
											setPage(p - 1);
										}
									}}
								/>
								<span className="rfipicons__sp">/</span>
								<span className="rfipicons__tp">{totalPages}</span>
							</div>
							<div className="rfipicons__arrow">
								{currentPage > 0 && (
									<span
										className="rfipicons__left"
										role="button"
										onClick={() => setPage(p => Math.max(0, p - 1))}
									>
										<i></i>
									</span>
								)}
								{currentPage < totalPages - 1 && (
									<span
										className="rfipicons__right"
										role="button"
										onClick={() => setPage(p => Math.min(totalPages - 1, p + 1))}
									>
										<i></i>
									</span>
								)}
							</div>
						</div>

						{/* Icons Grid */}
						<div className="rfipicons__selector">
							{currentIcons.map((ic) => (
								<div
									key={ic}
									className={`rfipicons__icon${value === ic ? ' rfipicons__icon--selected' : ''}`}
									title={ICON_LABELS[ic] || ic}
									onClick={(e) => handleSelect(e, ic)}
								>
									<span className="rfipicons__ibox">
										{renderIconPreview(ic)}
									</span>
								</div>
							))}
						</div>
					</div>
				</div>
			)}
		</div>
	);
};

const DEFAULT_PAYMENT_DATA = {
	color_type: 'default',
	title: 'Guaranteed Safe Checkout',
	cards: [
		{ id: 'visa', title: 'Visa', type: 'icon', icon: 'fab fa-cc-visa', image: '' },
		{ id: 'mastercard', title: 'Mastercard', type: 'icon', icon: 'fab fa-cc-mastercard', image: '' },
		{ id: 'amex', title: 'Amex', type: 'icon', icon: 'fab fa-cc-amex', image: '' },
		{ id: 'discover', title: 'Discover', type: 'icon', icon: 'fab fa-cc-discover', image: '' }
	]
};

const PaymentSubControl = () => {
	const settingId = 'responsive_single_product_payment_structure';

	const getInitialData = () => {
		const setting = wp.customize && wp.customize(settingId);
		if (setting) {
			const val = setting.get();
			if (typeof val === 'string') {
				try {
					const parsed = JSON.parse(val);
					if (parsed && typeof parsed === 'object') return parsed;
				} catch (e) {
					// fallback
				}
			} else if (val && typeof val === 'object') {
				return val;
			}
		}
		return DEFAULT_PAYMENT_DATA;
	};

	const [data, setData] = useState(getInitialData);
	const [expandedCardId, setExpandedCardId] = useState(null);

	useEffect(() => {
		const setting = wp.customize && wp.customize(settingId);
		if (!setting) return;

		const handleSettingChange = (newVal) => {
			if (typeof newVal === 'string') {
				try {
					const parsed = JSON.parse(newVal);
					if (parsed && typeof parsed === 'object') setData(parsed);
				} catch (e) {}
			} else if (newVal && typeof newVal === 'object') {
				setData(newVal);
			}
		};

		setting.bind(handleSettingChange);
		return () => setting.unbind(handleSettingChange);
	}, []);

	const saveChanges = (updatedData) => {
		setData(updatedData);
		const setting = wp.customize && wp.customize(settingId);
		if (setting) {
			setting.set(JSON.stringify(updatedData));
		}
	};

	const handleColorTypeChange = (type) => {
		const updated = { ...data, color_type: type };
		saveChanges(updated);
	};

	const handleTitleChange = (e) => {
		const updated = { ...data, title: e.target.value };
		saveChanges(updated);
	};

	const toggleCardExpand = (cardId) => {
		setExpandedCardId(expandedCardId === cardId ? null : cardId);
	};

	const handleDuplicateCard = (e, index) => {
		e.stopPropagation();
		const cardToClone = data.cards[index];
		const newCard = {
			...cardToClone,
			id: `card_${Date.now()}_${Math.floor(Math.random() * 1000)}`,
			title: `${cardToClone.title || 'Payment'}`,
		};
		const newCards = [...data.cards];
		newCards.splice(index + 1, 0, newCard);
		saveChanges({ ...data, cards: newCards });
		setExpandedCardId(newCard.id);
	};

	const handleDeleteCard = (e, index) => {
		e.stopPropagation();
		if (index === 0) return; // 1st card cannot be deleted
		const newCards = data.cards.filter((_, i) => i !== index);
		saveChanges({ ...data, cards: newCards });
		if (expandedCardId === data.cards[index].id) {
			setExpandedCardId(null);
		}
	};

	const handleCardTitleChange = (index, newTitle) => {
		const newCards = [...data.cards];
		newCards[index] = { ...newCards[index], title: newTitle };
		saveChanges({ ...data, cards: newCards });
	};

	const handleCardTypeChange = (index, newType) => {
		const newCards = [...data.cards];
		newCards[index] = { ...newCards[index], type: newType };
		saveChanges({ ...data, cards: newCards });
	};

	const handleCardIconChange = (index, newIcon) => {
		if (data.cards && data.cards[index] && data.cards[index].icon === newIcon) {
			return;
		}
		const newCards = [...data.cards];
		newCards[index] = { ...newCards[index], icon: newIcon };
		saveChanges({ ...data, cards: newCards });
	};

	const handleCardImageChange = (index, imageUrl) => {
		const newCards = [...data.cards];
		newCards[index] = { ...newCards[index], image: imageUrl };
		saveChanges({ ...data, cards: newCards });
	};

	const renderCardPreviewIcon = (card) => {
		if (card.type === 'image' && card.image) {
			return <img src={card.image} alt={card.title} className="payment-card-thumb-image" />;
		}
		if (ALL_SVG_ICONS[card.icon]) {
			return (
				<span className={`payment-card-svg-icon ${data.color_type === 'grayscale' ? 'is-grayscale' : ''}`}>
					{ALL_SVG_ICONS[card.icon]}
				</span>
			);
		}
		if (card.icon) {
			return (
				<span className={`payment-card-font-icon ${data.color_type === 'grayscale' ? 'is-grayscale' : ''}`}>
					<i className={card.icon} />
				</span>
			);
		}
		return <span className="payment-card-empty-icon dashicons dashicons-money-alt" />;
	};

	const renderFontIcon = (icon) => {
		if (ALL_SVG_ICONS[icon]) {
			return <span className="rfip-payment-svg">{ALL_SVG_ICONS[icon]}</span>;
		}
		return <i className={icon} />;
	};

	return (
		<div
			className="responsive-sortable-dropdown responsive-payment-structure-dropdown"
			style={{ display: 'none' }}
			onClick={(e) => e.stopPropagation()}
			onMouseDown={(e) => e.stopPropagation()}
		>
			{/* CHOOSE ICON COLORS */}
			<div className="payment-control-group">
				<span className="payment-control-heading">CHOOSE ICON COLORS</span>
				<div className="payment-segmented-control">
					<button
						type="button"
						className={`payment-segmented-btn${data.color_type === 'default' ? ' is-active' : ''}`}
						onClick={() => handleColorTypeChange('default')}
					>
						Default
					</button>
					<button
						type="button"
						className={`payment-segmented-btn${data.color_type === 'grayscale' ? ' is-active' : ''}`}
						onClick={() => handleColorTypeChange('grayscale')}
					>
						Grayscale
					</button>
				</div>
			</div>

			{/* PAYMENT TITLE */}
			<div className="payment-control-group">
				<span className="payment-control-heading">PAYMENT TITLE</span>
				<input
					type="text"
					className="payment-text-input"
					value={data.title || ''}
					onChange={handleTitleChange}
					placeholder="Guaranteed Safe Checkout"
				/>
			</div>

			{/* PAYMENT CARDS LIST */}
			<div className="payment-cards-list">
				{(data.cards || []).map((card, index) => {
					const isExpanded = expandedCardId === card.id;
					const canDelete = index > 0; // 1st card cannot be deleted

					return (
						<div
							key={card.id || index}
							className={`payment-card-item${isExpanded ? ' is-expanded' : ''}`}
						>
							{/* Card Header */}
							<div
								className="payment-card-header"
								onClick={() => toggleCardExpand(card.id)}
							>
								<div className="payment-card-left">
									<div className="payment-card-icon-preview">
										{renderCardPreviewIcon(card)}
									</div>
									<span className="payment-card-title">{card.title || 'Payment'}</span>
								</div>

								<div className="payment-card-actions">
									{/* Duplicate Button */}
									<button
										type="button"
										className="payment-action-btn payment-duplicate-btn"
										title="Duplicate"
										onClick={(e) => handleDuplicateCard(e, index)}
									>
										<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
											<rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
											<path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
										</svg>
									</button>

									{/* Delete Button (Cards 2, 3, 4...) */}
									{canDelete && (
										<button
											type="button"
											className="payment-action-btn payment-delete-btn"
											title="Delete"
											onClick={(e) => handleDeleteCard(e, index)}
										>
											<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#d63638" strokeWidth="2.5" strokeLinecap="round" strokeLinejoin="round">
												<line x1="18" y1="6" x2="6" y2="18"></line>
												<line x1="6" y1="6" x2="18" y2="18"></line>
											</svg>
										</button>
									)}
								</div>
							</div>

							{/* Card Expanded Content */}
							{isExpanded && (
								<div className="payment-card-content">
									{/* Payment Title Field */}
									<div className="payment-card-field">
										<label className="payment-field-label">Payment Title</label>
										<input
											type="text"
											className="payment-text-input"
											value={card.title || ''}
											onChange={(e) => handleCardTitleChange(index, e.target.value)}
										/>
									</div>

									{/* Type Toggle: Icon vs Image */}
									<div className="payment-card-field">
										<div className="payment-segmented-control payment-type-switcher">
											<button
												type="button"
												className={`payment-segmented-btn${card.type !== 'image' ? ' is-active' : ''}`}
												onClick={() => handleCardTypeChange(index, 'icon')}
											>
												Icon
											</button>
											<button
												type="button"
												className={`payment-segmented-btn${card.type === 'image' ? ' is-active' : ''}`}
												onClick={() => handleCardTypeChange(index, 'image')}
											>
												Image
											</button>
										</div>
									</div>

									{/* When Icon is Selected */}
									{card.type !== 'image' && (
										<div className="payment-card-field">
											<label className="payment-field-label">Icon</label>
											<PaymentIconPicker
												value={card.icon || ''}
												onChange={(newIcon) => handleCardIconChange(index, newIcon)}
											/>
										</div>
									)}

									{/* When Image is Selected */}
									{card.type === 'image' && (
										<div className="payment-card-field">
											<label className="payment-field-label">Image</label>
											<div className="payment-image-uploader">
												{card.image ? (
													<div className="payment-image-preview-wrap">
														<div className="payment-image-preview-box">
															<img src={card.image} alt={card.title} className="payment-image-preview" />
														</div>
														<div className="payment-image-actions">
															{MediaUpload && (
																<MediaUpload
																	onSelect={(media) => handleCardImageChange(index, media.url)}
																	allowedTypes={['image']}
																	render={({ open }) => (
																		<button
																			type="button"
																			className="button button-secondary payment-change-image-btn"
																			onClick={open}
																		>
																			Change
																		</button>
																	)}
																/>
															)}
															<button
																type="button"
																className="button button-link-delete payment-remove-image-btn"
																onClick={() => handleCardImageChange(index, '')}
															>
																Remove
															</button>
														</div>
													</div>
												) : (
													MediaUpload && (
														<MediaUpload
															onSelect={(media) => handleCardImageChange(index, media.url)}
															allowedTypes={['image']}
															render={({ open }) => (
																<button
																	type="button"
																	className="button button-secondary"
																	onClick={open}
																>
																	Upload Image
																</button>
															)}
														/>
													)
												)}
											</div>
										</div>
									)}
								</div>
							)}
						</div>
					);
				})}
			</div>
		</div>
	);
};

export default PaymentSubControl;
