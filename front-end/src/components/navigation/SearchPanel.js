import React, { Component } from 'react';
import {Dropdown, Form, Input, Tab} from "semantic-ui-react";

import './SearchPanel.css'

class SearchPanel extends Component {

    state = {
        data: {
            price: {
                from: '',
                to: ''
            }
        }
    }


    onChange = e =>
        this.setState({
            data: { ...this.state.data, [e.target.name]: e.target.value }
        })

    onClick = () => {
        console.log(this.state.data)
    }

    render() {

        const { data } = this.state

        const ProppertyOptions = [
            { key: 1, text: 'Вся недвижимость', value: 'all_properties' },
            { key: 2, text: 'Квартира', value: 'flat' },
            { key: 3, text: 'Комната', value: 'room' },
            { key: 4, text: 'Дом', value: 'house' },
            { key: 5, text: 'Участок', value: 'plot' },
            { key: 6, text: 'Коммерчиская недвижимость', value: 'commercial_property' },
            { key: 7, text: 'Гаражи', value: 'garages' },
        ]

        const districtOtions = [
            { key: 'kievski', text: 'Киевский', value: 'kievski' },
            { key: 'oktabrski', text: 'Октябрьский', value: 'oktabrski' },
            { key: 'podolski', text: 'Подольский', value: 'podolski' },
            { key: 'leninski', text: 'Ленинский', value: 'leninski' },
            { key: 'shevchenkovski', text: 'Шевченковский', value: 'shevchenkovski' },
        ]

        const streetOtions = [
            { key: 'shevchenko', text: 'улица Шевченко', value: 'shevchenko' },
            { key: 'zigina', text: 'улица Зыгина', value: 'zigina' },
        ]

        const countOfRoomsOtions = [
            { key: '1room', text: '1', value: '1room' },
            { key: '2rooms', text: '2', value: '2room' },
            { key: '3rooms', text: '3', value: '3room' },
            { key: '4rooms', text: '4', value: '4room' },
            { key: '5rooms', text: '5+', value: '5room' },
        ]


        const panes = [
            { menuItem: 'Район', render: () => <Dropdown placeholder='Начните вводить название района' fluid multiple search selection options={districtOtions} /> },
            { menuItem: 'Улица', render: () => <Dropdown placeholder='Начните вводить название улицы' fluid multiple search selection options={streetOtions} /> },
            { menuItem: 'ID', render: () => <Input/> },
        ]


        const priceOptions = [
            { key: 'price', text: `от ${data.from} - до ${data.to}`, value: '1room' }
        ]

        return (

            <Form>
                <div className="search-panel">
                    <div className="property-type">
                        <Dropdown selection options={ProppertyOptions} placeholder='Тип аренды' />
                    </div>
                    <div>
                        <Tab menu={{ secondary: true, pointing: true }} panes={panes} />
                    </div>
                    <div>
                        <Dropdown fluid multiple selection options={countOfRoomsOtions} />
                    </div>
                    <div>
                        <Dropdown multiple selection  item simple options={priceOptions}>
                            <Dropdown.Menu>
                                <Dropdown.Item>
                                    <Input name="from" onChange={this.onChange}/>
                                    <Input name="to" onChange={this.onChange}/>
                                    <button onClick={this.onClick}>Opt</button>
                                </Dropdown.Item>
                            </Dropdown.Menu>
                        </Dropdown>
                    </div>
                    <div>

                    </div>
                </div>
            </Form>


        );
    }
}

export default SearchPanel;