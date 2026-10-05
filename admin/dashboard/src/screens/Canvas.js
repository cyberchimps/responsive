import { Routes, Route, Navigate } from 'react-router-dom';
import Dashboard from './Dashboard';
import Blocks from './Blocks';
import AddonsElementor from './AddonsElementor';
import Settings from './Settings';
import Templates from './Templates';

const Canvas = () => {
    return (
        <Routes>
            <Route path='/' element={<Dashboard />} />
            <Route path='/blocks' element={<Blocks />} />
            <Route path='/rae' element={<AddonsElementor />} />
            <Route
                path='/settings'
                element={
                    localize?.isRSTActivated
                        ? <Settings />
                        : <Navigate to='/templates' replace />
                }
            />
            <Route path='/templates' element={<Templates />} />
        </Routes>
    )
}

export default Canvas;