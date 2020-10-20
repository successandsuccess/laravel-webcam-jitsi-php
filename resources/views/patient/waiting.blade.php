@extends('layouts.patient')

@section('content')
        <section class="pb-50 pt-15px"> 
            <a class="patient-exit-text d-flex ml-40px" href="{{ route('patient.getstarted', ['provider' => $providerId, 'time' => $timeId]) }}" ><i class="material-icons-outlined mt-15px">arrow_back</i>&nbsp;EXIT WAITING ROOM</a>
            <div class="container max-width-962px">
                <div class="patient-box pt-50 mt-25px">
                        <h1 class="patient-careplan-blue-h1 text-center">Dr. Wang will be with you shortly.</h1>
                        <p class="custom-16-font-bold text-center mb-0">Your queue time is {{ strtoupper($time) }}.</p>
                        <p class="custom-16-font text-center">Once your provider is ready you will be able join the meeting.</p>
                        <div class="mt-30px mb-25 text-center">
                                    <a href="{{ $jitsimeet }}" target="_blank"><button class="btn patient-disabled-btn patient-btn-text width-137px height-36px">JOIN MEETING</button></a>
                        </div>
                </div>     
                <div class="patient-box mt-25px">
                        <p class="patient-bold-blue-p mb-0px">While you wait</p>
                        <h3 class="waiting-light-blue-h3 mt-minus-25px">Let us know how you've been feeling.</p>
                        <div class="patient-divider"></div>
                        <p class="sub-title-p mt-30px">How is your pain today?</p>
                        <!-- <div class="row mt-30px mb-30px">
                                        <div class="col-md-12 d-flex justiy-content-space-between">
                                            <p class="custom-p">Minimum</p>
                                            <div class="d-grid">
                                                <input type="radio" id="male" name="todaypain" value="1" checked>
                                                <label for="male" class="custom-p mt-10">1</label>
                                            </div>
                                            <div class="d-grid">
                                                <input type="radio" id="female" name="todaypain" value="2">
                                                <label for="female" class="custom-p mt-10">2</label>
                                                
                                            </div>
                                            <div class="d-grid">
                                                <input type="radio" id="female" name="todaypain" value="3">
                                                <label for="female" class="custom-p mt-10">3</label>
                                            </div>
                                            <div class="d-grid">
                                                <input type="radio" id="female" name="todaypain" value="4">
                                                <label for="female" class="custom-p mt-10">4</label>
                                            </div>
                                            <div class="d-grid">
                                                <input type="radio" id="female" name="todaypain" value="5">
                                                <label for="female" class="custom-p mt-10">5</label>
                                            </div>

                                            <div class="d-grid">
                                                <input type="radio" id="female" name="todaypain" value="6">
                                                <label for="female" class="custom-p mt-10">6</label>
                                            </div>

                                            <div class="d-grid">
                                                <input type="radio" id="female" name="todaypain" value="7">
                                                <label for="female" class="custom-p mt-10">7</label>
                                            </div>

                                            <div class="d-grid">
                                                <input type="radio" id="female" name="todaypain" value="8">
                                                <label for="female" class="custom-p mt-10">8</label>
                                            </div>

                                            <div class="d-grid">
                                                <input type="radio" id="female" name="todaypain" value="9">
                                                <label for="female" class="custom-p mt-10">9</label>
                                            </div>

                                            <div class="d-grid">
                                                <input type="radio" id="female" name="todaypain" value="10">
                                                <label for="female" class="custom-p mt-10">10</label>
                                            
                                            </div>
                                            <p class="custom-p">Extreme</p>
                                        </div>
                        </div> -->

                        <div class="row mt-30px mb-30px">
                                        <div class="d-grid emojidiv mr-20px active" onclick="emojiclicked(1)" id="nopain">
                                            <img class="emoji" src="{{ asset('admin_assets/dist/img/emoji/nopain.png') }}"  alt="no pain">
                                            <label class="text-center mt-15px waiting-label-font" for="emoji">No Pain</label>
                                        </div>
                                        <div class="d-grid emojidiv mr-20px"  onclick="emojiclicked(2)" id="mild" >
                                            <img class="emoji" src="{{ asset('admin_assets/dist/img/emoji/mild.png') }}"alt="mild">
                                            <label class="text-center mt-15px waiting-label-font" for="emoji">Mild</label>
                                        </div>
                                        <div class="d-grid emojidiv mr-20px" onclick="emojiclicked(3)" id="moderate" >
                                            <img class="emoji" src="{{ asset('admin_assets/dist/img/emoji/moderate.png') }}" alt="moderate">
                                            <label class="text-center mt-15px waiting-label-font" for="emoji">Moderate</label>
                                        </div>
                                        <div class="d-grid emojidiv mr-20px" onclick="emojiclicked(4)" id="intense">
                                            <img class="emoji" src="{{ asset('admin_assets/dist/img/emoji/intense.png') }}"  alt="intense">
                                            <label class="text-center mt-15px waiting-label-font" for="emoji">Intense</label>
                                        </div>
                                        <div class="d-grid emojidiv mr-20px" onclick="emojiclicked(5)"id="unspeakable">
                                            <img class="emoji" src="{{ asset('admin_assets/dist/img/emoji/unspeakable.png') }}"  alt="unspeakable">
                                            <label class="text-center mt-15px waiting-label-font" for="emoji">Unspeakable</label>
                                        </div>
                        </div>

                        <div class="patient-divider"></div>
                        <p class="sub-title-p mt-30px">Overall how is your pain since you last visit?</p>

                        <div class="row mt-30px mb-30px">
                                        <div class="col-md-12 d-flex justiy-content-space-between">
                                            <p class="custom-p">Minimum</p>
                                      
                                            <div class="d-grid">
                                                <input type="radio" id="male" name="totalpain" value="1" checked>
                                                <label for="male" class="custom-p mt-10">1</label>
                                                
                                            </div>
                                            <div class="d-grid">
                                                <input type="radio" id="female" name="totalpain" value="2">
                                                <label for="female" class="custom-p mt-10">2</label>
                                                
                                            </div>
                                            <div class="d-grid">
                                                <input type="radio" id="female" name="totalpain" value="3">
                                                <label for="female" class="custom-p mt-10">3</label>
                                                
                                            </div>
                                            <div class="d-grid">
                                                <input type="radio" id="female" name="totalpain" value="4">
                                                <label for="female" class="custom-p mt-10">4</label>
                                                
                                            </div>
                                            <div class="d-grid">
                                                <input type="radio" id="female" name="totalpain" value="5">
                                                <label for="female" class="custom-p mt-10">5</label>
                                            
                                            </div>

                                            <div class="d-grid">
                                                <input type="radio" id="female" name="totalpain" value="6">
                                                <label for="female" class="custom-p mt-10">6</label>
                                            
                                            </div>

                                            <div class="d-grid">
                                                <input type="radio" id="female" name="totalpain" value="7">
                                                <label for="female" class="custom-p mt-10">7</label>
                                                
                                            </div>

                                            <div class="d-grid">
                                                <input type="radio" id="female" name="totalpain" value="8">
                                                <label for="female" class="custom-p mt-10">8</label>
                                                
                                            </div>

                                            <div class="d-grid">
                                                <input type="radio" id="female" name="totalpain" value="9">
                                                <label for="female" class="custom-p mt-10">9</label>
                                                
                                            </div>

                                            <div class="d-grid">
                                                <input type="radio" id="female" name="totalpain" value="10">
                                                <label for="female" class="custom-p mt-10">10</label>
                                            
                                            </div>
                               
                                            <p class="custom-p">Extreme</p>
                                        </div>
                        </div>

                        <div class="patient-divider"></div>
                        <p class="sub-title-p mt-30px">How better or worse is you pain since your last visit?</p>
                        <div class="row mt-10 mb-30px">
                                        <div class="col-md-12">
                                            <div class="d-flex align-center">
                                                <input type="radio" id="male" name="lastpain" value="1" checked>
                                                <label for="male" class="custom-16-font mt-10 ml-15px">Much better</label>
                                            </div>  
                                            <div class="d-flex align-center">
                                                <input type="radio" id="female" name="lastpain" value="2">
                                                <label for="female" class="custom-16-font mt-10 ml-15px">Better</label>
                                            </div>
                                            <div class="d-flex align-center">
                                                <input type="radio" id="female" name="lastpain" value="3">
                                                <label for="female" class="custom-16-font mt-10 ml-15px">About the same</label>
                                            </div>
                                            <div class="d-flex align-center">
                                                <input type="radio" id="female" name="lastpain" value="4">
                                                <label for="female" class="custom-16-font mt-10 ml-15px">Worse</label>
                                            </div>
                                            <div class="d-flex align-center">
                                                <input type="radio" id="female" name="lastpain" value="5">
                                                <label for="female" class="custom-16-font mt-10 ml-15px">Much worse</label>
                                            </div>
                                        </div>
                        </div>

                        <div class="patient-divider"></div>
                        <div class="mb-10 mt-15px">
                                    <!-- <a href="{{ route('patient.waiting.ready', [ 'meetingId' => $meetingId ]) }}"> -->
                                        <button onclick="handleSubmit()" class="btn blue-btn patient-btn-text width-150px height-36px">Submit</button>
                                    <!-- </a> -->
                        </div>
                </div>    
            </div>
        </section>
