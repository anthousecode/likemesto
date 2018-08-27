import React, { Component } from 'react';

import Header from "../sections/Header";
import Footer from "../sections/Footer";
import HomePage from "./HomePage";
import NewHomes from './NewHomes'
import NewsPage from "./TypeOfNewsPages/NewsPage";
import {Route} from "react-router-dom";
import SalePage from "./TypeOfDealPages/SalePage";
import FlatPage from "./FlatPage";
import RentPage from "./TypeOfDealPages/RentPage";
import RentDailyPage from "./TypeOfDealPages/RentDailyPage";
import EventsPage from "./TypeOfNewsPages/EventsPage";
import MustKnowPage from "./TypeOfNewsPages/MustKnowPage";
import PlacesPage from "./TypeOfNewsPages/PlacesPage";
import InternationalPage from "./InternationalPages/InternationalPage";
import InternationalSalePage from "./InternationalPages/InternationalSalePage";
import InternationalRentPage from "./InternationalPages/InternationalRentPage";

class MainPage extends Component {
    render() {
        return (
            <div>
                <Header/>
                <div className="main-page">
                    <div className="container">
                        <Route path="/" exact component={HomePage}/>
                        <Route path="/newhomes" exact component={NewHomes}/>
                        <Route path="/sale/:id" exact component={FlatPage}/>
                        <Route path="/sale" exact component={SalePage}/>
                        <Route path="/rent" exact component={RentPage}/>
                        <Route path="/rent_daily" exact component={RentDailyPage}/>
                        <Route path="/news" exact component={NewsPage}/>
                        <Route path="/events" exact component={EventsPage}/>
                        <Route path="/places" exact component={PlacesPage}/>
                        <Route path="/must_know" exact component={MustKnowPage}/>
                        <Route path="/international" exact component={InternationalPage}/>
                        <Route path="/international/sale" exact component={InternationalSalePage}/>
                        <Route path="/international/rent" exact component={InternationalRentPage}/>
                    </div>
                </div>

                <Footer/>
            </div>


        );
    }
}

export default MainPage;