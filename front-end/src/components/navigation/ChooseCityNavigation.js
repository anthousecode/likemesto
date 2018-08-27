import React, { Component } from 'react';
import { Button, Modal, ModalHeader, ModalBody, Row, Col } from 'reactstrap'

class ChooseCityNavigation extends Component {

    state = {
        showModal: false
    }

    toggle =() => {
        this.setState({
            showModal: !this.state.showModal
        });
    }

    onChooseCity = (city) => {
        console.log(city)
        this.toggle()
    }

    render() {
        const { showModal } = this.state
        return (
            <div>
                <Button color="link" onClick={this.toggle}>Выберете город</Button>

                <Modal isOpen={showModal} toggle={this.toggle} className={this.props.className}>
                    <ModalHeader toggle={this.toggle}>

                    </ModalHeader>
                    <ModalBody>
                        <Row>
                            <Col xs="6">
                                <Button color="link" onClick={()=>this.onChooseCity('Kiev')}>Киев</Button>
                            </Col>
                            <Col xs="6">
                                <Button color="link" onClick={()=>this.onChooseCity('Kharkov')}>Харьков</Button>
                            </Col>
                        </Row>
                    </ModalBody>
                </Modal>
            </div>
        );
    }
}

export default ChooseCityNavigation;