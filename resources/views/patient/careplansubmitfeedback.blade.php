@extends('layouts.patient')

@section('content')
    <section class="pb-50 pt-15px"> 
        <a class="patient-exit-text d-flex ml-40px" href="{{ route('patient.getstarted') }}" ><i class="material-icons-outlined mt-15px">arrow_back</i>&nbsp;EXIT WAITING ROOM</a>
        <div class="container max-width-962px">
                <div class="patient-box mt-25px">
                <p class="patient-bold-blue-p mb-0px">Form Submitted</p>
                        <h3 class="waiting-light-blue-h3 mt-minus-25px">Thank you for providing your feedback!</p>
                        <div class="patient-divider"></div>
                        <p class="patient-careplan-blue-h1 mt-20px text-left">Please contact your practitioner.</p>
                     
                        <p class="custom-16-font">
                            Based on your feedback, we think practicing your exercises might not be the best thing for you right now.
                        </p>

                        <p class="custom-16-font">
                            Please schedule a visit with your practitioner so we can evaluate next steps and a new care plan. 
                        </p>

                        <div class="mb-0 mt-15px">
                                    <a href="#"><button class="btn btn-blue patient-btn-text width-205px height-36px">Schedule a visit</button></a>
                        </div>
                </div>            
        </div>
    </section>
@endsection

@section('javascript')
@endsection
