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
            font-size: 173% !important; 
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
    <style>
        /* Record Start button customization */
        .vjs-icon-record-start:before {
                content: none !important;
        }
        .vjs-record-button.vjs-control.vjs-button.vjs-icon-record-start {
            background: #d40000;
            width: 100px;
            height: 40px;
            margin: 5px;
            border-radius: .25rem;
        }
        .c-record {
            font-family: sans-serif !important;
        }
        .c-stop {
            font-family: sans-serif !important;
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
            width: 100px;
            height: 40px;
            margin: 5px;
            border-radius: .25rem;
        }

        /* remove the focuse outline in record and stop button */
        button:focus {
            outline: 1px !important;
        }

        /* control bar */
        .video-js .vjs-control-bar {
            background: rgba(43,51,63) !important;
        }
    </style>

    <!-- Multi-Step-Modal-CSS -->
    <style>
        .m-progress-bar {
            min-height: 1em;
            background: #28a745;
            width: 5%;
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
                            <a class="navbar-brand text-brand" href="{{ route('index') }}"><img src="{{ env('APP_LOGO') }}" alt="logo" id="chiroonelogo"></a>
                        </div>
                        <div class="col-md-4 m-auto">
                            <a class="custom-font" href="{{ route('recordvideo') }}">&lt;Back</a>
                        </div>
                        
                        
                    </div>
              
                    <div class="col-md-6">
                        <h1 class="text-center special-font"></h1>
                    </div>
               
                    <div class="col-md-3 text-center m-auto d-flex">
                        <div class="col-md-8 text-right">
                            <a href="{{ route('index') }}"><button class="c-stream" style="width: 140px;"><b>Finish</b></button></a>
                        </div>
                        <!-- Right Side Of Navbar -->
                            <!-- Authentication Links -->
                           
                        <div class="col-md-4 m-auto"> 
                            <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();" class="head-logout">
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
                        <button class="c-stream" style="margin-bottom: 20px; width: 160px; display: none;" id="downloadbtn"><b>DOWNLOAD</b></button>
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
    

    
    <!-- Multi Step Modal -->
    <form class="modal multi-step" id="reviewmodal">
        <div class="modal-dialog">
            <div class="modal-content h-100">
                <div class="modal-body step-1" data-step="1">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Assessment</h5>
                                    <p class="card-text" style="color:black;">This form will be used to collect information about your Telehealth Video Session. This is an opportunity to provide feedback regarding your experience with the session, as well as confirming that you have completed
                                        the exercises and the video recording as outlined in your individual care plan.
                                    </p>
                                    <a href="#" style="color: red;">* Required</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Email address <span style="color: red;">*</span></h5>

                                    <input id="email" type="email" name="email" placeholder="Your email" style="outline: none; border: none; border-bottom: 1px solid gray;">
                                    <p style="color:red; display: none;" id="email-validator">This field is required</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Name <span style="color: red;">*</span></h5>

                                    <input id="name" type="text" name="name" placeholder="Your answer" style="outline: none; border: none; border-bottom: 1px solid gray;">
                                    <p style="color:red; display: none;" id="name-validator">This field is required</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-body step-2" data-step="2">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Assessment</h5>
                                    <a href="#" style="color: red;">* Required</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Video Telehealth Session</h5>

                                    <p style="color:black;">This form will collect information about your Video Telehealth Session, Please complete each question and type your name at the bottom to confirm completion.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Were you able to complete all of the exercises in your individualized care plan? <span style="color:red">*</span>
                                    </h5>
                                    <input type="radio" id="male" name="completable" value="1" checked onclick="radioSelect(1)">
                                    <label for="male" style="color:black;">Yes</label><br>
                                    <input type="radio" id="female" onclick="radioSelect(1)" value="0" name="completable">
                                    <label for="female" style="color:black;">No</label><br>
                                    <input type="radio" id="female" name="completable" value="2" onclick="radioSelect(2)">
                                    <label for="female" style="color:black;">Other</label> &nbsp;
                                    <input class="w-80" id="other" type="text" name="completable_other" style="display:none; outline: none; border: none; border-bottom: 1px solid gray;">
                                    <p style="color:red; display: none;" id="other-validator">This field is required</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">If you checked "No" or "Other" above, please discribe any difficulty you had with each exercise in the space below:
                                    </h5>

                                    <input class="w-100" id="difficult_answer" type="text" name="difficult_answer" placeholder="Your answer" style="outline: none; border: none; border-bottom: 1px solid gray;">
                                    <p style="color:red; display: none;" id="difficult_answer-validator">This field is required</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">On a scale of 1 to 5, with 5 being "very difficult", how would you rate &lt;Exercise 1&gt;? <span style="color: red;">*</span>
                                    </h5>

                                    <div class="col-md-12 d-flex">
                                        <div class="col-md-3 left-end">
                                            <p style="color:black;">Very Easy</p>
                                        </div>
                                        <div class="col-md-1 d-grid">
                                            <label for="male" style="color:black;">1</label>
                                            <input type="radio" id="male" name="qeeue" value="1" checked>
                                        </div>
                                        <div class="col-md-1 d-grid">
                                            <label for="female" style="color:black;">2</label>
                                            <input type="radio" id="female" name="qeeue" value="2">
                                        </div>
                                        <div class="col-md-1 d-grid">
                                            <label for="female" style="color:black;">3</label>
                                            <input type="radio" id="female" name="qeeue" value="3">
                                        </div>
                                        <div class="col-md-1 d-grid">
                                            <label for="female" style="color:black;">4</label>
                                            <input type="radio" id="female" name="qeeue" value="4">
                                        </div>
                                        <div class="col-md-1 d-grid">
                                            <label for="female" style="color:black;">5</label>
                                            <input type="radio" id="female" name="qeeue" value="5">
                                        </div>


                                        <div class="col-md-4 right-end">
                                            <p style="color:black;">Very Difficult</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">On a scale of 1 to 5, with 5 being "very difficult", how would you rate &lt;Exercise 2&gt;? <span style="color: red;">*</span>
                                    </h5>

                                    <div class="col-md-12 d-flex">
                                        <div class="col-md-3 left-end">
                                            <p style="color:black;">Very Easy</p>
                                        </div>
                                        <div class="col-md-1 d-grid">
                                            <label for="male" style="color:black;">1</label>
                                            <input type="radio" id="male" name="qeeueb" value="1" checked>
                                        </div>
                                        <div class="col-md-1 d-grid">
                                            <label for="female" style="color:black;">2</label>
                                            <input type="radio" id="female" name="qeeueb" value="2">
                                        </div>
                                        <div class="col-md-1 d-grid">
                                            <label for="female" style="color:black;">3</label>
                                            <input type="radio" id="female" name="qeeueb" value="3">
                                        </div>
                                        <div class="col-md-1 d-grid">
                                            <label for="female" style="color:black;">4</label>
                                            <input type="radio" id="female" name="qeeueb" value="4">
                                        </div>
                                        <div class="col-md-1 d-grid">
                                            <label for="female" style="color:black;">5</label>
                                            <input type="radio" id="female" name="qeeueb" value="5">
                                        </div>


                                        <div class="col-md-4 right-end">
                                            <p style="color:black;">Very Difficult</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">On a scale of 1 to 5, with 5 being "very difficult", how would you rate &lt;Exercise 3&gt;? <span style="color: red;">*</span>
                                    </h5>

                                    <div class="col-md-12 d-flex">
                                        <div class="col-md-3 left-end">
                                            <p style="color:black;">Very Easy</p>
                                        </div>
                                        <div class="col-md-1 d-grid">
                                            <label for="male" style="color:black;">1</label>
                                            <input type="radio" id="male" name="qeeuec" value="1" checked>
                                        </div>
                                        <div class="col-md-1 d-grid">
                                            <label for="female" style="color:black;">2</label>
                                            <input type="radio" id="female" name="qeeuec" value="2">
                                        </div>
                                        <div class="col-md-1 d-grid">
                                            <label for="female" style="color:black;">3</label>
                                            <input type="radio" id="female" name="qeeuec" value="3">
                                        </div>
                                        <div class="col-md-1 d-grid">
                                            <label for="female" style="color:black;">4</label>
                                            <input type="radio" id="female" name="qeeuec" value="4">
                                        </div>
                                        <div class="col-md-1 d-grid">
                                            <label for="female" style="color:black;">5</label>
                                            <input type="radio" id="female" name="qeeuec" value="5">
                                        </div>


                                        <div class="col-md-4 right-end">
                                            <p style="color:black;">Very Difficult</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Please type your full name below as acknowledgement that you have completed the exercises in your individual care plan
                                        <span style="color: red;">*</span></h5>

                                    <input class="w-80" id="exerciseAnswer" type="text" name="exerciser" placeholder="Your answer" style="outline: none; border: none; border-bottom: 1px solid gray;" >
                                    <p style="color:red; display: none;" id="exerciseAnswer-validator">This field is required</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="margin: 20px;">
                    <p style="color:black;">A copy of your responses will be emailed to the address you provided.</p>
                </div>

                <div class="row d-flex">
                    <div class="col-md-12 text-center">

                        <div class="m-progress m-auto w-50">
                            <div class="m-progress-bar-wrapper">
                                <div class="m-progress-bar">
                                </div>
                            </div>
                            <div class="m-progress-stats" style="color:black;">
                                page
                                <span class="m-progress-current">
                                </span> /
                                <span class="m-progress-total">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="justify-content: initial; border: none;">
                    <button type="button" class="btn btn-default step step-2 modal-button shadow bg-white rounded" style="width: 100px;" data-step="2" onclick="sendEvent('#reviewmodal', 1)">Back</button>

                    <div class="text-left">
                        <button type="button" class="btn btn-default step step-1 modal-button shadow bg-white rounded" style="width: 100px;" data-step="1" onclick="sendEvent('#reviewmodal', 2)">Next</button>
                    </div>

                    <button type="button" class="btn btn-success step step-2 modal-button shadow" style="width: 100px;" onclick="sendSubmit()" data-step="2">Submit</button>
                </div>
                <!-- <div style="margin: 20px;">
                    <p>Never submit passwords through Google Forms</p>
                    <div class="row custom-footer">
                        <div class="col-md-3"><b>Google</b>Forms</div>
                        <div class="col-md-9">This form was created inside of Hayter.</div>
                    </div>
                </div> -->
                <div style="margin: 20px;">
                    <p>Review us on Yelp, Google, etc.</p>
                </div>
            </div>
        </div>
    </form>
    <!-- Mutli Step Modal End -->

    <script>
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

            // Video body Camera instruction Text here forcely using JavaScript
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
                $('#reviewmodal').modal({
                    backdrop: 'static'
                });

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

            // custom record button
            deviceElement = $('.vjs-record.vjs-device-button.vjs-control.vjs-icon-av-perm')[0];
            deviceElement.addEventListener("click", function(){ 
                 console.log('Camera Device button clicked.');
                 // record start button
                 let recordStartButton = $('.vjs-record-button.vjs-control.vjs-button.vjs-icon-record-start')[0];
                 recordStartButton.innerHTML = '<span class="c-record"><b>RECORD</b></span><span class="c-stop"><b>STOP</b></span>';
            });

          
        }
        
    </script>

    <!-- Multi-Step-Modal JS -->
    <script src="{{ asset('assets/js/multi-step-modal.js') }}"></script>
    <script>
        sendEvent = function(sel, step) {
            var sel_event = new CustomEvent('next.m.' + step, {
                detail: {
                    step: step
                }
            });
            window.dispatchEvent(sel_event);
        }

        function radioSelect(param) {
            console.log(param);
            if (param == 2) {
                $('#other').css('display', 'initial');
                $('#other-validator').css('display', 'initial')
            } else {
                $('#other').css('display', 'none');
                $('#other-validator').css('display', 'none')
            }
        }

        function sendSubmit() {

            // if ( $('#difficult_answer').val() == '' || $('#exerciseAnswer').val() == '' ) {
            //     if ( $('#difficult_answer').val() == '' ) {
            //         $('#difficult_answer-validator').css('display', 'initial');
            //     } else if ( $('#exerciseAnswer').val() == '' ) {
            //         $('#exerciseAnswer-validator').css('display', 'initial');
            //     } else {
            //         $('#difficult_answer-validator').css('display', 'initial');
            //         $('#exerciseAnswer-validator').css('display', 'initial');
            //     }
            // }
            if ( $('#exerciseAnswer').val() == '' ) {
                    $('#exerciseAnswer-validator').css('display', 'initial');
            }
            else {
                $('#difficult_answer-validator').css('display', 'none');
                $('#exerciseAnswer-validator').css('display', 'none');

                $('#reviewmodal').modal('hide');

                let reviewData = $('#reviewmodal').serialize();

                // start upload
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                
                $.ajax({
                    url: "{{ url('/streamrecord') }}",
                    type: 'POST',              
                    data: reviewData,
                    success: function(result)
                    {
                        if( result == 'Success' ) {
                            
                            window.alert('Thank your for completing the assessment.  You may now download your copy of the recording, or click Finish to return to the home page.');
                        }
                        else {
                            console.log('Error Occured In upload, Retry or Check Network');
                            window.alert('Review Submit went wrong. Check network and retry.');
                        }
                    },
                    error: function(data)
                    {
                        console.log('error',data);
                        window.alert('Review Submit went wrong. Check network and retry.');
                    }
                });

            }
            
            

        }
    </script>


</body>

</html>