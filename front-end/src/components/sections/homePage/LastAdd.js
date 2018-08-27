import React, { Component } from 'react';
import { Card, Image } from 'semantic-ui-react';
import { ads } from '../../../data'

import './LastAdd.css'


class LastAdd extends Component {

    render() {

        return (
            <div className="last-add-block">
                {
                    ads.map(
                        e => (
                            <div className='last-add-item'>
                                <Card>
                                    <div className="item-image">
                                        <Image src={e.images[0]} />
                                    </div>
                                    <Card.Meta>
                                        <span className='date'>{e.type}</span>
                                    </Card.Meta>
                                    <Card.Content>
                                        <Card.Header>{e.address}</Card.Header>
                                        <Card.Meta>
                                            <span className='date'>{e.city}</span>
                                        </Card.Meta>
                                    </Card.Content>
                                </Card>
                            </div>
                        )
                    )
                }
            </div>


        );
    }
}

export default LastAdd;