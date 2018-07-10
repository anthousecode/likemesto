import React, { Component } from 'react';
import { ads } from '../../../data'
import DealsPage from './DealsPage'

class RentDailyPage extends Component {

    render() {
        return (
            <div>
                <DealsPage
                    title="Квартиры посуточно"
                    apartment={ads}
                />
            </div>
        );
    }
}

export default RentDailyPage;