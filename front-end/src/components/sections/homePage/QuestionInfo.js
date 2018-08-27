import React, { Component } from 'react';

import './question-info.css'

class QuestionInfo extends Component {

    render() {
        return (
            <div className="question-info-block">
                <div className="qi-info">
                    <span className="qi-title">
                        Возникли вопросы по работе с сайтом?
                    </span>
                    <span className="qi-description">
                        Звоните на бесплатный номер телефона и уточните все
                        детали у своего личного помощника
                    </span>
                    <span className="qi-phone">
                        044 228 68 98 (бесплатно)
                    </span>
                </div>
                <div className="qi-image">
                    <img src="https://thumbs.dreamstime.com/z/girl-worker-wrench-happy-female-big-isolated-white-36189758.jpg" />
                </div>
            </div>


        );
    }
}

export default QuestionInfo;