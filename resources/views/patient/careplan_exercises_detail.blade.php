@extends('layouts.patient')

@section('css')
<style>
.progressbar {
    counter-reset: step;
    margin-left: 135px;
}
.progressbar li {
    list-style-type: none;
    float: left;
    width: 25%;
    position: relative;
    text-align: center;
    color: #3746B0;
}

.progressbar li:before {
    content: counter(step);
    counter-increment: step;
    width:30px;
    height: 30px;
    line-height: 30px;
    border: 1px solid #3746B0;
    display: block;
    text-align: center;
    margin: 0 auto 10px auto;
    border-radius: 50%;
    background-color: white;
}
.progressbar li:after{
    content: '';
    position: absolute;
    width: 100%;
    height: 1px;
    background-color: #3746B0;
    top:15px;
    left: -50%;
    z-index: -1;
}

.progressbar li:first-child:after{
    content: none;
}

.progressbar li.active:before{
    border:none;
    background-color:#3746B0;
    color: white;
}

.progressbar li.active {
    font-weight: bold;
}

.background-g {
    background: rgba(229, 229, 229, 0.5);
}

</style>

<link rel="stylesheet" href="{{ asset('admin_assets/progress-circle-bar.css') }}">
@endsection

@section('content')
        <section class="pb-50 pt-15px"> 
        <a class="patient-exit-text d-flex ml-40px" href="{{ route('patient.getstarted') }}" ><i class="material-icons-outlined mt-15px">arrow_back</i>&nbsp;EXIT WAITING ROOM</a>
                <div class="container max-width-962px">
                <h1 class="patient-careplan-blue-h1 text-center mt-minus-50px mb-50">Howard' s Care Plan</h1>
                <div class="row mb-50">
                    <div class="col-md-12">
                        <ol class="progressbar">
                            <li>
                               CHECK IN
                            </li>
                            <li class="active">
                               EXERCISES
                            </li>
                            <li>
                               REVIEW
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="patient-box mt-25px">
                        <p class="patient-bold-blue-p mb-0px">Exercise One</p>
                        <h3 class="waiting-light-blue-h3 mt-minus-25px">Upper Back Stretches.</h3>

                        
                        <p class="custom-16-font mt-10 mb-30px">
                        
                            Please watch the tutorial then perform on your own. Record your time on task or record a video of yourself doing the exercises.
                        </p>

                        <div class="patient-gray-box">
                            <p class="custom-16-font-bold">
                                <img src="{{ asset('admin_assets/dist/img/user1-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                Dr. Wang' s instructions
                            </p>
                            <p class="custom-16-font ml-70px">
                                                As you perform these stretches be sure to keep your hips in line and your shoulders down. 
                            </p>
                            <ul class="ml-50px">
                                <li class="custom-16-font">Perform stretch for <b>8 minutes</b></li>
                            </ul>
                        </div>

                        <p class="patient-bold-blue-p mb-0px">Tutorial</p>

                        <iframe width="100%" height="350" src="https://www.youtube.com/embed/vuGnzLxRvZM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        
                        <p class="patient-bold-blue-p mb-0px">Your Turn</p>
                        <p class="custom-16-font mt-0px mb-30px">
                            When ready choose an option to record yourself perform the exercise. Recording a video is helpful is you want feedback or have questions for your practitioner on your form.
                        </p>

                        <div class="row mb-30px">
                            <div class="col-md-6">
                                <a href="{{ route('streamrecord') }}"><button class="btn btn-outlined patient-outlined-btn-font width-100 height-36px justify-content-center">record video</button></a>
                            </div>
                            <div class="col-md-6">
                                <button onclick="handleRecordTime()" class="btn btn-outlined patient-outlined-btn-font width-100 height-36px justify-content-center">record time</button>
                            </div>
                        </div>

                        <!-- timer start -->
                        <div class="patient-gray-box mb-20px pt-0" style="display: none" id = "recordTimeBox1">
                            <p class="custom-h3-normal text-center">
                                Set 1
                            </p>
                            <div class="d-flex justify-content-center mt-25px">
                                <div class="progress-circle">
                                    <span class="timer timer-custom-font">00:00:00</span>
                                    <div class="left-half-clipper">
                                        <div class="first50-bar"></div>
                                        <div class="value-bar"></div>
                                    </div>
                                </div>
                            </div>
               
                            <div class="text-center mt-25px">
                                <button id="timerstart" onclick="timerHandleStart(1)" class="btn green-btn patient-btn-text width-104px height-36px mt-15px">START</button>
                                <button id="timerstop" onclick="timerHandleStart(2)" class="btn red-btn patient-btn-text width-104px height-36px mt-15px" style="display:none;">STOP</button>
                                <div id="timerfinish" style="display:none;">
                                    <p class="patient-bold-blue-p mb-0 d-flex justify-content-center"><span class="material-icons color-green mt-15px">check_circle_outline</span>&nbsp;&nbsp;&nbsp;SET COMPLETED</p>
                                    <p class="delete-font text-center justify-content-center" style="margin-top: -10px">DELETE & REDO</p>
                                </div>
                            </div>
                        </div>
                        <!-- timer end -->

                        @if ($recorded == 1) 
                        <div class="row">
                            <div class="col-md-8">
                                <div class="recorded-video">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <p class="italic-16-font-muted mb-0 d-flex"><span class="material-icons color-green">check_circle_outline</span>&nbsp;&nbsp;&nbsp;Video recording attached</p>
                                        </div>
                                        <div class="col-md-2 d-flex">
                                            <p class="video-red-remove-font mb-0">Remove</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                        @endif

                        <p class="custom-16-font mt-20px mb-30px">
                            Have comments or questions for your practitioner? 
                            <br>
                            <span class="blue-color">Enter them here.</span>
                        </p>
                        
                           
                        

                        <div class="mb-30px mt-35px">
                        @if ($recorded == 1) 
                            <button class="btn blue-btn patient-btn-text width-104px height-36px" id="show_default_modal">next</button>
                        @else 
                            <button id="firststepbtn" onclick="handleDisabledSubmit()" class="btn patient-disabled-btn patient-btn-text width-104px height-36px">next</button>
                        @endif
                        </div>
                </div>            
            </div>
        </section>

        <div class="modal" id="modal-default">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <p class="real-quick-font mt-30px">Real Quick...</p>
                        <p class="feedback-black-font">How do you feel after completing exercise one?</p>
                        <div class="row justify-content-center">
                                        <div class="d-grid emojidiv mr-20px" onclick="emojiclicked(1)" id="better">
                                            <img class="emoji" src="{{ asset('admin_assets/dist/img/emoji/mild.png') }}"  alt="no pain">
                                            <label class="text-center mt-15px" for="emoji">Better</label>
                                        </div>
                                        <div class="d-grid emojidiv mr-20px"  onclick="emojiclicked(2)" id="same" >
                                            <img class="emoji" src="{{ asset('admin_assets/dist/img/emoji/moderate.png') }}"alt="mild">
                                            <label class="text-center mt-15px" for="emoji">Same</label>
                                        </div>
                                        <div class="d-grid emojidiv mr-20px" onclick="emojiclicked(3)" id="worse" >
                                            <img class="emoji" src="{{ asset('admin_assets/dist/img/emoji/intense.png') }}" alt="moderate">
                                            <label class="text-center mt-15px" for="emoji">Worse</label>
                                        </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center border-none mb-30px">
                        <button id="submitselfdirectedfeedback" onclick="handleSubmit()" type="button" class="btn patient-disabled-btn patient-btn-text width-104px height-36px">Submit</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
