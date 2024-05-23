import React from 'react';
import { BrowserRouter as Router, Route, Switch } from 'react-router-dom';
import BootstrapList from './components/BootstrapList';
import BootstrapForm from './components/BootstrapForm';

function App() {
    return (
        <Router>
            <div>
                <Switch>
                    <Route exact path="/" component={BootstrapList} />
                    <Route path="/create" component={BootstrapForm} />
                </Switch>
            </div>
        </Router>
    );
}

export default App;

