import React, { Component } from 'react';
import { ads } from '../../../data'
import DealsPage from './DealsPage'

class RentPage extends Component {

    render() {
        return (
            <div>
                <DealsPage
                    title="Долгосрочная аренда квартиры"
                    apartment={ads}
                />
            </div>
        );
    }
}

export default RentPage;