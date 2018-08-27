import React, { Component } from "react"
import {Map, InfoWindow, Marker, GoogleApiWrapper} from 'google-maps-react';
import {Image} from "semantic-ui-react";


export class FlatMap extends Component {

    state = {
        showingInfoWindow: true,
        activeMarker: {},
        selectedPlace: {},
    }

    onMarkerClick =(props, marker, e) => {
        console.log(marker)
        this.setState({
            selectedPlace: props,
            activeMarker: marker,
            showingInfoWindow: true
        });
    }

    render() {

        const { apartment, google, flat } = this.props
        const { selectedPlace, activeMarker, showingInfoWindow } = this.state

        return (
            <div className="flat-page-map">
                <Map google={google}
                     initialCenter={flat.position}
                     style={{width: '350px', height: '400px'}}
                     className={'map'}
                     zoom={12}>
                    <Marker
                        position={flat.position}
                        onClick={this.onMarkerClick}
                        id={flat.id}
                        address={flat.address}
                        price={flat.price}
                    />
                    <InfoWindow
                        marker={activeMarker}
                        visible={true}>
                        <div>
                            <span>{selectedPlace.price}</span>
                            <span>{selectedPlace.address}</span>
                        </div>
                    </InfoWindow>

                </Map>
            </div>
        );
    }
}

export default GoogleApiWrapper({
    apiKey: ('AIzaSyAnxPZ7efvI74YgLCTbs_3s7byqcXm-wak')
})(FlatMap)