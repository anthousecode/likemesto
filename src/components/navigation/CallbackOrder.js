import React, { Component } from 'react';
import { Button, Modal, ModalHeader, ModalBody, Row, Col } from 'reactstrap'
import { Input, Image } from 'semantic-ui-react'


class CallbackOrder extends Component {

    state = {
        showModal: false
    }

    toggle =() => {
        this.setState({
            showModal: !this.state.showModal
        });
    }

    onChooseLanguage = (language) => {
        console.log(language)
        this.toggle()
    }

    render() {
        const { showModal } = this.state
        return (
            <div>
                <Button color="link" onClick={this.toggle}>Заказ обратного звонка</Button>

                <Modal isOpen={showModal} toggle={this.toggle} className={this.props.className}>
                    <ModalHeader toggle={this.toggle}>

                    </ModalHeader>
                    <ModalBody>
                        <Row>
                            <Col xs="6">
                                <Image src='https://react.semantic-ui.com/images/wireframe/square-image.png' size='medium' circular />
                            </Col>
                            <Col xs="6">
                                Если у вас возникли вопросы, Вас проконсультирует ваш личный менеджер. <b>Виктория Сакевич</b>
                                <br/>
                                Вам перезвонят на этот номер: <Input label='380' placeholder='9900000000' />
                                <Button onClick={this.toggle}>Заказ обратного звонка</Button>
                            </Col>
                        </Row>
                    </ModalBody>
                </Modal>
            </div>
        );
    }
}

export default CallbackOrder;