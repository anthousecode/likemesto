import React, { Component } from 'react';
import {Card, Image} from "semantic-ui-react";
import { ads } from '../../data'
import './NewHomes.css'

class NewHomes extends Component {
    render() {
        return (
            <div className="new-homes">
                {ads.map(e => (
                    <div className='new-home-item'>
                        <Card>
                            <div className="hm-item-image">
                                <Image src={e.images[0]} />
                            </div>
                            <Card.Content>
                                <Card.Header>{e.address}</Card.Header>
                            </Card.Content>
                            <Card.Content extra>
                                <span>от 14 900 грн./м<span>2</span></span>
                            </Card.Content>
                        </Card>
                    </div>
                ))}
            </div>


        );
    }
}

export default NewHomes;