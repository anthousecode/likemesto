import React, { Component } from 'react';
import { Image } from 'semantic-ui-react'

import './Footer.css'

class Footer extends Component {

    render() {
        return (
            <div className="ui footer container">
                <div className="footer-nav">
                    <div className="sections">
                        <div className="section">
                            <ul>
                                <li><a href="">В УКРАИНЕ</a></li>
                                <li><a href="">Продажа</a></li>
                                <li><a href="">Аренда</a></li>
                                <li><a href="">Посуточно</a></li>
                                <li><a href="">Новостройки</a></li>
                            </ul>
                        </div>
                        <div className="section">
                            <ul>
                                <li><a href="">ЗА РУБЕЖОМ</a></li>
                                <li><a href="">Продажа</a></li>
                                <li><a href="">Аренда</a></li>
                            </ul>
                        </div>
                        <div className="section">
                            <ul>
                                <li><a href="">НОВОСТИ РЫНКА</a></li>
                                <li><a href="">Новости</a></li>
                                <li><a href="">События</a></li>
                                <li><a href="">Места</a></li>
                                <li><a href="">Стоить знать</a></li>
                            </ul>
                        </div>
                        <div className="section">
                            <ul>
                                <li><a href="">ПРОФЕССИОНАЛЫ</a></li>
                                <li><a href="">Все профессионалы</a></li>
                                <li><a href="">Агенства</a></li>
                                <li><a href="">Риелторы</a></li>
                            </ul>
                        </div>
                        <div className="section">
                            <ul>
                                <li><a href="">ПОЛЕЗНЫЕ УСЛУГИ</a></li>
                                <li><a href="">Панорама 360</a></li>
                                <li><a href="">Экспертная проверка жилья</a></li>
                                <li><a href="">Оценка недвижимости</a></li>
                                <li><a href="">3D визуализация</a></li>
                                <li><a href="">Кредит на недвижимость</a></li>
                                <li><a href="">Видео объявление</a></li>
                                <li><a href="">Печать баннера</a></li>
                                <li><a href="">Сделки с недвжимостью под ключ</a></li>
                            </ul>
                        </div>
                        <div className="section">
                            <ul>
                                <li><a href=""> КОНТАКТЫ</a></li>
                                <li><a href="">О mesto.ua</a></li>
                                <li><a href="">Реклама</a></li>
                                <li><a href="">Политика конфидинциальности</a></li>
                                <li><a href="">Условия использования</a></li>
                            </ul>
                        </div>
                        <div className="section">
                            <ul>
                                <li><a href=""> MESTO SCHOOL</a></li>
                                <li><a href="">Вебминары</a></li>
                                <li><a href="">Семинары</a></li>
                                <li><a href="">Полезные статьи</a></li>
                            </ul>
                        </div>
                        <div className="section">
                            <ul>
                                <li><a href="">ЧАСТЫЕ ВОПРОСЫ</a></li>
                            </ul>
                        </div>
                    </div>
                    <div className="partners">
                        <div className="partner visa">
                            <span>
                                <Image src='http://pngimg.com/uploads/visa/visa_PNG17.png' verticalAlign='middle' size='tiny' />
                            </span>
                            <span>100% безопасная оплата</span>
                        </div>
                        <div className="partner">
                            <span>
                                <Image src='http://address.ua/Data/Content/ASNU.png' verticalAlign='middle' size='tiny' />
                            </span>

                            <span>Mesto.ua - партнер Ассоциации
                                специалистов по недвижимости Украины</span>
                        </div>
                        <div className="partner">
                            <span>
                                <Image src='http://s1.iconbird.com/ico/0612/iloviconsbysvengraph/w512h5121339361119lock.png' verticalAlign='middle' size='tiny' />
                            </span>
                            <span>	Гарантия безопасности, используя
                                мировые рекомендации по обеспечению
                                защиты данных и конфиденциальности</span>
                        </div>
                        <div className="partner">
                            <Image src='https://i1.wp.com/rex.knu.ua/wp/wp-content/uploads/2017/09/LOGO_1-e1509822681488.png?resize=518%2C218' verticalAlign='middle' size='tiny' />
                        </div>
                    </div>
                </div>
            </div>


        );
    }
}

export default Footer;