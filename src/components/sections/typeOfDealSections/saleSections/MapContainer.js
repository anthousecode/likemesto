/*import React from "react";
import { compose, withProps } from "recompose";
import {
    withScriptjs,
    withGoogleMap,
    GoogleMap,
    Marker,
} from "react-google-maps";

const Map = compose(
    withProps({
        googleMapURL:
            "https://maps.googleapis.com/maps/api/js?key=AIzaSyBeN8tE1x7AVVDzQHzf_8kI-r1nx911CwY&v=3.exp&libraries=geometry,drawing,places",
        loadingElement: <div style={{ height: `100%` }} />,
        containerElement: <div style={{ height: `400px` }} />,
        mapElement: <div style={{ minHeight: `650px`, minWidth: `457px` }} />
    }),

    withScriptjs,
    withGoogleMap
)(props => (
    <div>
        <GoogleMap defaultZoom={10.5} defaultCenter={props.apartment[0].position}>
            {props.isMarkerShown && (
                <div>
                    {props.apartment.map(e => (
                        <Marker position={e.position} onClick={()=>console.log(e)} />
                    ))}
                </div>
            )}
        </GoogleMap>
    </div>

));

export default Map*/
import React, { Component } from "react"
import {Map, InfoWindow, Marker, GoogleApiWrapper} from 'google-maps-react';
import {Image} from "semantic-ui-react";
import {Link} from "react-router-dom";

export class MapContainer extends Component {

    state = {
        showingInfoWindow: false,
        activeMarker: {},
        selectedPlace: {},
    }

    onMarkerClick =(props, marker, e) => {
        this.setState({
            selectedPlace: props,
            activeMarker: marker,
            showingInfoWindow: true
        });
    }

    render() {

        const { apartment, google } = this.props
        const { selectedPlace, activeMarker, showingInfoWindow } = this.state

        return (
            <div>
                <Map google={google}
                     initialCenter={apartment[0].position}
                     style={{width: '480px', height: '620px'}}
                     className={'map'}
                     zoom={11}>
                    {apartment.map(e => (
                        <Marker
                            position={e.position}
                            onClick={this.onMarkerClick}
                            image= {e.images[0]}
                            id={e.id}
                            address={e.address}
                        />
                    ))}
                        <InfoWindow
                            marker={activeMarker}
                            visible={showingInfoWindow}>
                            <div>
                                <Image src={selectedPlace.image} size="small" />
                                {selectedPlace.address}
                            </div>
                        </InfoWindow>

                </Map>
            </div>
        );
    }
}

export default GoogleApiWrapper({
    apiKey: ('AIzaSyAnxPZ7efvI74YgLCTbs_3s7byqcXm-wak')
})(MapContainer)