window.addEventListener( 'load', function(e) {

    /**
	 * Connects theme styles to core block style so it loads in full size editing context.
	 * This is a workaround so dynamic css can be loaded in Iframe.
	 */
    wp.data.subscribe(function () {
        setTimeout(() => {
            setTimeout(() => {
                const iframes = document.getElementsByTagName('iframe');
                if (!iframes?.length) return;
        
                const cloneLinkElement = (id) => {
                    const element = document.getElementById(id);
                    return element ? element.cloneNode(true) : null;
                }

                const googleFontsStyle = cloneLinkElement('responsive-google-font-css');
        
                const appendLinkIfNotExists = (iframeDoc, clonedLink, linkId) => {
                    if (clonedLink && !iframeDoc.getElementById(linkId)) {
                        iframeDoc.head.appendChild(clonedLink);
                    }
                }
        
                for (const iframe of iframes) {
                    try {
                        const iframeDoc = iframe?.contentWindow?.document || iframe?.contentDocument;
                        if (iframeDoc?.head) {
                            appendLinkIfNotExists(iframeDoc, googleFontsStyle, 'responsive-google-font-css');
                        }
                    } catch {
                        // Access denied to iframe document.
                    }
                }
            }, 500);
        }, 100);
    });
});