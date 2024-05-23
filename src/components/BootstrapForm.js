import React, { useState } from 'react';
import axios from 'axios';

function BootstrapForm() {
    const [nome, setNome] = useState('');
    const [email, setEmail] = useState('');
    const [telefone, setTelefone] = useState('');

    const handleSubmit = (e) => {
        e.preventDefault();
        axios.post('/api/bootstraps', { nome, email, telefone })
            .then(response => {
                console.log('Record created: ', response.data);
                setNome('');
                setEmail('');
                setTelefone('');
            })
            .catch(error => {
                console.error('Error creating record: ', error);
            });
    };

    return (
        <div>
            <h1>Create Bootstrap</h1>
            <form onSubmit={handleSubmit}>
                <input type="text" value={nome} onChange={(e) => setNome(e.target.value)} placeholder="Nome" required />
                <input type="email" value={email} onChange={(e) => setEmail(e.target.value)} placeholder="Email" required />
                <input type="text" value={telefone} onChange={(e) => setTelefone(e.target.value)} placeholder="Telefone" required />
                <button type="submit">Submit</button>
            </form>
        </div>
    );
}

export default BootstrapForm;

