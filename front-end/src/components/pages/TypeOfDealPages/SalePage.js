import React, { Component } from 'react';
import { ads } from '../../../data'
import DealsPage from './DealsPage'

class SalePage extends Component {

    render() {
        return (
            <div>
                <DealsPage
                    title="Купить квартиру"
                    apartment={ads}
                />
            </div>
        );
    }
}

export default SalePage;