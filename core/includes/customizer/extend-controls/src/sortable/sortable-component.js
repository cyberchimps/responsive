import PropTypes from 'prop-types';

const SortableComponent = props => {

	let labelHtml = null,
		descriptionHtml = null;

	const {
		label,
		description,
		value,
		choices,
		inputAttrs
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
			html = <li {...inputAttrs} key={choiceID} className='responsive-sortable-item' data-value={choiceID}>
				<div class="responsive-sortable-items-menu-choice-wrap">
					<span class="responsive-sortable-item-menu">
						<svg xmlns="http://www.w3.org/2000/svg" width="13px" height="13px" viewBox="0 0 48 48"><path fill="#007CBA" fill-rule="#007CBA" d="M19 10a4 4 0 1 1-8 0a4 4 0 0 1 8 0m-4 18a4 4 0 1 0 0-8a4 4 0 0 0 0 8m0 14a4 4 0 1 0 0-8a4 4 0 0 0 0 8m22-32a4 4 0 1 1-8 0a4 4 0 0 1 8 0m-4 18a4 4 0 1 0 0-8a4 4 0 0 0 0 8m0 14a4 4 0 1 0 0-8a4 4 0 0 0 0 8" clip-rule="evenodd"/></svg>
					</span>
					<span class="responsive-sortable-item-choice">{choices[choiceID]}</span>
				</div>
				<span className="visibility">
					<svg class="responsive-sortable-eye-icon active" xmlns="http://www.w3.org/2000/svg" width="19px" height="19px" viewBox="0 0 28 28"><path fill="#000000" d="M25.257 16h.005h-.01zm-.705-.52c.1.318.387.518.704.52c.07 0 .148-.02.226-.04c.39-.12.61-.55.48-.94C25.932 14.93 22.932 6 14 6S2.067 14.93 2.037 15.02c-.13.39.09.81.48.94c.4.13.82-.09.95-.48l.003-.005c.133-.39 2.737-7.975 10.54-7.975c7.842 0 10.432 7.65 10.542 7.98M9 16a5 5 0 1 1 10 0a5 5 0 0 1-10 0"/></svg>
					<svg class="responsive-sortable-eye-icon" xmlns="http://www.w3.org/2000/svg" width="19px" height="19px" viewBox="0 0 24 24"><path fill="#000" d="M2.22 2.22a.75.75 0 0 0-.073.976l.073.084l4.034 4.035a10 10 0 0 0-3.955 5.75a.75.75 0 0 0 1.455.364a8.5 8.5 0 0 1 3.58-5.034l1.81 1.81A4 4 0 0 0 14.8 15.86l5.919 5.92a.75.75 0 0 0 1.133-.977l-.073-.084l-6.113-6.114l.001-.002l-6.95-6.946l.002-.002l-1.133-1.13L3.28 2.22a.75.75 0 0 0-1.06 0M12 5.5c-1 0-1.97.148-2.889.425l1.237 1.236a8.503 8.503 0 0 1 9.899 6.272a.75.75 0 0 0 1.455-.363A10 10 0 0 0 12 5.5m.195 3.51l3.801 3.8a4.003 4.003 0 0 0-3.801-3.8"/></svg>
				</span>
			</li>;
		}
		return html;
	});

	let invisibleMetaHtml = Object.keys(choices).map(choiceID => {
		let html = '';
		if (Array.isArray(value) && -1 === value.indexOf(choiceID)) {
			html = <li {...inputAttrs} key={choiceID} className='responsive-sortable-item invisible' data-value={choiceID}>
				<div class="responsive-sortable-items-menu-choice-wrap">
					<span class="responsive-sortable-item-menu">
						<svg xmlns="http://www.w3.org/2000/svg" width="13px" height="13px" viewBox="0 0 48 48"><path fill="#007CBA" fill-rule="#007CBA" d="M19 10a4 4 0 1 1-8 0a4 4 0 0 1 8 0m-4 18a4 4 0 1 0 0-8a4 4 0 0 0 0 8m0 14a4 4 0 1 0 0-8a4 4 0 0 0 0 8m22-32a4 4 0 1 1-8 0a4 4 0 0 1 8 0m-4 18a4 4 0 1 0 0-8a4 4 0 0 0 0 8m0 14a4 4 0 1 0 0-8a4 4 0 0 0 0 8" clip-rule="evenodd"/></svg>
					</span>
					<span class="responsive-sortable-item-choice">{choices[choiceID]}</span>
				</div>
				<span className="visibility">
					<svg class="responsive-sortable-eye-icon active" xmlns="http://www.w3.org/2000/svg" width="19px" height="19px" viewBox="0 0 24 24"><path fill="#000" d="M2.22 2.22a.75.75 0 0 0-.073.976l.073.084l4.034 4.035a10 10 0 0 0-3.955 5.75a.75.75 0 0 0 1.455.364a8.5 8.5 0 0 1 3.58-5.034l1.81 1.81A4 4 0 0 0 14.8 15.86l5.919 5.92a.75.75 0 0 0 1.133-.977l-.073-.084l-6.113-6.114l.001-.002l-6.95-6.946l.002-.002l-1.133-1.13L3.28 2.22a.75.75 0 0 0-1.06 0M12 5.5c-1 0-1.97.148-2.889.425l1.237 1.236a8.503 8.503 0 0 1 9.899 6.272a.75.75 0 0 0 1.455-.363A10 10 0 0 0 12 5.5m.195 3.51l3.801 3.8a4.003 4.003 0 0 0-3.801-3.8"/></svg>
					<svg class="responsive-sortable-eye-icon" xmlns="http://www.w3.org/2000/svg" width="19px" height="19px" viewBox="0 0 28 28"><path fill="#000000" d="M25.257 16h.005h-.01zm-.705-.52c.1.318.387.518.704.52c.07 0 .148-.02.226-.04c.39-.12.61-.55.48-.94C25.932 14.93 22.932 6 14 6S2.067 14.93 2.037 15.02c-.13.39.09.81.48.94c.4.13.82-.09.95-.48l.003-.005c.133-.39 2.737-7.975 10.54-7.975c7.842 0 10.432 7.65 10.542 7.98M9 16a5 5 0 1 1 10 0a5 5 0 0 1-10 0"/></svg>
				</span>
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
