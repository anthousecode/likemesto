import React, { Component } from 'react';
import NewsTemplate from "./NewsTemplate";
import { news } from '../../../data'

class NewsPage extends Component {

    render() {
        return (
            <div>
                <NewsTemplate
                    data={news}
                    title="Новости недвижимости"
                />
            </div>
        );
    }
}

export default NewsPage;