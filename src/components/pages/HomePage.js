import React, { Component } from 'react';
import Carousel from '../sections/homePage/Carousel'
import LastAdd from "../sections/homePage/LastAdd";
import QuestionInfo from "../sections/homePage/QuestionInfo"
import VideoComponent from '../sections/homePage/VideoComponent'
import NewsSection from '../sections/homePage/NewsSection'

import './HomePage.css'
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";

class HomePage extends Component {
    render() {
        return (
            <div className="homepage">
                <Carousel/>
                <h1>Последние добавления на сайт</h1>
                <div className="hp-banners">
                    <div className="last-add">
                        <LastAdd/>
                    </div>
                    <div className="info">
                        <div className="qi">
                            <QuestionInfo/>
                        </div>
                        <VideoComponent/>
                    </div>
                </div>
                <h1>Новости рынка</h1>
                <div className="news-section-block">
                    <NewsSection/>
                </div>
            </div>


        );
    }
}

export default HomePage;