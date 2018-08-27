import React, { Component } from 'react';
import {Button, Modal, ModalBody, ModalHeader, } from "reactstrap";
import LoginForm from '../forms/LoginForm'
import SignUpForm from '../forms/SignUpForm'

class UserPanel extends Component {
    state = {
        showModal: false,
        signForm: true
    }

    toggle =() => {
        this.setState({
            showModal: !this.state.showModal
        });
    }

    onHandleSign = () => {
        this.setState({
            signForm: !this.state.signForm
        })
    }


    render() {
        const { showModal, signForm } = this.state
        return (
            <div>
                <Button onClick={this.toggle}>Войти</Button>

                <Modal isOpen={showModal} toggle={this.toggle} className={this.props.className}>
                    <ModalHeader toggle={this.toggle}/>
                    <ModalBody className="sign-panel">
                        <div>
                            {signForm ?
                                'Добро пожаловать на Mesto.ua'
                                :
                                'Регистрация на Mesto.ua'
                            }
                        </div>
                        {signForm ?
                            <LoginForm/>
                            :
                            <SignUpForm/>
                        }
                        <Button onClick={this.onHandleSign}>
                            {signForm ?
                                'Регистрация'
                                :
                                'Логин'
                            }
                        </Button>
                        <div>
                            {signForm ?
                                'или войдите с помощью:'
                                :
                                'или создайте аккаунт через:'
                            }
                        </div>
                    </ModalBody>
                </Modal>
            </div>
        );
    }
}

export default UserPanel;
