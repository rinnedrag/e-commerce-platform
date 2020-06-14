const ws = new WebSocket('wss://mediaserver.loclx.io/call');
let videoInput;
let videoOutput;
let webRtcPeer;
let from;
let to;
let current_user;

let registerName = null;
let registerState = null;
const NOT_REGISTERED = 0;
const REGISTERING = 1;
const REGISTERED = 2;

function setRegisterState(nextState) {
    switch (nextState) {
        case NOT_REGISTERED:
            enableButton('#register', 'register()');
            setCallState(DISABLED);
            break;
        case REGISTERING:
            disableButton('#register');
            break;
        case REGISTERED:
            disableButton('#register');
            setCallState(NO_CALL);
            break;
        default:
            return;
    }
    registerState = nextState;
}

let callState = null;
const NO_CALL = 0;
const IN_CALL = 1;
const POST_CALL = 2;
const DISABLED = 3;
const IN_PLAY = 4;

function setCallState(nextState) {
    switch (nextState) {
        case NO_CALL:
            enableButton('#call', 'call()');
            disableButton('#terminate');
            disableButton('#play');
            break;
        case DISABLED:
            disableButton('#call');
            disableButton('#terminate');
            disableButton('#play');
            break;
        case POST_CALL:
            enableButton('#call', 'call()');
            disableButton('#terminate');
            enableButton('#play', 'play()');
            break;
        case IN_CALL:
        case IN_PLAY:
            disableButton('#call');
            enableButton('#terminate', 'stop()');
            disableButton('#play');
            break;
        default:
            return;
    }
    callState = nextState;
}

function disableButton(id) {
    $(id).attr('disabled', true);
    $(id).removeAttr('onclick');
}

function enableButton(id, functionName) {
    $(id).attr('disabled', false);
    $(id).attr('onclick', functionName);
}

window.onload = function() {
    //console = new Console();
    setRegisterState(NOT_REGISTERED);
    let drag = new Draggabilly(document.getElementById('videoSmall'));
    videoInput = document.getElementById('videoInput');
    videoOutput = document.getElementById('videoOutput');
    //document.getElementById('name').focus();
}

window.onbeforeunload = function() {
    ws.close();
}

ws.onmessage = function(message) {
    let parsedMessage = JSON.parse(message.data);
    //console.info('Received message: ' + message.data);

    switch (parsedMessage.id) {
        case 'registerResponse':
            registerResponse(parsedMessage);
            break;
        case 'callResponse':
            callResponse(parsedMessage);
            break;
        case 'incomingCall':
            incomingCall(parsedMessage);
            break;
        case 'startCommunication':
            startCommunication(parsedMessage);
            break;
        case 'stopCommunication':
            //console.info('Communication ended by remote peer');
            stop(true);
            break;
        case 'playResponse':
            playResponse(parsedMessage);
            break;
        case 'playEnd':
            playEnd();
            break;
        case 'iceCandidate':
            webRtcPeer.addIceCandidate(parsedMessage.candidate, function(error) {
                if (error)
                    return console.error('Error adding candidate: ' + error);
            });
            break;
        default:
            console.error('Unrecognized message', parsedMessage);
    }
}

function registerResponse(message) {
    if (message.response === 'accepted') {
        setRegisterState(REGISTERED);
        alert('registered');
        //document.getElementById('peer').focus();
    } else {
        setRegisterState(NOT_REGISTERED);
        let errorMessage = message.response ? message.response
            : 'Unknown reason for register rejection.';
        console.log(errorMessage);
        //document.getElementById('name').focus();
        alert('Error registering user. See console for further information.');
    }
}

function callResponse(message) {
    if (message.response !== 'accepted') {
        //console.info('Call not accepted by peer. Closing call');
        stop();
        setCallState(NO_CALL);
        if (message.message) {
            alert(message.message);
        }
    } else {
        setCallState(IN_CALL);
        webRtcPeer.processAnswer(message.sdpAnswer, function(error) {
            if (error)
                return console.error(error);
        });
    }
}

function startCommunication(message) {
    setCallState(IN_CALL);
    webRtcPeer.processAnswer(message.sdpAnswer, function(error) {
        if (error)
            return console.error(error);
    });
}

function playResponse(message) {
    if (message.response !== 'accepted') {
        hideSpinner(videoOutput);
        document.getElementById('videoSmall').style.display = 'block';
        alert(message.error);
        document.getElementById('peer').focus();
        setCallState(POST_CALL);
    } else {
        setCallState(IN_PLAY);
        webRtcPeer.processAnswer(message.sdpAnswer, function(error) {
            if (error)
                return console.error(error);
        });
    }
}

