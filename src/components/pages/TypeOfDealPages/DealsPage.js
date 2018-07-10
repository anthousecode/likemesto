import React, { Component } from 'react';
import MapContainer from '../../sections/typeOfDealSections/saleSections/MapContainer'
import FlatsSection from "../../sections/typeOfDealSections/saleSections/FlatsSection";

import './DealsPage.css'
import SearchPanel from "../../navigation/SearchPanel";

class DealsPage extends Component {

    render() {

        const { apartment, title } = this.props

        return (
            <div>
                <SearchPanel/>
                <h1>{title}</h1>
                <div className="last-salepage-block">
                    <MapContainer isMarkerShown apartment={apartment} className="map-section"/>
                    <FlatsSection apartment={apartment} className="flat-section"/>
                </div>
            </div>

        );
    }
}

export default DealsPage;