@endsection

@section('javascript')
<script>
    // setting toastr options
    toastr.options = {
                  "closeButton": false,
                  "debug": false,
                  "newestOnTop": false,
                  "progressBar": false,
                  "positionClass": "toast-top-right",
                  "preventDuplicates": false,
                  "onclick": null,
                  "showDuration": "10",
                  "hideDuration": "1000",
                  "timeOut": "1000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }


    let checkedEmojiIndex = 1;

    // emojis
    let nopain = document.getElementById('nopain');
    let mild = document.getElementById('mild');
    let moderate = document.getElementById('moderate');
    let intense = document.getElementById('intense');
    let unspeakable = document.getElementById('unspeakable');


    function handleSubmit() {
        console.log('submit clicked!');
        //init the values
        let todaypain = checkedEmojiIndex;
        let totalpain = 0;
        let lastpain = 0;
        let meetingId = '<?php echo $meetingId; ?>';

        let totalpains = document.getElementsByName('totalpain');
        let lastpains = document.getElementsByName('lastpain');

        
        for ( let i = 0; i < totalpains.length; i++ ) {
            if ( totalpains[i].checked ) {
                totalpain = totalpains[i].value;
                console.log('totalpains', totalpains[i].value);
                break;
            }
        }

        
        for ( let i = 0; i < lastpains.length; i++ ) {
            if ( lastpains[i].checked ) {
                lastpain = lastpains[i].value;
                console.log('lastpains', lastpains[i].value);
                break;
            }
        }

        let submitData = {
            todaypain: todaypain,
            totalpain: totalpain,
            lastpain: lastpain,
            meetingId: meetingId
        }

        console.log(submitData);

        $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    
        $.ajax({
            url: "{{ route('patient.waiting.ready.post') }}",
            type: 'POST',              
            data: submitData,
            success: function(result)
            {
                if( result == 'Success' ) {
                    toastr.success('feedback was successfully submitted.');
                    console.log('successfully submitted!');
                    window.location = '/patient/waiting-ready/' + meetingId;
                }
                else {
                    console.log('Error Occured In feedback, Retry or Check Network');
                    toastr.error('feedback went wrong. Check network and retry.');
                }
            },
            error: function(data)
            {
                console.log('error',data);
                toastr.error('feedback went wrong. Check network and retry.');
            }
        });
        
    }


    function emojiclicked(index) {
        console.log('Clicked', index)
        if ( index == 1 ) {
            checkedEmojiIndex = 1;
            nopain.classList.add('active');
            mild.classList.remove('active');
            moderate.classList.remove('active');
            intense.classList.remove('active');
            unspeakable.classList.remove('active');

            // if ( (accidentRadio1.checked || accidentRadio2.checked) && (injuryRadio1.checked || injuryRadio2.checked) ) {
            //     document.getElementById('firststepbtn').classList.remove('patient-disabled-btn');
            //     document.getElementById('firststepbtn').classList.add('blue-btn');
            // }
        }

        if (index == 2) {
            checkedEmojiIndex = 2;
            nopain.classList.remove('active');
            mild.classList.add('active');
            moderate.classList.remove('active');
            intense.classList.remove('active');
            unspeakable.classList.remove('active');

            // if ( (accidentRadio1.checked || accidentRadio2.checked) && (injuryRadio1.checked || injuryRadio2.checked) ) {
            //     document.getElementById('firststepbtn').classList.remove('patient-disabled-btn');
            //     document.getElementById('firststepbtn').classList.add('blue-btn');
            // }
        }

        if (index == 3) {
            checkedEmojiIndex = 3;
            nopain.classList.remove('active');
            mild.classList.remove('active');
            moderate.classList.add('active');
            intense.classList.remove('active');
            unspeakable.classList.remove('active');

            // if ( (accidentRadio1.checked || accidentRadio2.checked) && (injuryRadio1.checked || injuryRadio2.checked) ) {
            //     document.getElementById('firststepbtn').classList.remove('patient-disabled-btn');
            //     document.getElementById('firststepbtn').classList.add('blue-btn');
            // }
        }

        if (index == 4) {
            checkedEmojiIndex = 4;
            nopain.classList.remove('active');
            mild.classList.remove('active');
            moderate.classList.remove('active');
            intense.classList.add('active');
            unspeakable.classList.remove('active');

            // if ( (accidentRadio1.checked || accidentRadio2.checked) && (injuryRadio1.checked || injuryRadio2.checked) ) {
            //     document.getElementById('firststepbtn').classList.remove('patient-disabled-btn');
            //     document.getElementById('firststepbtn').classList.add('blue-btn');
            // }
        }

        if (index == 5) {
            checkedEmojiIndex = 5;
            nopain.classList.remove('active');
            mild.classList.remove('active');
            moderate.classList.remove('active');
            intense.classList.remove('active');
            unspeakable.classList.add('active');

            // if ( (accidentRadio1.checked || accidentRadio2.checked) && (injuryRadio1.checked || injuryRadio2.checked) ) {
            //     document.getElementById('firststepbtn').classList.remove('patient-disabled-btn');
            //     document.getElementById('firststepbtn').classList.add('blue-btn');
            // }
        }
    }
</script>
@endsection
