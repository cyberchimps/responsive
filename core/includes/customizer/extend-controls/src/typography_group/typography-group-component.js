import PropTypes from 'prop-types';
import React, { useEffect, useRef } from 'react';

const TypographyGroupControlComponent = (props) => {

    const { label, connected_control } = props.control.params;

    // Suffixes for related controls
    const suffixes = [
        'font-family',
        'font-weight',
        'font-size',
        'line-height',
        'letter-spacing',
        'text-transform',
        'font-style',
        'color',
        'font-color'
    ];

    // Refs for DOM elements and flag
    const typoGroupSelectRef = useRef(null);
    const typoGroupWrapperRef = useRef(null);
    const hasWrappedRef = useRef(false);

    // active device state
    const [activeDevice, setActiveDevice] = React.useState('desktop');

	useEffect(() => {
		if (window.wp && window.wp.customize && window.wp.customize.previewedDevice) {
			const currentDevice = window.wp.customize.previewedDevice.get();
            setActiveDevice(currentDevice);
			
			const handleDeviceChange = () => {
				const device = window.wp.customize.previewedDevice.get();
                setActiveDevice(device);
			};
			window.wp.customize.previewedDevice.bind(handleDeviceChange);
			return () => {
				window.wp.customize.previewedDevice.unbind(handleDeviceChange);
			};
		}
	}, []);

    // Function to create or update the <ul> and wrap <li> elements
    const wrapLiElements = () => {
    
        // IDs of the <li> elements to be wrapped
        const liIds = [
            `customize-control-${connected_control}-font-family`,
            `customize-control-${connected_control}-font-weight`,
            `customize-control-${connected_control}-font-size`,
            `customize-control-${connected_control}-line-height`,
            `customize-control-${connected_control}-letter-spacing`,
            `customize-control-${connected_control}-color`,
            `customize-control-${connected_control}-font-color`,
            `customize-control-${connected_control}-text-transform`,
            `customize-control-${connected_control}-font-style`
        ];
    
        let ul = document.querySelector(`.responsive-typography-settings-group-${connected_control}`);
        if (!ul) {
            ul = document.createElement('ul');
            ul.classList.add('responsive-typography-settings-group');
            ul.classList.add(`responsive-typography-settings-group-${connected_control}`);
            ul.classList.add(`control-device-${activeDevice}`);
            typoGroupWrapperRef.current = ul;
        } else {
            ul.classList.remove('control-device-desktop', 'control-device-tablet', 'control-device-mobile');
            ul.classList.add(`control-device-${activeDevice}`);
            typoGroupWrapperRef.current = ul;
        }
    
        let inlineWrapper = ul.querySelector('.responsive-typography-inline-container');
        if (!inlineWrapper) {
            inlineWrapper = document.createElement('li');
            inlineWrapper.className = 'responsive-typography-inline-container';
        }

        const isActive = ul.classList.contains('active');

        // Append <li> elements to the <ul>
        liIds.forEach(id => {
            const li = document.getElementById(id);
            if (li) {
                if (isActive && window.getComputedStyle(li).display === 'none') {
                    li.style.display = 'list-item';
                }
                if (id.endsWith('text-transform') || id.endsWith('font-style')) {
                    if (!inlineWrapper.contains(li)) {
                        inlineWrapper.appendChild(li);
                    }
                } else {
                    if (!ul.contains(li)) {
                        ul.appendChild(li);
                    }
                }
            }
        });

        if (inlineWrapper.hasChildNodes() && ul.lastChild !== inlineWrapper) {
            ul.appendChild(inlineWrapper);
        }
    
        // Find the reference element
        const referenceElement = document.getElementById(`customize-control-responsive_${connected_control}_group`);
        if (referenceElement) {
            // Check if ul already has been added or if it needs to be inserted
            if (!referenceElement.nextElementSibling || !referenceElement.nextElementSibling.classList.contains('responsive-typography-settings-group')) {
                referenceElement.insertAdjacentElement('afterend', ul);
            }
            hasWrappedRef.current = true;
        } else {
            console.error('Reference element not found');
        }
    };
    

    useEffect(() => {
        // Wrap <li> elements initially
        const timeoutId = setTimeout(() => {
            wrapLiElements();
        }, 1000);

        // Set up MutationObserver to watch for changes
        const observer = new MutationObserver(() => {
            wrapLiElements();
        });

        observer.observe(document.body, {
            childList: true,
            subtree: true
        });

        // Cleanup function
        return () => {
            clearTimeout(timeoutId);
            observer.disconnect();
        };
    }, [connected_control, activeDevice]);

    // Event listener for clicks outside the typoGroupSelectRef and typoGroupWrapperRef
    const handleClickOutsideTypoGroupSelect = (event) => {
        // If the event target was removed from the DOM (e.g., by a React re-render), 
        // ignore the click to prevent falsely closing the dropdown.
        if (!document.body.contains(event.target)) {
            return;
        }

        if (
            typoGroupSelectRef.current &&
            !typoGroupSelectRef.current.contains(event.target) &&
            typoGroupWrapperRef.current &&
            !typoGroupWrapperRef.current.contains(event.target)
        ) {
            const controlSuffixes = suffixes.map(suffix => `${connected_control}-${suffix}`);
            controlSuffixes.forEach(suffix => {
                const element = document.getElementById(`customize-control-${suffix}`);
                if (element && window.getComputedStyle(element).display !== 'none') {
                    element.style.display = 'none';
                }
            });

            // Hide inline container
            if (typoGroupWrapperRef.current) {
                typoGroupWrapperRef.current.classList.remove('active');
                const inlineWrapper = typoGroupWrapperRef.current.querySelector('.responsive-typography-inline-container');
                if (inlineWrapper) {
                    inlineWrapper.style.display = 'none';
                }
            }
        }
    };

    useEffect(() => {
        document.addEventListener('click', handleClickOutsideTypoGroupSelect, true);

        return () => {
            document.removeEventListener('click', handleClickOutsideTypoGroupSelect, true);
        };
    }, [connected_control]);

    // Toggle visibility of related controls
    const toggleRelatedTypoControls = () => {
        let hasVisibleChildren = false;
        const controlSuffixes = suffixes.map(suffix => `${connected_control}-${suffix}`);
        controlSuffixes.forEach(suffix => {
            const element = document.getElementById(`customize-control-${suffix}`);
            if (element) {
                const isHidden = window.getComputedStyle(element).display === 'none';
                if (isHidden) {
                    element.style.display = 'list-item';
                    hasVisibleChildren = true;
                } else {
                    element.style.display = 'none';
                }
            }
        });

        // Toggle inline container based on children visibility
        if (typoGroupWrapperRef.current) {
            if (hasVisibleChildren) {
                typoGroupWrapperRef.current.classList.add('active');
            } else {
                typoGroupWrapperRef.current.classList.remove('active');
            }

            const inlineWrapper = typoGroupWrapperRef.current.querySelector('.responsive-typography-inline-container');
            if (inlineWrapper) {
                const hasVisibleInline = Array.from(inlineWrapper.children).some(child => window.getComputedStyle(child).display !== 'none');
                inlineWrapper.style.display = hasVisibleInline ? 'flex' : 'none';
            }
        }
    };

    return (
        <div className="responsive-typography-settings-group-icon">
            <span className="customize-control-title">{label}</span>
            <svg ref={typoGroupSelectRef} className="responsive-select-typo-group" data-connected-control={connected_control} onClick={toggleRelatedTypoControls} width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M15 2.70711L18.0052 5.71231L7.32322 16.3943L3.41646 17.2959L4.31802 13.3891L15 2.70711Z" stroke="currentColor"></path>
            <path d="M16.0282 8.24731L13.0583 5.27747" stroke="currentColor"></path>
            </svg>
        </div>
    );
};

TypographyGroupControlComponent.propTypes = {
    control: PropTypes.object.isRequired
};

export default React.memo(TypographyGroupControlComponent);