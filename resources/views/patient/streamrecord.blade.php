<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Live Stream of Self-Exercise Recording page</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Vendor CSS Files -->
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin_assets/dist/css/adminlte.min.css') }}">

    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/toastr/toastr.min.css') }}">

    <!-- Template Main CSS File -->
    <link rel="stylesheet" href="{{ asset('admin_assets/patient.css') }}">

    <link href="{{ asset('video/video-js.min.css') }}" rel="stylesheet">
    <link href="{{ asset('video/videojs.record.css') }}" rel="stylesheet">
    <link href="{{ asset('video/examples.css') }}" rel="stylesheet">

    <script src="{{ asset('video/video.min.js') }}"></script>
    <script src="{{ asset('video/RecordRTC.js') }}"></script>
    <script src="{{ asset('video/adapter.js') }}"></script>

    <script src="{{ asset('video/videojs.record.js') }}"></script>

    <script src="{{ asset('video/browser-workarounds.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    
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
        }
        .custom-instruction{
            padding:25px;
        }
        .video-field{
            /* display: block; */
            /* width: 540px; */
            /* margin:auto; */
            /* padding-top: 20px; */
        }
        .vjs-control-bar { 
            font-size: 173% !important; 
        }
        .instruction{
            width:30%;
            /* margin: auto; */
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
            color: #70ab27;
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
            line-height: 1.32;
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
            /* .instruction {
                padding-right: 20px;
                padding-left: 20px;
            } */
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
    <style>
        #myVideo {
            background: linear-gradient(180deg, #5E90ED 0%, rgba(255, 255, 255, 0) 100%);
        }
        /* Record Start button customization */
        .vjs-icon-record-start:before {
                content: none !important;
        }
        .vjs-record-button.vjs-control.vjs-button.vjs-icon-record-start {
            /* background: #d40000; */
            width: 125px;
            height: 40px;
            margin: 5px;
            border-radius: 1.25rem;
            top: -50%;
            left: 45%;
            background-color: #80B91C;
        }
        .c-record {
            font-family: sans-serif !important;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .c-stop {
            font-family: sans-serif !important;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* unvisible STOP text */
        .vjs-record-button.vjs-control.vjs-button.vjs-icon-record-start span.c-stop {
            display: none;
        }
        /* unvisible RECORD text */
        .vjs-record-button.vjs-control.vjs-button.vjs-icon-record-stop span.c-record {
            display: none;
        }

        /* Record Stop Button Customization */
        .vjs-icon-record-stop:before {
            content: none !important;
        }
        .vjs-record-button.vjs-control.vjs-button.vjs-icon-record-stop {
            background: #d40000;
            width: 210px;
            height: 40px;
            margin: 5px;
            border-radius: 1.25rem;
            top: -50%;
            left: 43%;
        }

        /* remove the focuse outline in record and stop button */
        button:focus {
            outline: 1px !important;
        }

        /* control bar */
        .video-js .vjs-control-bar {
            /* background: rgba(43,51,63) !important; */
            opacity:0;
            background: transparent;
        }

        .vjs-pip-button.vjs-control.vjs-button.vjs-icon-picture-in-picture-start {
            display: none !important;
        }

        /* custom camera device */
        .vjs-record.vjs-device-button.vjs-control.vjs-icon-av-perm:before{
            content: 'ALLOW CAMERA ACCESS';
            font-size: 19px !important;
            position: absolute;
            display: flex;
            left: 50px;
            top: 14px;
            font-weight: 500;
            font-family: Open Sans;

        }

        .vjs-record.vjs-device-button.vjs-control {
            width: 20rem;
            height: 2.8rem;
            left: 42%;
            background: #5E90ED;
        }

        /* video duration display none */
        .vjs-duration.vjs-time-control.vjs-control{
            opacity: 0;
            top: -1520%;
            background: rgba(0, 0, 0, 0.64);
            left: -11%;
            width: 240px;
            height: 41px;
            line-height: 2.5rem;
        }

        .vjs-duration.vjs-time-control.vjs-control .vjs-control-text{
            position: inherit;
        }

        /* video controller time divider */
        .vjs-time-control.vjs-time-divider{
            display: none !important;
        }

        /* video current time controlling */
        .vjs-current-time.vjs-time-control.vjs-control{
            top: -1520%;
            background: rgba(0, 0, 0, 0.64);
            opacity: 0;
            left: -2%;
            width: 240px;
            height: 41px;
            line-height: 2.5rem;
        }
        .vjs-current-time.vjs-time-control.vjs-control .vjs-control-text{
            position: inherit;
        }
        @media only screen and (max-height: 960px) {
            .vjs-current-time.vjs-time-control.vjs-control{
                top: -1480%;
            }
            .vjs-duration.vjs-time-control.vjs-control{
                top: -1480%;
            }
        }
        @media only screen and (max-height: 930px) {
            .vjs-current-time.vjs-time-control.vjs-control{
                top: -1400%;
            }
            .vjs-duration.vjs-time-control.vjs-control{
                top: -1400%;
            }
        }

        @media only screen and (max-height: 900px) {
            .vjs-current-time.vjs-time-control.vjs-control{
                top: -1380%;
            }
            .vjs-duration.vjs-time-control.vjs-control{
                top: -1380%;
            }
        }
        @media only screen and (max-height: 860px) {
            .vjs-current-time.vjs-time-control.vjs-control{
                top: -1350%;
            }
            .vjs-duration.vjs-time-control.vjs-control{
                top: -1350%;
            }
        }
        @media only screen and (max-height: 840px) {
            .vjs-current-time.vjs-time-control.vjs-control{
                top: -1320%;
            }
            .vjs-duration.vjs-time-control.vjs-control{
                top: -1320%;
            }
        }
        @media only screen and (max-height: 828px) {
            .vjs-current-time.vjs-time-control.vjs-control{
                top: -1310%;
            }
            .vjs-duration.vjs-time-control.vjs-control{
                top: -1310%;
            }
        }
        @media only screen and (max-height: 823px) {
            .vjs-current-time.vjs-time-control.vjs-control{
                top: -1300%;
            }
            .vjs-duration.vjs-time-control.vjs-control{
                top: -1300%;
            }
        }
        @media only screen and (max-height: 815px) {
            .vjs-current-time.vjs-time-control.vjs-control{
                top: -1280%;
            }
            .vjs-duration.vjs-time-control.vjs-control{
                top: -1280%;
            }
        }
        @media only screen and (max-height: 805px) {
            .vjs-current-time.vjs-time-control.vjs-control{
                top: -1250%;
            }
            .vjs-duration.vjs-time-control.vjs-control{
                top: -1250%;
            }
        }
        @media only screen and (max-height: 800px) {
            .vjs-current-time.vjs-time-control.vjs-control{
                top: -1210%;
            }
            .vjs-duration.vjs-time-control.vjs-control{
                top: -1210%;
            }
        }
        @media only screen and (max-height: 785px) {
            .vjs-current-time.vjs-time-control.vjs-control{
                top: -1150%;
            }
            .vjs-duration.vjs-time-control.vjs-control{
                top: -1150%;
            }
        }
        @media only screen and (max-height: 740px) {
            .vjs-current-time.vjs-time-control.vjs-control{
                top: -1120%;
            }
            .vjs-duration.vjs-time-control.vjs-control{
                top: -1120%;
            }
        }
        @media only screen and (max-height: 730px) {
            .vjs-current-time.vjs-time-control.vjs-control{
                top: -1115%;
            }
            .vjs-duration.vjs-time-control.vjs-control{
                top: -1115%;
            }
        }
        @media only screen and (max-height: 720px) {
            .vjs-current-time.vjs-time-control.vjs-control{
                top: -1100%;
            }
            .vjs-duration.vjs-time-control.vjs-control{
                top: -1100%;
            }
        }
        @media only screen and (max-height: 700px) {
            .vjs-current-time.vjs-time-control.vjs-control{
                top: -1050%;
            }
            .vjs-duration.vjs-time-control.vjs-control{
                top: -1050%;
            }
        }
        @media only screen and (max-height: 681px) {
            .vjs-current-time.vjs-time-control.vjs-control{
                top: -1000%;
            }
            .vjs-duration.vjs-time-control.vjs-control{
                top: -1000%;
            }
        }
        @media only screen and (max-height: 660px) {
            .vjs-current-time.vjs-time-control.vjs-control{
                top: -980%;
            }
            .vjs-duration.vjs-time-control.vjs-control{
                top: -980%;
            }
        }
        @media only screen and (max-height: 651px) {
            .vjs-current-time.vjs-time-control.vjs-control{
                top: -950%;
            }
            .vjs-duration.vjs-time-control.vjs-control{
                top: -950%;
            }
        }
        @media only screen and (max-height: 630px) {
            .vjs-current-time.vjs-time-control.vjs-control{
                top: -900%;
            }
            .vjs-duration.vjs-time-control.vjs-control{
                top: -900%;
            }
        }

        @media only screen and (max-width: 1600px) {
            .vjs-current-time.vjs-time-control.vjs-control{
                left: -8%;
            }
            .vjs-duration.vjs-time-control.vjs-control{
                left: -28%;
            }
        }
        @media only screen and (max-width: 1560px) {
            .vjs-current-time.vjs-time-control.vjs-control{
                left: -12%;
            }
            .vjs-duration.vjs-time-control.vjs-control{
                left: -26%;
            }
        }
        @media only screen and (max-width: 1260px) {
            .vjs-current-time.vjs-time-control.vjs-control{
                left: -16%;
            }
            .vjs-duration.vjs-time-control.vjs-control{
                left: -30%;
            }
        }
    </style>

</head>

<body class="hold-transition sidebar-mini">
    <main id="main" class="height-100vh">
        <!-- ======= Header-Section ======= -->
        <section>
            <div class="header-section">
                <div class="row streamrecord-header-container">
                    <div class="col-md-6 m-auto d-flex">
                        <a class="navbar-brand text-brand" href="{{ route('patient.index') }}"><img class="width-150px" src="{{ env('APP_LOGO') }}" alt="logo" id="chiroonelogo"></a>
                        &nbsp;&nbsp;&nbsp;
                        <a class="patient-exit-text d-flex ml-40px" href="{{ route('patient.careplan.exercises_detail', [ 'order' => $order, 'exercisecount' => $exercisecount ]) }}" ><i class="material-icons-outlined mt-15px">arrow_back</i>&nbsp;Back</a>
                    </div>
                    <div class="col-md-6 header-right-section">
                            <!-- Messages Dropdown Menu -->
                            <a class="nav-link color-blue" href="#">
                                My Account
                            </a>
                            <!-- Notifications Dropdown Menu -->
                            <div class="nav-item dropdown">
                                <a class="nav-link p-0" data-toggle="dropdown" href="#">
                                    <img src="{{ asset('admin_assets/dist/img/howard.png') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                </a>
                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right mw-150px">
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item">
                                        <i class="fas fa-user mr-2"></i> Profile
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a href="{{ route('logout') }}" class="dropdown-item"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt mr-2"></i> {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Header-section-->
        <div class="custom-container">
            <div class="instruction d-grid">
                    <div class="custom-instruction">
                        <h1 class="patient-bold-blue-p">How to Record YourSelf</h1>
                        <h1 class="custom-p">1.&nbsp;&nbsp;Allow camera access</h1>
                        <h1 class="custom-p">2.&nbsp;&nbsp;Make sure you're fully in the video frame.</h1>
                        <h1 class="custom-p">3.&nbsp;&nbsp;When you're ready, click Record and perform your exercises.</h1>
                        <p class="custom-p">4.&nbsp;&nbsp;When you're done, click Stop.</p>
                    </div>
                    <div class="video-field">
                        <h1 class="patient-bold-blue-p ml-25px">Exercise Tutorials</h1>
                        <iframe class="margin-t-10" width="100%" height="50%" src="{{ $exercise->rx_link }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
            </div>
            <video id="myVideo" playsinline class="video-js vjs-default-skin"></video>
        </div>
    </main>

    <div class="modal" id="reviewmodal">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <p class="real-quick-font mt-30px">Success!</p>
                        <p class="feedback-black-font">Video successfully captured.</p>
                        <div class="row justify-content-center">
                                        
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center border-none mb-30px">
                        <a style="cursor:pointer;" class="patient-streamrecord-delete" onclick="handleDelete()">Delete Video & REDO</a>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <button id="completeExerciseRecording" onclick="handleComplete(<?php echo $order;?>, <?php echo $exercisecount; ?>, <?php echo $rx_id; ?>)" type="button" class="btn blue-btn patient-btn-text width-183px height-36px">Complete Exercise</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
      <!-- /.modal -->

    <script>
        var videoDuration ;
        var videoRecordedData;

        window.onload = () => {
            var screenWidth = screen.width; // original pc screen width
            var screenHeight = screen.height; // original pc screen height
            var clientWidth = window.innerWidth; // current browser screen width
            var clientHeight = window.innerHeight; // current browser screen heigth
            console.log(screenWidth, screenHeight, clientWidth, clientHeight);
            // when screen width is < 1560 small pc
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
                    },
                    controlBar: {
                        fullscreenToggle: false,
                        volumePanel: false,
                        playToggle: false,
                    }
                };
            }
            else // when screen width is > 1560px big pc 
            {
                var options = {
                    controls: true,
                    bigPlayButton: false,
                    width: clientWidth-50,
                    height: clientHeight-115.6,
                    // height: clientHeight-83,
                    fluid: false,
                    // fill: true,
                    // fluid: true,
                    plugins: {
                        record: {
                            audio: true,
                            video: true,
                            maxLength: 2000,
                            debug: true, 
                        }
                    },
                    controlBar: {
                        fullscreenToggle: false,
                        volumePanel: false,
                        playToggle: false,
                    }
                };
            }
            // let downloadButton = document.getElementById("downloadButton");
            

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

            // Video body Camera instruction Text here forcely using JavaScript
            // $('#myVideo').append('<h3 class="text-center color-w" id="guide">Click Icon Below to <br> Enable Camera</h3>');
            // if (clientHeight > 900) {
            //      $('#guide').css('margin-top', '270px');
            // }
            // else if (clientHeight <= 900 && clientHeight > 800)
            // {
            //     $('#guide').css('margin-top', '240px');
            // }
            // else if (clientHeight <= 800 && clientHeight > 730) {
            //     $('#guide').css('margin-top', '200px');
            // }
            // else if (clientHeight <= 730 && clientHeight > 690) {
            //     $('#guide').css('margin-top', '180px');
            // }
            // else {
            //     $('#guide').css('margin-top', '100px');
            // }
           


            



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
                $('.vjs-current-time.vjs-time-control.vjs-control').css('opacity', 1);
                $('.vjs-current-time.vjs-time-control.vjs-control .vjs-control-text').html('Recording&nbsp;&nbsp;');
            });

            // user completed recording and stream is available
            player.on('finishRecord', function() {
                $('.vjs-current-time.vjs-time-control.vjs-control').css('opacity', 0);
                $('.vjs-duration.vjs-time-control.vjs-control').css('opacity', 1);
                $('.vjs-duration.vjs-time-control.vjs-control .vjs-control-text').html('Recorded&nbsp;&nbsp;');
                // show remove modal
                $('#reviewmodal').modal({
                    backdrop: 'static'
                });
                
                // console.log(player.record().getDuration().toFixed(0));
                videoDuration = player.record().getDuration().toFixed(0); // second
                // upload recorded data
                videoRecordedData = player.recordedData;
                // upload(player.recordedData, videoDuration);
            });

            // custom record button
            deviceElement = $('.vjs-record.vjs-device-button.vjs-control.vjs-icon-av-perm')[0];
            deviceElement.addEventListener("click", function(){ 
                 $('.vjs-control-bar').css('opacity', 1);
                 console.log('Camera Device button clicked.');
                 // record start button
                 let recordStartButton = $('.vjs-record-button.vjs-control.vjs-button.vjs-icon-record-start')[0];
                 recordStartButton.innerHTML = '<span class="c-record"><span class="material-icons">adjust</span>&nbsp;<b>RECORD</b></span><span class="c-stop"><span class="material-icons">adjust</span>&nbsp;<b>STOP RECORDING</b></span>';
            });

        }

        function handleDelete() {
                $('#reviewmodal').modal('hide');
                $('.vjs-duration.vjs-time-control.vjs-control').css('opacity', 0);
        }

        function handleComplete(order, exercisecount, rx_id) {
            upload(videoRecordedData,videoDuration, order, exercisecount, rx_id);
        }

        // upload function definition
        function upload(blob, duration, order, exercisecount, rx_id) {
                // this upload handler is served using webpack-dev-server for
                // this example, see build-config/fragments/dev.js
                var serverUrl = '/upload';
                var formData = new FormData();
               
                formData.append('file', blob, blob.name);
                formData.append('duration', duration);
                formData.append('order', order);
                formData.append('exercisecount', exercisecount);
                formData.append('rx_id', rx_id);

                console.log(duration + 'second upload recording ' + blob.name + ' to ' + serverUrl);

                // start upload
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                
                $.ajax({
                    url: "{{ url('/patient/upload') }}",
                    type: 'POST',              
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(result)
                    {
                        console.log(result);
                        if( result.status == 200 ) {
                            console.log('Save Db and Upload to Server has been Succeed!');
                            window.location = '/patient/careplan/exercises-detail?recordedVideoId=' 
                            + result.recordedVideoId + 
                            '&patientActivityId=' 
                            + result.patientActivityId +
                            '&order='
                            + order +
                            '&exercisecount='
                            + exercisecount;
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
        
    </script>

</body>

</html>