@endsection

@section('javascript')
<script>
    $(document).ready(function(){
        $("#show_default_modal").click(function(){
            $("#modal-default").modal({
                backdrop: 'static',
                keyboard: false
            });
        });
    });

// emojis
let better = document.getElementById('better');
let same = document.getElementById('same');
let worse = document.getElementById('worse');

function emojiclicked(index) {
        if ( index == 1 ) {
            better.classList.add('active');
            same.classList.remove('active');
            worse.classList.remove('active');
        }

        if (index == 2) {
            better.classList.remove('active');
            same.classList.add('active');
            worse.classList.remove('active');
        }

        if (index == 3) {
            better.classList.remove('active');
            same.classList.remove('active');
            worse.classList.add('active');
        }

        document.getElementById('submitselfdirectedfeedback').classList.remove('patient-disabled-btn');
        document.getElementById('submitselfdirectedfeedback').classList.add('blue-btn');
    }

function handleSubmit() {
    const classList = document.getElementsByClassName("d-grid emojidiv mr-20px active");
    const classLength = classList.length;
    if (classLength != 0) {
        console.log("Element found with the clicked emoji");
        window.location = "/patient/careplan/exercises-review";

    } else {
        console.log("No element found with the clicked emoji");
        window.alert('Please choose one option');
    }
}

function handleDisabledSubmit() {
    let temp = document.getElementById('firststepbtn').className;
    if ( temp.includes('blue-btn') ) {
        $('#modal-default').modal('show');
    } else {
        window.alert('Firstly Record video.');
    }
    
}

function handleRecordTime() {
    console.log('clicked');
    document.getElementById('recordTimeBox1').style.display = 'block';
}

function timerHandleStart(index) {
    console.log('timer Started');
    let tempHours;
    let tempMinutes;
    let tempSeconds;
    let tempTotal;
    let tempTotalDeg;
    if (index == 1) {

         $('.timer').on('second', function(evt, time){
            tempHours = time.original.hours;
            tempMinutes = time.original.minutes;
            tempSeconds = time.original.seconds;
            tempTotal = tempHours * 3600 + tempMinutes * 60 + tempSeconds;
            tempTotalDeg = ( tempTotal / (1 * 3600) ) * 360;
            tempTotalDeg = tempTotalDeg.toFixed(2) + 'deg';
            // console.log(tempHours, tempMinutes, tempSeconds, tempTotal, tempTotalDeg);
            $('.value-bar').css('transform', `rotate(${tempTotalDeg})`);

        });

        $('.timer').countimer('start')

        document.getElementById('timerstart').style.display = 'none';
        document.getElementById('timerstop').style.display = 'initial';

    
    }

    if (index == 2) {
        $('.timer').countimer('stop');
        console.log('finished time', $('.timer').countimer('current'));
        document.getElementById('timerstop').style.display = 'none';
        document.getElementById('timerfinish').style.display = 'initial';
        $('.value-bar').css('display','none');
        document.getElementById('firststepbtn').classList.remove('patient-disabled-btn');
        document.getElementById('firststepbtn').classList.add('blue-btn');
    }
    
}
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>

<script src="{{ asset('admin_assets/dist/js/ez.countimer.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.timer').countimer({
            autoStart: false,
            enableEvents: true,
        });
    });
</script>

@endsection
