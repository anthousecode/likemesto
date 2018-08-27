import React, { Component } from 'react';

import {Card, Image} from "semantic-ui-react";
import {Link} from "react-router-dom";

class SalePage extends Component {

    render() {

        const { apartment } = this.props

        return (
            <div className="flat-section-block">
                {
                    apartment.map(
                        e => (
                            <Link to={`/sale/${e.id}`} target="_blank">
                                <div className='apartment-item'>
                                    <Card>
                                        <div className="item-image">
                                            <Image src={e.images[0]} />
                                        </div>
                                        <div>
                                            <Card.Meta>
                                                <span className='date'>{e.type}</span>
                                            </Card.Meta>
                                            <Card.Content>
                                                <Card.Header>{e.address}</Card.Header>
                                                <Card.Meta>
                                                    <span className='date'>{e.city}</span>
                                                </Card.Meta>
                                            </Card.Content>
                                        </div>
                                    </Card>
                                </div>
                            </Link>
                        )
                    )
                }
            </div>
        );
    }
}

export default SalePage;