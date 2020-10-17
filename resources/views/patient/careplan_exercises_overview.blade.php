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
        <a class="patient-exit-text d-flex ml-40px" onclick="showExitModal()"><i class="material-icons-outlined mt-15px">arrow_back</i>&nbsp;EXIT SESSION</a>
                <div class="container max-width-962px">
                <h1 class="patient-careplan-blue-h1 text-center mt-minus-50px mb-50">{{ $patient->name }}' s Care Plan</h1>
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
                            Below are the exercises <b>Dr. {{ $patient->getProvider1? $patient->getProvider1->name: 'Not Available' }}</b> has perscribed for you. You’ll be walked through each exercise one by one, recording your experience of each. This is about progress not perfection, take your time and do the best you can.
                        </p>
                        <p class="custom-16-font mt-20px mb-40px">
                            <b class="color-red">Remember</b>: If your pain ever increases to an uncomfortable level, please stop and contact your practitioner.
                        </p>
                        
                        <div class="patient-exercises-divider"></div>

                        @if( isset($patient->rx_1) || isset($patient->rx_2) || isset($patient->rx_3 ) )
                            <?php $exercisecount = 0; ?>
                            @for( $i = 1; $i < 4; $i++ )
                                @if( isset($patient['getRx'.$i]) )
                                    <div class="row">
                                                    <div class="col-md-12">
                                                        <p class="exercise-blue-small-font mt-15px mb-5px">{{ $patient['getRx'.$i]->rx_name ? $patient['getRx'.$i]->rx_name : 'template rx name' }}</p>
                                                        <ul class="pl-18px">
                                                            <li class="exercise-li-muted-font">{{ $patient['getRx'.$i]->frequency ? $patient['getRx'.$i]->frequency : 'template rx frequency' }}</li>
                                                            <li class="exercise-li-muted-font">{{ $patient['getRx'.$i]->duration ? $patient['getRx'.$i]->duration : 'template rx duration' }}</li>
                                                        </ul>
                                                    </div>
                                    </div>

                                    <div class="patient-exercises-divider"></div>
                                    <?php $exercisecount++; ?>
                                @endif
                            @endfor

                            <div class="mb-20px mt-40px">
                                    <a href="{{ route('patient.careplan.exercises_detail', [ 'order' => 1, 'exercisecount' => $exercisecount ]) }}"><button id="firststepbtn" class="btn blue-btn patient-btn-text width-150px height-36px">START</button></a>
                            </div>

                        @else
                        <div class="row">
                                        <div class="col-md-12">
                                            <p class="custom-16-font text-left mt-30px mb-30px">Still, No Exercises assigned for you.</p>
                                        </div>
                        </div>
                        <div class="patient-exercises-divider"></div>

                        <div class="mb-20px mt-40px">
                                    <button id="firststepbtn" class="btn patient-disabled-btn patient-btn-text width-150px height-36px" onclick="noExercisesHandle()">START</button></a>
                        </div>
                        @endif
                     

                        
                </div>            
            </div>
        </section>

        <div class="modal" id="modal-exit">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <p class="real-quick-font mt-30px">Are you sure?</p>
                        <p class="feedback-black-font">If you exit now, your session will be logged as incomplete</p>
                        <div class="row justify-content-center">
                                        
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center border-none mb-30px">
                        <button class="patient-default-btn patient-outlined-btn-font width-216px height-36px justify-content-center" onclick="handleExit()">Exit to Homepage</button>
                        &nbsp;&nbsp;&nbsp;
                        <button id="completeExerciseRecording"  data-dismiss="modal" type="button" class="btn blue-btn patient-btn-text width-216px height-36px">Continue Session</button>
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
    function noExercisesHandle() {
        window.alert('Please contact with your provider to receive your exercises.')
    }

    
    // show exit modal
    function showExitModal() {
        console.log('clicked exit modal');
        $('#modal-exit').modal({
            backdrop: 'static',
            keyboard: false
        })
    }
    // handle exit
    function handleExit() {
        console.log('exit');
        window.location = '/patient/getstarted';
    }
</script>
@endsection
