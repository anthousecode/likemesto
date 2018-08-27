import React, { Component } from 'react';
import YouTube from 'react-youtube';
import './VideoComponent.css'

class VideoComponent extends Component {
    render() {
        const opts = {
            height: '260',
            width: '100%',
            playerVars: { // https://developers.google.com/youtube/player_parameters
                autoplay: 1
            }
        };

        return (
            <YouTube
                videoId="2g811Eo7K8U"
                opts={opts}
                onReady={this._onReady}
                className="video-block"
            />
        );
    }

    _onReady(event) {
        // access to player in all event handlers via event.target
        event.target.pauseVideo();
    }
}

export default VideoComponent;