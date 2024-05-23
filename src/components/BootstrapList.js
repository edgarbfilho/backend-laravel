import React, { useState, useEffect } from 'react';
import axios from 'axios';

function BootstrapList() {
    const [bootstraps, setBootstraps] = useState([]);

    useEffect(() => {
        axios.get('/api/bootstraps')
            .then(response => {
                setBootstraps(response.data);
            })
            .catch(error => {
                console.error('Error fetching data: ', error);
            });
    }, []);

    return (
        <div>
            <h1>Bootstrap List</h1>
            <ul>
                {bootstraps.map(bootstrap => (
                    <li key={bootstrap.id}>
                        {bootstrap.nome}, {bootstrap.email}, {bootstrap.telefone}
                    </li>
                ))}
            </ul>
        </div>
    );
}

export default BootstrapList;

