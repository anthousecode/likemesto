import React, { Component } from 'react';

import './NewsTemplate.css'
import {Card, Image} from "semantic-ui-react";

class NewsTemplate extends Component {

    render() {

        const { data, title } = this.props

        return (
            <div>
                <h1>{title}</h1>
                <div className="newspage-block">
                    {
                        data.map(e => (
                            <Card className="newspage-item">
                                <div className="newspage-image">
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
            </div>

        );
    }
}

export default NewsTemplate;