<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Audio/Video Example - Record Plugin for Video.js</title>

    <link href="{{ asset('video/video-js.min.css') }}" rel="stylesheet">
    <link href="{{ asset('video/videojs.record.css') }}" rel="stylesheet">
    <link href="{{ asset('video/examples.css') }}" rel="stylesheet">

    <script src="{{ asset('video/video.min.js') }}"></script>
    <script src="{{ asset('video/RecordRTC.js') }}"></script>
    <script src="{{ asset('video/adapter.js') }}"></script>

    <script src="{{ asset('video/videojs.record.js') }}"></script>

    <script src="{{ asset('video/browser-workarounds.js') }}"></script>

    <style>
        /* change player background color */
        
        #myVideo {
            background-color: #9ab87a;
        }
    </style>
</head>

<body>

    <video id="myVideo" playsinline class="video-js vjs-default-skin"></video>

    <a id="downloadButton" class="button">
        Download
    </a>
    <a href="{{ route('recordvideo') }}">Go Back</a>

    <script>
        window.onload = () => {
            var screenWidth = screen.width;
            var screenHeight = screen.height;
            var clientWidth = window.innerWidth;
            var clientHeight = window.innerHeight;
            console.log(screenWidth, screenHeight, clientWidth, clientHeight);
            let downloadButton = document.getElementById("downloadButton");
            var options = {
                controls: true,
                bigPlayButton: false,
                width: clientWidth-20,
                height: clientHeight-50,
                fluid: false,
                plugins: {
                    record: {
                        audio: true,
                        video: true,
                        maxLength: 2000,
                        debug: true
                    }
                }
            };

            // apply some workarounds for opera browser
            applyVideoWorkaround();

            var player = videojs('myVideo', options, function() {
                // print version information at startup
                var msg = 'Using video.js ' + videojs.VERSION +
                    ' with videojs-record ' + videojs.getPluginVersion('record') +
                    ' and recordrtc ' + RecordRTC.version;
                videojs.log(msg);
            });

            // error handling
            player.on('deviceError', function() {
                console.log('device error:', player.deviceErrorCode);
            });

            player.on('error', function(element, error) {
                console.error(error);
            });

            // user clicked the record button and started recording
            player.on('startRecord', function() {
                console.log('started recording!');
            });

            // user completed recording and stream is available
            player.on('finishRecord', function() {
                // the blob object contains the recorded data that
                // can be downloaded by the user, stored on server etc.
                console.log('finished recording: ', player.recordedData);
                console.log(player.recordedData);
                downloadButton.href = URL.createObjectURL(player.recordedData);
                downloadButton.download = "RecordedVideo.webm";
                window.alert('success in Record');
            });
        }
        
    </script>

</body>

</html>