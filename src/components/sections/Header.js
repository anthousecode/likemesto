import React, { Component } from 'react';

import ChooseCityNavigation from "../navigation/ChooseCityNavigation";
import ChooseLanguageNavigation from "../navigation/ChooseLanguageNavigation";
import HeaderNavigation from "../navigation/HeaderNavigation";
import UserPanel from "../navigation/UserPanel";
import CallbackOrder from "../navigation/CallbackOrder";
import { Image } from "semantic-ui-react";
import {Link} from "react-router-dom";

import './Header.css'

class Header extends Component {

    render() {
        return (
            <div className="ui container header">
                <div className="user-panel">
                    <div className="logo-panel">
                        <Link to="/">
                            <Image src='https://s.mesto.ua/static/img/2017/logo.png' size='tiny' />
                        </Link>
                    </div>
                    <div className="navigation">
                        <div className="user-navigation">
                            <CallbackOrder/>
                            <ChooseCityNavigation/>
                            <ChooseLanguageNavigation/>
                        </div>
                        <div className="userpanel">
                            <UserPanel/>
                        </div>
                    </div>
                </div>
                <div className="header-navigation">
                    <HeaderNavigation/>
                </div>
            </div>


        );
    }
}

export default Header;