import React, { Component } from 'react';
import { ads } from '../../../data'
import DealsPage from "../TypeOfDealPages/DealsPage";

class InternationalRentPage extends Component {

    render() {
        return (
            <div>
                <DealsPage
                    title="Долгосрочная аренда квартиры в Зарубежной недвижимости"
                    apartment={ads}
                />
            </div>
        );
    }
}

export default InternationalRentPage;