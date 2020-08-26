<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Live Stream of Self-Exercise Recording page</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">

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
            font-size: 19px;
            font-weight: 100;
            padding-left: 20px;
            padding-right: 20px;
            padding-top: 20px;
            padding-bottom: 10px;
            margin: auto;
            color: gainsboro;
        }
        .custom-container{
            display: flex;
            background: #4e4e4e;
            /* margin-bottom: 10px; */
            /* min-height: 88.3vh; */
        }
        .video-field{
            display: block;
            width: 540px;
            /* margin:auto; */
            padding-top: 20px;
        }
        .vjs-control-bar { 
            font-size: 160% !important; 
        }
        .instruction{
            width:540px;
            /* margin: auto; */
            padding-top:20px;
        }
        .c-stream {
            width: 70%;

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

            color: #FFF;
            background: linear-gradient(90deg, #ADD261 0%, #77B336 100%);
            border: none;
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
        .custom-font {
            font-size: 18px;
            color: #84bb40;
        }
        .custom-h1 {
            font-size: 28px;
            /* font-weight: 100; */
            padding: 20px;
            margin: auto;
            color: gainsboro;
            text-align: center;
        }
        .partial-p {
            padding-left: 20px;
            padding-right: 20px;
            color: gainsboro;
            line-height: initial;
        }
        .mb-20-mobile {
            margin-bottom: 20px;
        }
        .mt-10-mobile {
            margin-top: 30px;
        }
        @media only screen and (min-width: 1760px) {
            .custom {
                color: black;
                padding:100px;
                padding-top: 250px;
                padding-left: 150px;
                display: block;
            }
            .instruction {
                padding-right: 20px;
                padding-left: 20px;
            }
        }
     
        @media only screen and (max-width: 1560px) {
            .mb-20-mobile {
                margin-bottom: 10px;
            }
            .mt-10-mobile {
                margin-top: 10px;
            }
        }
    </style>
</head>

<body>
     <!-- ======= Intro Single ======= -->
     <section class="header-section mb-20-mobile">
            <div class="margin-l-50 margin-r-50 mt-10-mobile">
                <div class="row">
                    <div class="col-md-3 text-center d-flex">
                        <div class="col-md-8">
                            <a class="navbar-brand text-brand" href="{{ route('index') }}"><img src="assets/img/chiroonelogo.svg" alt="logo" id="chiroonelogo"></a>
                        </div>
                        <div class="col-md-4 m-auto">
                            <a class="custom-font" href="{{ route('recordvideo') }}">&lt;Back</a>
                        </div>
                        
                        
                    </div>
                    <!-- <div class="col-md-2 text-center m-auto">
                        
                    </div> -->
                    <div class="col-md-6">
                        <h1 class="text-center special-font"></h1>
                    </div>
                    <!-- <div class="col-md-1 text-center m-auto">
                        
                    </div> -->
                    <div class="col-md-3 text-center m-auto d-flex">
                        <div class="col-md-8 text-right">
                            <a href="{{ route('index') }}"><button class="c-stream" style="width: 140px;">Finish</button></a>
                        </div>
                        <!-- Right Side Of Navbar -->
                            <!-- Authentication Links -->
                           
                        <div class="col-md-4 m-auto"> 
                            <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();" style="font-weight: 600; color: gray">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                   
                    </div>
                </div>

            </div>
        </section>
        <!-- End Intro Single-->
<div class="custom-container">
    <div class="instruction">
            <div class="custom-instruction">
                <h1 class="custom-h1">Instructions</h1>
                <h1 class="partial">1)&nbsp;&nbsp;Enable Camera Access</h1>
                <p class="partial-p">Click the camera icon in the center of your screen to turn on your computer's video.</p>
                <h1 class="partial">2)&nbsp;&nbsp;Record exercise session</h1>
                <p class="partial-p">When you're ready, click the record button below and perform your exercises</p>
                <h1 class="partial">3)&nbsp;&nbsp;Download your session</h1>
                <p class="partial-p">
                    Once you are done with your exercises, click the Stop Recording button. <b>Your video will automatically be sent to your doctors!</b> Click download to save
                    the video for your own records.
                </p>
                <div class="mt-50 d-block text-center">
                    <a id="downloadButton" class="button">
                        <button class="c-stream" style="margin-bottom: 20px; width: 160px; display: none;" id="downloadbtn">Download</button>
                    </a>
                </div>
            </div>
    </div>
    <video id="myVideo" playsinline class="video-js vjs-default-skin"></video>
    <div class="video-field">
        <h1 class="custom-h1">Exercise Tutorials</h1>
        <iframe class="margin-t-10" width="358" height="167" src="https://www.youtube.com/embed/vuGnzLxRvZM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
            if (clientWidth < 1560) {
                var options = {
                    controls: true,
                    bigPlayButton: false,
                    width: clientWidth-50,
                    // height: clientHeight-115.6,
                    height: clientHeight-83,
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
            }
            else {
                var options = {
                    controls: true,
                    bigPlayButton: false,
                    width: clientWidth-50,
                    height: clientHeight-115.6,
                    // height: clientHeight-83,
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
            }
            let downloadButton = document.getElementById("downloadButton");
            

            // apply some workarounds for opera browser
            applyVideoWorkaround();

            var player = videojs('myVideo', options, function() {
                // print version information at startup
                // var msg = 'Using video.js ' + videojs.VERSION +
                //     ' with videojs-record ' + videojs.getPluginVersion('record') +
                //     ' and recordrtc ' + RecordRTC.version;
                // videojs.log(msg);
                console.log('initiated.');
            });

            // Video body Camera instruction Text here. 
            $('#myVideo').append('<h3 class="text-center color-w" id="guide">Click Icon Below to <br> Enable Camera</h3>');
            if (clientHeight > 900) {
                 $('#guide').css('margin-top', '270px');
            }
            else if (clientHeight <= 900 && clientHeight > 800)
            {
                $('#guide').css('margin-top', '240px');
            }
            else if (clientHeight <= 800 && clientHeight > 730) {
                $('#guide').css('margin-top', '200px');
            }
            else if (clientHeight <= 730 && clientHeight > 690) {
                $('#guide').css('margin-top', '180px');
            }
            else {
                $('#guide').css('margin-top', '100px');
            }
           

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

                $('#downloadbtn').css('display', 'initial');

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