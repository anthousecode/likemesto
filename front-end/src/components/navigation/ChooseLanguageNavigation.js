import React, { Component } from 'react';
import { Button, Modal, ModalHeader, ModalBody, Row, Col } from 'reactstrap'


class ChooseLanguageNavigation extends Component {

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
                <Button color="link" onClick={this.toggle}>Russian</Button>

                <Modal isOpen={showModal} toggle={this.toggle} className={this.props.className}>
                    <ModalHeader toggle={this.toggle}>

                    </ModalHeader>
                    <ModalBody>
                        <Row>
                            <Col xs="6">
                                <Button color="link" onClick={()=>this.onChooseLanguage('Russian')}>Russian</Button>
                            </Col>
                            <Col xs="6">
                                <Button color="link" onClick={()=>this.onChooseLanguage('Ukrainian')}>Ukrainian</Button>
                            </Col>
                        </Row>
                    </ModalBody>
                </Modal>
            </div>
        );
    }
}

export default ChooseLanguageNavigation;