import React, { Component } from 'react';
import { news } from '../../../data'

import './NewsSection.css'
import {Card, Image} from "semantic-ui-react";

class NewsSection extends Component {

    render() {
        return (
            <div className="last-news-block">
                {
                    news.map(e => (
                        <Card className="news-item">
                            <div className="news-image">
                                <span>{`${e.date.getDate()}.${e.date.getMonth()}.${e.date.getFullYear()}`}</span>
                                <Image src={e.img} />
                            </div>
                            <Card.Content>
                                <Card.Header>{e.title}</Card.Header>
                                <Card.Description>{e.description}</Card.Description>
                            </Card.Content>
                        </Card>
                    ))
                }
            </div>
        );
    }
}

export default NewsSection;