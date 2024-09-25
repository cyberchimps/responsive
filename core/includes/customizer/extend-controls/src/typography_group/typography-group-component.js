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
    
        if (connected_control === 'body_typography') {
            liIds.push('customize-control-responsive_paragraph_margin_bottom');
        }
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
            if (connected_control === 'body_typography') {
                controlSuffixes.push('responsive_paragraph_margin_bottom');
            }
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
        if (connected_control === 'body_typography') {
            controlSuffixes.push('responsive_paragraph_margin_bottom');
        }
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
            <img
                ref={typoGroupSelectRef}
                className="responsive-select-typo-group"
                src={`${localize.path}typography-group-select.svg`}
                data-connected-control={connected_control}
                onClick={toggleRelatedTypoControls}
                alt="Toggle Typography"
            />
        </div>
    );
};

TypographyGroupControlComponent.propTypes = {
    control: PropTypes.object.isRequired
};

export default React.memo(TypographyGroupControlComponent);