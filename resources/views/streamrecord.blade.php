<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Live Stream of Self-Exercise Recording page</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('video/video-js.min.css') }}" rel="stylesheet">
    <link href="{{ asset('video/videojs.record.css') }}" rel="stylesheet">
    <link href="{{ asset('video/examples.css') }}" rel="stylesheet">

    <script src="{{ asset('video/video.min.js') }}"></script>
    <script src="{{ asset('video/RecordRTC.js') }}"></script>
    <script src="{{ asset('video/adapter.js') }}"></script>

    <script src="{{ asset('video/videojs.record.js') }}"></script>

    <script src="{{ asset('video/browser-workarounds.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <style>
        /* change player background color */
        
        #myVideo {
            background-color: #9ab87a;
        }
        .custom {
            color: black;
            padding:100px;
            padding-top: 250px;
            display: block;
        }
        .partial {
            font-size: 26px;
            font-weight: 100;
            padding: 20px;
            margin: auto;
            color: gainsboro;
        }
        .container{
            display: flex;
            background: #4e4e4e;
            margin-bottom: 10px;
        }
        .video-field{
            display: block;
            width: 540px;
            margin:auto;
        }
        .vjs-control-bar { 
            font-size: 160% !important; 
        }
        .instruction{
            width:540px;
            margin: auto;
        }
        .c-stream {
            width: 70%;
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;

            display: inline-block;
            font-weight: 400;
            text-align: center;
            vertical-align: middle;
            user-select: none;
            border: 1px solid transparent;
            padding: .375rem .75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: .25rem;
        }
        .mt-50 {
            margin-top: 50px;
        }
        .d-block {
            display: block;
        }
        .text-center {
            text-align: center;
        }
        @media only screen and (min-width: 1760px) {
            .custom {
                color: black;
                padding:100px;
                padding-top: 250px;
                padding-left: 150px;
                display: block;
            }
        }
    </style>
</head>

<body>
<div class="container">
    <div class="instruction">
            <div class="custom-instruction">
                <h1 class="partial">1)&nbsp;&nbsp;&nbsp;  Click camera and microphone icon to start camera</h1>
                <h1 class="partial">2)&nbsp;&nbsp;&nbsp;  Make Sure you are in view of Camera</h1>
                <h1 class="partial">3)&nbsp;&nbsp;&nbsp;  Press "record" to begin recording</h1>
                <div class="mt-50 d-block text-center">
                    <a id="downloadButton" class="button">
                        <button class="c-stream" style="margin-bottom: 20px;">Download</button>
                    </a>
                    <a href="{{ route('recordvideo') }}"><button class="c-stream">Go Back</button></a>
                </div>
                
            </div>
    </div>
    <video id="myVideo" playsinline class="video-js vjs-default-skin"></video>
    <div class="video-field">
        <iframe width="358" height="167" src="https://www.youtube.com/embed/vuGnzLxRvZM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <iframe width="358" height="167" src="https://www.youtube.com/embed/mTFxY_HS8OM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <iframe width="358" height="167" src="https://www.youtube.com/embed/XLLBYnVtMcE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
</div>
    
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
                // var msg = 'Using video.js ' + videojs.VERSION +
                //     ' with videojs-record ' + videojs.getPluginVersion('record') +
                //     ' and recordrtc ' + RecordRTC.version;
                // videojs.log(msg);
            });

            // inti screen with custom introductions.
            // $('#myVideo').append(
            //     '<div class="custom">' +
            //     '<h1 class="partial">1)&nbsp;&nbsp;&nbsp;  Click camera and<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; microphone icon<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; to start camera</h1>' +
            //     '<h1 class="partial">2)&nbsp;&nbsp;&nbsp;  Make Sure you are<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; in view of Camera</h1>' +
            //     '<h1 class="partial">3)&nbsp;&nbsp;&nbsp;  Press "record" to<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; begin recording</h1>' +
            //     '</div>');

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
                downloadButton.href = URL.createObjectURL(player.recordedData);
                downloadButton.download = "RecordedVideo.webm";
                window.alert('Success in Record!');

                // upload recorded data
                upload(player.recordedData);
            });

            // upload function definition
            function upload(blob) {
                // this upload handler is served using webpack-dev-server for
                // this example, see build-config/fragments/dev.js
                var serverUrl = '/upload';
                var formData = new FormData();
              
                formData.append('file', blob, blob.name);

                console.log('upload recording ' + blob.name + ' to ' + serverUrl);

                console.log('Form DATA')
                for (var key of formData.entries()) {
                        console.log(key[0] + ', ' + key[1]);
                    }
                // start upload
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                
                $.ajax({
                    url: "{{ url('/upload') }}",
                    type: 'POST',              
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(result)
                    {
                        if( result == 'Success' ) {
                            console.log('Save Db and Upload to Server has been Succeed!');
                        }
                        else {
                            console.log('Error Occured In upload, Retry or Check Network');
                        }
                    },
                    error: function(data)
                    {
                        console.log('error',data);
                    }
                });
            }
        }
        
    </script>

</body>

</html>