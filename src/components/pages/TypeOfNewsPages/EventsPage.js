import React, { Component } from 'react';
import NewsTemplate from "./NewsTemplate";
import { news } from '../../../data'

class EventsPage extends Component {

    render() {
        return (
            <div>
                <NewsTemplate
                    data={news}
                    title="Последние события"
                />
            </div>
        );
    }
}

export default EventsPage;