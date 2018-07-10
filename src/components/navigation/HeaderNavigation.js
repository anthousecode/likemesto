import React, { Component } from 'react';
import {Link} from "react-router-dom";

class HeaderNavigation extends Component {
    state = {
        activeItem: ""
    }

    handleItemClick = (e, { name }) =>
        this.setState({ activeItem: name })

    render() {
        const { activeItem } = this.state
        return (
            <nav>
                <ul>
                    <li className="sub-menu-parent" >
                        <a href="#">Тип сделки</a>
                        <ul className="sub-menu">
                            <li><Link to="/sale">Продажа</Link></li>
                            <li><Link to="/rent">Аренда</Link></li>
                            <li><Link to="/rent_daily">Посуточно</Link></li>
                        </ul>
                    </li>
                    <li className="sub-menu-parent" >
                        <Link to="/newhomes">Новостройки</Link>
                    </li>
                    <li className="sub-menu-parent">
                        <a href="#">Новости рынка</a>
                        <ul className="sub-menu">
                            <li><Link to="/news">Новости</Link></li>
                            <li><Link to="events">События</Link></li>
                            <li><Link to="/places">Места</Link></li>
                            <li><Link to="/must_know">Стоит знать</Link></li>
                            <li><a href="#">Mesto school</a></li>
                        </ul>
                    </li>
                    <li className="sub-menu-parent" >
                        <a href="http://google.com">Профессионалы</a>
                    </li>
                    <li className="sub-menu-parent">
                        <Link to="/international">За рубежом</Link>
                        <ul className="sub-menu">
                            <li><Link to="/international/sale">Продажа</Link></li>
                            <li><Link to="/international/rent">Аренда</Link></li>
                        </ul>
                    </li>
                    <li className="sub-menu-parent">
                        <a href="#">Полезные услуги</a>
                        <ul className="sub-menu">
                            <li><a href="#">Видео объявление</a></li>
                            <li><a href="#">Печать баннера</a></li>
                            <li><a href="#">Сделки с недвижимостью под ключ</a></li>
                            <li><a href="#">Оценка недвижимости</a></li>
                            <li><a href="#">Экспертная оценка жилья</a></li>
                            <li><a href="#">3D визуализация</a></li>
                            <li><a href="#">Панорама 360</a></li>
                            <li><a href="#">Услуги нотариуса</a></li>
                            <li><a href="#">Кредит за недвижимость</a></li>
                            <li><a href="#">Дизайн брошюр для недвижимости</a></li>
                            <li><a href="#">Фото-видео съемка</a></li>
                            <li><a href="#">Приложение HouseLens</a></li>
                        </ul>
                    </li>
                    <li className="sub-menu-parent" >
                        <a href="http://google.com" className="add-advert">Добавить объявление</a>
                    </li>
                </ul>
            </nav>
        )
    }
}

export default HeaderNavigation;