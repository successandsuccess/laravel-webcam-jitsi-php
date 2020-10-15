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
                <div class="container max-width-962px">
                <h1 class="patient-careplan-blue-h1 text-center mt-5px mb-50">Howard' s Care Plan</h1>
                <div class="row mb-50">
                    <div class="col-md-12">
                        <ol class="progressbar">
                            <li>
                               CHECK IN
                            </li>
                            <li>
                               EXERCISES
                            </li>
                            <li class="active">
                               REVIEW
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="patient-box mt-25px">
                <p class="patient-bold-blue-p mb-0px">Wow, Great job today!</p>
                        <h3 class="waiting-light-blue-h3 mt-minus-25px">Let us know your final thoughts.</h3>
                        <div class="patient-divider"></div>
                        <p class="sub-title-p mt-20px">How is your pain today?</p>
                        <div class="row mt-30px mb-30px">
                                        <div class="d-grid emojidiv mr-20px" onclick="emojiclicked(1)" id="nopain">
                                            <img class="emoji" src="{{ asset('admin_assets/dist/img/emoji/nopain.png') }}"  alt="no pain">
                                            <label class="text-center mt-15px" for="emoji">No Pain</label>
                                        </div>
                                        <div class="d-grid emojidiv mr-20px"  onclick="emojiclicked(2)" id="mild" >
                                            <img class="emoji" src="{{ asset('admin_assets/dist/img/emoji/mild.png') }}"alt="mild">
                                            <label class="text-center mt-15px" for="emoji">Mild</label>
                                        </div>
                                        <div class="d-grid emojidiv mr-20px" onclick="emojiclicked(3)" id="moderate" >
                                            <img class="emoji" src="{{ asset('admin_assets/dist/img/emoji/moderate.png') }}" alt="moderate">
                                            <label class="text-center mt-15px" for="emoji">Moderate</label>
                                        </div>
                                        <div class="d-grid emojidiv mr-20px" onclick="emojiclicked(4)" id="intense">
                                            <img class="emoji" src="{{ asset('admin_assets/dist/img/emoji/intense.png') }}"  alt="intense">
                                            <label class="text-center mt-15px" for="emoji">Intense</label>
                                        </div>
                                        <div class="d-grid emojidiv mr-20px" onclick="emojiclicked(5)"id="unspeakable">
                                            <img class="emoji" src="{{ asset('admin_assets/dist/img/emoji/unspeakable.png') }}"  alt="unspeakable">
                                            <label class="text-center mt-15px" for="emoji">Unspeakable</label>
                                        </div>
                        </div>

                        <div class="patient-divider"></div>
                        <p class="sub-title-p mt-20px mb-0">Were you able to complete all the exercises?</p>

                        <div class="row mt-10 mb-15px">
                                        <div class="col-md-12">
                                            <div class="d-flex align-center mb-minus-5px">
                                                <input type="radio" id="completable1" name="completable" value="1">
                                                <label for="male" class="custom-16-font mt-10 ml-15px">Yes</label>
                                            </div>  
                                            <div class="d-flex align-center">
                                                <input type="radio" id="completable2" name="completable" value="2">
                                                <label for="female" class="custom-16-font mt-10 ml-15px">No</label>
                                            </div>
                                        </div>
                        </div>

                        <div class="patient-divider"></div>
                        <p class="sub-title-p mt-20px mb-0">Overall, rate the difficulty of the program:</p>
                        <div class="row mt-10 mb-15px">
                                        <div class="col-md-12">
                                            <div class="d-flex align-center mb-minus-5px">
                                                <input type="radio" id="level5" name="level" value="5">
                                                <label for="male" class="custom-16-font mt-10 ml-15px">5 - Very difficult</label>
                                            </div>  
                                            <div class="d-flex align-center">
                                                <input type="radio" id="level4" name="level" value="4">
                                                <label for="female" class="custom-16-font mt-10 ml-15px">4 - Difficult</label>
                                            </div>
                                            <div class="d-flex align-center">
                                                <input type="radio" id="level3" name="level" value="3">
                                                <label for="female" class="custom-16-font mt-10 ml-15px">3 - Moderate</label>
                                            </div>
                                            <div class="d-flex align-center">
                                                <input type="radio" id="level2" name="level" value="2">
                                                <label for="female" class="custom-16-font mt-10 ml-15px">2 - Easy</label>
                                            </div>
                                            <div class="d-flex align-center">
                                                <input type="radio" id="level1" name="level" value="1">
                                                <label for="female" class="custom-16-font mt-10 ml-15px">1 - Very easy</label>
                                            </div>
                                        </div>
                        </div>

                        <div class="mb-35px mt-15px">
                                    <button id="firststepbtn" class="btn patient-btn-text width-150px height-36px patient-disabled-btn" onclick="totalCompleteSubmit()">Submit</button>
                        </div>
                </div>            
            </div>
        </section>

        
        <div class="modal" id="modal-lastreview">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body text-center pl-40px pr-40px">
                        <p class="real-quick-font mt-30px">Way to go!</p>
                        <div class="row justify-content-center">
                            <img class="emoji" src="{{ asset('admin_assets/dist/img/star.png') }}"  alt="single star">
                        </div>
                        <p class="feedback-black-font">Your program has been submitted. You committed <b>22 minutes</b> to your health,
                    and added another day to your streak!</p>
                    </div>
                    <div class="modal-footer justify-content-center border-none mb-30px">
                        <button id="submitselfdirectedfeedback" onclick="handleLastSubmit()" type="button" class="btn blue-btn patient-btn-text width-246px height-36px">Return to Homepage</button>
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

    // inital values to save the feeback
    var checkedEmoji = 0;

    // emojis
    let nopain = document.getElementById('nopain');
    let mild = document.getElementById('mild');
    let moderate = document.getElementById('moderate');
    let intense = document.getElementById('intense');
    let unspeakable = document.getElementById('unspeakable');

    let completableRadio1 = document.getElementById('completable1');
    let completableRadio2 = document.getElementById('completable2');
    let levelRadio1 = document.getElementById('level1');
    let levelRadio2 = document.getElementById('level2');
    let levelRadio3 = document.getElementById('level3');
    let levelRadio4 = document.getElementById('level4');
    let levelRadio5 = document.getElementById('level5');



    completableRadio1.addEventListener('change', function(e) {
        console.log(e.target.name,e.target.checked, e.target.value);
        let classList = document.getElementsByClassName("d-grid emojidiv mr-20px active");
        let classLength = classList.length;
        if ( (levelRadio1.checked || levelRadio2.checked || levelRadio3.checked || levelRadio4.checked || levelRadio5.checked) && classLength != 0 ) {
            document.getElementById('firststepbtn').classList.remove('patient-disabled-btn');
            document.getElementById('firststepbtn').classList.add('blue-btn');
        } 
    });
    completableRadio2.addEventListener('change', function(e) {
        let classList = document.getElementsByClassName("d-grid emojidiv mr-20px active");
        let classLength = classList.length;
        console.log(e.target.name,e.target.checked, e.target.value);
        if ( (levelRadio1.checked || levelRadio2.checked || levelRadio3.checked || levelRadio4.checked || levelRadio5.checked) && classLength != 0) {
            document.getElementById('firststepbtn').classList.remove('patient-disabled-btn');
            document.getElementById('firststepbtn').classList.add('blue-btn');
        } 
    });
    levelRadio1.addEventListener('change', function(e) {
        let classList = document.getElementsByClassName("d-grid emojidiv mr-20px active");
        let classLength = classList.length;
        if ( (completableRadio1.checked || completableRadio2.checked ) && classLength != 0 ) {
            document.getElementById('firststepbtn').classList.remove('patient-disabled-btn');
            document.getElementById('firststepbtn').classList.add('blue-btn');
        }
    });
    levelRadio2.addEventListener('change', function(e) {
        let classList = document.getElementsByClassName("d-grid emojidiv mr-20px active");
        let classLength = classList.length;
        if ((completableRadio1.checked || completableRadio2.checked ) && classLength != 0) {
            document.getElementById('firststepbtn').classList.remove('patient-disabled-btn');
            document.getElementById('firststepbtn').classList.add('blue-btn');
        }
    });
    levelRadio3.addEventListener('change', function(e) {
        let classList = document.getElementsByClassName("d-grid emojidiv mr-20px active");
        let classLength = classList.length;
        if ((completableRadio1.checked || completableRadio2.checked ) && classLength != 0) {
            document.getElementById('firststepbtn').classList.remove('patient-disabled-btn');
            document.getElementById('firststepbtn').classList.add('blue-btn');
        }
    });
    levelRadio4.addEventListener('change', function(e) {
        let classList = document.getElementsByClassName("d-grid emojidiv mr-20px active");
        let classLength = classList.length;
        if ((completableRadio1.checked || completableRadio2.checked ) && classLength != 0) {
            document.getElementById('firststepbtn').classList.remove('patient-disabled-btn');
            document.getElementById('firststepbtn').classList.add('blue-btn');
        }
    });
    levelRadio5.addEventListener('change', function(e) {
        let classList = document.getElementsByClassName("d-grid emojidiv mr-20px active");
        let classLength = classList.length;
        if ((completableRadio1.checked || completableRadio2.checked ) && classLength != 0) {
            document.getElementById('firststepbtn').classList.remove('patient-disabled-btn');
            document.getElementById('firststepbtn').classList.add('blue-btn');
        }
    });

    function totalCompleteSubmit() {
        const classList = document.getElementsByClassName("btn patient-btn-text width-150px height-36px patient-disabled-btn");
        const classLength = classList.length;
        if (classLength == 0) {
            console.log("Element found with the clicked emoji");
            let completable;
            let difficult_level;
            if ( completableRadio1.checked ) {
                completable = 1; // completable Yes.
            } else {
                completable = 0; // completable No.
            }

            if ( levelRadio1.checked ) {
                difficult_level = 1; // very esay
            }
            if ( levelRadio2.checked ) {
                difficult_level = 2; // easy
            }
            if ( levelRadio3.checked ) {
                difficult_level = 3; // moderate
            }
            if ( levelRadio4.checked ) {
                difficult_level = 4; // difficult
            }
            if ( levelRadio5.checked ) {
                difficult_level = 5; // very difficult
            }

            // save the total completed feedback 
            let totalCompleteData = {
                todaypain : checkedEmoji,
                completable : completable,
                difficult_level : difficult_level
            }
            console.log(totalCompleteData);

            $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        
            $.ajax({
                url: "{{ route('patient.careplan.exercises_totalexercisefeedback') }}",
                type: 'POST',              
                data: totalCompleteData,
                success: function(result)
                {
                    if( result == 'Success' ) {
                        console.log('successfully submitted!');
                        toastr.success('Total Exercises Feedback was successfully saved.');
                        $("#modal-lastreview").modal({
                            backdrop: 'static',
                            keyboard: false
                        });
                    }
                    else {
                        console.log('Error Occured In Total Exercises Feedback, Retry or Check Network');
                        toastr.error('Total Exercises Feedback went wrong. Check network and retry.');
                    }
                },
                error: function(data)
                {
                    console.log('error',data);
                    toastr.error('Final Exercises Feedback went wrong. Check network and retry.');
                }
            });

         

        } else {
            console.log("No element found with the clicked emoji");
            window.alert('Please choose every options');
        }
    }

    function emojiclicked(index) {
        
        if ( index == 1 ) {
            nopain.classList.add('active');
            mild.classList.remove('active');
            moderate.classList.remove('active');
            intense.classList.remove('active');
            unspeakable.classList.remove('active');

            checkedEmoji = 1; // no pain

            if ((completableRadio1.checked || completableRadio2.checked ) && (levelRadio1.checked || levelRadio2.checked || levelRadio3.checked || levelRadio4.checked || levelRadio5.checked) ) {
                document.getElementById('firststepbtn').classList.remove('patient-disabled-btn');
                document.getElementById('firststepbtn').classList.add('blue-btn');
            }
        }

        if (index == 2) {
            nopain.classList.remove('active');
            mild.classList.add('active');
            moderate.classList.remove('active');
            intense.classList.remove('active');
            unspeakable.classList.remove('active');

            checkedEmoji = 2 // mild

            if ((completableRadio1.checked || completableRadio2.checked ) && (levelRadio1.checked || levelRadio2.checked || levelRadio3.checked || levelRadio4.checked || levelRadio5.checked) ) {
                document.getElementById('firststepbtn').classList.remove('patient-disabled-btn');
                document.getElementById('firststepbtn').classList.add('blue-btn');
            }
        }

        if (index == 3) {
            nopain.classList.remove('active');
            mild.classList.remove('active');
            moderate.classList.add('active');
            intense.classList.remove('active');
            unspeakable.classList.remove('active');

            checkedEmoji = 3 // moderate

            if ((completableRadio1.checked || completableRadio2.checked ) && (levelRadio1.checked || levelRadio2.checked || levelRadio3.checked || levelRadio4.checked || levelRadio5.checked) ) {
                document.getElementById('firststepbtn').classList.remove('patient-disabled-btn');
                document.getElementById('firststepbtn').classList.add('blue-btn');
            }
        }

        if (index == 4) {
            nopain.classList.remove('active');
            mild.classList.remove('active');
            moderate.classList.remove('active');
            intense.classList.add('active');
            unspeakable.classList.remove('active');

            checkedEmoji = 4 // intense

            if ((completableRadio1.checked || completableRadio2.checked ) && (levelRadio1.checked || levelRadio2.checked || levelRadio3.checked || levelRadio4.checked || levelRadio5.checked) ) {
                document.getElementById('firststepbtn').classList.remove('patient-disabled-btn');
                document.getElementById('firststepbtn').classList.add('blue-btn');
            }
        }

        if (index == 5) {
            nopain.classList.remove('active');
            mild.classList.remove('active');
            moderate.classList.remove('active');
            intense.classList.remove('active');
            unspeakable.classList.add('active');

            checkedEmoji = 5 // unspeakable

            if ((completableRadio1.checked || completableRadio2.checked ) && (levelRadio1.checked || levelRadio2.checked || levelRadio3.checked || levelRadio4.checked || levelRadio5.checked) ) {
                document.getElementById('firststepbtn').classList.remove('patient-disabled-btn');
                document.getElementById('firststepbtn').classList.add('blue-btn');
            }
        }
    }

    function handleLastSubmit() {
        window.location = '/patient';
    }
</script>
@endsection
