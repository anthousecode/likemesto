import React, { Component } from 'react';
import {ads} from "../../../data";
import {Link} from "react-router-dom";
import {Card, Image} from "semantic-ui-react";

import './InternationalPage.css'

class InternationalPage extends Component {




    render() {

        const showItems = (arr, index) => {

            let flats = []

            for(let i=index; i<(2+index); i++) {
                let el = arr[i]
               let flat = {
                    id: el.id,
                    images: el.images,
                   type: el.type,
                   address: el.address,
                   city: el.city
               }
                flats.push(flat)
            }
            return flats
        }

        const Item = (e) => (
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

        return (
            <div className="international-page">
                <div className="international-type">
                    <div><h2>Аренда</h2></div>
                    {
                        showItems(ads, 0).map(e=> (
                            Item(e)
                        ))
                    }
                </div>
                <div className="international-type">
                    <div><h2>Продажа</h2></div>
                    {
                        showItems(ads, 2).map(e=> (
                            Item(e)
                        ))
                    }
                </div>
            </div>
        );
    }
}

export default InternationalPage;