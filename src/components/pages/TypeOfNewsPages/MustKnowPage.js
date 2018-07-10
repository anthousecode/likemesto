import React, { Component } from 'react';
import NewsTemplate from "./NewsTemplate";
import { news } from '../../../data'

class MustKnowPage extends Component {

    render() {
        return (
            <div>
                <NewsTemplate
                    data={news}
                    title="Стоит знать"
                />
            </div>
        );
    }
}

export default MustKnowPage;