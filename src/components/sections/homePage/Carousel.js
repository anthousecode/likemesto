import React, { Component } from 'react';
import Slider from 'react-slick'
import { Image } from "semantic-ui-react";
import { sliderBanners } from '../../../data'

import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";


class Carousel extends Component {
    render() {

        const settings = {
            dots: true,
            infinite: true,
            speed: 500,
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 6000,
            cssEase: "linear"
        };

        return (
            <div>
                <Slider {...settings}>
                    { sliderBanners.map(e => <Image src={e.img} size='small' />) }
                </Slider>
            </div>


        );
    }
}

export default Carousel;