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
                            <li  class="active">
                               CHECK IN
                            </li>
                            <li>
                               EXERCISES
                            </li>
                            <li>
                               REVIEW
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="patient-box mt-25px">
                <p class="patient-bold-blue-p mb-0px">Before we get Started</p>
                        <h3 class="waiting-light-blue-h3 mt-minus-25px">Let us know how you've been feeling.</p>
                        <div class="patient-divider"></div>
                        <p class="sub-title-p mt-20px">How is your pain today?</p>
                        <div class="row mt-30px mb-30px">
                                        <p class="m-auto">Emojis Coming Soon</p>
                        </div>

                        <div class="patient-divider"></div>
                        <p class="sub-title-p mt-20px mb-0">Have you had or been in an accident since your last visit?</p>

                        <div class="row mt-10 mb-15px">
                                        <div class="col-md-12">
                                            <div class="d-flex align-center mb-minus-5px">
                                                <input type="radio" id="accident1" name="accident" value="1">
                                                <label for="male" class="custom-16-font mt-10 ml-15px">Yes</label>
                                            </div>  
                                            <div class="d-flex align-center">
                                                <input type="radio" id="accident2" name="accident" value="2">
                                                <label for="female" class="custom-16-font mt-10 ml-15px">No</label>
                                            </div>
                                        </div>
                        </div>

                        <div class="patient-divider"></div>
                        <p class="sub-title-p mt-20px mb-0">Do you have any new injuries since your last visit?</p>
                        <div class="row mt-10 mb-15px">
                                        <div class="col-md-12">
                                            <div class="d-flex align-center mb-minus-5px">
                                                <input type="radio" id="injury1" name="injury" value="1">
                                                <label for="male" class="custom-16-font mt-10 ml-15px">Yes</label>
                                            </div>  
                                            <div class="d-flex align-center">
                                                <input type="radio" id="injury2" name="injury" value="2">
                                                <label for="female" class="custom-16-font mt-10 ml-15px">No</label>
                                            </div>
                                        </div>
                        </div>

                        <div class="mb-35px mt-15px">
                                    <button id="firststepbtn" class="btn patient-disabled-btn patient-btn-text width-150px height-36px" onclick="firstStepSubmit()">Submit</button>
                        </div>
                </div>            
            </div>
        </section>
@endsection

@section('javascript')
<script>
    let accidentRadio1 = document.getElementById('accident1');
    let accidentRadio2 = document.getElementById('accident2');
    let injuryRadio1 = document.getElementById('injury1');
    let injuryRadio2 = document.getElementById('injury2');
    accidentRadio1.addEventListener('change', function(e) {
        console.log(e.target.name,e.target.checked, e.target.value);
        if ( injuryRadio1.checked || injuryRadio2.checked) {
            document.getElementById('firststepbtn').classList.remove('patient-disabled-btn');
            document.getElementById('firststepbtn').classList.add('blue-btn');
        } 
    });
    accidentRadio2.addEventListener('change', function(e) {
        console.log(e.target.name,e.target.checked, e.target.value);
        if ( injuryRadio1.checked || injuryRadio2.checked) {
            document.getElementById('firststepbtn').classList.remove('patient-disabled-btn');
            document.getElementById('firststepbtn').classList.add('blue-btn');
        } 
    });
    injuryRadio1.addEventListener('change', function(e) {
        if (accidentRadio1.checked || accidentRadio2.checked) {
            document.getElementById('firststepbtn').classList.remove('patient-disabled-btn');
            document.getElementById('firststepbtn').classList.add('blue-btn');
        }
    });

    function firstStepSubmit() {
        if ( (!accidentRadio1.checked && !accidentRadio2.checked) ||
                (!injuryRadio1.checked && !injuryRadio2.checked)
        ) {
            window.alert('Please Choose One Option');
        } else {
            window.location = '/patient/careplan';
        }

    }
</script>
@endsection