function incomingCall(message) {
    setCallState(DISABLED);
    if (confirm('User ' + message.from
        + ' is calling you. Do you accept the call?')) {
        showSpinner(videoInput, videoOutput);

        from = message.from;
        const options = {
            localVideo: videoInput,
            remoteVideo: videoOutput,
            onicecandidate: onIceCandidate
        };
        webRtcPeer = new kurentoUtils.WebRtcPeer.WebRtcPeerSendrecv(options,
            function(error) {
                if (error) {
                    return console.error(error);
                }
                this.generateOffer(onOfferIncomingCall);
            });
    } else {
        let response = {
            id : 'incomingCallResponse',
            from : message.from,
            to: message.to,
            callResponse : 'reject',
            message : 'user declined'
        };
        sendMessage(response);
        stop();
    }
}

function onOfferIncomingCall(error, offerSdp) {
    if (error)
        return console.error('Error generating the offer ' + error);
    let response = {
        id: 'incomingCallResponse',
        from: from,
        to: current_user,
        callResponse: 'accept',
        sdpOffer: offerSdp
    };
    sendMessage(response);
}

function register() {
    current_user = $('meta[name="user_id"]').attr('content');
    setRegisterState(REGISTERING);

    let message = {
        id : 'register',
        role: 'admin',
        name : current_user
    };
    sendMessage(message);
}

function call() {
    if (document.getElementById('peer').value === '') {
        document.getElementById('peer').focus();
        window.alert('You must specify the peer name');
        return;
    }
    setCallState(DISABLED);
    showSpinner(videoInput, videoOutput);

    let options = {
        localVideo : videoInput,
        remoteVideo : videoOutput,
        onicecandidate : onIceCandidate
    }
    webRtcPeer = new kurentoUtils.WebRtcPeer.WebRtcPeerSendrecv(options,
        function(error) {
            if (error) {
                return console.error(error);
            }
            this.generateOffer(onOfferCall);
        });
}

function onOfferCall(error, offerSdp) {
    if (error)
        return console.error('Error generating the offer ' + error);
    //console.log('Invoking SDP offer callback function');
    let message = {
        id : 'call',
        from : current_user,
        to : document.getElementById('peer').value,
        sdpOffer : offerSdp
    };
    sendMessage(message);
}

function play() {
    let peer = document.getElementById('peer').value;
    if (peer === '') {
        window.alert("You must insert the name of the user recording to be played (field 'Peer')");
        document.getElementById('peer').focus();
        return;
    }

    document.getElementById('videoSmall').style.display = 'none';
    setCallState(DISABLED);
    showSpinner(videoOutput);

    let options = {
        remoteVideo : videoOutput,
        onicecandidate : onIceCandidate
    }
    webRtcPeer = new kurentoUtils.WebRtcPeer.WebRtcPeerRecvonly(options,
        function(error) {
            if (error) {
                return console.error(error);
            }
            this.generateOffer(onOfferPlay);
        });
}

function onOfferPlay(error, offerSdp) {
    //console.log('Invoking SDP offer callback function');
    let message = {
        id : 'play',
        user : document.getElementById('peer').value,
        sdpOffer : offerSdp
    };
    sendMessage(message);
}

function playEnd() {
    setCallState(POST_CALL);
    hideSpinner(videoInput, videoOutput);
    document.getElementById('videoSmall').style.display = 'block';
}

function stop(message) {
    let stopMessageId = (callState === IN_CALL) ? 'stop' : 'stopPlay';
    setCallState(POST_CALL);
    if (webRtcPeer) {
        webRtcPeer.dispose();
        webRtcPeer = null;

        if (!message) {
            let message = {
                id : stopMessageId,
                name: current_user
            }
            sendMessage(message);
        }
    }
    hideSpinner(videoInput, videoOutput);
    document.getElementById('videoSmall').style.display = 'block';
}

function sendMessage(message) {
    let jsonMessage = JSON.stringify(message);
    //console.log('Sending message: ' + jsonMessage);
    ws.send(jsonMessage);
}

function onIceCandidate(candidate) {
    //console.log('Local candidate ' + JSON.stringify(candidate));

    let message = {
        id : 'onIceCandidate',
        from: current_user,
        candidate : candidate
    };
    sendMessage(message);
}

function showSpinner() {
    for (let i = 0; i < arguments.length; i++) {
        arguments[i].poster = './img/transparent-1px.png';
        arguments[i].style.background = 'center transparent url("./img/spinner.gif") no-repeat';
    }
}

function hideSpinner() {
    for (let i = 0; i < arguments.length; i++) {
        arguments[i].src = '';
        arguments[i].poster = './img/webrtc.png';
        arguments[i].style.background = '';
    }
}

/**
 * Lightbox utility (to display media pipeline image in a modal dialog)
 */
$(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox();
});
