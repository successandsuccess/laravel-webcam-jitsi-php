@extends('layouts.patient')

@section('content')
    <section class="pb-50 pt-15px"> 
        <a class="patient-exit-text d-flex ml-40px" onclick="showExitModal()"><i class="material-icons-outlined mt-15px">arrow_back</i>&nbsp;EXIT SESSION</a>
        <div class="container max-width-962px">
                <div class="patient-box mt-25px">
                <p class="patient-bold-blue-p mb-0px">Form Submitted</p>
                        <h3 class="waiting-light-blue-h3 mt-minus-25px">Thank you for providing your feedback!</p>
                        <div class="patient-divider"></div>
                        <p class="patient-careplan-blue-h1 mt-20px text-left">Please contact your practitioner.</p>
                     
                        <p class="custom-16-font">
                            Based on your feedback, we think practicing your exercises might not be the best thing for you right now.
                        </p>

                        <p class="custom-16-font-bold">
                            Please schedule a visit with your practitioner so we can evaluate next steps and a new care plan. 
                        </p>

                        <div class="mb-0 mt-15px">
                                    <a href="#"><button class="btn btn-blue patient-btn-text width-205px height-36px">Schedule a visit</button></a>
                        </div>
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
