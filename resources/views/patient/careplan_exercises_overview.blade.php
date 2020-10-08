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
@endsection

@section('content')
        <section class="pb-50 pt-15px"> 
        <a class="patient-exit-text d-flex ml-40px" href="{{ route('patient.getstarted') }}" ><i class="material-icons-outlined mt-15px">arrow_back</i>&nbsp;EXIT WAITING ROOM</a>
                <div class="container max-width-962px">
                <h1 class="patient-careplan-blue-h1 text-center mt-minus-50px mb-50">Lacey's Care Plan</h1>
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
                        <p class="patient-bold-blue-p mb-0px">OVERVIEW</p>
                        <h3 class="waiting-light-blue-h3 mt-minus-25px">Here' s the plan.</h3>
                        <p class="custom-16-font mt-20px mb-30px">
                            Below are the exercises <b>Dr. Wang</b> has perscribed for you. You’ll be walked through each exercise one by one, recording your experience of each. This is about progress not perfection, take your time and do the best you can.
                        </p>
                        <p class="custom-16-font mt-20px mb-40px">
                            <b class="color-red">Remember</b>: If your pain ever increases to an uncomfortable level, please stop and contact your practitioner.
                        </p>
                        
                        <div class="patient-exercises-divider"></div>

                        <div class="row">
                                        <div class="col-md-12">
                                            <p class="exercise-blue-small-font mt-15px mb-5px">Upper Back Stretches</p>
                                            <ul class="pl-18px">
                                                <li class="exercise-li-muted-font">4x week, for 20 minutes</li>
                                                <li class="exercise-li-muted-font">Continue for 3 weeks</li>
                                            </ul>
                                        </div>
                        </div>

                        <div class="patient-exercises-divider"></div>

                        <div class="row">
                                        <div class="col-md-12">
                                            <p class="exercise-blue-small-font mt-15px mb-5px">SI Joint Extension</p>
                                            <ul class="pl-18px" >
                                                <li class="exercise-li-muted-font">4x week, for 20 minutes</li>
                                                <li class="exercise-li-muted-font">Continue for 3 weeks</li>
                                            </ul>
                                        </div>
                        </div>

                        <div class="patient-exercises-divider"></div>
                        
                        <div class="row">
                                        <div class="col-md-12">
                                        <p class="exercise-blue-small-font mt-15px mb-5px">Lumbar Stenosis Stretches</p>
                                            <ul class="pl-18px">
                                                <li class="exercise-li-muted-font">4x week, for 20 minutes</li>
                                                <li class="exercise-li-muted-font">Continue for 3 weeks</li>
                                            </ul>
                                        </div>
                        </div>

                        <div class="patient-exercises-divider"></div>

                        <div class="mb-20px mt-40px">
                                    <a href="{{ route('patient.careplan.exercises_detail') }}"><button id="firststepbtn" class="btn blue-btn patient-btn-text width-150px height-36px">START</button></a>
                        </div>
                </div>            
            </div>
        </section>
@endsection

@section('javascript')
@endsection
