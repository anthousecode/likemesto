import React, { Component } from 'react';
import NewsTemplate from "./NewsTemplate";
import { news } from '../../../data'

class PlacesPage extends Component {

    render() {
        return (
            <div>
                <NewsTemplate
                    data={news}
                    title="Интересные места"
                />
            </div>
        );
    }
}

export default PlacesPage;