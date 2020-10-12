@extends('layouts.patient')

@section('content')
        <section class="pb-50 pt-15px"> 
            <a class="patient-exit-text d-flex ml-40px" href="{{ route('patient.getstarted', ['provider' => $meeting->provider_id, 'time' => $timeId]) }}" ><i class="material-icons-outlined mt-15px">arrow_back</i>&nbsp;EXIT WAITING ROOM</a>
            <div class="container max-width-962px">
                <div class="patient-box pt-50 mt-25px">
                        <h1 class="patient-careplan-blue-h1 text-center">Dr. Wang will be with you shortly.</h1>
                        <p class="custom-16-font-bold text-center mb-0">Your queue time is {{ strtoupper($time) }}.</p>
                        <p class="custom-16-font text-center">Once your practitioner is ready you will be able join the meeting.</p>
                        <div class="mt-30px mb-25 text-center">
                                    <a href="{{ $meeting->meetUrl }}" target="_blank"><button class="btn blue-btn patient-btn-text width-137px height-36px">JOIN MEETING</button></a>
                        </div>
                </div>     
                
                <div class="patient-box mt-25px">
                        <p class="patient-bold-blue-p mb-10 ">Form Submitted</p>
                        <h3 class="waiting-light-blue-h3 mt-minus-25px">Thank you for providing your feedback!</p>
                </div>    
            </div>
        </section>
@endsection

@section('javascript')
@endsection
