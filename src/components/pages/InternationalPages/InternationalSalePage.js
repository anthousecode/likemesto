import React, { Component } from 'react';
import { ads } from '../../../data'
import DealsPage from "../TypeOfDealPages/DealsPage";

class InternationalSalePage extends Component {

    render() {
        return (
            <div>
                <DealsPage
                    title="Купить квартиру в Зарубежной недвижимости"
                    apartment={ads}
                />
            </div>
        );
    }
}

export default InternationalSalePage;