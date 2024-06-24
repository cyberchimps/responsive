import PropTypes from 'prop-types';
import {__} from '@wordpress/i18n';
import { useState, useEffect } from 'react';

const TabsComponent = props => {

	const onTabClick = (value) => {
		setTab(value)
	};

	const [tab, setTab] = useState('general');

	const {
		label,
		name,
		description,
		id,
		design_id,
		general_id,
		design_tab_ids,
		general_tab_ids,
	} = props.control.params;

	const elementsToHide = {
		design: general_tab_ids,
		general: design_tab_ids,
	};

	useEffect(() => {
		const showElements = tab === 'general' ? 'design' : 'general';
		elementsToHide[showElements].forEach(elementId => {
			const element = document.getElementById(elementId);
			if (element) {
				element.style.display = 'block';
			}
		});
		elementsToHide[tab].forEach(elementId => {
			const element = document.getElementById(elementId);
			if (element) {
				element.style.display = 'none';
			}
		});
	}, [tab]);

	console.log('props.control.params');
	console.log(props.control.params);

	return <>
		<div className='responsive-component-tabs nav-tab-wrapper wp-clearfix' data-name={name}>
			<a
				href="#"
				className={`nav-tab responsive-component-tabs-button ${tab === 'general' ? 'nav-tab-active' : ''}`}
				id={general_id}
				onClick={() => onTabClick('general')}
				>
					<span>{__( 'General', 'responsive' )}</span>
			</a>
			<a
				type="#"
				className={`nav-tab responsive-component-tabs-button ${tab === 'design' ? 'nav-tab-active' : ''}`}
				id={design_id}
				onClick={() => onTabClick('design')}
				>
					<span>{ __('Design', 'responsive' )}</span>
			</a>
		</div>
	</>;

};

TabsComponent.propTypes = {
	control: PropTypes.object.isRequired
};

export default React.memo(TabsComponent);