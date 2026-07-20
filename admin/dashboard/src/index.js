import { HashRouter } from 'react-router-dom';
import Header from "./components/Header";
import Footer from './components/Footer';
import Canvas from './screens/Canvas';
import { createRoot } from '@wordpress/element';
import { ResponsiveProvider } from './Context';

const GettingStarted = () => {
    return (
        <>
            <Header />
            <ResponsiveProvider>
                <Canvas />
            </ResponsiveProvider>
            <Footer />
        </>
    )
}

document.addEventListener('DOMContentLoaded', () => {
    const rootElement = document.getElementById('responsive-getting-started-page-app');

    if (rootElement) {
        // Create the root once
        const root = createRoot(rootElement);

        // Render the app
        root.render(
            <HashRouter>
                <GettingStarted />
            </HashRouter>
        );
    }
});