// in src/App.js
import React from 'react';
import {
                Admin,
                fetchUtils,
                Resource,
 } from 'react-admin';
import authProvider from './authProvider';
import simpleRestProvider from 'ra-data-simple-rest';

const httpClient = (url, options = {}) => {
        if (!options.headers) {
                options.headers = new Headers({ Accept: 'application/json' });
        }
        const authString = localStorage.getItem('authString');
        options.headers.set('Authorization', `Basic ${authString}`);
        return fetchUtils.fetchJson(url, options);
}
const dataProvider = simpleRestProvider('http://localhost:3000', httpClient);
const App = () => (
        <Admin dataProvider={dataProvider} authProvider={authProvider}>
        </Admin>
);
export default App;
