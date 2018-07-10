import React, { Component } from 'react';
import {ads} from "../../data";
import Slider from 'react-slick'
import {Image,Tab} from "semantic-ui-react";
import FlatMap from '../sections/FlatPage/FlatMap'

import './FlatPage.css'
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";

class FlatPage extends Component {

    state = {
        flat: {},
    }

    getFlat = () => ads.find(e => e.id == this.props.match.params.id)

    next = () => {
        this.slider.slickNext();
    }
    previous = () => {
        this.slider.slickPrev();
    }

    render() {

        const settings = {
            infinite: true,
            speed: 200,
            slidesToShow: 1,
            slidesToScroll: 1
        };

        const flat = this.getFlat()

        const {activeMarker, selectedPlace} = this.state

        const flatImages = () => (
            <div className="flat-slider">
                <Slider ref={c => (this.slider = c)} {...settings}>
                    { flat.images.map(image => <Image src={image} size='tiny' />) }
                </Slider>
                <div style={{ textAlign: "center" }}>
                    <button className="button" onClick={this.previous}>
                        Previous
                    </button>
                    <button className="button" onClick={this.next}>
                        Next
                    </button>
                </div>
            </div>
        )


        const panes = [
            { menuItem: 'Фото', render: () =>  flatImages()},
            { menuItem: 'Карта', render: () => <FlatMap flat={flat}/>}
        ]

        return (
            <div className="flat-page">
                <Tab className="flat-page-tab" panes={panes} />
            </div>
        );
    }
}

export default FlatPage;