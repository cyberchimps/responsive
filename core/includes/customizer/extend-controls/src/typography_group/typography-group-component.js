import PropTypes from 'prop-types';
import React, { useEffect, useRef } from 'react';

const TypographyGroupControlComponent = (props) => {

    const { label, connected_control } = props.control.params;

    // Suffixes for related controls
    const suffixes = [
        'font-family',
        'font-size',
        'font-weight',
        'text-transform',
        'font-style',
        'line-height',
        'letter-spacing',
        'color',
        'font-color'
    ];

    // Refs for DOM elements and flag
    const typoGroupSelectRef = useRef(null);
    const typoGroupWrapperRef = useRef(null);
    const hasWrappedRef = useRef(false);

    // Function to create or update the <ul> and wrap <li> elements
    const wrapLiElements = () => {
    
        // IDs of the <li> elements to be wrapped
        const liIds = [
            `customize-control-${connected_control}-font-family`,
            `customize-control-${connected_control}-font-size`,
            `customize-control-${connected_control}-font-weight`,
            `customize-control-${connected_control}-text-transform`,
            `customize-control-${connected_control}-font-style`,
            `customize-control-${connected_control}-line-height`,
            `customize-control-${connected_control}-letter-spacing`,
            `customize-control-${connected_control}-color`,
            `customize-control-${connected_control}-font-color`
        ];
    
        let ul = document.querySelector(`.responsive-typography-settings-group-${connected_control}`);
        if (!ul) {
            ul = document.createElement('ul');
            ul.className = `responsive-typography-settings-group responsive-typography-settings-group-${connected_control}`;
            typoGroupWrapperRef.current = ul;
        }
    
        // Append <li> elements to the <ul>
        liIds.forEach(id => {
            const li = document.getElementById(id);
            if (li && !ul.contains(li)) {
                ul.appendChild(li);
            }
        });
    
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
    }, [connected_control]);

    // Event listener for clicks outside the typoGroupSelectRef and typoGroupWrapperRef
    const handleClickOutsideTypoGroupSelect = (event) => {
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
        const controlSuffixes = suffixes.map(suffix => `${connected_control}-${suffix}`);
        controlSuffixes.forEach(suffix => {
            const element = document.getElementById(`customize-control-${suffix}`);
            if (element) {
                element.style.display = window.getComputedStyle(element).display === 'none' ? 'list-item' : 'none';
            }
        });
    };

    return (
        <div className="responsive-typography-settings-group-icon">
            <span className="customize-control-title">{label}</span>
            <svg ref={typoGroupSelectRef} className="responsive-select-typo-group" data-connected-control={connected_control} onClick={toggleRelatedTypoControls} width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M15.1882 5.42371C15.6125 5.46914 15.9506 5.66389 16.2195 5.86902C16.5038 6.08591 16.8085 6.39362 17.1218 6.70691L17.2937 6.87878L17.7488 7.3407C17.8919 7.49154 18.0231 7.63899 18.1316 7.78113C18.3661 8.0885 18.5867 8.48632 18.5867 8.99988C18.5867 9.51343 18.3661 9.91126 18.1316 10.2186C18.0231 10.3608 17.8919 10.5082 17.7488 10.6591L17.2937 11.121L10.0994 18.3153C9.9816 18.4331 9.83767 18.5838 9.66187 18.7147L9.47534 18.8378C9.34339 18.9125 9.20446 18.9653 9.07202 19.0067L8.70581 19.1044L6.09741 19.7557L6.09546 19.7567L6.05151 19.7675C5.90366 19.8044 5.68229 19.8627 5.48804 19.8817C5.30725 19.8994 4.93857 19.9072 4.60229 19.662L4.46069 19.5399C4.09192 19.1711 4.09868 18.7193 4.1189 18.5126C4.13792 18.3183 4.19619 18.097 4.23315 17.9491L4.89624 15.2948L4.9939 14.9286C5.03527 14.7962 5.08813 14.6572 5.16284 14.5253L5.28589 14.3387C5.41681 14.1629 5.56753 14.019 5.6853 13.9012L12.8796 6.70691L13.3416 6.25183C13.4924 6.10866 13.6398 5.97746 13.782 5.86902C14.0894 5.63454 14.4872 5.41394 15.0007 5.41394L15.1882 5.42371Z" stroke="#50575E" stroke-width="2"/>
            <path d="M12.5007 7.49988L15.5007 5.49988L18.5007 8.49988L16.5007 11.4999L12.5007 7.49988Z" fill="#50575E"/>
            </svg>
        </div>
    );
};

TypographyGroupControlComponent.propTypes = {
    control: PropTypes.object.isRequired
};

export default React.memo(TypographyGroupControlComponent);